<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $guard = 'customer';
    protected $fillable = [
        'full_name',
        'address',
        'phone_number',
        'email',
        'username',
        'password',
        'DoB',
        'SSN',
        'SSN_front',
        'SSN_back',
        'verify'
    ];
    protected $table = 'customer';
    public $timestamps = false;

    public function news(){
        return $this->hasMany(News::class, 'id_cus', 'id');
    }
}
