<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskListController extends Controller
{
    protected $tasklist;
    public function __construct(){
        $this->tasklist = new TaskList();
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return 
        $taskli = $this->tasklist->all();
        if($taskli) {

            return response()->json([
                    'status' => 200,
                    'tasks' => $taskli
                ], 200);
        }else{
                return response()->json([
                    'status' => 500,
                    'message'=> "Something Went Wrong!"
                ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'title'=> 'required|string|max:100',
            'description'=>'required',
            'due_date'=>'required'
            // 'status'=>'required|digits:1',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $task = TaskList::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'due_date'=> $request->due_date,
                'status'=> 1, 
            ]);
            if($task) {
                return response()->json([
                    'status' => 200,
                    'message' => "Task Created Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message'=> "Something Went Wrong!"
                ], 500);
            }
        }
        // return $this->tasklist->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $taskli = $this->tasklist->find($id); 
        if($taskli) {

            return response()->json([
                    'status' => 200,
                    'task' => $taskli
                ], 200);
        }else{
                return response()->json([
                    'status' => 500,
                    'message'=> "Something Went Wrong!"
                ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'title'=> 'required|string|max:100',
            'description'=>'required',
            'due_date'=>'required'
            // 'status'=>'required|digits:1',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $record = $this->tasklist->find($id);
            if($record) {
                $record->update($request->all());
                return response()->json([
                    'status' => 200,
                    'message'=> "Successfully Updated!"
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message'=> "Something Went Wrong!"
                ], 500);
            }
        }
        // return $record;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $record = $this->tasklist->find($id);
        if($record){
            $record->delete();
            return response()->json([
                        'status' => 200,
                        'message' => "Successfully Deleted"
                    ], 200);
        }else{
            return response()->json([
                'status' => 500,
                'message'=> "Something Went Wrong!"
            ], 500);
        }
    }
}
