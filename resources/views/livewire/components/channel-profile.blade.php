<div class="flex items-center">
    <div>
        <img class="h-16 p-1 bg-white rounded-full" src="{{ $picture }}" alt=""/>
    </div>
    <div class="pl-4">
        <h2 class="font-bold text-md"><a href="{{ route('channel', ['slug' => $channel->slug]) }}" class="hover:text-blue-500">{{ $name }}</a></h2>
        <p class="text-sm">{{ ReadableHumanNumber($count, $count >= 1000) }} {{ \Illuminate\Support\Str::plural('subscriber', $count) }}</p>
    </div>
</div>
