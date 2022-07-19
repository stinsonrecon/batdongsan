<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'slug'
    ];
    protected $table = 'devvn_tinhthanhpho';

    public $timestamps = false;

    public function district(){
        return $this->hasMany(District::class, 'matp');
    }
}
