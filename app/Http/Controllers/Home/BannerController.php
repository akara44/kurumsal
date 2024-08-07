<?php

namespace App\Http\Controllers\Home;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Redirect;
use Image;



class BannerController extends Controller
{
    public function HomeBanner(){
        $homebanner = Banner::find(1);
        return view("admin.anasayfa.banner_duzenle", compact("homebanner"));
    }

    public function BannerGuncelle(Request $request){
        $banner_id = $request->id;
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            // 'upload/banner' path should have a trailing slash
            $resim_path = 'upload/banner/'.$resimadi;

            // Save the resized image
            Image::make($resim)->resize(636, 852)->save($resim_path);

            $resim_kaydet = $resim_path;

            // Update banner with image
            Banner::findOrFail($banner_id)->update([
                'baslik' => $request->baslik,
                'alt_baslik' => $request->alt_baslik,
                'url' => $request->url,
                'video_url' => $request->video_url,
                'resim' => $resim_kaydet,
            ]);

            $mesaj = [
                'bildirim' => 'Resim ile yükleme başarılı.',
                'alert-type' => 'success'
            ];
            
            return Redirect()->back()->with($mesaj);
        } else {
            // Update banner without image
            Banner::findOrFail($banner_id)->update([
                'baslik' => $request->baslik,
                'alt_baslik' => $request->alt_baslik,
                'url' => $request->url,
                'video_url' => $request->video_url,
            ]);

            $mesaj = [
                'bildirim' => 'Resimsiz yükleme başarılı.',
                'alert-type' => 'success'
            ];
            
            return Redirect()->back()->with($mesaj);
        }
    }
}