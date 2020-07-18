<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class SessionParticipant extends Model
{
    protected $fillable = [
        'id',
        'participant_id',
        'session_id',
        'is_approved',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.session_participant_table'));
    }
}
