<x-layouts.app>
    <div class="flex items-center justify-center min-h-screen">

        <div class="flex flex-col gap-y-8 text-center">
            <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">
                {{ config('app.name') }}
            </h1>

            <div class="flex gap-x-4">

                <x-filament::button
                        tag="a"
                        href="{{ \Filament\Facades\Filament::getPanel('app')->getLoginUrl() }}"
                        class="w-full"
                >
                    App
                </x-filament::button>

                <x-filament::button
                        tag="a"
                        href="{{ \Filament\Facades\Filament::getPanel('admin')->getLoginUrl() }}"
                        color="admin-primary"
                        class="w-full"
                >
                    Admin
                </x-filament::button>

            </div>
        </div>
    </div>
</x-layouts.app>
