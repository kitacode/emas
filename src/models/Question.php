<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id',
        'question',
        'event_id',
        'session_id',
        'participant_id',
        'was_read',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.speaker_table'));
    }
}
