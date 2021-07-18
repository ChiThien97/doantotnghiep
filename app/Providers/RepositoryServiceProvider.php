<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Interface::Class with container.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        OrderContract::class            =>          OrderRepository::class,
    ];

}
