<div class="px-4 py-6">
    <div class="flex justify-between">
        <div class="text-center">
            <h3 class="font-medium text-md">{{ __('Total Views') }}</h3>
            <h2 class="font-bold text-3xl">{{ ReadableNumber($total_views) }}</h2>
        </div>
        <div class="text-center">
            <h3 class="font-medium text-md">{{ __('Subscribed Users Views') }}</h3>
            <h2 class="font-bold text-3xl">{{ ReadableNumber($subscribed_user_views) }}</h2>
        </div>
        <div class="text-center">
            <h3 class="font-medium text-md">{{ __('Unsubscribed Users Views') }}</h3>
            <h2 class="font-bold text-3xl">{{ ReadableNumber($unsubscribed_user_views) }}</h2>
        </div>
    </div>

    <div class="mt-6">
        <h3 class="font-medium text-sm">{{ __('Subscribed Users') }}</h3>
        <div class="shadow w-full rounded-full bg-grey-light mt-1">
            <div class="bg-red-500 rounded-full py-1.5 text-center text-white" style="width: {{ percentageCalculate($subscribed_user_views, $total_views) }}%"></div>
        </div>
    </div>

    <div class="mt-3">
        <h3 class="font-medium text-sm">{{ __('Unsubscribed Users') }}</h3>
        <div class="shadow w-full rounded-full bg-grey-light mt-1">
            <div class="bg-red-500 rounded-full py-1.5 text-center text-white" style="width: {{ percentageCalculate($unsubscribed_user_views, $total_views) }}%"></div>
        </div>
    </div>
</div>
