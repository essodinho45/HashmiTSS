<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="clear-both grid">
                <h1 class="p-2">
                    {{ __('Latest Tickets') }}
                    <flux:button wire:click="createTicket"
                        class="bg-green-700! hover:bg-green-950! text-white! float-end">
                        {{ __('Create Ticket') }}
                    </flux:button>
                </h1>
            </div>
            <flux:separator class="mb-4" />
            <livewire:grids.latest-tickets-table>
        </div>
    </div>
</div>
