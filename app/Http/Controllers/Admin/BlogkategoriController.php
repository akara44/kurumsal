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
     public function BlogKategoriEkle(){
        return view('admin.blogkategoriler.blogkategori_ekle');
    }

     public function  BlogKategoriDurum(Request $request){
        $urun = BlogKategoriler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();
        
        return response()->json(['success' => 'Başarılı.']);
    }
   
   public function BlogKategoriForm(Request $request){
        $request->validate([
            'kategori_adi' => 'required',
        ],[
            'kategori_adi.required' => 'Başlık Alanı Boş Olamaz.',
        ]);

                Blogkategoriler::insert([
                    'kategori_adi' => $request->kategori_adi,
                    'url' => $request->url,
                    'sirano' => $request->sirano,
                    'durum' => 1,
                    'created_at' => Carbon::now(),
                ]);

                $mesaj = [
                    'bildirim' => 'Blog Kategori Yükleme Başarılı.',
                    'alert-type' => 'success'
                ];

            return redirect()->route('blog.liste')->with($mesaj);
        }   



    
}
