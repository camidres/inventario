<div>

    <x-button  wire:click="$set('open', true)">
        Agregar
    </x-button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Guardar en bodega.
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label value="Nombre del producto" />
                <x-input type="text" class="w-full" wire:model.defer="name" />

                @error('name')
                    <span class="text-red-500">Ingrese un nombre para el producto</span>
                @enderror
            </div>

           <div class="mb-4">
                <x-label value="Cantidad a guardar" />
                <x-input type="number" class="w-full" wire:model.defer="quantity" />
                @error('quantity')
                    <span class="text-red-500">Ingrese la cantidad total a guardar</span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Costo por unidad" />
                <x-input type="number" class="w-full" wire:model.defer="cost" />
                @error('cost')
                    <span class="text-red-500">Ingrese el costo del producto</span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Precio de venta" />
                <x-input type="number" class="w-full" wire:model.defer="price" />
                @error('price')
                    <span class="text-red-500">Ingrese el precio de venta del producto</span>
                @enderror
            </div>

            

            <div class="mb-4">
                <x-label value="Conversion en caso de ser necesario" />
                <x-input type="number" class="w-full" wire:model.defer="conversion" />
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-danger-button>

            <x-button class="ml-2" wire:click="save">
                Guardar
            </x-button>

        </x-slot>

    </x-dialog-modal>


</div>
