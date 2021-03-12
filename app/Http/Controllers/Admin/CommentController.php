<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::with(['user', 'video'])->get();
        return view('admin.comment.index', compact('comments'));
    }
    public function delete($id){
        $comment = Comment::where('id', $id)->first();
        if ($comment){
            $deleted = $comment->delete();
            if ($deleted){
                return redirect()->route('admin.comment.index')->with(['message' => 'Comment Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.comment.index')->with(['message' => 'Sorry, There Was An Error Deleting The Comment', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.comment.index')->with(['message' => 'Sorry, This Comment Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}
