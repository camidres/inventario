<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sales;

class SalesDetail extends Component
{

    public $open = false;
    public $item;
    public $sale;


    public function mount(sales $item){

        $this->sale = $item;
    }
    

    public function render()
    {
       
        $sales = sales::find($this->item);
        foreach ($sales as  $sale) {
            $items = json_decode($sale->content);
        }

        return view('livewire.sales-detail', compact('items', 'sales'));
    }
}
