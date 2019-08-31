<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    public $items = null;
	public $totalQty = 0;
    public $totalPrice = 0;
    public $subTotal = 0;
    public $discountTotal = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->subTotal = $oldCart->subTotal;
            $this->discountTotal = $oldCart->discountTotal;
		}
	}

	public function add($item, $id){
		if($item->post_id){
			if($item->discount == 0){
				$giohang = ['qty'=>0, 'price' => $item->price, 'item' => $item, 'subprice'=>$item->price, 'discountprice'=>0, 'postid'=>$item->post_id, 'discount'=>$item->discount];
			}
			else{
				$giohang = ['qty'=>0, 'price' => $item->price*(1-$item->discount/100), 'item' => $item,'subprice'=>$item->price, 'discountprice'=>$item->price*($item->discount/100), 'postid'=>$item->post_id, 'discount'=>$item->discount];
			}
		}else{
			if($item->discount == 0){
				$giohang = ['qty'=>0, 'price' => $item->price, 'item' => $item, 'subprice'=>$item->price, 'discountprice'=>0, 'discount'=>$item->discount];
			}
			else{
				$giohang = ['qty'=>0, 'price' => $item->price*(1-$item->discount/100), 'item' => $item,'subprice'=>$item->price, 'discountprice'=>$item->price*($item->discount/100), 'discount'=>$item->discount];
			}
		}

		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		// $giohang['qty']++;
		// if($item->discount == 0){
		// 	$giohang['price'] = $item->price * $giohang['qty'];
		// }
		// else{
		// 	$giohang['price'] = $item->promotion_price * $giohang['qty'];
		// }
		$this->items[$id] = $giohang;
        $this->totalQty++;

        $this->subTotal += $item->price;


		$this->discountTotal += ($item->price*($item->discount/100));


		if($item->discount == 0){
			$this->totalPrice += $item->price;
		}
		else{
			$this->totalPrice += ($item->price*(1-$item->discount/100));
		}

	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
        // $this->totalQty -= $this->items[$id]['qty'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['price'];
        $this->subTotal -= $this->items[$id]['subprice'];
        $this->discountTotal -= $this->items[$id]['discountprice'];
		unset($this->items[$id]);
    }

}
