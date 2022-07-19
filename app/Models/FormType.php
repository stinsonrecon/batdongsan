<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    use HasFactory;
    protected $fillable = [
        'hinhthuc_id',
        'name'
    ];
    protected $table = 'loai_hinhthuc';
    public $timestamps = false;
    
    public function news() {
        return $this->hasMany(News::class, 'loai_hinhthuc_id', 'id');
    }
}
