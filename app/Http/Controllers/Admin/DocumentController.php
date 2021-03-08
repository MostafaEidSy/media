<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::all();
        return view('admin.document.index', compact('documents'));
    }
    public function create(){
        return view('admin.document.create');
    }
    public function uploadVideo(Request $request){
        if ($request->file('document')) {
            $video = $request->file('document');
            $filename = Str::slug( 'Document_' . Carbon::now()) . '.' . $video->getClientOriginalExtension();
            $path = $request->file('document')->storeAs('public/uploads/documents/', $filename);
            return response()->json([
                'documentName'        => $filename,
                'status'            => true,
            ], 200);
        }
        return response()->json([
            'status'        => false,
        ]);
    }
    public function story(DocumentRequest $request){
        $data = [];
        $data['name'] = $request->input('name');
        $data['document_name'] = $request->input('document_name');
        $created = Document::create($data);
        if($created){
            return redirect()->route('admin.document.index')->with(['message' => 'Document Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.document.index')->with(['message' => 'Sorry, There Was An Error Created The Document', 'alert-type' => 'danger']);
        }
    }
    public function delete($id){
        $document = Document::where('id', $id)->first();
        if ($document){
            $deleted = $document->delete();
            if ($deleted){
                return redirect()->route('admin.document.index')->with(['message' => 'Document Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.document.index')->with(['message' => 'Sorry, There Was An Error Deleting The Document', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.document.index')->with(['message' => 'Sorry, This Document Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function edit($id){
        $document = Document::where('id', $id)->first();
        if ($document){
            return view('admin.document.edit', compact('document'));
        }else{
            return redirect()->route('admin.document.index')->with(['message' => 'Sorry, This Document Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function update(DocumentRequest $request){
        $document = Document::where('id', $request->input('id'))->first();
        if($document){
            $data = [];
            $data['name'] = $request->input('name');
            $data['document_name'] = $request->input('document_name');
            $updated = $document->update($data);
            if ($updated){
                return redirect()->route('admin.document.index')->with(['message' => 'Document Updated Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.document.index')->with(['message' => 'Sorry, There Was An Error Updated The Document', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.document.index')->with(['message' => 'Sorry, This Document Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}

