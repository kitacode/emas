<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
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
        'session_type_id',
        'session_parallel_id',
        'link',
        'can_ask',
        'is_published',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.session_table'));
    }

    public function type()
    {
        return $this->belongsTo(SessionType::class, 'session_type_id');
    }

    public function parallel()
    {
        return $this->belongsTo(SessionParallel::class, 'session_parallel_id');
    }
}
