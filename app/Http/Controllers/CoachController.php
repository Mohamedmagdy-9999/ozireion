<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Category;
use Illuminate\Http\Request;
use Hash;
class CoachController extends Controller
{
    /**
     * Display a listing of coaches.
     */
    public function index()
    {
        $coaches = Coach::with('categories')
            ->latest()
            ->get();

        return view('admin.coach.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new coach.
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.coach.create', compact('categories'));
    }

    /**
     * Store a newly created coach.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|string|max:50',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'categories' => 'required|array',

            'categories.*' => 'exists:categories,id',
        ]);

        $coach = new Coach();

        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->phone = $request->phone;
        $coach->password = Hash::make($request->email);
        $coach->test = $request->email;
        $coach->desc_en = $request->desc_en;
        $coach->desc_ar = $request->desc_ar;

        if ($file = $request->file('image')) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('coaches'), $name);
            $coach->image = $name;
        }

        $coach->save();

        /*
        |--------------------------------------------------------------------------
        | Save Categories
        |--------------------------------------------------------------------------
        */

        $coach->categories()->sync($request->categories);

        return redirect()
            ->route('coach.index')
            ->with('success', 'Coach added successfully.');
    }

    /**
     * Show the form for editing the specified coach.
     */
    public function edit(Coach $coach)
    {
        $categories = Category::latest()->get();

        $selectedCategories = $coach->categories
            ->pluck('id')
            ->toArray();

        return view(
            'admin.coach.edit',
            compact(
                'coach',
                'categories',
                'selectedCategories'
            )
        );
    }

    /**
     * Update the specified coach.
     */
    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|string|max:50',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'categories' => 'required|array',

            'categories.*' => 'exists:categories,id',
        ]);

        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('coaches', $name);
            
        }

        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->phone = $request->phone;
        $coach->desc_en = $request->desc_en;
        $coach->desc_ar = $request->desc_ar;
        $coach->password = Hash::make($request->email);
        $coach->test = $request->email;

        if(!empty($name))
        {
            $coach->image = $name;
        }

            

        $coach->save();

        /*
        |--------------------------------------------------------------------------
        | Update Categories
        |--------------------------------------------------------------------------
        */

        $coach->categories()->sync($request->categories);

        return redirect()
            ->route('coach.index')
            ->with('success', 'Coach updated successfully.');
    }

    /**
     * Remove the specified coach.
     */
    public function destroy(Coach $coach)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $coach->image &&
            file_exists(public_path('uploads/coaches/' . $coach->image))
        ) {
            unlink(
                public_path('uploads/coaches/' . $coach->image)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Coach
        |--------------------------------------------------------------------------
        */

        $coach->delete();

        return redirect()
            ->route('coach.index')
            ->with('success', 'Coach deleted successfully.');
    }
}