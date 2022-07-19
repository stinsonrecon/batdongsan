<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'maqh'
    ];

    protected $table = 'devvn_xaphuongthitran';

    public $timestamps = false;

    public function district(){
        return $this->belongsTo(District::class, 'maqh');
    }
}
