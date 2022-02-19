<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;

class UsersController extends Controller
// {


{

  public function users ()
  {
      $this->middleware('auth');
  }

    public function index(){
      $title = "Users";
      $User_list = User::all();
      return view('Users.index', compact('title', 'User_list'));
    }

    public function create()
    {

      $title = "Add Users";
      return view('Users.create', compact('title'));
    }

    public function store(Request $request)
    {
      $users = new \App\User;
      $users->name = $request->name;
      $users->email = $request->email;
      $users->password = bcrypt('rahasia');
      $users->remember_token = str_random(60);



      $users->save();
      return redirect ('Users');
    }


    public function destroy($id)
    {
        $users = User::find($id);

        $users->delete();
        return redirect('Users');
    }

    public function edit($id)
    {
      $title = "Edit Data User";
      $users = User::findOrFail($id);
      return view('Users.edit', compact('title','users'));
    }

    public function update($id, Request $request)
    {

      $users = User::findOrFail($id);



      $input =$request->all();
      $validator = Validator::make($input, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
      ]);



      $users->update($input);
      return redirect('Users');
    }

}
