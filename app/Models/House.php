<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'mo_ta',
        'matp',
        'maqh',
        'xaid',
        'ten_duong',
        'dientich',
        'mat_tien',
        'duong_vao',
        'huong_nha',
        'huong_ban_cong',
        'so_tang',
        'phong_ngu',
        'toilet',
        'noi_that',
        'phap_ly',
        'linkImg'
    ];

    protected $table = 'nha';

    protected $casts = [
        'linkImg' => 'array'
    ];

    public $timestamps = false;

    public function news() {
        return $this->hasOne(News::class,'id_nha', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class,'matp', 'matp');
    }

    public function district(){
        return $this->belongsTo(District::class,'maqh', 'maqh');
    }

    public function ward(){
        return $this->belongsTo(Ward::class,'xaid', 'xaid');
    }
}
