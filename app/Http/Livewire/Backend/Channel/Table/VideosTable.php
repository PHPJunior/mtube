<?php

namespace App\Http\Livewire\Backend\Channel\Table;

use App\Models\Channel\Video;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VideosTable extends DataTableComponent
{
    protected $listeners = [
        'videoBanned' => '$refresh',
        'videoUnBanned' => '$refresh'
    ];

    public function rowView() : string
    {
        return 'livewire.backend.channel.table.videos-table';
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Thumbnail'), 'thumbnail'),
            Column::make(__('Media Id'), 'media_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Views')),
            Column::make(__('Likes (vs. Dislikes)')),
            Column::make(__('Is Banned')),
            Column::make(__('Created At'), 'created_at')->sortable(),
            Column::blank(),
        ];
    }

    public function query()
    {
        return Video::query();
    }
}
