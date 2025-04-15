<div>
    <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700 p-2">
        <h1 class="mb-2">
            {{ __('Create Employee') }}
        </h1>
        <div class="grid auto-rows-min gap-4 md:grid-cols-2" wire:ignore>
            <flux:select label="{{ __('Type') }}" wire:model="type">
                <flux:select.option value="sales">{{ __('Sales') }}</flux:select.option>
                <flux:select.option value="maintenance">{{ __('Maintenance') }}</flux:select.option>
            </flux:select>
            <br>
            <flux:input label="{{ __('Name') }}" wire:model="name" />
            <flux:input label="{{ __('Mobile') }}" wire:model="mobile" />
        </div>
        <flux:button wire:click="create" class="bg-green-700! hover:bg-green-950! mt-4">{{ __('Create') }}
        </flux:button>
    </div>
</div>
