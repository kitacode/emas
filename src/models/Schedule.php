<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'id',
        'date',
        'start_date',
        'end_date',
        'time',
        'start_time',
        'end_time',
        'topic',
        'speaker',
        'created_by',
        'updated_by',
        'event_id',
        'session_type_id',
        'link',
        'is_published',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.schedule_table'));
    }
}
