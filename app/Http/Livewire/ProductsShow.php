<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use Livewire\WithPagination;

class ProductsShow extends Component
{

    use WithPagination;
    
    public $sort = 'id';
    public $direction = 'desc';
    public $search;
    protected $listeners = [ 'render', 'delete' ];

    public function render()
    {

        $products = product::where('name', 'like', '%'. $this->search .'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(6); 
        return view('livewire.products-show', compact('products'));
    }

    public function order($sort){

        if($this->sort == $sort){

            if($this->direction == 'desc'){

                $this->direction = 'asc';
            }else{

                $this->direction = 'desc';
            }

        }else{

            $this->sort = $sort;
            $this->direction = 'asc';
        }

    }

    public function delete(product $product){

        $product->delete();
    }
}
