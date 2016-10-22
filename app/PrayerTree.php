<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrayerTree extends Model
{
    public function subscribers()
    {
        return $this->belongsToMany(Contact::class, 'subscriptions');
    }
}
