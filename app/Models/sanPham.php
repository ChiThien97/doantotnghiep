<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanPham extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'tensanpham', 'slug','mota','hinhanh','trangthai','gia','giakhuyenmai','thongso','baohanh','id_loaisanpham','id_nhasanxuat','soluongton','luotxem'
    ];
}
