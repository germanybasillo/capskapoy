<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    
                    <!-- Content based on user type -->
                    @if (auth()->user()->user_type === 'tenant')
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">{{ __('Tenant Dashboard') }}</h3>
                            <p>{{ __('Welcome to your tenant dashboard. Here you can view your rented rooms and manage your lease.') }}</p>
                            <!-- Tenant-specific content goes here -->
                        </div>
                    @elseif (auth()->user()->user_type === 'rental_owner')
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">{{ __('Rental Owner Dashboard') }}</h3>
                            <p>{{ __('Welcome to your rental owner dashboard. Here you can manage your properties and view tenant information.') }}</p>
                            <!-- Rental owner-specific content goes here -->
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
