<?php
namespace App\Repositories;

use Cart;
use App\Models\donDatHang;
use App\Models\sanPham;
use App\Models\chiTietDonDatHang;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(donDatHang $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {

    }
}
