<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        @if (!$rentalOwnerExists)
        <div class="mt-4">
        <x-input-label for="user_type" :value="__('User Type')" />
        <select id="user_type" name="user_type" class="block mt-1 w-full" required> 
            <option value="" disabled selected>{{ __('Select user type') }}</option>
            <option value="tenant">{{ __('Tenant') }}</option>
            <option value="rental_owner">{{ __('Rental Owner') }}</option>
        </select>
        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>
         @else
        <div class="mt-4" style="display: none;">
        <x-input-label for="user_type" :value="__('User Type')" />
        <input type="text" id="user_type" name="user_type" value="tenant" class="block mt-1 w-full" readonly />
        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>
         @endif

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
            href="{{ route('login') }}" 
            style="color: white; transition: color 0.3s ease;" 
            onmouseover="this.style.color='orange';" 
            onmouseout="this.style.color='white';">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ml-3" style="background-color: orange; color: white; border: none; border-radius: 0.375rem; padding: 0.5rem 1rem; transition: background-color 0.3s ease, color 0.3s ease;" 
        onmouseover="this.style.backgroundColor='white'; this.style.color='orange';" 
        onmouseout="this.style.backgroundColor='orange'; this.style.color='white';">
        {{ __('Register') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
