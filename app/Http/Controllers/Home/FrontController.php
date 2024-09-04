<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Altkategoriler;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Urunler;
use App\Models\Blogicerik;
use App\Models\Blogkategoriler;




class FrontController extends Controller
{
    public function UrunDetay($id,$url){
        $urunler = Urunler::findOrFail($id);
        $etiketler = $urunler->tag;
        $etiket = explode(',',$etiketler);

        return view('frontend.urunler.urun_detay',compact('urunler','etiket'));

    } //UrunDetay bitti
    public function KategoriDetay(Request $request,$id,$url){
        
         $urunler = Urunler::where('durum',1)->where('kategori_id',$id)->orderBy('sirano','ASC')->get();
         $kategoriler = Kategoriler::orderBy('kategori_adi','ASC')->get();
         $kategori = Kategoriler::where('id',$id)->first();

         return view('frontend.urunler.kategori_detay',compact('urunler','kategoriler','kategori'));

    } //KategoriDetay bitti 
    public function AltDetay(Request $request,$id,$url){

        $urunler = Urunler::where('durum',1)->where('altkategori_id',$id)->orderBy('sirano','ASC')->get();
        $altkategoriler = Altkategoriler::orderBy('altkategori_adi','ASC')->get();
        $altkategori = Altkategoriler::where('id',$id)->first();

        return view('frontend.urunler.altkategori_detay',compact('urunler','altkategoriler','altkategori'));

    }

    public function İcerikDetay($id){
        $icerikHepsi =Blogicerik::where('durum',1)->orderBy('sirano','ASC')->limit(5)->get();
        $icerik = Blogicerik::findOrFail($id);
        $kategoriler = Blogkategoriler::where('durum',1)->orderBy('sirano','ASC')->get();
        $etiket = $icerik->tag;
        $etiketler = explode(',',$etiket);
        return view('frontend.blog.icerik_detay',compact('icerikHepsi','icerik','kategoriler','etiketler'));
    }


    public function KategoriBlog($id){
        $blogpost =Blogicerik::where('durum',1)->where('kategori_id',$id)->orderBy('sirano','ASC')->get();
        $icerikHepsi =Blogicerik::where('durum',1)->orderBy('sirano','ASC')->get();
        $kategoriler = Blogkategoriler::where('durum',1)->orderBy('sirano','ASC')->get();
        $kategoriAdi = Blogkategoriler::findOrFail($id);
        return view('frontend.blog.kategori_detay',compact('blogpost','icerikHepsi','kategoriler','kategoriAdi'));
    }



} //class bitti
