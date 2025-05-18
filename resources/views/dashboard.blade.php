<x-layouts.app :title="__('Dashboard')">
    <div class="p-6">
        <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <!-- Card untuk info user yang login -->
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 flex flex-col justify-center">
                    <h1 class="text-2xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Halo,
                        {{ auth()->user()->name }}!</h1>
                    <p class="text-gray-700 dark:text-gray-300">Email kamu: {{ auth()->user()->email }}</p>
                </div>

                <!-- Card kosong dengan placeholder -->
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern
                        class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>

                <!-- Card kosong dengan placeholder -->
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern
                        class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
            </div>

            <div
                class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
    </div>
</x-layouts.app>