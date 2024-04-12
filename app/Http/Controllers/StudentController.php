<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\confirm;

class StudentController extends Controller
{
    public function login()
    {
        return view('Auth.login');

    }

    public function register()
    {
        return view('Auth.registration');
    }


    public function student_display()
{
    $students = Student::paginate(5);
    return view('student.student_dtl', ['data' => $students]);
}

    public function student_add(){
        return view('student.student_add');
    }

    public function student_store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6',
            'student_mobile_no' => 'required|string|size:10',
            'student_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'student_address' => 'required|string|max:255',
        ]);

        $imageName = time().'.'.$request->student_image->extension();
        $request->student_image->move(public_path('images'), $imageName);
        $student = new Student;
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_mobile_no = $request->student_mobile_no;
        $student->student_address = $request->student_address;
        $student->student_image = $imageName;
        $student->password = Hash::make($request->password);

        $student->save();

        return redirect()->route('student')->with('added', 'student record added successfully');
    }


    public function student_edit($id){

        $student=Student::where('id',$id)->first();

       return view('student.student_edit',['user'=>$student]);
    }

    public function student_update(Request $request,$id){

        $request->validate([
            'student_name' => 'nullable|string|max:255',
            'student_email' => 'nullable|string|email|max:255',
            'password' => 'nullable|string|min:6',
            'student_mobile_no' => 'nullable|numeric|digits:10',
            'student_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'student_address' => 'nullable|string|max:255',

        ]);
        $student =Student::where('id',$id)->first();

    if(isset($request->student_image)){
        $imageName=time().'.'.$request->student_image->extension();
        $request->student_image->move(public_path('images'), $imageName);
        $student->image = $imageName;
    }

    if(isset($request->student_name)){
        $student->student_name= $request->student_name;
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }

    if(isset($request->student_email)){
        $student->student_email= $request->student_email;
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }

    if(isset($request->student_name)){
        $student->student_name= $request->student_name;
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }

    if(isset($request->student_mobile_no)){
        $student->student_mobile_no= $request->student_mobile_no;
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }

    if(isset($request->student_address)){
        $student->student_address= $request->student_address;
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }

    if(isset($request->student_mobile_no)){
        $student->student_mobile_no= $request->student_mobile_no;
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }

    if(isset($request->password)){
        $student->password  = Hash::make($request->password);
        $student->save();
        return redirect()->route('student')->with('updated', 'student record updated successfully');
    }
        $student->save();

        return redirect()->route('student')->with('updated', 'student record updated successfully');

    }

    public function student_delete($id)
    {
        $student = Student::find($id); // Find the student by ID
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        $student->delete();
        return redirect()->route('student')->with('delsuccess', 'Student deleted successfully');
    }

    public function student_view($id){
        $users=DB::table('students')->where('id',$id)->get();
        return view('student.student_view',['data' => $users]);
    }
    public function student_all_delete(){
        Student::truncate();
        return redirect()->route('student')->with('success', 'All student records deleted successfully');

    }


}
