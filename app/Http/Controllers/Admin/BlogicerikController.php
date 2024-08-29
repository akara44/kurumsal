<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Blogicerik;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class BlogicerikController extends Controller
{
 public function İcerikListe() {

        $blogicerik = Blogicerik::latest()->get();
        return view('admin.blogicerik.blogicerik_liste',compact('blogicerik'));
    }

      public function BlogicerikEkle(){
        $kategoriler = Blogicerik::latest()->get();
        return view('admin.blogicerik.blogicerik_ekle',compact('kategoriler'));
    }

    
}
