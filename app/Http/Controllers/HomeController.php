<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $user = Auth::user()->usertype;
        // dd($tes);
        if ($user == '1') {
            return view('admin.home');
        } else {
            $doctor = doctor::all();
            return view('pages.home', compact('doctor'));
        }
    }

    // script ini berfungsi agar data yang di input oleh user pada bagian appointment
    // di  halaman pages-home admin bisa terkirim ke db-appointment

    public function appointment(Request $request)
    {
        $appointment = new appointment;
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';
        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();
        return redirect()->back()->with('message', 'Appointment Request Successful . We Will Contact with you soon');
    }

    public function myappointment()
    {
        if (Auth::id()) {

            $userid = Auth::user()->id;
            $appoint = appointment::where('user_id', $userid)->get();
            return view('pages.myappointment', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
