<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Hasilpemeriksaan;

class Data extends Model
{
    use HasFactory;
    protected $table = "data_pengguna";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function login()
    {
        return $this->hasMany(Login::class);
    }

    public function hasilpemeriksaan()
    {
        return $this->hasMany(Hasilpemeriksaan::class);
    }
}
