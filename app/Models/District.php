<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'matp'
    ];

    protected $table = 'devvn_quanhuyen';

    public $timestamps = false;

    public function ward(){
        return $this->hasMany(Ward::class,'maqh');
    }

    public function city(){
        return $this->belongsTo(City::class, 'mqtp');
    }
}
