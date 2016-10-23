<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrayerRequest extends Model
{
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function prayerTree()
    {
        return $this->belongsTo(PrayerTree::class);
    }
}
