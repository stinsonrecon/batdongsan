<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'hinhthuc_id',
        'donvi'
    ];
    protected $table = 'don_vi';
    public $timestamps = false;
}
