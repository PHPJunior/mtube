<?php

namespace App\Http\Livewire\Channel\Table;

use App\Models\Channel\Channel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ChannelsTable extends DataTableComponent
{
    protected $listeners = [
        'channelCreated' => '$refresh',
        'channelUpdated' => '$refresh',
        'channelDeleted' => '$refresh'
    ];

    public function rowView(): string
    {
        return 'livewire.channel.table.channels-table';
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Slug'), 'slug')
                ->sortable()
                ->searchable(),
            Column::make(__('Active'), 'active')
                ->sortable()
                ->searchable(),
            Column::make(__('Created At'), 'created_at')->sortable(),
            Column::blank(),
        ];
    }

    public function query()
    {
        return Channel::query()->where('owner_id', auth()->user()->id);
    }
}
