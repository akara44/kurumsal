<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    use HasFactory;
    protected $guarded = [];  

    public function Altkategori(){
        
        return $this->belongsTo(Altkategoriler::class , 'altkategori_id', 'id');
    }

    public function kategoriler(){
        
        return $this->belongsTo(Kategoriler::class , 'kategori_id', 'id');
    }
}
