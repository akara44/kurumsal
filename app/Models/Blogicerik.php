<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Blogicerik extends Model
{
    use HasFactory,HasSlug;
    protected $guarded = [];

     public function kategoriler(){
        return $this->belongsTo(Blogkategoriler::class , 'kategori_id', 'id');
    }

     public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('baslik')
            ->saveSlugsTo('url');
    }

}
