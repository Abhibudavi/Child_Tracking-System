<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;

class Student_controller extends Controller
{
    public function add_student(Request $request)
    {
    	//dd($request->all());
        $this->validate($request, [
                'sid' => 'required|unique:students',
                
            ]);
    	$res=DB::table('students')->insert([
            'sid' =>$request->sid,
    		'name' => $request->name,
    		'std'=>$request->standard,
    		'division'=>$request->division,
    		'roll_no'=>$request->roll_no,
    		'mob_no'=>$request->mobile_no,
    		

    		]);
    	if($res){
    		$request->session()->flash('status', 'Student Added Succesfully!!');
    		return redirect()->back();
    	}
    }

    public function view_students()
    {
    	$students=DB::table('students')->get();
    	return view('view_students',compact('students'));
    }

    public function delete_student($student_name,$student_id,Request $request)
    {
    	$res=DB::table('students')->where('sid',$student_id)->delete();
    	if($res){
    		$request->session()->flash('status', "$student_name deleted Succesfully!!");
    		return redirect()->back();
    	}
    }
}
