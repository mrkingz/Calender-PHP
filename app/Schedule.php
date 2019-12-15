<?php

namespace App;

use App\Http\Traits\CalendarTrait;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use CalendarTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'date', 'time', 'user_id'
    ];

    /**
     * Get the a readable date format
     * 
     * @return string 
     */
    public function formatedDate()
    {
        $date = explode('-', $this->date);

        return $this->formatDate($date[0], $date[1], $date[2]);
    }

    /**
     * Get the a readable time format
     * 
     * @return string 
     */
    public function formatedTime()
    {
        $time = explode(':', $this->time);
        
        return $this->formatTime($time[0], $time[1], $time[2]);
    }

    /**
     * Determine if this schedule has been marked as completed
     * 
     * @return bool
     */
    public function isCompleted()
    {
        return $this->completed;
    }


    /**
     * Determine if this schedule has associated note
     * 
     * @return bool
     */
    public function hasNote() 
    {
        return $this->note != null;
    }

    /**
     * Determine if this schedule has associated reminder settings
     * 
     * @return bool
     */
    public function hasReminderSettings()
    {
        return $this->reminder != null;
    }

    /**
     * Get the notes belonging to this schedule record.
     */
    public function note()
    {
        return $this->hasOne('App\Note');
    }

    /**
     * Get the reminder belonging to this schedule record.
     */
    public function reminder()
    {
        return $this->hasOne('App\Reminder');
    }

    /**
     * Get the user that owns the schedule records.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
