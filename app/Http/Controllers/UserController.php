<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        if(isset($search)){
            $data['appointments'] = Appointment::where('name', 'like', '%'.$search.'%')->paginate(2) ;
            return view('pages.home',$data);
        }
        else{
            $data['appointments'] = Appointment::orderBy('name','desc')->paginate(2);
            return view('pages.home',$data);
        }
    }

    public function registration()
    {
        return view("pages.registration");
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'department_id' => 'required|max:10',
            'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'fee' => 'required',
        ]);

        //dd($validate);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $insert = new Doctor();
        $insert->name = $request->name;
        $insert->department_id = $request->department_id;
        $insert->phone = $request->phone;
        $insert->fee = $request->fee;
        $insert->save();
        return back()->with('success', 'Doctor Registered successfully!');
    }

    public function store()
    {
        //
    }

    public function show(Request $request)
    {
        $search = $request->input('search');
        if(isset($search)){
            $data['doctors'] = Doctor::where('name', 'like', '%'.$search.'%')->paginate(2) ;
            return view('pages.doctor',$data);
        }
        else{
            $data['doctors'] = Doctor::orderBy('name','desc')->paginate(2);
            return view('pages.doctor',$data);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'department_id' => 'required|max:10',
            'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'fee' => 'required',
        ]);

        //dd($validate);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $update = Doctor::find($request->id);
        $update->name = $request->name;
        $update->department_id = $request->department_id;
        $update->phone = $request->phone;
        $update->fee = $request->fee;
        $update->save();
        return back()->with('success', 'Doctor Updated successfully!');
    }

    public function destroy($id)
    {
        Doctor::find($id)->delete();
        return back()->with('warning', 'Data deleted successfully!');
    }
}
