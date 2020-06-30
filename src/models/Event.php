<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id',
        'name',
        'place',
        'address',
        'theme',
        'committee',
        'timezone',
        'start_date',
        'end_date',
        'term_and_condition',
        'created_by',
        'updated_by',
        'show_barcode',
        'is_published',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.event_table'));
    }
}
