<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->id }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        <img
            class="object-contain md:object-scale-down w-24"
            @if($row->thumbnail_url)
            src="{{ \Illuminate\Support\Facades\Storage::disk($row->disk)->url($row->thumbnail_url) }}"
            @else
            src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
            @endif
        >
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->media_id }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->name }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        <p>{{ ReadableNumber(views($row)->unique()->count()) }}</p>
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div class="flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6 w-24">
        <div class="flex items-center text-sm text-gray-500">
            <i class="flex-shrink-0 mr-1.5 fal fa-arrow-alt-up text-gray-400"></i>
            {{ $row->upVoters()->count() }}
        </div>
        <div class="flex items-center text-sm text-gray-500">
            <i class="flex-shrink-0 mr-1.5 fal fa-arrow-alt-down text-gray-400"></i>
            {{ $row->downVoters()->count() }}
        </div>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        @if($row->isBanned())
            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">{{ __('Yes') }}</span>
        @else
            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded">{{ __('No') }}</span>
        @endif
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->created_at->format('F j Y h:i A') }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell flex justify-end items-center">
    <div>
        @if($row->isBanned())
            <a wire:click="$emit('openModal', 'backend.channel.modal.un-ban-video', {{ json_encode(["video_id" => $row->id]) }})" class="cursor-pointer font-medium mr-2">UnBan</a>
        @else
            <a wire:click="$emit('openModal', 'backend.channel.modal.ban-video', {{ json_encode(["video_id" => $row->id]) }})" class="cursor-pointer text-red-600 font-medium hover:text-red-900">Ban</a>
        @endif
    </div>
</x-livewire-tables::table.cell>
