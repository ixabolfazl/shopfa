<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
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


    public function store(PostCategoryRequest $request)
    {
        //
    }


    public function edit(PostCategory $postCategory)
    {
        //
    }


    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        //
    }


    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return redirect()->route('admin.content.category.index');
    }
}
