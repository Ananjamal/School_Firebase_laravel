<?php
namespace App\Http\Controllers\Firebase\Admin;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Jobs\SendEmailToAllJob;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentNotificationMail;
use Kreait\Firebase\Contract\Database;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllStudents(Request $request)
    {
        $perPageClasses = 1;
        $classes = range(1, 1000);

        $page = Paginator::resolveCurrentPage();
        $currentPageClasses = array_slice($classes, ($page - 1) * $perPageClasses, $perPageClasses);

        $paginatedClasses = new LengthAwarePaginator(
            $currentPageClasses,
            count($classes),
            $perPageClasses,
            $page,
            ['path' => Paginator::resolveCurrentPath()]
        );

        $allStudents = [];

        foreach ($paginatedClasses as $class) {
            $students = $this->database->getReference('class_' . $class)->getValue();

            if ($students) {
                $classData = [];

                foreach ($students as $id => $student) {
                    $classData[] = [
                        'id' => $id,
                        'name' => $student['name'],
                        'email' => $student['email'],
                        'phone' => $student['phone'],
                    ];
                }

                $allStudents['class_' . $class] = $classData;
            } else {
                $allStudents['class_' . $class] = 'Class not found';
            }
        }

        return view('firebase.students.index', compact('allStudents', 'paginatedClasses'));
    }

    public function sendEmailToAll()
    {
        $classes = $this->database->getReference()->getChildKeys();
        dispatch(new SendEmailToAllJob($classes));

        return redirect()->route('students.index')->with('success', 'Emails are being sent to all students!');
    }




    // Send email to a single student
    public function sendEmailToStudent(Request $request)
    {

// dd($request->class_id , $request->student_id);
        // Fetch the student from the database
        $student = $this->database->getReference( $request->class_id . '/' . $request->student_id)->getValue();
        // $student = $this->database->getReference('class_1/student_5')->getValue();
        // dd($student);
        if (!$student) {
            dd('asd');

            return response()->json(['message' => 'Student not found!'], 404);
        }

        // Prepare email details
        $emailDetails = [
            'email' => $student['email'],
            'subject' => 'Personal Notification',
            'title' => 'Dear ' . $student['name'],
            'message' => $request->message,
        ];

        SendEmailJob::dispatch($emailDetails);
        return redirect()->route('students.index')->with('success', 'Email is being sent to the student  ' .$emailDetails['email'] );

        // return response()->json(['message' => 'Email is being sent to the student!']);
    }
}
