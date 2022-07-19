<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_nha',
        'id_dat',
        'id_cus',
        'title',
        'loai_hinhthuc_id',
        'gia',
        'donvi_id',
        'linkMap',
        'id_type',
        'startTime',
        'endTime',
        'contact_name',
        'contact_phone',
        'email',
        'address',
        'limitTime',
        'status',
        'idBanking'
    ];

    protected $table = 'tin_tuc';

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'contact_phone' => 'array'
    ];

    public function house(){
        return $this->belongsTo(House::class, 'id_nha', 'id');
    }

    public function land() {
        return $this->belongsTo(Land::class, 'id_dat', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_cus', 'id');
    }

    public function formType() {
        return $this->hasOne(FormType::class, 'id', 'loai_hinhthuc_id');
    }

    public function newsType() {
        return $this->hasOne(NewsType::class, 'id', 'id_type');
    }

    public function don_vi(){
        return $this->hasOne(Unit::class, 'id', 'donvi_id');
    }
}
