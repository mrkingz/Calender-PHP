<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Traits\ScheduleTrait;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    use ScheduleTrait;

    const PENDING_SCHEDULES = 0;

    const COMPLETED_SCHEDULES = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth']);
    }

    /**
     * Display a listing of the schedules from storage
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $view = $this->viewType($request);

        return view('schedules', [
            'page' => 'view',
            'view' => $view,
            'schedules' => $this->getSchedules($request)
        ]);
    }

    /**
     * Show the form for creating a new schedule.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('new-schedule', [
            'page' => 'new',
        ]);
    }

    /**
     * Store a new schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->createSchedule($request->all());
        if ( $response ) {
            Session::flash('success', trans('messages.schedule.save')); 
        } else {
            Session::flash('error', trans('messages.schedule.error')); 
        }

        return redirect()->back();
    }

    /**
     * Display the specified schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = $this->getSchedule($id);
        return view('view-schedule', ['schedule' => $schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
