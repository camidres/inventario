<div>


    <div class="container  flex flex-col  w-full  py-14   lg:pl-64  ">

        <div class="container block py-8 items-center  bg-white rounded-md shadow-md mb-8  md:flex ">

            <div class="w-full mr-4" wire:ignore>
                <x-label value="Nombre del producto" />
                <select class="select2 " wire:model="product">
                    <option value="" selected>selecciona un producto</option>
                    @foreach ($stores as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            
       
            <div class="w-full mt-4 md:mt-0 md:mr-4">
                <x-label value="Costo por unidad" />
                <x-input type="number" class="w-full" placeholder="Costo del producto" wire:model="cost" />
            </div>

            <div class="w-full mt-4 md:mt-0 ">
                <x-label value="Cantidad (Bulto, Caja, Paca.)" />
                <x-input type="number" class="w-full" placeholder="Cantidad" wire:model="qty" />
            </div>


            <div class=" flex w-full justify-center mt-4 md:ml-4 md:mt-2 ">
                <x-button class="" wire:click="addItem">
                    Agregar
                </x-button>
            </div>

        </div>

        <div class="mb-8  ">

            @if (Cart::count())
            <x-table>
                <table class="min-w-full divide-y divide-gray-200 ">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-center text-md font-medium 
                                        cursor-pointer text-gray-500 uppercase 
                                        tracking-wider">

                                Nombre

                            </th>


                            <th scope="col"
                                class="px-6 py-3 text-center text-md font-medium 
                                    cursor-pointer text-gray-500 uppercase 
                                    tracking-wider">

                                Precio

                            </th>


                            <th scope="col"
                                class="px-6 py-3 text-center text-md font-medium 
                                cursor-pointer text-gray-500 uppercase 
                                tracking-wider">

                                Cantidad

                            </th>

                            <th scope="col"
                                class="px-4 py-3 text-center text-md font-medium 
                                cursor-pointer text-gray-500 uppercase 
                                tracking-wider">

                                Accion

                            </th>

                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 ">

                        @foreach (Cart::content() as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-center text-gray-900">
                                    {{ $item->name }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-center text-gray-900">
                                    {{ $item->price }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-center text-gray-900">
                                    {{ $item->qty }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <a class="btn btn-red " wire:click="delete('{{ $item->rowId }}')">
                                        <i class="fas fa-trash "></i>
                                    </a>
                                </div>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </x-table>
            @else
                <div class="px-6 py-4 text-center bg-white">

                    No se a agregado ningun producto.

                </div>
            @endif

        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-2">

            <div class="flex justify-between">

                <div>

                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>

                        $ {{ Cart::subtotal() }}
                    </p>

                </div>

                <div>

                    <x-button wire:click="save">
                        Guardar compra
                    </x-button>

                </div>

            </div>

        </div>


    </div>









    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {

                $('.select2').select2();

                $('.select2').on('change', function() {


                    @this.set('product', this.value)
                })
            });
        </script>
    @endpush
</div>
