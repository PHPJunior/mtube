<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->id }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->name }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->slug }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        @if($row->active)
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
<x-livewire-tables::table.cell class="flex justify-end">
    <a href="{{ route('user.channels.show', ['id' => $row->id]) }}" class="cursor-pointer font-medium mr-2">View</a>
    <a wire:click="$emit('openModal', 'frontend.channel.modal.edit-channel', {{ json_encode(["channel_id" => $row->id]) }})" class="cursor-pointer text-blue-600 font-medium hover:text-blue-900 mr-2">Edit</a>
    <a wire:click="$emit('openModal', 'frontend.channel.modal.delete-channel', {{ json_encode(["channel_id" => $row->id]) }})" class="cursor-pointer text-red-600 font-medium hover:text-red-900">Delete</a>
</x-livewire-tables::table.cell>
