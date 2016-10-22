<?php

namespace App;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;

class PrayerTree extends Model
{

    protected $appends = ['pin'];

    public function getPinAttribute()
    {
        return Hashids::encode($this->attributes['id']);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Contact::class, 'subscriptions');
    }
}
