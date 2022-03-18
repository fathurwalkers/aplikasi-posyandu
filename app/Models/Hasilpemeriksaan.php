<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;

class Hasilpemeriksaan extends Model
{
    use HasFactory;
    protected $table = "hasil_pemeriksaan";
    protected $guarded = [];
    protected $primaryKey = "id";


    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
