<?php namespace App\Http\Controllers;

use App\LectureInCharge;
use Illuminate\Http\Requests;
use App\Http\Requests\AddMod;
use App\FreeSlots;
use App\Modules;
use App\PanelMember;
use App\PresentationPanel;
use App\Project;
use App\Student;
use Crypt;
use Validator, Input, Redirect, Hash, Mail, URL, Response;

class LICController extends Controller{
    
    public function view()
    {
        return view('LIC')->with('message', '');
    }
    
     public function update()
    {
        return view('updateLIC')->with('message', '');
    }
    public function registerLectureInCharge()
    {

        $inputs = Input::all();
        $licName = $inputs['lectureInCharge_fullName'];
        $licContactNumber = $inputs['lectureInCharge_contactNumber'];
        $licEmail = $inputs['lectureInCharge_email'];
        $licSpeciality = $inputs['lectureInCharge_speciality'];


        $validator = Validator::make($inputs, [
            'lectureInCharge_fullName' => 'required',
            'lectureInCharge_contactNumber' => 'required|numeric',
            'lectureInCharge_speciality' => 'required',
            'lectureInCharge_email' => 'required|email',
        ]);

        if(!$validator->fails()){

            LectureInCharge::create([
                'lectureInCharge_fullName' => $licName,
                'lectureInCharge_contactNumber' => $licContactNumber,
                'lectureInCharge_email' => $licEmail,
                'lectureInCharge_speciality' => $licSpeciality

            ]);

            return Redirect::back()
                ->with('message_success', 'Lecture In Charge submitted successfully!!');

        }else{
            return Redirect::back()
                ->with('message_error', 'Please check inputs!!');
        }


    }
}