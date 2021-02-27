<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryVideoRequest;
use App\Models\CategoryVideo;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = CategoryVideo::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function story(CategoryVideoRequest $request){
        $data = [];
        $data['name'] = $request->input('name');
        $data['slug'] = strtolower(str_replace(' ', '-', $request->input('slug')));
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        $created = CategoryVideo::create($data);
        if($created){
            return redirect()->route('admin.category.index')->with(['message' => 'Category Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.category.index')->with(['message' => 'Sorry, There Was An Error Created The Category', 'alert-type' => 'danger']);
        }
    }
    public function delete($id){
        $category = CategoryVideo::where('id', $id)->first();
        if($category){
            $delete = $category->delete();
            if($delete){
                return redirect()->route('admin.category.index')->with(['message' => 'Category Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.category.index')->with(['message' => 'Sorry, There Was An Error Deleting The Category', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.category.index')->with(['message' => 'Sorry, This Category Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function edit($id){
        $category = CategoryVideo::where('id', $id)->first();
        if ($category){
            return view('admin.category.edit', compact('category'));
        }else{
            return redirect()->route('admin.category.index')->with(['message' => 'Sorry, This Category Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function update($id, CategoryVideoRequest $request){
        $category = CategoryVideo::where('id', $request->input('id'))->first();
        if ($category){
            $data = [];
            $data['name'] = $request->input('name');
            $data['slug'] = strtolower(str_replace(' ', '-', $request->input('slug')));
            $data['description'] = $request->input('description');
            $data['status'] = $request->input('status');
            $update = $category->update($data);
            if($update){
                return redirect()->route('admin.category.index')->with(['message' => 'Category Updated Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.category.index')->with(['message' => 'Sorry, There Was An Error Updated The Category', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.category.index')->with(['message' => 'Sorry, This Category Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}
