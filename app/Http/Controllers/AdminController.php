<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Appointment;

class AdminController extends Controller
{
    public function add_doctor()
    {
        return view('admin.add_doctor');
    }


    // public function upload_doctor(Request $request)
    // {
    //     $doctor = new doctor();
    //     $image = $request->file;
    //     $imagename = time() . '.' . $image->getClientOriginalExtension();
    //     $request->file->move('storage', $imagename);

    //     $doctor->image = $imagename;

    //     $doctor->name = $request->name;
    //     $doctor->phone = $request->phone;
    //     $doctor->room = $request->room;
    //     $doctor->speciality = $request->speciality;

    //     $doctor->save();

    //     return redirect()->back();
    // }


    public function upload_doctor(Request $request)
    {
        $doctor = new doctor;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('doctor', $imagename);
        $doctor->image = $imagename;
        $doctor->save();

        return redirect()->back()->with('message', ' Doctor Added Successfully');
    }

    public function showappointment()
    {
        $data = appointment::all();
        return view('admin.showappointment', compact('data'));
    }
}
