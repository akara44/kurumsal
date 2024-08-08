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

}
