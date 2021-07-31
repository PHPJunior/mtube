<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6 flex flex-row flex-wrap">
        <div class="w-full p-2">
            <label for="mail_mailer" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mailer Type') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <select id="mail_mailer" wire:model="mail_mailer" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="smtp">SMTP</option>
                    <option value="mailgun">Mailgun</option>
                </select>
            </div>

            @error('mail_mailer')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        @if($mail_mailer == 'smtp')
            @include('livewire.backend.settings._partials.smtp-mail-form')
        @endif

        @if($mail_mailer == 'mailgun')
            @include('livewire.backend.settings._partials.mailgun-form')
        @endif
        <div class="w-full px-2">
            @if($success)
                <p class="text-sm mt-4 text-green-500">
                    {{ $success }}
                </p>
            @endif
        </div>
    </div>
    <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-end">
        <div
            wire:loading
            wire:target="submit"
            class="px-4 py-2"
        >
            Updating...
        </div>
        <button
            wire:loading.attr="disabled"
            wire:click="submit"
            class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out"
        >
            {{ __('Save') }}
        </button>
    </div>
</div>
