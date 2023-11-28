<?php

namespace App\Http\Livewire;

use App\Models\store;
use Livewire\Component;

class StoreShow extends Component
{

    public $sort;

    public $direction;
    protected $listeners = [ 'render', 'delete' ];
    public function render()
    {
        $stores = store::all();
        return view('livewire.store-show', compact('stores'));
    }

    public function delete(store $store){

        $store->delete();
    }
}
 