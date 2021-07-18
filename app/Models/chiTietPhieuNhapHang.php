<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chiTietPhieuNhapHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_phieunhaphang', 'id_sanpham','soluong','gianhap',
    ];
}
