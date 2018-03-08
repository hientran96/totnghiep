<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loaisanpham;
use App\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()-> composer('header',function($view){
            $loaisanpham= loaisanpham::all();
          
            $view->with('loaisanpham',$loaisanpham);
        });
        view()->composer('header',function($view){
              if(Session('cart'))
            {
                $oldcart= Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with(['cart'=>Session::get('cart'),'sanphamtronggio'=>$cart->items,'tongtien'=>$cart->tongtien,'tongsoluong'=>$cart->tongsoluong]);
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
