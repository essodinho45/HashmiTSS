<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <div
                class="relative aspect-3/1 overflow-scroll rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 class="p-2">
                    {{ __('Open Tickets') }}
                </h1>
                <livewire:grids.open-tickets>
            </div>
            <div
                class="relative aspect-3/1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 class="p-2">
                    {{ __('Most Active Employees') }}
                </h1>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
