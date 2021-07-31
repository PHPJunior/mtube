<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Admin Details') }}</h3>
    </x-slot>
    <x-slot name="content">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="flex justify-between">
                <p>{{ __('Name') }}</p>
                <p>{{ $name }}</p>
            </div>
            <div class="flex justify-between mt-4">
                <p>{{ __('Email Address') }}</p>
                <p>{{ $email }}</p>
            </div>
        </div>
    </x-slot>
</x-modal>
