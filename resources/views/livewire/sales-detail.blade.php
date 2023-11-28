<div>
    <a class="btn btn-blue" wire:click="$set('open', true)">
        <i class="fas fa-eye "></i>
    </a>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Detalle de venta
        </x-slot>

        <x-slot name="content">

            <div class="mb-8   ">

                <x-table>
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50">
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


                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 ">

                            @foreach ($items as $item)
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


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </x-table>


            </div>

            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">

                <div class="flex justify-between">

                    <div>
                        
                            <p class="text-gray-700">
                                <span class="font-bold text-lg">Total:</span>

                                $ {{ number_format($sale->total) }}
                            </p>
                      
                    </div>



                </div>

            </div>

        </x-slot>

        <x-slot name="footer">


        </x-slot>


    </x-dialog-modal>
</div>
