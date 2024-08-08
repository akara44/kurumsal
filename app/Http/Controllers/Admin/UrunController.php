<?php

namespace App\Http\Controllers\Admin;


use Image;
use App\Models\Urunler;
use App\Models\Kategoriler;
use Illuminate\Http\Request;
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
                Image::make($resim)->resize(700, 370)->save($resim_path);
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

}
