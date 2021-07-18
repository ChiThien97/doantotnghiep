<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donDatHang extends Model
{
    use HasFactory;

    protected $table = 'don_dat_hangs';

    protected $fillable = [
        'madonhang', 'trangthai', 'tongtien','trangthai_thanhtoan',
        'tenkhachhang', 'diachi','email', 'sodienthoai', 'ghichu'
    ];

    public function items()
    {
        return $this->hasMany(chiTietDonDatHang::class);
    }
}
