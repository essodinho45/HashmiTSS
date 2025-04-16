<div>
    <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700 p-2">
        <h1 class="mb-2">
            {{ __('Create Ticket') }}
        </h1>
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <flux:select label="{{ __('Type') }}" wire:model.live="type">
                <flux:select.option value="enquire">{{ __('Enquire') }}</flux:select.option>
                <flux:select.option value="sales">{{ __('Sales') }}</flux:select.option>
                <flux:select.option value="maintenance">{{ __('Maintenance') }}</flux:select.option>
            </flux:select>
            <flux:input label="{{ __('Customer Name') }}" wire:model="customer_name" />
            <flux:input label="{{ __('Customer Mobile') }}" wire:model="customer_mobile" />
            <flux:input label="{{ __('Customer Address') }}" wire:model="customer_address" />
            <div wire:show="showEmployees">
                <label for="employee_id" class="inline-flex items-center text-sm font-medium text-zinc-800 dark:text-white">
                    {{ __('Employee') }}
                </label>
                <select wire:model.live="employee_id" name="employee_id" id="employee_id"
                class="appearance-none w-full ps-3 pe-10 block h-10 py-2 text-base sm:text-sm leading-none rounded-lg shadow-xs border bg-white dark:bg-white/10 dark:disabled:bg-white/[9%] text-zinc-700 dark:text-zinc-300 has-[option.placeholder:checked]:text-zinc-400 dark:has-[option.placeholder:checked]:text-zinc-400 dark:[&>option]:bg-zinc-700 dark:[&>option]:text-white disabled:shadow-none border border-zinc-200 border-b-zinc-300/80 dark:border-white/10">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" wire:key="employee_id{{$employee->id}}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-full">
                <flux:textarea label="{{ __('Note') }}" wire:model="note" />
            </div>
        </div>
        <flux:button wire:click="create" class="bg-green-700! hover:bg-green-950! mt-4">{{ __('Create') }}
        </flux:button>
    </div>
</div>
