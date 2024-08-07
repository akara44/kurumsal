<?php

namespace App\Http\Controllers\Admin;
use Image;
use App\Models\Kategoriler;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function KategoriHepsi() {

        $kategorihepsi = Kategoriler::latest()->get();
        return view('admin.kategoriler.kategoriler_hepsi', compact('kategorihepsi'));
    }

    public function KategoriEkle(){
        return view('admin.kategoriler.kategori_ekle');
    }

        public function KategoriEkleForm(Request $request){
            
            $request->validate([
                'kategori_adi' => 'required',
                'anahtar' => 'required',
            ],[
                'kategori_adi.required' => 'Kategori Adı Boş Olamaz.',
                'anahtar.required' => 'Anahtar Adı Boş Olamaz.'
            ]);

            if ($request->hasFile('resim')) {
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
    
                // 'upload/banner' path should have a trailing slash
                $resim_path = 'upload/kategoriler/'.$resimadi;
    
                // Save the resized image
                Image::make($resim)->resize(700, 400)->save($resim_path);
    
                $resim_kaydet = $resim_path;
    
                // Update banner with image
                Kategoriler::insert([
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'resim' => $resim_kaydet,
                    'created_at' => Carbon::now(),
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resim ile yükleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('kategori.hepsi')->with($mesaj);
            } else {
                // Update banner without image
                Kategoriler::insert([
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'created_at' => Carbon::now(),
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resimsiz yükleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('kategori.hepsi')->with($mesaj);
            }
        }   

        public function KategoriDuzenle($id){
            $KategoriDuzenle = Kategoriler::findOrFail($id);
            return view('admin.kategoriler.kategori_duzenle',compact('KategoriDuzenle'));
        }
        
        public function KategoriGuncelleForm(Request $request){
            
            $request->validate([
                'kategori_adi' => 'required',
                'anahtar' => 'required',
            ],[
                'kategori_adi.required' => 'Kategori Adı Boş Olamaz.',
                'anahtar.required' => 'Anahtar Adı Boş Olamaz.'
            ]);
                $kategori_id = $request->id;
                $eski_resim = $request->onceki_resim;

            if ($request->hasFile('resim')) {
                $resim = $request->file('resim');
                $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
    
                // 'upload/banner' path should have a trailing slash
                $resim_path = 'upload/kategoriler/'.$resimadi;
    
                // Save the resized image
                Image::make($resim)->resize(700, 400)->save($resim_path);
    
                $resim_kaydet = $resim_path;

                // eski resmi sil
                    if (file_exists($eski_resim)) {
                        unlink($eski_resim);
                    }
                // eski resmi sil
    
                // Update banner with image
                Kategoriler::findOrFail($kategori_id)->update([
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'resim' => $resim_kaydet,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resim ile Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('kategori.hepsi')->with($mesaj);
            } else {
                // Update banner without image
                Kategoriler::findOrFail($kategori_id)->update([
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                ]);
    
                $mesaj = [
                    'bildirim' => 'Resimsiz Güncelleme başarılı.',
                    'alert-type' => 'success'
                ];
                
                return Redirect()->route('kategori.hepsi')->with($mesaj);
            }
        }   
        public function KategoriSil($id){
            $kategori = Kategoriler::findOrFail($id);
        
            // Resmi siler
            $resim = $kategori->resim;
            if (file_exists($resim)) {
                unlink($resim);
            }
        
            // Veritabanındaki verileri siler
            $kategori->delete();
        
            $mesaj = [
                'bildirim' => 'Silme Başarılı.',
                'alert-type' => 'success'
            ];
        
            return Redirect()->back()->with($mesaj);
        }
    }

