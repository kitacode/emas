<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class SessionSpeaker extends Model
{
    protected $fillable = [
        'id',
        'speaker_id',
        'session_id',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.session_speaker_table'));
    }
}
