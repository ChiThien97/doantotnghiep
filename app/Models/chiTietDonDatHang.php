<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chiTietDonDatHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_dat_hangs';

    protected $fillable = [
        'id_donhang', 'id_sanpham', 'soluong', 'gia'
    ];

    public function product()
    {
        return $this->belongsTo(sanPham::class, 'id_sanpham');
    }
}
