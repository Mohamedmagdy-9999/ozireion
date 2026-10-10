<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Client;
use Str;
use DB;

use Illuminate\Support\Carbon;

use Illuminate\Validation\ValidationException;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Country;

use App\Models\Gender;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Exception;

class MobileApiController extends Controller
{




    public function register(Request $request)
    {
        $messages = [
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط',
            'phone.unique' => 'رقم الهاتف مستخدم من قبل',

            'name.required' => 'الاسم مطلوب',

            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',

            'birthdate.required' => 'تاريخ الميلاد مطلوب',
            'birthdate.date' => 'تاريخ الميلاد غير صحيح',
            'birthdate.before' => 'تاريخ الميلاد يجب أن يكون قبل اليوم',

            'gender_id.required' => 'النوع مطلوب',
            'gender_id.in' => 'النوع غير صحيح',

            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ألا تقل عن 8 أحرف',

            'image.required' => 'الصورة الشخصية مطلوبة',
            'image.image' => 'الملف يجب أن يكون صورة',
            'image.mimes' => 'الصورة يجب أن تكون PNG أو JPG أو JPEG أو WEBP',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 10 ميجابايت',
        ];

        $data = $request->validate([
            'phone' => 'required|numeric|unique:clients,phone',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'gender_id' => 'required|in:1,2',
            'password' => 'required|string|min:8',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:10240',
        ], $messages);

        DB::beginTransaction();

        try {
            $imageName = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $imageName = time() . '_' . uniqid() . '.' .
                    $file->getClientOriginalExtension();

                $file->move(public_path('clients'), $imageName);
            }

            $client = Client::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'gender_id' => $data['gender_id'],
                'image' => $imageName,
                'password' => Hash::make($data['password']),
                'test' => $data['password'],
            ]);

            $token = Auth::guard('client-api')->login($client);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'تم إنشاء الحساب بنجاح',
                'token' => $token,
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();

            // حذف الصورة المرفوعة إذا فشلت العملية
            if ($imageName && file_exists(public_path('clients/' . $imageName))) {
                unlink(public_path('clients/' . $imageName));
            }

            report($e);

            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء إنشاء الحساب',
            ], 500);
        }
    }

   

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'password.required' => 'كلمة المرور مطلوبة',
        ];

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], $messages);

        $token = Auth::guard('client-api')->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if (!$token) {
            return response()->json([
                'status' => false,
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
            ], 401);
        }

        $client = Auth::guard('client-api')->user();

        return response()->json([
            'status' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'token' => $token,
        ], 200);
    }

    public function check(Request $request)
    {
        try {
            $client = Auth::guard('client-api')->user();

            if (!$client) {
                return response()->json([
                    'status' => false,
                    'message' => 'التوكن غير صالح أو انتهى'
                ], 401);
            }

            return response()->json([
                'status' => true,
                'user' => $client
            ]);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json([
                'status' => false,
                'message' => 'التوكن انتهى، الرجاء تسجيل الدخول مرة أخرى'
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete_user(Request $request)
    {
        $client = Auth::guard('client-api')->user();

        if (!$client) {
            return response()->json([
                'status' => false,
                'message' => 'المستخدم غير موجود أو التوكن غير صالح'
            ], 401);
        }

        // Soft delete مباشرة
        $client->delete();

        return response()->json([
            'status' => true,
            'message' => 'تم الحذف بنجاح',
        ]);
    }



    public function genders()
    {
        $data = Gender::latest()->get();
        return response()->json([
                'status' => true,
                'data' => $data,
              
        ]);

    }

    public function countries()
    {
        $data = Country::with('governorates.areas')->latest()->get();
        return response()->json([
                'status' => true,
                'data' => $data,
              
        ]);

    }

    

    public function categories()
    {
        $data = Category::with('blogs')->latest()->get();

        $data->transform(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,

                'blogs' => $category->blogs->map(function ($blog) {
                    return [
                        'id'  => $blog->id,
                        'title'=> $blog->title,
                        'desc'=> $blog->desc,
                        'image_url'=> $blog->image_url,
                        'category_name'=> $blog->category_name,
                        'category_id'=> $blog->category_id,
                        'created_at' => $blog->created_at,
                        'views_count' => $blog->views_count,
                        'is_liked' => $blog->is_liked,
                        'likes_count' => $blog->likes_count,
                    ];
                })
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function categoryBlogs($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $blogs = Blog::where('category_id', $id)
            ->with('category')
            ->latest()
            ->paginate(10);

        $data = [
            'id' => $category->id,
            'name' => $category->name,

            'blogs' => [
                'data' => collect($blogs->items())->map(function ($blog) {
                    return [
                        'id'  => $blog->id,
                        'title'=> $blog->title,
                        'desc'=> $blog->desc,
                        'image_url'=> $blog->image_url,
                        'category_name'=> $blog->category_name,
                        'category_id'=> $blog->category_id,
                        'created_at' => $blog->created_at,
                        'views_count' => $blog->views_count,
                        'is_liked' => $blog->is_liked,
                        'likes_count' => $blog->likes_count,
                    ];
                }),

                'pagination' => [
                    'current_page' => $blogs->currentPage(),
                    'last_page' => $blogs->lastPage(),
                    'per_page' => $blogs->perPage(),
                    'total' => $blogs->total(),
                ]
            ]
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function blogs(Request $request)
    {
        $data = Blog::query()

            ->when($request->category_id, fn ($q, $v) =>
                $q->where('category_id', $v))

            ->when($request->from, fn ($q, $v) =>
                $q->whereDate('created_at', '>=', $v))

            ->when($request->to, fn ($q, $v) =>
                $q->whereDate('created_at', '<=', $v))

            ->when($request->search, function ($q, $search) {
                $q->where(function ($query) use ($search) {
                    $query->where('title_ar', 'like', "%$search%")
                        ->orWhere('title_en', 'like', "%$search%")
                        ->orWhere('desc_ar', 'like', "%$search%")
                        ->orWhere('desc_en', 'like', "%$search%");
                });
            })

            // ✅ فلتر الترتيب
            ->when($request->order, function ($q, $order) {
                if ($order == 'oldest') {
                    $q->orderBy('created_at', 'asc');
                } else {
                    $q->orderBy('created_at', 'desc'); // default latest
                }
            }, function ($q) {
                $q->latest(); // default لو مفيش order
            })

            ->paginate(20);

        $data->getCollection()->transform(function ($data) {
            return [
                'id'  => $data->id,
                'title'=> $data->title,
                'desc'=> $data->desc,
                'image_url'=> $data->image_url,
                'category_name'=> $data->category_name,
                'category_id'=> $data->category_id,
                'created_at' => optional($data->created_at)->format('d-m-Y'),
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function blog_details($id)
    {
        $blog = Blog::findOrFail($id);

        $data = [
            'id' => $blog->id,
            'title' => $blog->title,
            'desc' => $blog->desc,
            'image_url' => $blog->image_url,
            'category_name' => $blog->category_name,
            'created_at' => $blog->created_at,
            'views_count' => $blog->views_count,
            'is_liked' => $blog->is_liked,
            'likes_count' => $blog->likes_count,
        ];

        $userId = auth()->guard('api_users')->id();

        if ($userId) {

            $exists = DB::table('blog_views')
                ->where('blog_id', $blog->id)
                ->where('user_id', $userId)
                ->exists();

            if (!$exists) {
                DB::table('blog_views')->insert([
                    'blog_id' => $blog->id,
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $blog->increment('views');
            }
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }


    public function toggle_like($id)
    {
        $blog = Blog::findOrFail($id);
        $userId = auth()->guard('api_users')->id();

        if (!$userId) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $like = DB::table('blog_likes')
            ->where('blog_id', $blog->id)
            ->where('user_id', $userId)
            ->first();

        if ($like) {
            DB::table('blog_likes')
                ->where('blog_id', $blog->id)
                ->where('user_id', $userId)
                ->delete();

            $liked = false;
        } else {
            DB::table('blog_likes')->insert([
                'blog_id' => $blog->id,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $liked = true;
        }

        return response()->json([
            'status' => true,
            'liked' => $liked,
            'likes_count' => $blog->likes()->count()
        ]);
    }

    public function add_post(Request $request)
    {
       

        $messages = [
            'required' => 'حقل :attribute مطلوب.',
            'image' => 'حقل :attribute يجب أن يكون صورة.',
            'mimes' => 'حقل :attribute يجب أن يكون بصيغة jpg أو jpeg أو png.',
            'max.file' => 'حقل :attribute يجب ألا يتجاوز 2 ميجا.',
           
        ];

        $attributes = [
            'image' => 'الصورة',
            'content' => 'المحتوي',
        ];

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|string|max:500',
        ], $messages, $attributes);

        
        $name = null;
        if ($file = $request->file('image')) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('posts'), $name);
        }

        $userId = auth()->guard('api_users')->id();

        $post = new Post();
        $post->image = $name;
        $post->user_id = $userId;
        $post->content = $request->content;
        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'تم الاضافة بنجاح',
        ], 200);

    }

    public function my_posts(Request $request)
    {
       
        $userId = auth()->guard('api_users')->id();

        $data =  Post::where('user_id',$userId)->latest()->paginate(10);
        $data->getCollection()->transform(function ($item) {
            return [
                'id'  => $item->id,
                'content'=> $item->content,
                'image_url'=> $item->image_url,
                'likes_count'=> $item->likes_count,
                'comments_count'=> $item->comments_count,
                'is_liked'=> $item->is_liked,
                'created_at' => optional($item->created_at)->format('d-m-Y'),
                'user_name'=> $item->user_name,
                'user_image_url'=> $item->user_image_url,
                'comments'=> $item->comments,
                'likes'=> $item->likes,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
        ], 200);

    }

    public function all_posts(Request $request)
    {
       
        $data =  Post::latest()->paginate(10);
        $data->getCollection()->transform(function ($item) {
            return [
                'id'  => $item->id,
                'content'=> $item->content,
                'image_url'=> $item->image_url,
                'likes_count'=> $item->likes_count,
                'comments_count'=> $item->comments_count,
                'is_liked'=> $item->is_liked,
                'created_at' => optional($item->created_at)->format('d-m-Y'),
                'user_name'=> $item->user_name,
                'user_image_url'=> $item->user_image_url,
                'comments'=> $item->comments,
                'likes'=> $item->likes,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
        ], 200);

    }
 
    public function add_comment(Request $request, $id)
    {
        $userId = auth()->guard('api_users')->id();

        $comment = Comment::create([
            'user_id' => $userId,
            'post_id' => $id,
            'comment' => $request->comment
        ]);

        return response()->json([
            'status' => true,
            'message' => 'تم الاضافة بنجاح',
        ]);
    }

    public function toggle_post_like($id)
    {
        $userId = auth()->guard('api_users')->id();

        $post = Post::findOrFail($id);

        $like = $post->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            $post->likes()->create([
                'user_id' => $userId
            ]);
            $liked = true;
        }

        return response()->json([
            'status' => true,
            'liked' => $liked,
            'likes_count' => $post->likes()->count()
        ]);
    }

    public function merchant_cats()
    {
        $data = MerchantCategory::latest()->get();
        return response()->json([
                'status' => true,
                'data' => $data,
              
        ]);

    }

    // public function add_merchant(Request $request)
    // {
        
        
    //     $name = null;
    //     if ($file = $request->file('image')) {
    //         $name = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('merchants'), $name);
    //     }

        

    //     $blog = new Merchant();
    //     $blog->image = $name;
    //     $blog->merchant_category_id = $request->merchant_category_id;
    //     $blog->name_en = $request->name_en;
    //     $blog->name_ar = $request->name_ar;
    //     $blog->club_id = 1;
    //     $blog->save();

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'تم الاضافة بنجاح',
    //     ], 200);
    // }

    public function merchants(Request $request)
    {
        $data = Merchant::query()

            ->when($request->merchant_category_id, function ($q, $merchant_category_id) {
                $q->where('merchant_category_id', $merchant_category_id);
            })

            ->latest()
            ->paginate(10);

        $data->getCollection()->transform(function ($item) {
            return [
                'id'  => $item->id,
                'name'=> $item->name,
                'image_url'=> $item->image_url,
                'category_name'=> $item->category_name,
                'club_name'=> $item->club_name,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
        ], 200);
    }

    //  public function add_deal(Request $request)
    //  {
        
        
    //      $name = null;
    //      if ($file = $request->file('image')) {
    //          $name = time() . '_' . $file->getClientOriginalName();
    //          $file->move(public_path('deals'), $name);
    //      }

        

    //     $deal = new Deal();
    //     $deal->image = $name;
    //     $deal->merchant_id = $request->merchant_id;
    //     $deal->desc_en = $request->desc_en;
    //     $deal->desc_ar = $request->desc_ar;
    //     $deal->price = $request->price;
    //     $deal->end_date = $request->end_date;
    //     $deal->save();

    //      return response()->json([
    //          'status' => true,
    //          'message' => 'تم الاضافة بنجاح',
    //      ], 200);
    //  }

    public function deals($merchant_id)
    {
        $data = Deal::where('merchant_id', $merchant_id)
            ->with('merchant')
            ->latest()
            ->paginate(10);

        $data->getCollection()->transform(function ($item) {
            return [
                'id'  => $item->id,
                'desc'=> $item->desc,
                'image_url'=> $item->image_url,
                'merchant_name'=> $item->merchant_name,
                'merchant_id'=> $item->merchant_id,
                'price'=> $item->price,
                'current_price' => $item->current_price,
                'end_date'=> $item->end_date,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
        ], 200);
    }
}



