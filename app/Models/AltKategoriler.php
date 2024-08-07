<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AltKategoriler extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function iliskikategori(){
        
        return $this->belongsTo(Kategoriler::class , 'kategori_id', 'id');
    }
}
