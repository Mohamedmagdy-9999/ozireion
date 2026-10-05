<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Coach;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Type;
use App\Models\Branch;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with([
            'coach',
            'category',
            'subCategory',
            'type',
            'branch'
        ])->latest()->get();

        return view('admin.sessions.index', compact('sessions'));
    }


    public function create()
    {
        $coaches = Coach::latest()->get();
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        $types = Type::latest()->get();
        $branches = Branch::latest()->get();

        return view('admin.sessions.create', compact(
            'coaches',
            'categories',
            'sub_categories',
            'types',
            'branches'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'time' => 'required',
            'max_attendees' => 'required|integer|min:1',

            'coach_id' => 'required|exists:coaches,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'type_id' => 'required|exists:types,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        Session::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'date' => $request->date,
            'time' => $request->time,
            'max_attendees' => $request->max_attendees,

            'coach_id' => $request->coach_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'type_id' => $request->type_id,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()
            ->route('sessions.index')
            ->with('success', 'Session created successfully');
    }


    public function edit($id)
    {
        $session = Session::findOrFail($id);

        $coaches = Coach::latest()->get();
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        $types = Type::latest()->get();
        $branches = Branch::latest()->get();

        return view('admin.sessions.edit', compact(
            'session',
            'coaches',
            'categories',
            'sub_categories',
            'types',
            'branches'
        ));
    }


    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'time' => 'required',
            'max_attendees' => 'required|integer|min:1',

            'coach_id' => 'required|exists:coaches,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'type_id' => 'required|exists:types,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $session->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'date' => $request->date,
            'time' => $request->time,
            'max_attendees' => $request->max_attendees,

            'coach_id' => $request->coach_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'type_id' => $request->type_id,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()
            ->route('sessions.index')
            ->with('success', 'Session updated successfully');
    }


    public function destroy($id)
    {
        $session = Session::findOrFail($id);

        $session->delete();

        return redirect()
            ->route('sessions.index')
            ->with('success', 'Session deleted successfully');
    }
}