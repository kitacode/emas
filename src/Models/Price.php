<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'id',
        'name',
        'price',
        'start_time',
        'end_time',
        'description',
        'created_by',
        'updated_by',
        'event_id',
        'session_id',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.price_table'));
    }
}
