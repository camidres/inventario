<div>

    <x-button  wire:click="$set('open', true)">
        Agregar
    </x-button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo producto
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
                <x-label value="Precio del producto" />
                <x-input type="number" class="w-full" wire:model.defer="price" />
                @error('price')
                    <span class="text-red-500">Ingrese el precio del producto</span>
                @enderror
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
