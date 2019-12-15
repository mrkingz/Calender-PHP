<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note', 'schedule_id'
    ];

    /**
     * Get the Schedule that is associated with these notes.
     */
    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }
}
