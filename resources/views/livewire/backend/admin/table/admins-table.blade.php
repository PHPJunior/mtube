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
        {{ $row->email }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell">
    <div>
        {{ $row->created_at->format('F j Y h:i A') }}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="md:table-cell flex justify-end items-center">
    <a wire:click="$emit('openModal', 'backend.admin.modal.view-admin', {{ json_encode(["admin_id" => $row->id]) }})" class="cursor-pointer font-medium mr-2">View</a>
    <a wire:click="$emit('openModal', 'backend.admin.modal.edit-admin', {{ json_encode(["admin_id" => $row->id]) }})" class="cursor-pointer text-blue-600 font-medium hover:text-blue-900 mr-2">Edit</a>
    @if(auth()->user()->id != $row->id)
        <a wire:click="$emit('openModal', 'backend.admin.modal.delete-admin', {{ json_encode(["admin_id" => $row->id]) }})" class="cursor-pointer text-red-600 font-medium hover:text-red-900">Delete</a>
    @endif
</x-livewire-tables::table.cell>
