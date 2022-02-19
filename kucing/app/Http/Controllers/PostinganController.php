<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Postingan;
use App\Category;
use App\Comment;
use Validator;
use DB;

use illuminate\Support\Facades\Storage;


class PostinganController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $title = "Forum Discussion";
    $list_postingan = Postingan::with('user')->paginate(3);
    // $list_postingan = Postingan::orderBy('updated_at', 'desc','id_user')->paginate(3);
    /* dd($list_postingan); */

    return view('postingan.index', compact('title', 'list_postingan'));
  }

  public function search(Request $request)
  {
    $title = "Hasil Pencarian";
    $search = $request->get('search');
    $list_postingan = Postingan::where('title', 'LIKE', '%' .$search. '%')->paginate(5);

    return view('postingan.index', compact('title', 'list_postingan', 'search'));
  }

  public function create()
  {
    $title = "Add Discussion";
    $category = Category::get();
    return view('postingan.create', compact('title', 'category'));
  }

  public function store(Request $request)
  {

    $input = $request->all();
    $input['id_user'] = Auth::id();
    // $postingan = new \App\Postingan;
    // $postingan->title = $request->file;
    // $postingan->description = $request->description;

    if($request->hasFile('image')){
      $image = $request->file('image');

      if($image->isValid()){
        $image_name = $image->getClientOriginalName();
        $upload_path = 'imageUpload';
        $image->move($upload_path, $image_name);
        $input['image'] = $image_name;
      }
    }

    Postingan::create($input);
    return redirect('postingan');
  }

  public function show(Postingan $postingan)
  {
    $comments = Comment::get();
    return view('postingan.show', compact('postingan', 'comments'));
  }

  public function edit($id)
  {
    $title = "Edit Discussion";
    $category = Category::get();
    $postingan = Postingan::findOrFail($id);
    return view('postingan.edit', compact('title','postingan', 'category'));
  }

  public function update($id, Request $request)
  {
    $postingan = Postingan::findOrFail($id);

    $input =$request->all();

    $validator = Validator::make($input, [
      'title' => 'required|string|max:200',
      'id_Category' => 'required',
      'description' => 'required',
      'image' => 'mimes:jpg,jpeg,png'
    ]);

    if($validator->fails()){
      return redirect('postingan/' . $id . 'edit/')->withInput()->withErrors($validator);
    }

    if($request->hasFile('image')){
      $image = $request->file('image');
      if(isset($postingan->image) && file_exists('imageUpload/'. $postingan->image)){
        unlink('imageUpload/'. $postingan->image);
      }


      if($image->isValid()){
        $image_name = $image->getClientOriginalName();
        $upload_path = 'imageUpload';
        $image->move($upload_path, $image_name);
        $input['image'] = $image_name;
      }
    }

    $postingan->update($input);
    return redirect('postingan');
  }

  public function destroy($id)
  {
    $postingan = Postingan::findOrFail($id);

    if(isset($postingan->image) && file_exists('imageUpload/'. $postingan->image)){
      unlink('imageUpload/'. $postingan->image);
    }

    $postingan->delete();
    return redirect('postingan');
  }
}
