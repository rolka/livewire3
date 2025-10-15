<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-6">
                    <nav class="flex flex-col space-y-2">
                        <a href="/post/2" wire:navigate.hover class="block p-3 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Add comment to a Post
                        </a>
                        <a href="/companies/create" wire:navigate.hover class="block p-3 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Create a Company
                        </a>
                        <a href="/locations/create" wire:navigate.hover class="block p-3 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Create a Location
                        </a>
                        <a href="{{ route('tasks.index') }}" wire:navigate.hover class="block p-3 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Tasks
                        </a>
                        <a href="{{ route('tasks.create') }}" wire:navigate.hover class="block p-3 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Create new Task
                        </a>
                    </nav>
                </div>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
