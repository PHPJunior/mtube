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
    {{--    <a wire:click="$emit('openModal', 'backend.admin.modal.view-admin', {{ json_encode(["admin_id" => $row->id]) }})" class="cursor-pointer font-medium mr-2">View</a>--}}
    {{--    <a wire:click="$emit('openModal', 'backend.admin.modal.edit-admin', {{ json_encode(["admin_id" => $row->id]) }})" class="cursor-pointer text-blue-600 font-medium hover:text-blue-900 mr-2">Edit</a>--}}
    {{--    <a wire:click="$emit('openModal', 'backend.admin.modal.delete-admin', {{ json_encode(["admin_id" => $row->id]) }})" class="cursor-pointer text-red-600 font-medium hover:text-red-900">Delete</a>--}}
    @if($row->isBanned())
        <a wire:click="$emit('openModal', 'backend.channel.modal.un-ban-channel', {{ json_encode(["channel_id" => $row->id]) }})" class="cursor-pointer font-medium mr-2">UnBan</a>
    @else
        <a wire:click="$emit('openModal', 'backend.channel.modal.ban-channel', {{ json_encode(["channel_id" => $row->id]) }})" class="cursor-pointer text-red-600 font-medium hover:text-red-900">Ban</a>
    @endif
</x-livewire-tables::table.cell>
