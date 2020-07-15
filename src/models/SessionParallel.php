<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class SessionParallel extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'date',
        'start_date',
        'end_date',
        'time',
        'start_time',
        'end_time',
        'created_by',
        'updated_by',
        'event_id',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.session_parallel_table'));
    }
}
