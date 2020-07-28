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
        $number = count(Appointment::where('date','=',$request->date)->get('time'));
        $time = $this->checkDateTime($request->date,$request->time);
        if($number == 7){
            return $time = 0;
        }
        else{
            if($time == $request->time){
                Appointment::create($request->all());
                $data = [
                    'civilite' => $request->civilite,
                    'nom'      => $request->nom,
                    'prenom'   => $request->prenom,
                    'date'     => date("d-m-Y", strtotime($request->date)),
                    'heure'    => $request->time,
                    'service'  => $request->service,
                ];
                Mail::to($request->email)->send(new AppointmentMail($data));
                return $time;
            }
            else{
                return $time;
            }
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
        /*$timeDate = Appointment::where('date','=',$date)->get('time');
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
                }*/
        $times = json_decode(Appointment::where('date','=',$date)->get('time'));
        $array = ['09:00','10:00','11:00','12:00','15:00','16:00','17:00'];
        $data = [];
        $verfifyTime = $time;
        for($i=0; $i<count($times); $i++){
            array_push($data,$times[$i]->time);
        }
        if(in_array($time,$data) == true){
            $key = array_search($time,$array);
            unset($array[$key]);
            for($i=0; $i<count($times); $i++){
                array_push($data,$times[$i]->time);
            }
            if(in_array($verfifyTime,$data)){
                $key = array_search($verfifyTime,$array);
                unset($array[$key]);
            }
            $verfifyTime = $array[array_rand($array)];
        }
        return $verfifyTime;
    }


}
