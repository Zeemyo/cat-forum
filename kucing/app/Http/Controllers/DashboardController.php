<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\postingan;
use App\category;
use App\Artikel;
use App\User;


class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
      $title = "Halaman Utama";
      $total_postingan = postingan::all()->count();
      $total_category = category::all()->count();
      $total_users = user::all()->count();
      $total_artikel = artikel::all()->count();
      $posts = postingan::orderBy('updated_at', 'desc')->paginate(3);
      $artikel = artikel::orderBy('updated_at', 'desc')->paginate(3);
      $category = Category::orderBy('updated_at', 'desc')->paginate(6);
      return view('dashboard', compact('title', 'posts', 'category', 'artikel', 'total_postingan', 'total_category', 'total_users', 'total_artikel'));
    }

    public function readmore(postingan $postingan)
    {
      return view('moreadmin', compact('postingan'));

    }


}
