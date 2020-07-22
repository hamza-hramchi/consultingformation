<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    
    public function index(){
        //
    }

    public function create(){
        //
    }

    
    public function store(AppointmentRequest $request){
        $time = $this->checkDateTime($request->date,$request->time);
        if($time){
            return response()->json($time);
        }
        else{
            Appointment::create($request->all());
        }
    }

    public function show(Appointment $appointment){
        //
    }

    public function edit(Appointment $appointment){
        //
    }

    public function update(AppointmentRequest $request, Appointment $appointment){
        //
    }

    public function destroy(Appointment $appointment){
        //
    }

    public function checkDateTime($date,$time){
        $timeDate = Appointment::where('date','=',$date)->get('time');
                for($j=0; $j<count($timeDate); $j++){
                    if($time === $timeDate[$j]->time){
                        $modifier = strtotime($timeDate[$j]->time);
                        $verfifyTime = date('H:s', strtotime('+1 hour',$modifier));
                        if($verfifyTime === "13:00"){
                            $verfifyTime = strtotime($verfifyTime); 
                            $verfifyTime = date('H:s', strtotime('+2 hours',$verfifyTime));
                        }
                        return $verfifyTime;
                    }
                }
    }


}
