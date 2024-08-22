<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Blogkategoriler;
use App\Http\Controllers\Controller;

class BlogkategoriController extends Controller
{
    public function BlogListe() {

        $blogliste = Blogkategoriler::latest()->get();
        return view('admin.blogkategoriler.blog_liste', compact('blogliste'));
    }
}
