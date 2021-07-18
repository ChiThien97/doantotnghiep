<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tinTuc extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tieude',
        'slug',
        'hinhanh',
        'noidung',
        'trangthai',
        'tacgia',
        'tintuc',
    ];
}
