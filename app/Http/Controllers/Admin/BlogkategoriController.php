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
                     'url' => str()->slug($request->kategori_adi),
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

         public function BlogKategoriDuzenle($id){
            $BlogKategoriDuzenle = Blogkategoriler::findOrFail($id);
            return view('admin.blogkategoriler.blog_kategori_duzenle',compact('BlogKategoriDuzenle'));
        }
  public function BlogKategoriGuncelle(Request $request){
            
            $request->validate([
                'kategori_adi' => 'required',
            ],[
                'kategori_adi.required' => 'Kategori Adı Boş Olamaz.',
            ]);
                $kategori_id = $request->id;
                // Update banner with image
               Blogkategoriler::findOrFail($kategori_id)->update([
                    'kategori_adi' => $request->kategori_adi,
                    'url' => str()->slug($request->kategori_adi),
                    'sirano' => $request->sirano,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Blog Kategori Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('blog.liste')->with($mesaj);
        
        }    
                public function  BlogKategoriSil($id){
                            Blogkategoriler::findOrFail($id)->delete();
                            $mesaj = [
                                'bildirim' => 'Silme Başarılı.',
                                'alert-type' => 'success'
                            ];
                        
                            return Redirect()->back()->with($mesaj);
                        }
}
