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
        return Appointment::orderBy('date','asc')->get();
    }

    public function store(AppointmentRequest $request){
        $number = count(Appointment::where('date','=',$request->date)->get('time'));
        $time = $this->checkDateTime($request->date,$request->time);
        if($number===7 || $time == 0){
            return $time = 0;
            exit(-1);
        }
        else{
            if($time != $request->time){
                return $time;
            }
            else{
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
                return $request->time;
            }
        }  
    }

    public function show(Appointment $appointment){
    }

    public function update(AppointmentRequest $request, $id){
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        $data = [
                    'civilite' => $request->civilite,
                    'nom'      => $request->nom,
                    'prenom'   => $request->prenom,
                    'date'     => date("d-m-Y", strtotime($request->date)),
                    'heure'    => $request->time,
                    'service'  => $request->service,
        ];
        Mail::to($request->email)->send(new AppointmentMail($data));
        return $request->time;
    }

    public function destroy($id){
        Appointment::destroy([$id]);
    }

    public function checkDateTime($date,$time){
        $times = json_decode(Appointment::where('date','=',$date)->get('time'));
        $array = ['09:00','10:00','11:00','12:00','15:00','16:00','17:00'];
        $data = [];
        $verifyTime = $time;
        for($i=0; $i<count($times); $i++){
            array_push($data,$times[$i]->time);
        }
        if(in_array($time,$data) == true){
            for($i=0; $i<count($array); $i++){
                if($array[$i] <= Date('H:i') && $date === Date('Y-m-d') && $array[$i] <= $time){
                    unset($array[$i]);
                }
            }
            if(count($array) <= 3){
                $verifyTime = 0;
            }
            else{
                $verifyTime = $array[array_rand($array)];
                while($verifyTime == $time){
                    $verifyTime = $array[array_rand($array)];
                }
            }
        }
        return $verifyTime;
    }

    public function search($date){
        return Appointment::where('date', '=', $date)->get(['id','date','time']);
    }
}












        /*$timeDate = Appointment::where('date','=',$date)->get('time');
        $allTimes = json_decode(Appointment::get('time'));
                for($j=0; $j<count($timeDate); $j++){
                    if($time === $timeDate[$j]->time){
                        $modifier = strtotime($timeDate[$j]->time);
                        $verifyTime = date('H:s', strtotime('+1 hour',$modifier));
                        if($verifyTime === "13:00"){
                            $verifyTime = strtotime($verifyTime); 
                            $verifyTime = date('H:s', strtotime('+2 hours',$verifyTime));
                        }
                        return $verifyTime;
                    }
                }*/
