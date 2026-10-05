<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use View;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client as HttpClient;
use App\Models\AbsenceEmailLog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
     {
        
        return view('admin.index');
     }

     

    

    public function log(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:255',
            
        ]);

        $credentials = $request->only([
            'email',
            'password'
        ]);

        if (auth()->attempt($credentials)) {

            $user = auth()->user();

            session()->flash(
                'welcome',
                'Welcome back MR/s. ' . $user->name . '! 🎉 We missed you 😊'
            );

            return redirect()->route('dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error_message', 'Invalid email or password');
    }



 
    public function logout(Request $request) {
        if (auth()->user()) {
            auth()->logout();
        }
        return redirect()->route('signin');
      }

    public function upload()
    {
        return View('/admin/upload')->withUrl('');
    }

    public function uploads(Request $req){
    	$valarr=[
			'img'=>'required|image|max:8192'
    	];
    	$this->validate($req,$valarr);
    	$image =$req->file('img');
	    $photoPath = public_path('/uploads');
    	$photoName= Str::random(32);
        $photoName.='.'.$image->getClientOriginalExtension();
        $image->move($photoPath,$photoName);
        return view('admin.upload')->withUrl(asset('/uploads').'/'.$photoName);
    }

   

    
   
}
