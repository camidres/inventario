<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;

class ProductEdit extends Component
{

    public $product;
    public $open = false;

    protected $rules = [

        'product.name'   => 'required',
        'product.price'   => 'required'

    ];


    public function mount(product $product){

        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-edit');
    }

    public function save(){

        $this->validate();

        $this->product->save();

        $this->reset(['open']);
        $this->emitTo('products-show', 'render');
        $this->emit('alert', 'Producto actualizado');


    }

   
}
