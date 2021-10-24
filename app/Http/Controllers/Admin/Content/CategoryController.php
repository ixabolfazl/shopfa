<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $postCategories = PostCategory::latest()->paginate(15);

        return view('admin.content.category.index', compact(['postCategories']));
    }


    public function create()
    {
        return view('admin.content.category.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return redirect()->route('admin.content.category.index');
    }
}
