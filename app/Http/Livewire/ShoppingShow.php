<?php

namespace App\Http\Livewire;

use App\Models\shoppings;
use Livewire\Component;
use Livewire\WithPagination;
class ShoppingShow extends Component
{
    use WithPagination;
    public $fecha_inicio;
    public $fecha_fin;
  
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = [ 'render', 'delete' ];

    public function render()
    {

        $fecha = shoppings::whereBetween('created_at',  [$this->fecha_inicio, $this->fecha_fin])->get();

        $totalMes = $fecha->sum('total');


        $sales_day = shoppings::whereDate('created_at', now()->today())->get();

        $total = $sales_day->sum('total');

        $shoppings = shoppings::orderBy($this->sort, $this->direction)->paginate(6);

        return view('livewire.shopping-show', compact('shoppings','total', 'totalMes'));
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

    public function delete(shoppings $shopping){

        $shopping->delete();

    }
}
