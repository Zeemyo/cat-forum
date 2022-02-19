<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\artikel;
use App\Category;
use App\Comment;
use Validator;

class ArtikelController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $title = "Halaman Artikel";
    $list_artikel = artikel::orderBy('updated_at', 'desc')->paginate(3);

    return view('artikel.index', compact('title', 'list_artikel'));
  }

  public function search(Request $request)
  {
    $title = "Hasil Pencarian";
    $search = $request->get('search');
    $list_artikel = artikel::where('title', 'LIKE', '%' .$search. '%')->paginate(5);

    return view('artikel.index', compact('title', 'list_artikel', 'search'));
  }

  public function create()
  {
    $title = "Add Artikel";
    $category = Category::get();
    return view('artikel.create', compact('title', 'category'));
  }

  public function store(Request $request)
  {

    $input = $request->all();

    if($request->hasFile('image')){
      $image = $request->file('image');

      if($image->isValid()){
        $image_name = $image->getClientOriginalName();
        $upload_path = 'imageUpload';
        $image->move($upload_path, $image_name);
        $input['image'] = $image_name;
      }
    }

    artikel::create($input);
    return redirect('artikel');
  }

  public function show(artikel $artikel)
  {
    $comments = Comment::get();
    return view('artikel.show', compact('artikel', 'comments'));
  }

  public function edit($id)
  {
    $title = "Edit Discussion";
    $category = Category::get();
    $artikel = artikel::findOrFail($id);
    return view('artikel.edit', compact('title','artikel', 'category'));
  }

  public function update($id, Request $request)
  {
    $artikel = artikel::findOrFail($id);

    $input =$request->all();

    $validator = Validator::make($input, [
      'title' => 'required|string|max:200',
      'id_Category' => 'required',
      'description' => 'required',
      'image' => 'mimes:jpg,jpeg,png'
    ]);

    if($validator->fails()){
      return redirect('artikel/' . $id . 'edit/')->withInput()->withErrors($validator);
    }

    if($request->hasFile('image')){
      $image = $request->file('image');
      if(isset($artikel->image) && file_exists('imageUpload/'.$artikel->image)){
        unlink('imageUpload/'.$artikel->image);
      }


      if($image->isValid()){
        $image_name = $image->getClientOriginalName();
        $upload_path = 'imageUpload';
        $image->move($upload_path, $image_name);
        $input['image'] = $image_name;
      }
    }

    $artikel->update($input);
    return redirect('artikel');
  }

  public function destroy($id)
  {
    $artikel = artikel::findOrFail($id);

    if(isset($artikel->image) && file_exists('imageUpload/'.$artikel->image)){
      unlink('imageUpload/'.$artikel->image);
    }

    $artikel->delete();
    return redirect('artikel');
  }
}
