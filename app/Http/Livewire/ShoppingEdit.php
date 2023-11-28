<?php

namespace App\Http\Livewire;

use App\Models\shoppings;
use Livewire\Component;

class ShoppingEdit extends Component
{

    public $shopping;
    public $open = false;

    protected $rules = [

        'shopping.content'      => 'required',
        'shopping.total'  => 'required'
     
    ];



    public function mount(shoppings $shopping){

        $this->shopping = $shopping;
    }

    public function render()
    {
        return view('livewire.shopping-edit');
    }

    public function save(){

        $this->validate();

        $this->shopping->save();

        $this->reset(['open']);
        $this->emitTo('shopping-show', 'render');
        $this->emit('alert', 'Producto actualizado');


    }

}
