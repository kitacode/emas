<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'id',
        'name',
        'title',
        'duty',
        'description',
        'created_by',
        'updated_by',
        'event_id',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.speaker_table'));
    }
}
