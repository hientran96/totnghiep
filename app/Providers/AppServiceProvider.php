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
        view()-> composer(['header','page.dathang'],function($view){
            $loaisanpham= loaisanpham::all();
        
            $view->with('loaisanpham',$loaisanpham);
        });
        view()->composer('header',function($view){
              if(session('cart')){
            $oldcart=session::get('cart');
            $cart=new Cart($oldcart);
        
            $view->with(['cart'=>session::get('cart'),'sanphamtronggio'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
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
