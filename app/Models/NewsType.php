<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gia'
    ];
    protected $table = 'loai_tin';
    public $timestamps = false;

    public function news() {
        return $this->hasMany(News::class, 'id_type', 'id');
    }
}
