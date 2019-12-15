<?php

namespace App\Http\Traits;

use App\User;
use App\Note;
use App\Schedule;
use App\Reminder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait ScheduleTrait 
{
    protected $view_type =['pending', 'completed'];
    /**
     * Create a new schedule instance in storage
     *
     * @param  array  $data
     * @return bool
     */
    protected function createSchedule(array $data) 
    {
        $this->validateSchedule($data)->validate();
        
        try {
            DB::beginTransaction();

            $schedule = Schedule::create([
                'title' => Str::title($data['title']),
                'date' => $data['date'],
                'time' => $data['time'],
                'user_id' => Auth::id()
            ]);
    
            if (! is_null($data['note'])) {
                $this->createNote($data['note'], $schedule);
            }
    
            if (isset($data['reminder'])) {
                $this->createReminder($data, $schedule);
            }

            DB::commit();

            return true;
        }
        catch(Exception $e) {
            DB::rollback();

            return false;
        }
    }

    /**
     * Create a new note instance in storage
     *
     * @param  array  $note
     * @param App\Schedule $schedule
     * @return App\Note
     */
    protected function createNote($note, Schedule $schedule)
    {
        $this->validateNote($data['note'])->validate();

        return Note::create([
            'note' => htmlentities($note),
            'schedule_id' => $schedule->id
        ]);
    }

    /**
     * Create a new reminder instance in storage
     *
     * @param  array  $data
     * @param App\Schedule $schedule
     * @return App\Reminder
     */
    protected function createReminder(array $data, Schedule $schedule)
    {
        $this->validateReminder($data)->validate();

        return Reminder::create([
            'channel' => $data['channel'],
            'reminder_date' => $data['reminder_date'],
            'reminder_time' => $data['reminder_time'],
            'schedule_id' => $schedule->id,
        ]);
    }
    protected function viewType($request)
    {
        return $request->route()->named('view.pending')
            ? $this->view_type[static::PENDING_SCHEDULES]
            : $this->view_type[static::COMPLETED_SCHEDULES];
    }

    protected function getSchedule($id)
    {
        return Schedule::with(['note', 'reminder'])->where([ 
            'user_id' => Auth::id()
        ])->find($id);
    }

    protected function getSchedules(Request $request)
    {
        $type = $this->viewType($request) == $this->view_type[0] 
            ? static::PENDING_SCHEDULES 
            : static::COMPLETED_SCHEDULES;

        $user = Auth::user();

        return $user->schedules()->with(['note', 'reminder'])->where([
                    'completed'=> $type, 
                    'user_id' => $user->id
                ])->paginate(5);
    }

    /**
     * Get a validator for schedule details.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateSchedule(array $data)
    {
        
        return Validator::make($data, [
            'title' => 'required|string|max:100',
            'date' => 'required|date',
            'time' => ['required']
        ]);
    }

    /**
     * Get a validator for schedule note.
     *
     * @param  string  $note
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateNote($note)
    {
        if (! is_null($note)) {
            return Validator::make(['note' => $note], [
                'note' => 'string'
            ]);
        }
    }

    /**
     * Get a validator for schedule reminder.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateReminder(array $data)
    {
        return Validator::make($data, [
            'channel' => 'required|digits:1',
            'reminder_date' => 'required|date',
            'reminder_time' => 'required'
        ]);
    }
}
