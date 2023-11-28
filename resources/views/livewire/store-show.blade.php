<div>
    <div class=" flex flex-col w-full lg:pl-64 lg:h-screen ">
        <div class="container py-16 lg:py-10 ">

            <div class="py-2 text-lg font-semibold">
                <p>
                    Productos en bodega
                </p>
            </div>


            <x-table>

                <div class="px-6 py-4 flex items-center bg-gray-100">
                    <x-input class="flex-1 mr-3 ml-2" placeholder="Buscar producto..." type="text"
                        wire:model="search" />
                    @livewire('store-create')
                </div>


                @if ($stores->count())


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

                                    Producto

                                </th>

                                
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                    Cantidad

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                    Costo

                                </th>

                                
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                   Price

                                </th>

                                
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                    Conversion

                                </th>


                                <th scope="col" class="relative px-6 py-3">

                                </th>
                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($stores as $store)
                                <tr>

                                    <td class="px-6 py-4 ">
                                        <div class="text-sm  text-gray-900">
                                           {{ $store->id }}
                                        </div>
                                    </td>

                                    <td class=" px-6 py-4 ">
                                        <div class="text-sm  text-gray-900">
                                           {{ $store->name }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 ">
                                        <div class="text-sm  text-gray-900">
                                           {{ number_format($store->quantity,2 ) }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="text-sm  text-gray-900">
                                           {{ number_format($store->cost )}}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="text-sm  text-gray-900">
                                           {{ number_format($store->price )}}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="text-sm  text-gray-900">
                                           {{ number_format($store->conversion )}}
                                        </div>
                                    </td>


                                    <td class="flex justify-end px-6 py-4   ">

                                        @livewire('product-edit', [], key())

                                        <div>
                                            <a class="btn btn-red ml-2"
                                                wire:click="$emit('deleteStore', {{ $store->id }})">
                                                <i class="fas fa-trash "></i>
                                            </a>
                                        </div>
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

                {{-- @if ($products->hasPages())
                    <div class="py-4 px-3">
                        {{ $products->links() }}
                    </div>
                @endif --}}
            </x-table>

           
        </div>
    </div>

    @push('js')
    <script>
        Livewire.on('deleteStore', storeId => {


            Swal.fire({
                title: '¿Estas seguro de eliminar el producto?',
                text: "Esta accion no tiene reverza!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('store-show', 'delete', storeId)

                    Swal.fire(
                        'Eliminado',
                        'El producto ha sido eliminado',
                        'success'
                    )
                }
            })

        })
    </script>
@endpush
</div>
