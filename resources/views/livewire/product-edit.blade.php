<div>

    <a class="btn btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit "></i>
    </a>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Actualizar producto
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label value="Nombre del producto" />
                <x-input type="text" class="w-full" wire:model.defer="product.name" />

                @error('product.name')
                    <span class="text-red-500">Ingrese un nombre para el producto</span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Cantidad" />
                <x-input type="text" class="w-full" wire:model.defer="product.quantity" />
                @error('product.quantity')
                    <span class="text-red-500">Ingrese la cantidad</span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Precio del producto" />
                <x-input type="text" class="w-full" wire:model.defer="product.price" />
                @error('product.price')
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
