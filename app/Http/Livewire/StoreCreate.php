<?php

namespace App\Http\Livewire;

use App\Models\store;
use Livewire\Component;

class StoreCreate extends Component
{

    public $open = false;

    public $name;
    public $quantity;
    public $cost;
    public $price;
    public $conversion;


    protected $rules = [
        'name'        => 'required',
        'quantity'    => 'required',
        'cost'        => 'required',
        'price'       => 'required',
        
    ];

    public function render()
    {
       
        return view('livewire.store-create');
    }

    public function save(){

        $this->validate();

        store::create([
            'name'       => $this->name,
            'quantity'   => $this->quantity,
            'cost'       => $this->cost,
            'price'       => $this->price,
            'conversion' => $this->conversion
        ]);

        $this->reset(['open', 'name', 'quantity','cost', 'price', 'conversion', ]);
        $this->emitTo('store-show', 'render');
        $this->emit('alert', 'Producto creado correctamente');

    }
}
