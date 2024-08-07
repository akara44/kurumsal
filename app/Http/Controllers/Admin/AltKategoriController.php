<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Illuminate\Support\Carbon;
use App\Models\AltKategoriler;
use App\Http\Controllers\Controller;

class AltKategoriController extends Controller
{
    // public function AltKategoriListe(){
    //     $altkategoriler = AltKategoriler::latest()->get();
    //     return view('admin.altkategoriler.altkategori_liste', compact('altkategoriler'));
    // }

    public function AltKategoriListe(){
        $altkategoriler = AltKategoriler::latest()->get();
        // Kategorisi mevcut olmayan alt kategorileri filtrele
        $altkategoriler = $altkategoriler->filter(function($altkategori) {
            return Kategoriler::find($altkategori->kategori_id) !== null;
        });
        return view('admin.altkategoriler.altkategori_liste', compact('altkategoriler'));
    }

    public function AltKategoriEkle(){
        $kategorigoster = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        return view('admin.altkategoriler.altkategori_ekle', compact('kategorigoster'));
    }

    public function AltKategoriEkleForm(Request $request){
        $request->validate([
            'altkategori_adi' => 'required',
            'anahtar' => 'required',
        ],[
            'altkategori_adi.required' => 'Alt Kategori Adı Boş Olamaz.',
            'anahtar.required' => 'Anahtar Adı Boş Olamaz.'
        ]);

        
            if ($request->hasFile('resim')) {
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
                $resim_path = 'upload/altkategoriler/' . $resimadi;
                Image::make($resim)->resize(700, 400)->save($resim_path);
                $resim_kaydet = $resim_path;

                AltKategoriler::insert([
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => \Str::slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'resim' => $resim_kaydet,
                    'created_at' => Carbon::now(),
                ]);

                $mesaj = [
                    'bildirim' => 'Resim ile yükleme başarılı.',
                    'alert-type' => 'success'
                ];
            } else {
                AltKategoriler::insert([
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => \Str::slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'created_at' => Carbon::now(),
                ]);

                $mesaj = [
                    'bildirim' => 'Resimsiz yükleme başarılı.',
                    'alert-type' => 'success'
                ];
                
            }
            return redirect()->route('altkategori.liste')->with($mesaj);
        }   

        public function AltKategoriDuzenle($id){
            $kategoriler = Kategoriler::orderBy('kategori_adi','ASC')->get();
            $altkategoriler = AltKategoriler::findOrFail($id);
            return view('admin.altkategoriler.altkategori_duzenle',compact('kategoriler','altkategoriler' ));
        }
        public function AltKategoriForm(Request $request){
            $request->validate([
                'altkategori_adi' => 'required',
                'anahtar' => 'required',
            ],[
                'altkategori_adi.required' => 'Alt Kategori Adı Boş Olamaz.',
                'anahtar.required' => 'Anahtar Adı Boş Olamaz.'
            ]);
                $altkategori_id = $request->id;
                $eski_resim = $request->onceki_resim;

            if ($request->hasFile('resim')) {
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
    
                // 'upload/banner' path should have a trailing slash
                $resim_path = 'upload/altkategoriler/'.$resimadi;
    
                // Save the resized image
                Image::make($resim)->resize(700, 400)->save($resim_path);
    
                $resim_kaydet = $resim_path;

                // eski resmi sil
                    if (file_exists($eski_resim)) {
                        unlink($eski_resim);
                    }
                // eski resmi sil
    
                // Update banner with image
                AltKategoriler::findOrFail($altkategori_id)->update([
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => str()->slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'resim' => $resim_kaydet,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resim ile Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('altkategori.liste')->with($mesaj);
            } else {
                // Update banner without image
                AltKategoriler::findOrFail($altkategori_id)->update([
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => str()->slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resimsiz Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('altkategori.liste')->with($mesaj);
            }   
        } 
        public function AltKategoriSil($id){
            $altkategori = AltKategoriler::findOrFail($id);
        
            // Resmi siler
            $resim = $altkategori->resim;
            if (file_exists($resim)) {
                unlink($resim);
            }
        
            // Veritabanındaki verileri siler
            $altkategori->delete();
        
            $mesaj = [
                'bildirim' => 'Silme Başarılı.',
                'alert-type' => 'success'
            ];
        
            return Redirect()->back()->with($mesaj);
        }
        
    }// class bitti
