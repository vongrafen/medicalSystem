<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class ScheduleController extends Controller
{
    public function createEvent()
    {
        return view('createevent');
    }
public function store(Request $request)
    {
        $event= new Schedule();
        $event->title=$request->get('title');
        $event->start_date=$request->get('startdate');
        $event->end_date=$request->get('enddate');
        $event->note=$request->get('note');
        $event->doctor_requests_id=$request->get('doctor_requests_id');
        $event->patients_id=$request->get('patients_id');
        $event->equipament_id=$request->get('equipament_id');
        $event->convenant=$request->get('convenant');
        $event->save();
        return redirect('event')->with('success', 'Event has been added');
    }
public function calender()
            {
                $events = [];
                $data = Schedule::all();
                if($data->count())
                 {
                    
                    foreach ($data as $key => $value) 
                    {
                        
                        $events[] = Calendar::event(
                            $value->title,
                            false,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date),
                            null,
                            // Add color
                         [
                             'color' => 'yellow',
                             'textColor' => '#008000',
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);
                return view('calendar', compact('calendar'));
            }
}
