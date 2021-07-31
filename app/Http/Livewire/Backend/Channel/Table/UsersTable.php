<?php

namespace App\Http\Livewire\Backend\Channel\Table;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends DataTableComponent
{
    protected $listeners = [
        'userBanned' => '$refresh',
        'userUnBanned' => '$refresh'
    ];

    public function rowView(): string
    {
        return 'livewire.backend.channel.table.users-table';
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Name'), 'name')->sortable(),
            Column::make(__('Email Address'), 'email')->sortable(),
            Column::make(__('Is Banned')),
            Column::make(__('Created At'), 'created_at')->sortable(),
            Column::blank(),
        ];
    }

    public function query()
    {
        return User::query();
    }
}
