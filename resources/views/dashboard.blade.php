<x-layouts.app :title="__('Dashboard')">
    <div class="p-6">
        <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <div class="grid auto-rows-min gap-4 md:grid-cols-1">
                <!-- Card untuk info user yang login -->
                @livewire('DashboardStudentManager')
                <!-- Card kosong dengan placeholder -->
                <!-- <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                </div> -->

                <!-- Card kosong dengan placeholder -->
                <!-- <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern
                        class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div> -->
            </div>

            @if (auth()->user()->getRoleNames()->contains('Student') && \App\Models\Student::where('email', auth()->user()->email)->exists())
                @livewire('dashboard-internship-manager')
                @livewire('dashboard-company-manager')
            @endif

        
        </div>
    </div>
</x-layouts.app>