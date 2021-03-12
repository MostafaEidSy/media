<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }
    public function create(){
        return view('admin.pages.create');
    }
    public function story(PageRequest $request){
        $data = [];
        $data['name'] = $request->input('name');
        $data['content'] = $request->input('content');
        $data['slug'] = $request->input('slug');
        $data['in_footer'] = $request->input('in_footer');
        $created = Page::create($data);
        if ($created){
            return redirect()->route('admin.page.index')->with(['message' => 'Page Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.page.index')->with(['message' => 'Sorry, There Was An Error Created The Page', 'alert-type' => 'danger']);
        }
    }
    public function edit($id){
        $page = Page::where('id', $id)->first();
        if ($page){
            return view('admin.pages.edit', compact('page'));
        }else{
            return redirect()->route('admin.page.index')->with(['message' => 'Sorry, This Page Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function update($id, PageRequest $request){
        $page = Page::where('id', $id)->first();
        if ($page){
            $data = [];
            $data['name'] = $request->input('name');
            $data['content'] = $request->input('content');
            $data['slug'] = $request->input('slug');
            $data['in_footer'] = $request->input('in_footer');
            $updated = $page->update($data);
            if ($updated){
                return redirect()->route('admin.page.index')->with(['message' => 'Page Updated Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.page.index')->with(['message' => 'Sorry, There Was An Error Updated The Page', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.page.index')->with(['message' => 'Sorry, This Page Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function delete($id){
        $page = Page::where('id', $id)->first();
        if ($page){
            $deleted = $page->delete();
            if ($deleted){
                return redirect()->route('admin.page.index')->with(['message' => 'Page Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.page.index')->with(['message' => 'Sorry, There Was An Error Deleting The Page', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.page.index')->with(['message' => 'Sorry, This Page Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}
