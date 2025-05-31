<x-layouts.app :title="__('Dashboard')">
    <div class="p-6">
        <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <div class="grid auto-rows-min gap-4 md:grid-cols-1">
                <!-- Card untuk info user yang login -->
                @if(auth()->user()->hasRole(['Student']))
                    @livewire('dashboard-student-manager')
                @elseif(auth()->user()->hasAnyRole('Teacher', 'super_admin'))
                    <div class="flex items-center justify-center">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                            Halo, {{ auth()->user()->name }}!
                        </h1>
                    </div>
                @else
                    @livewire('dashboard-student-manager')
                @endif
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