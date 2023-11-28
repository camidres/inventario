<div>

    <div x-data="{ open: false }">
        <button class="block lg:hidden py-2 px-4 bg-gray-300 absolute" @click="open = !open">
            <i class="fas fa-bars"></i>
        </button>
     
        <nav x-show="open" @click.away="open = false">
            <div class="fixed bg-gray-700 h-screen w-64 z-50">
                <div class="flex py-20 px-4  text-white ">

                    <i class="fas fa-shop text-5xl"></i>
                    <p class="text-lg font-semibold mt-5 ml-2">
                        Mi inventario
                    </p>
        
                </div>
        
        
        
                <div class="mt-10">
                    <a href="{{ route('show.products') }}">
                        <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">
                            <i class="fas fa-basket-shopping text-white"></i>
                            <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                                Productos
                            </p>
        
                        </div>
                    </a>
        
                    <a href="{{ route('show.sales') }}">
                        <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">
        
                            <i class="fas fa-money-bill-1 text-white"></i>
                            <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                                Ventas
                            </p>
        
                        </div>
                    </a>
        
                    <a href="{{ route('show.shoppings') }}">
                        <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">
        
                            <i class="fas fa-sack-dollar text-white"></i>
                            <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                                Compras
                            </p>
        
                        </div>
                    </a>
        
        
                </div>
        
                <div class="py-4 px-4 mt-44 min-h-screen">
        
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
        
                        <div class="flex items-center">
                            <p class="text-white mr-2 cursor-pointer text-md font-semibold" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
        
                                {{ __('Cerrar sesion') }}
                            </p>
        
                            <i class="fas fa-right-from-bracket text-white"></i>
                        </div>
        
                    </form>
        
                </div>
            </div>
        </nav>
    </div>


    <div class="fixed bg-gray-700 h-screen w-64 z-50 hidden lg:block">



        <div class="flex py-10 px-4  text-white ">

            <i class="fas fa-shop text-5xl"></i>
            <p class="text-lg font-semibold mt-5 ml-2">
                Mi inventario
            </p>

        </div>



        <div class=" mt-8">


            <a href="{{ route('show.store') }}">
                <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">
                    <i class="fas fa-warehouse text-white"></i>
                    <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                        Bodega
                    </p>

                </div>
            </a>

            <a href="{{ route('show.products') }}">
                <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">
                    <i class="fas fa-basket-shopping text-white"></i>
                    <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                        Productos de venta
                    </p>

                </div>
            </a>

            <a href="{{ route('show.sales') }}">
                <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">

                    <i class="fas fa-money-bill-1 text-white"></i>
                    <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                        Ventas
                    </p>

                </div>
            </a>

            <a href="{{ route('show.shoppings') }}">
                <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">

                    <i class="fas fa-sack-dollar text-white"></i>
                    <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                        Compras
                    </p>

                </div>
            </a>


            <a href="{{ route('show.products') }}">
                <div class="flex items-center py-4 px-4 w-full hover:bg-gray-500">
                    <i class="fas fa-file-invoice text-white"></i>
                    <p class="ml-2 text-white cursor-pointer text-md font-semibold ">
                       Reporte de ventas
                    </p>

                </div>
            </a>


        </div>

        <div class="py-4 px-4 mt-10 min-h-screen">

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <div class="flex items-center">
                    <p class="text-white mr-2 cursor-pointer text-md font-semibold" href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">

                        {{ __('Cerrar sesion') }}
                    </p>

                    <i class="fas fa-right-from-bracket text-white"></i>
                </div>

            </form>

        </div>

    </div>



</div>
