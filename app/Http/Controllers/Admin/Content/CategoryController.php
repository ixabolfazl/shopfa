<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $inputs = $request->all();
        $inputs['image'] = 'image';
        PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی جدید با موفقیت ایجاد شد');

    }


    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit', compact(['postCategory']));
    }


    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $inputs = $request->all();
        $inputs['image'] = 'image';
        $postCategory->update($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی جدید با موفقیت ویرایش شد');
    }


    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد');
    }

    public function status(PostCategory $postCategory)
    {
        $postCategory->status = $postCategory->status == 0 ? 1 : 0;
        $result = $postCategory->save();
        return response()->json(['status' => $result, 'checked' => (bool)$postCategory->status]);
    }
}
