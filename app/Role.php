<?php

namespace App;


use Kyslik\ColumnSortable\Sortable;

class Role extends \Spatie\Permission\Models\Role
{
    use Sortable;

    public $sortable = [
        'name',
        'created_at',
        'updated_at'
    ];
}
