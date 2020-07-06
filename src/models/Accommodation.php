<?php

namespace Ktcd\Emas\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = [
        'id',
        'name',
        'address',
        'description',
        'price_week_day',
        'price_week_end',
        'quota',
        'created_by',
        'updated_by',
        'event_id',
        'parent_id',
        'is_published',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ktcd_emas.accommodation_table'));
    }
}
