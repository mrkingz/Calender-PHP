<?php

namespace App;

use App\Http\Traits\CalendarTrait;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use CalendarTrait;

    public $channels = [
        'SMS', 'E-mail', 'SMS and e-mail'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'channel', 'reminder_date', 'reminder_time', 'schedule_id'
    ];
    
    /**
     * Get the a readable date format
     * 
     * @return string 
     */
    public function formatedDate()
    {
        $date = explode('-', $this->reminder_date);

        return $this->formatDate($date[0], $date[1], $date[2]);
    }

    /**
     * Get the a readable time format
     * 
     * @return string 
     */
    public function formatedTime()
    {
        $time = explode(':', $this->reminder_time);
        
        return $this->formatTime($time[0], $time[1], $time[2]);
    }

    public function getChannel()
    {
        return $this->channels[$this->channel - 1];
    }

    /**
     * Get the schedule that is associated with this reminder
     */
    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }
}
