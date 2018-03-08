<?php

namespace App;

class Cart
{
	public $items = null;
	public $tongsoluong = 0;
	public $tongtien = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->tongsoluong = $oldCart->tongsoluong;
			$this->tongtien = $oldCart->tongtien;
		}
	}

	public function add($item, $id){
	  $pro = sanpham::find($id);
	  if($pro->giakhuyenmai>0){
	   $price = 'giakhuyenmai';
	  }else{
	   $price = 'dongia';
  }
		$giohang = ['qty'=>0, 'price' => $item->dongia, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$giohang['price'] = $item->dongia * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->tongsoluong++;
		$this->tongtien += $item->dongia;
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->tongsoluong--;
		$this->tongtien -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->tongsoluong -= $this->items[$id]['qty'];
		$this->tongtien -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
