<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sales;
use Livewire\WithPagination;

class ShowSales extends Component
{
    use WithPagination;
    public $fecha_inicio;
    public $fecha_fin;
    public $sort = 'id';
    public $direction = 'desc';
    public $mont;

    protected $listeners = ['delete'];


    public function render()
    {
       
        $fecha = sales::whereBetween('created_at',  [$this->fecha_inicio, $this->fecha_fin])->get();

        $totalMes = $fecha->sum('total');


        $sales_day = sales::whereDate('created_at', now()->today())->get();

        $total = $sales_day->sum('total');

       
        $sales = sales::orderBy($this->sort, $this->direction)->paginate(6);

        return view('livewire.show-sales', compact('sales', 'total', 'totalMes'));
    }


    public function order($sort)
    {

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {

            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }



    public function delete(sales $sales)
    {

        $sales->delete();
    }
}
