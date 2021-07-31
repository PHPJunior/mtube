<div class="px-4 py-5 bg-white sm:p-6">
    <div class="w-full">
        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Name') }}</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input id="name" wire:model="name" type="text" placeholder="{{ __('Name') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        </div>
        @error('name')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="w-full  mt-4">
        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Email Address') }}</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input id="email" wire:model="email" type="email" placeholder="{{ __('Email Address') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        </div>
        @error('email')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="w-full  mt-4">
        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Password') }}</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input id="password" wire:model="password" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        </div>
        @error('password')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="w-full  mt-4">
        <label for="passwordConfirmation" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Confirm Password') }}</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input id="passwordConfirmation" wire:model="passwordConfirmation" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        </div>
    </div>

    @if($success)
        <p class="text-sm mt-4 text-green-500">
            {{ $success }}
        </p>
    @endif
</div>
