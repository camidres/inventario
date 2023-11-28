<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;

class ProductCreate extends Component
{
    public $open = false;
    public $name;
    public $price;

    protected $rules = [

        'name'      => 'required',
       
        'price'     => 'required'
    ];


    public function render()
    {
        return view('livewire.product-create');
    }

    public function save(){

        $this->validate();

        product::create([

            'name'      => $this->name,
            'price'     => $this->price
        ]);

        $this->reset(['open', 'name','price']);
        $this->emitTo('products-show', 'render');
        $this->emit('alert', 'Producto creado correctamente');



    }
}
