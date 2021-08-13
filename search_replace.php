<?php

return [
    "'<1:name>'::'<2:name>'" => [
        'name' => 'enforce_query',
        'replace' => "'<1>'::query()->'<2>'",
        'filters' => [
            1 => [
                'is_subclass_of' => 'Illuminate\Database\Eloquent\Model'
            ],
            2 => [
                "in_array" => [
                    'where', 'count', 'find', 'findOrNew', 'findOrFail'
                ]
            ]
        ]
    ],
];
