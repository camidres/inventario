<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .text-center {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 2em;
        }

        .table {
            display: flex;
            
            font-family: Arial, Helvetica, sans-serif;

        }

        .table .table-content table {
            margin: auto;
            width: 100%;
            border-collapse: collapse;
        }
        .table .table-content table thead{
            background-color: rgb(47, 47, 47);
           
        }

        .table .table-content table thead tr th {
            padding: 12px;
            color: white;
            text-align: left;
            
           

        }

        .table .table-content table tbody{

            background: #f3f3f3;

        }


        .table .table-content table tbody tr td {
            padding: 12px;
            text-align: left;
            border-top: 1px solid black;

        }

        .table .table-content .total {
            
            
            
            
        
        }

        .table .table-content .total p{
            background: #f3f3f3;
            width: 200px;
            padding: 8px;
            float: right;
        }


    </style>

</head>

<body>
    <p class="text-center">Panaderia el almendro</p>

    <div class="table">

        <div class="table-content">

            <table>

                <thead>

                    <tr>
                        <th>
                            Producto
                        </th>

                        <th>
                            Pecio
                        </th>

                        <th>
                            Cantidad
                        </th>

                        <th>
                            Total
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                {{ $item->name }}
                            </td>

                            <td>
                                {{ $item->price }}
                            </td>

                            <td>
                                {{ $item->qty }}
                            </td>

                            <td>
                                {{ $item->qty * $item->price  }}
                            </td>


                        </tr>
                    @endforeach

                </tbody>

            </table>


            <div class="total">
                @foreach ($sales as $sale)
                    <p>Total a pagar: $ {{ $sale->total }}</p>
                @endforeach
            </div>
        </div>

    </div>




</body>

</html>
