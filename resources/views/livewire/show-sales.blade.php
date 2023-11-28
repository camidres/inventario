<div>



    <div class=" flex flex-col w-full lg:pl-64 lg:h-screen ">
        <div class="container py-10">

            <div class="py-2 text-lg font-semibold">
                <p>
                    Lista de ventas
                </p>
            </div>

            <x-table>
                <div class="flex justify-end px-6 py-3 bg-gray-100 lg:justify-between">

                    <div class="items-center hidden lg:flex">


                        <x-input wire:model="fecha_inicio" type="date" />

                        <x-input class="ml-2" wire:model="fecha_fin" type="date" />




                        <p class="text-center text-lg font-bold ml-4">Total: $ {{ number_format($totalMes) }}</p>


                    </div>

                    <div class="flex  items-center">

                        <p class="text-center text-lg font-bold">Ventas del dia: $ {{ number_format($total) }}</p>

                        <a href="{{ route('sales.create') }}">
                            <x-button class="ml-6">
                                Realizar venta
                            </x-button>
                        </a>
                    </div>
                </div>









                @if ($sales->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider"
                                    wire:click="order('id')">

                                    ID
                                    @if ($sort == 'id')

                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up float-right"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down float-right"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort flex float-right"></i>
                                    @endif

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                    Fecha

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                    Total

                                </th>

                                <th scope="col" class="relative px-6 py-3">

                                </th>
                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($sales as $item)
                                <tr>



                                    <td class=" px-6 py-4 ">
                                        <div class="text-sm  text-gray-900">
                                            {{ $item->id }}
                                        </div>

                                    </td>



                                    <td class="px-6 py-4 ">


                                        <div class="text-sm  text-gray-900">
                                            {{ $item->created_at }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4 ">


                                        <div class="text-sm  text-gray-900">
                                            {{ number_format($item->total) }}
                                        </div>

                                    </td>

                                    <td class="flex justify-end px-6 py-4   ">



                                        @livewire('sales-detail', ['item' => $item], key($item->id))



                                        <div>
                                            <a class="btn btn-red ml-2"
                                                wire:click="$emit('deleteSale', {{ $item->id }})">
                                                <i class="fas fa-trash "></i>
                                            </a>
                                        </div>


                                        {{-- <div>
                                                    <a class="btn btn-green ml-2" href="{{ route('sales.factura', $item) }}">
                                                        <i class="fas fa-receipt "></i>
                                                    </a>
                                                </div> --}}



                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-4 text-center bg-white">

                        No existe ningun registro coincidente.

                    </div>
                @endif

                @if ($sales->hasPages())
                    <div class="py-4 px-3">
                        {{ $sales->links() }}
                    </div>
                @endif

            </x-table>
        </div>



    </div>



    @push('js')
        <script>
            Livewire.on('deleteSale', salesId => {


                Swal.fire({
                    title: '¿Estas seguro de eliminar la venta?',
                    text: "Esta accion no tiene reverza!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('show-sales', 'delete', salesId)

                        Swal.fire(
                            'Eliminado',
                            'la venta a sido eliminada',
                            'success'
                        )
                    }
                })

            })
        </script>
    @endpush

</div>
