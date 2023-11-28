<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\sales;

class pdfController extends Controller
{

    

    public function index(sales $item){

        $sales = sales::find($item);
       
        $items = json_decode($item->content);

        $pdf = pdf::loadView('pdf.pdf', compact( 'items', 'sales'));

        return $pdf->stream();
        // return view('pdf.pdf', compact( 'items', 'sales'));
       
    }

  
}
