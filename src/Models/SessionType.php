<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class SessionType extends Model
{
    protected $fillable = [
        'id',
        'name',
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
        $this->setTable(config('ktcd_emas.session_type_table'));
    }
}
