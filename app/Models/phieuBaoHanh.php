<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phieuBaoHanh extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_chitietdonhang', 'id_sanpham','serial',
    ];
}
