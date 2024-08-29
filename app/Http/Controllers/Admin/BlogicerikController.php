<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Blogicerik;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Blogkategoriler;
use App\Http\Controllers\Controller;

class BlogicerikController extends Controller
{
 public function İcerikListe() {

        $blogicerik = Blogicerik::latest()->get();
        return view('admin.blogicerik.blogicerik_liste',compact('blogicerik'));
    }
    public function  BlogicerikDurum(Request $request){
        $urun = Blogicerik::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();
        
        return response()->json(['success' => 'Başarılı.']);
    }

      public function BlogicerikEkle(){
        $kategoriler = Blogkategoriler::latest()->get();
        return view('admin.blogicerik.blogicerik_ekle',compact('kategoriler'));
    }
    public function BlogicerikForm(Request $request){
        $request->validate([
            'baslik' => 'required',
        ],[
            'baslik.required' => 'Başlık Alanı Boş Olamaz.',
        ]);

        
    
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
                $resim_path = 'upload/blogicerik/' . $resimadi;
                Image::make($resim)->resize(700, 370)->save($resim_path);
                $resim_kaydet = $resim_path;

                Blogicerik::insert([
                    'kategori_id' => $request->kategori_id,
                    'baslik' => $request->baslik,
                    'url' => \Str::slug($request->baslik),
                    'tag' => $request->tag,
                    'metin' => $request->metin,
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'sirano' => $request->sirano,
                    'resim' => $resim_kaydet,
                    'durum' => 1,
                    'created_at' => Carbon::now(),
                ]);

                $mesaj = [
                    'bildirim' => 'Resim ile yükleme başarılı.',
                    'alert-type' => 'success'
                ];

            return redirect()->route('icerik.liste')->with($mesaj);
        }   
    
}
