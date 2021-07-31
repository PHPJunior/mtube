<div class="w-1/2 p-2 mt-4">
    <label for="mailgun_domain" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mailgun Domain') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mailgun_domain" wire:model="mailgun_domain" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Mailgun Domain') }}">
    </div>
    @error('mailgun_domain')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mailgun_secret" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mailgun Secret') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mailgun_secret" wire:model="mailgun_secret" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Mailgun Secret') }}">
    </div>
    @error('mailgun_secret')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="w-1/2 p-2 mt-4">
    <label for="mailgun_endpoint" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mailgun Endpoint') }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input id="mailgun_endpoint" wire:model="mailgun_endpoint" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Mailgun Endpoint') }}">
    </div>
    @error('mailgun_endpoint')
    <p class="text-sm mt-2 text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>
