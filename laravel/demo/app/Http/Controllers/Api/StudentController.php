<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Error;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::orderBy('id', 'desc')->get();
        // dd($students);
        return $students;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requestedData = $request->validate([
            // validation
            'name' => 'required|unique:students,name|min:3',
            'image' => 'unique:students,image',
            'email' => 'required|unique:students,email',
            'address' => 'required',
            'phone' => 'required|unique:students,phone|min:11',
            'gender' => 'required',
        ], [
            // message
            'name.required' => 'student name is required',
            'name.min' => 'student name must be more than three characters',
            'email.required' => 'student email is required',
            'email.unique' => 'student email is unique',
            'phone.min' => 'student phone must be 11 numbers',
        ]);
        $requestedData = request()->all();
        $student = new Student();
        $student = Student::create($requestedData);
        $student->save();
        return $student;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return $student;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $requestedData = $request->all();
        $student->update($requestedData);
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //

        if($student)
        {
     $student->delete();
            return "Student Deleted Successfully";
        }else{
              return "student Not Found";
        }

    }
}
