<div class="mt-6">
    <div>
        <p><i class="fas fa-spinner fa-pulse"></i> {{ __('Updating Live') }}</p>
    </div>
    <div class="h-96 w-auto flex flex-col justify-center items-center">
        <h1 class="font-bold text-7xl">{{ ReadableNumber($count) }}</h1>
        <p class="font-medium text-2xl">{{ \Illuminate\Support\Str::plural('subscriber', $count) }}</p>
    </div>
</div>
