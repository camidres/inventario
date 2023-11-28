<div>



    <div class=" flex flex-col w-full lg:pl-64 lg:h-screen ">
        <div class="container py-16 lg:py-10 ">

            <div class="py-2 text-lg font-semibold">
                <p>
                    Lista de productos
                </p>
            </div>


            <x-table>

                <div class="px-6 py-4 flex items-center bg-gray-100">
                    <x-input class="flex-1 mr-3 ml-2" placeholder="Ingresa el producto a buscar" type="text"
                        wire:model="search" />
                    @livewire('product-create')
                </div>


                @if ($products->count())


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

                                    Nombre

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium cursor-pointer text-gray-500 uppercase tracking-wider">

                                    Precio

                                </th>

                                <th scope="col" class="relative px-6 py-3">

                                </th>
                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($products as $product)
                                <tr>

                                    <td class=" px-6 py-4 ">
                                        <div class="text-sm  text-gray-900">
                                            {{ $product->id }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4">


                                        <div class="text-sm  text-gray-900">
                                            {{ $product->name }}
                                        </div>

                                    </td>





                                    <td class="px-6 py-4 ">


                                        <div class="text-sm  text-gray-900">
                                            {{ $product->price }}
                                        </div>

                                    </td>

                                    <td class="flex justify-end px-6 py-4   ">



                                        @livewire('product-edit', ['product' => $product], key($product->id))


                                        <div>
                                            <a class="btn btn-red ml-2"
                                                wire:click="$emit('deleteProduct', {{ $product->id }})">
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

                @if ($products->hasPages())
                    <div class="py-4 px-3">
                        {{ $products->links() }}
                    </div>
                @endif
            </x-table>

           
        </div>
    </div>




    @push('js')
        <script>
            Livewire.on('deleteProduct', productId => {


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

                        Livewire.emitTo('products-show', 'delete', productId)

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
