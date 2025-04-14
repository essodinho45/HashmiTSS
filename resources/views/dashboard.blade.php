<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <div
                class="relative aspect-3/1 overflow-x-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                {{-- [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100
                [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300
                dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                <h1 class="p-2">
                    {{ __('Open Tickets') }}
                </h1>
                <livewire:grids.open-tickets-table> --}}
            </div>
            <div
                class="relative aspect-3/1 overflow-x-hidden rounded-xl border border-neutral-200 dark:border-neutral-700
                [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100
                [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300
                dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                <h1 class="p-2">
                    {{ __('Most Active Employees') }}
                </h1>
                <livewire:grids.active-employees-table>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <h1 class="p-2">
                {{ __('Latest Tickets') }}
            </h1>
            <livewire:grids.latest-tickets-table>
        </div>
    </div>
</x-layouts.app>
