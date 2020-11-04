<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use Auth;
use DB;
use Storage;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('teacher')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'due_to' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);
        
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('assignment_files', $fileName);

        Assignment::create([
            'due_to' => $request['due_to'],
            'description' => $request['description'],
            'filename' => $fileName,
        ]);

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $filepath = "file://" . Storage::path($assignment->filename);
        $filename = $assignment->filename;
        $submissions = DB::select('SELECT * FROM submissions INNER JOIN users ON submissions.student_id=users.id WHERE assignment_id = ?', [$assignment->id]);

        return view('assignments.show',compact('assignment', 'filepath', 'filename', 'submissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();
        return redirect('/assignment')->with('success', 'user deleted!');
    }

    public function download(string $filename)
    {
        if(Storage::exists('assignment_files/'.$filename))
        { 
            return Storage::download('assignment_files/'.$filename);
        }
        else
        {
            return redirect()->back()

                        ->with('success', 'Something went wrong, please try again');
        }
    }
}
