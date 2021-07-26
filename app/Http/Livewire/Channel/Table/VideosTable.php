<?php

namespace App\Http\Livewire\Channel\Table;

use App\Jobs\StartConvert;
use App\Models\Channel\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VideosTable extends DataTableComponent
{
    public $channel_id;

    public array $bulkActions = [
        'restartTranscoding' => 'Restart Transcoding',
    ];

    protected function getListeners()
    {
        return [
            'videoUploaded' => '$refresh',
            'videoDeleted' => '$refresh',
            'videoUpdated' => '$refresh',
            "echo-private:video.progress.{$this->channel_id},VideoProgress" => '$refresh'
        ];
    }

    public function restartTranscoding()
    {
        if (count($this->selectedKeys)) {
            foreach ($this->selectedKeys as $key => $value)
            {
                return dispatch(new StartConvert($value));
            }
        }
    }

    public function rowView(): string
    {
        return 'livewire.channel.table.videos-table';
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
            Column::make(__('Status'), 'status'),
            Column::make(__('Views')),
            Column::make(__('Likes (vs. Dislikes)')),
            Column::make(__('Created At'), 'created_at')->sortable(),
            Column::blank(),
        ];
    }

    public function query()
    {
        return Video::query()->where('channel_id', $this->channel_id);
    }
}
