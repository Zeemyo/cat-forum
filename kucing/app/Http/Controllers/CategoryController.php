<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use Validator;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(){
      $title = "Category";
      $Category_list = Category::all();
      return view('Category.index', compact('title', 'Category_list'));
    }

    public function create()
    {
      $title = "Add Category";
      return view('Category.create', compact('title'));
    }

    public function store(Request $request)
    {
      $input = $request->all();
      $validator = Validator::make($input, [
        'name' => 'required|string|max:20',
      ]);

      if ($validator->fails()){
        return redirect('Category/create')->withInput()->withErrors($validator);
      }

      Category::create($input);
      return redirect('Category');
    }
    public function edit($id)
    {
      $title = "Edit Category";
      $Category = Category::findOrFail($id);
      return view('Category.edit', compact('title','Category'));
    }

    public function update($id, Request $request)
    {
      $Category = Category::findOrFail($id);

      $input =$request->all();
      $validator = Validator::make($input, [
        'name' => 'required|string|max:20',
      ]);

      if ($validator->fails()){
        return redirect('Category/create' . $id . '/edit')->withInput()->withErrors($validator);
      }

      $Category->update($input);
      return redirect('Category');
    }

    public function destroy($id)
    {
      $Category = Category::findOrFail($id);

      $Category->delete();
      return redirect('Category');
    }
}
