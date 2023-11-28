<?php

namespace App\Http\Livewire;

use App\Models\shoppings;
use App\Models\store;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCreate extends Component
{
    public $product;
    public $cost;
    public $qty;

    protected $rules = [
        'product'  => 'required',
        'cost'     => 'required',
        'qty'      => 'required'
    ];


    public function render()
    {
        $stores = store::all();
        return view('livewire.shopping-create', compact('stores'));
    }

    public function addItem(){

        $product = store::find($this->product);

        Cart::add([
            'id' => $product->id, 
            'name' =>$product->name, 
            'qty' => $this->qty, 
            'price' => $this->cost
        ]);

    }

    public function delete($rowId){
        
        Cart::remove($rowId);
        
    }

    public function save(){

        $shopping = new shoppings;
 
        $shopping->content = Cart::content();
        $shopping->total = str_replace(',', '', Cart::subtotal() ) ;

        $shopping->save();

        foreach (Cart::content() as $item){

            $storeqty = store::find($item->id);
            
             store::where('id', $item->id)->update([

                'name' => $item->name,
                'cost' => $item->price,
                'quantity' => $storeqty->quantity + $item->qty

             ]);
             
        }
       
       

       
        Cart::destroy();
 
        return redirect()->route('show.shoppings');
 
     }
}
