<?php

namespace Svknd\Feed\Models\Traits;

use Svknd\Feed\Models\Feed;

trait Feedable
{
    public function feed()
    {
        return $this->morphOne(Feed::class, 'feedable', 'feedable_id', 'feedable_type');
    }

    public function feeds()
    {
        return $this->morphMany(Feed::class, 'feedable', 'feedable_id', 'feedable_type');
    }
}
