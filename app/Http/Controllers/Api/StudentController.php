<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function index(){

        $students = Student::all();

        if($students->count() <= 0){
            $data = [
                'status'   => 404,
                'students' => "No records found",
            ];

        }else{
            $data = [
                'status'   => 200,
                'students' => $students,
            ];
        }

        return response()->json($data,$data["status"]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:19',
            'course' => 'required|string|max:19',
            'email' => 'required|string|max:19',
            'phone' => 'required|digits:11',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'error' => $validator->messages()

            ],422);

        }else{

            $student = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,

            ]);

            if($student){
                return response()->json([
                    'status' => 200,
                    'message' => 'Student created successfully'
                ],200);
            }else{
                return response()->json([
                    'status'  => 500,
                    'message' => 'Something went wrong',
                ], 500);

            }

        }

    }

    public function show($id){

        $student = Student::find($id);

        if($student){
            $data = [
                'status'   => 200,
                'student' => $student,
            ];
        }else{
           $data = [
                'status'   => 404,
                'students' => "No Such Student found",
            ];
        }
        return response()->json($data,$data["status"]);
    }

    public function edit($id){

        $student = Student::find($id);

        if($student){
            $data = [
                'status'   => 200,
                'student' => $student,
            ];
        }else{
           $data = [
                'status'   => 404,
                'students' => "No Such Student found",
            ];
        }
        return response()->json($data,$data["status"]);
    }

    public function update(Request $request, int $id){


        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:19',
            'course' => 'required|string|max:19',
            'email' => 'required|string|max:19',
            'phone' => 'required|digits:11',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'error' => $validator->messages()

            ],422);

        }else{
            $student = Student::find($id);
            

            if($student){
                $student->update([
                    'name'   => $request->name,
                    'course' => $request->course,
                    'email'  => $request->email,
                    'phone'  => $request->phone,

                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Student updated successfully'
                ],200);
            }else{
                return response()->json([
                    'status'  => 404,
                    'message' => 'No Such Student found',
                ], 404);

            }

        }



    }


    public function delete($id){

        $student = Student::find($id);

        if($student){
            $student->delete();
            $data = [
                'status'   => 200,
                'student' => "Student deleted successfully",
            ];
        }else{
           $data = [
                'status'   => 404,
                'students' => "No Such Student found",
            ];
        }
        return response()->json($data,$data["status"]);
    }
}

