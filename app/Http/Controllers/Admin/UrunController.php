<?php

namespace App\Http\Controllers\Admin;


use Image;
use App\Models\Urunler;
use App\Models\Kategoriler;
use Illuminate\Http\Request;
use App\Models\Altkategoriler;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class UrunController extends Controller
{
    public function UrunListe() {

        $urunliste = Urunler::latest()->get();
        return view('admin.urunler.urun_liste',compact('urunliste'));
    }

    public function UrunDurum(Request $request){
        $urun = urunler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();
        
        return response()->json(['success' => 'Başarılı.']);
    }

    public function UrunEkle(){
        $kategoriler = Kategoriler::latest()->get();
        return view('admin.urunler.urun_ekle',compact('kategoriler'));
    }

     public function UrunEkleForm(Request $request){
        $request->validate([
            'baslik' => 'required',
        ],[
            'baslik.required' => 'Başlık Alanı Boş Olamaz.',
        ]);

        
    
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
                $resim_path = 'upload/urunler/' . $resimadi;
                Image::make($resim)->resize(1020, 519)->save($resim_path);
                $resim_kaydet = $resim_path;

                Urunler::insert([
                    'kategori_id' => $request->kategori_id,
                    'altkategori_id' => $request->altkategori_id,
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

            return redirect()->route('urun.liste')->with($mesaj);
        }   

         public function UrunDuzenle($id){
            $kategoriler = Kategoriler::latest()->get();
            $altkategoriler = Altkategoriler::latest()->get();
            $urunler = Urunler::findOrFail($id);
            return view('admin.urunler.urun_duzenle',compact('kategoriler','altkategoriler', 'urunler' ));
        }

        public function UrunGuncelle(Request $request){
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
                $resim_path = 'upload/urunler/'.$resimadi;
    
                // Save the resized image
                Image::make($resim)->resize(1020, 519)->save($resim_path);
    
                $resim_kaydet = $resim_path;

                // eski resmi sil
                    if (file_exists($eski_resim)) {
                        unlink($eski_resim);
                    }
                // eski resmi sil
    
                // Update banner with image
                Urunler::findOrFail($urun_id)->update([
                 'kategori_id' => $request->kategori_id,
                    'altkategori_id' => $request->altkategori_id,
                    'baslik' => $request->baslik,
                    'url' => \Str::slug($request->baslik),
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
                
                return Redirect()->route('urun.liste')->with($mesaj);
            } else {
                // Update banner without image
                Urunler::findOrFail($urun_id)->update([
                     'kategori_id' => $request->kategori_id,
                    'altkategori_id' => $request->altkategori_id,
                    'baslik' => $request->baslik,
                    'url' => \Str::slug($request->baslik),
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
                
                return Redirect()->route('urun.liste')->with($mesaj);
            }   
        } 

        public function UrunSil($id){
            $urun = Urunler::findOrFail($id);
        
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
