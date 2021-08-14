<?php

namespace App\Http\Livewire\Backend\Channel\Table;

use App\Models\Channel\Channel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ChannelsTable extends DataTableComponent
{
    protected $listeners = [
        'channelBanned' => '$refresh',
        'channelUnBanned' => '$refresh'
    ];

    public function rowView(): string
    {
        return 'livewire.backend.channel.table.channels-table';
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Name'), 'name')->sortable(),
            Column::make(__('Is Banned')),
            Column::make(__('Created At'), 'created_at')->sortable(),
            Column::blank(),
        ];
    }

    public function query()
    {
        return Channel::query();
    }
}
