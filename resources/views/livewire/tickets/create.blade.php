<div>
    <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700 p-2">
        <h1 class="mb-2">
            {{ __('Create Ticket') }}
        </h1>
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <div wire:ignore>
                <flux:select label="{{ __('Type') }}" wire:model="type">
                    <flux:select.option value="sales">{{ __('Sales') }}</flux:select.option>
                    <flux:select.option value="enquire">{{ __('Enquire') }}</flux:select.option>
                    <flux:select.option value="maintenance">{{ __('Maintenance') }}</flux:select.option>
                </flux:select>
            </div>
            <flux:input label="{{ __('Customer Name') }}" wire:model="customer_name" />
            <flux:input label="{{ __('Customer Mobile') }}" wire:model="customer_mobile" />
            <flux:input label="{{ __('Customer Address') }}" wire:model="customer_address" />
            <div wire:ignore>
                <flux:select label="{{ __('Employee') }}" wire:model="employee_id">
                    @foreach ($employees as $employee)
                        <flux:select.option value="{{ $employee->id }}">{{ $employee->name }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="col-span-full">
                <flux:textarea label="{{ __('Note') }}" wire:model="note" />
            </div>
        </div>
        <flux:button wire:click="create" class="bg-green-700! hover:bg-green-950! mt-4">{{ __('Create') }}
        </flux:button>
    </div>
</div>
