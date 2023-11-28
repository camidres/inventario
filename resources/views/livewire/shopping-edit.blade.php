<div>
   
    <a class="btn btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit "></i>
    </a>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Actualizar compra
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label value="Descripcion de la compra" />
                <textarea wire:model.defer="shopping.content" class="w-full" rows="6"></textarea>
            </div>
    
            <div class="mb-4">
                <x-label value="Total de la compra" />
                <x-input type="number" class="w-full" wire:model.defer="shopping.total" />
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
</div>
