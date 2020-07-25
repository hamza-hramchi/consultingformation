<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use App\Mail\AppointmentMail;
use App\Mail\MailCF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $data = [
                'civilite' => $request->civilite,
                'nom'      => $request->nom,
                'prenom'   => $request->prenom,
                'date'     => date("d - m - Y", strtotime($request->date)),
                'heure'    => $request->time,
                'service'  => $request->service,
            ];
            return Mail::to($request->email)->send(new AppointmentMail($data));
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
        $allTimes = json_decode(Appointment::get('time'));
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
