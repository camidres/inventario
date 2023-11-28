<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use App\Models\sales;
use App\Models\store;
use Gloudemans\Shoppingcart\Facades\Cart;

class SalesCreate extends Component
{
    public $product;
    public $qty;
    public $price;

    protected $rules = [

        'product'   => 'required',
        'price'     => 'required',
        'qty'       => 'required',
        'total'     => 'required'

    ];

    public function updatedProduct($value)
    {

        $store = store::find($value);

        $this->price = $store->price;
    }




    public function render()
    {

        $store = store::all();

        return view('livewire.sales-create', compact('store'));
    }

    public function addItem()
    {

        $product = store::find($this->product);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $this->qty,
            'price' => $this->price
        ]);
    }

    public function delete($rowId)
    {

        Cart::remove($rowId);
    }


    public function save()
    {

        foreach (Cart::content() as $item) {
            $store = store::find($item->id);

            if(!empty($store->conversion)){
                $conversion = $item->qty / $store->conversion;
            }else{
                $conversion = $item->qty;
            }
           
            if ($store->quantity >= $item->qty) {

                sales::create([

                    'content' => Cart::content(),
                    'total' => str_replace(',', '', Cart::subtotal()),

                ]);
            } 

            $store->quantity -= $conversion;
            $store->save();
        }

        Cart::destroy();

        return redirect()->route('show.sales');
    }


   
}
