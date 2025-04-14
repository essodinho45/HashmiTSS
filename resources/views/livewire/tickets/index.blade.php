<div>
    <x-layouts.app :title="__('Tickets')">
        <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 class="p-2">
                    {{ __('Latest Tickets') }}
                </h1>
                <livewire:grids.latest-tickets-table>
            </div>
        </div>
    </x-layouts.app>
</div>
