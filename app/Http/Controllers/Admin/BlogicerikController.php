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
                Image::make($resim)->resize(430, 327)->save($resim_path);
               $resim_kaydet = $resim_path;
 
                Blogicerik::create([
                    'kategori_id' => $request->kategori_id,
                    'baslik' => $request->baslik,
                    'tag' => $request->tag,
                    'metin' => $request->metin,
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'sirano' => $request->sirano,
                    'resim' => $resim_kaydet,
                    'durum' => 1,     
                ]);

                $mesaj = [
                    'bildirim' => 'Resim ile yükleme başarılı.',
                    'alert-type' => 'success'
                ];

            return redirect()->route('icerik.liste')->with($mesaj);
        }  

        public function BlogicerikDuzenle($id){
              $icerikler = Blogicerik::findOrFail($id);
            $kategoriler = Blogkategoriler::latest()->get();
            return view('admin.blogicerik.blogicerik_duzenle',compact('kategoriler', 'icerikler' ));
        }


        public function BlogicerikGuncelleForm(Request $request){
            $request->validate([
                'baslik' => 'required'
            ],[
                'baslik.required' => 'Başlık Boş Olamaz.',
            ]);
                $urun_id = $request->id;
                $eski_resim = $request->onceki_resim;

            if ($request->hasFile('resim')) {
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
    
                // 'upload/banner' path should have a trailing slash
                $resim_path = 'upload/blogicerik/'.$resimadi;
    
                // Save the resized image
                Image::make($resim)->resize(430, 327)->save($resim_path);
    
                $resim_kaydet = $resim_path;

                // eski resmi sil
                    if (file_exists($eski_resim)) {
                        unlink($eski_resim);
                    }
                // eski resmi sil
    
                // Update banner with image
                Blogicerik::findOrFail($urun_id)->update([
                 'kategori_id' => $request->kategori_id,
                    'baslik' => $request->baslik,
                
                    'tag' => $request->tag,
                    'metin' => $request->metin,
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'sirano' => $request->sirano,
                    'resim' => $resim_kaydet,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resim ile Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('icerik.liste')->with($mesaj);
            } else {
                // Update banner without image
                Blogicerik::findOrFail($urun_id)->update([
                     'kategori_id' => $request->kategori_id,
                    'baslik' => $request->baslik,
                    'tag' => $request->tag,
                    'metin' => $request->metin,
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'sirano' => $request->sirano,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resimsiz Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('icerik.liste')->with($mesaj);
            }   
        } 

         public function BlogicerikSil($id){
            $urun = Blogicerik::findOrFail($id);
        
            // Resmi siler
            $resim = $urun->resim;
            if (file_exists($resim)) {
                unlink($resim);
            }
        
            // Veritabanındaki verileri siler
            $urun->delete();
        
            $mesaj = [
                'bildirim' => 'Silme Başarılı.',
                'alert-type' => 'success'
            ];
        
            return Redirect()->back()->with($mesaj);
        }

        
          
}
