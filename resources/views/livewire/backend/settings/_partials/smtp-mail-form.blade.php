<div class="w-1/2 p-2 mt-4">
    <label for="mail_from_address" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail From Address') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mail_from_address" wire:model="mail_from_address" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Mail From Address') }}">
    </div>
    @error('mail_from_address')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mail_from_name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail From Name') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mail_from_name" wire:model="mail_from_name" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Mail From Name') }}">
    </div>
    @error('mail_from_name')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mail_host" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail Host') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mail_host" wire:model="mail_host" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Mail Host') }}">
    </div>
    @error('mail_host')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mail_port" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail Port') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mail_port"
           wire:model="mail_port" type="text"
           class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
           placeholder="{{ __('Mail Port') }}"
        >
    </div>
    @error('mail_port')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mail_username" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail Username') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mail_port"
               wire:model="mail_username" type="text"
               class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
               placeholder="{{ __('Mail Username') }}"
        >
    </div>
    @error('mail_username')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mail_password" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail Password') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mail_port"
               wire:model="mail_password" type="password"
               class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
               placeholder="{{ __('Mail Password') }}"
        >
    </div>
    @error('mail_password')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mail_encryption" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mail Encryption') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <select id="mail_encryption" wire:model="mail_encryption" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value="tls">TLS</option>
            <option value="ssl">SSL</option>
        </select>
    </div>
</div>
