<?php

namespace App\Http\Livewire\Backend\Admin\Table;

use App\Models\Auth\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AdminsTable extends DataTableComponent
{
    protected $listeners = [
        'adminCreated' => '$refresh',
        'adminUpdated' => '$refresh',
        'adminDeleted' => '$refresh'
    ];

    public function rowView(): string
    {
        return 'livewire.backend.admin.table.admins-table';
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Name'), 'name')->sortable(),
            Column::make(__('Email Address'), 'email')->sortable(),
            Column::make(__('Created At'), 'created_at')->sortable(),
            Column::blank(),
        ];
    }

    public function query()
    {
        return Admin::query();
    }
}
