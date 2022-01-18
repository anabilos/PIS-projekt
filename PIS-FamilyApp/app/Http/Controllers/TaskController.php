<?php

namespace App\Http\Controllers;
use App\Models\Child;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
      public function index(Request $request){

           $type=request()->type ;
          
             $comp=0;
             $id=Auth::id();
            $edit=0;
            if(request()->type!=NULL){
                $edit=1;
            }
             if (request()->row == 'active_nonperiodic') {
                 $tasks =Task::where('user_id',"=", $id)->where('periodic_nonperiodic',"=", 0)->orderBy('due_date', 'desc')->where('finished_at',NULL)->paginate(5);
                    $type='nonperiodic';
                }
             else if(request()->row == 'completed_periodic'){
                 $tasks =Task::where('user_id',"=", $id)->where('periodic_nonperiodic',"=", 1)->orderBy('due_date', 'desc')->where('finished_at','!=',NULL)->paginate(5);
                 $comp=1;
                
                 $type='periodic';
             }
             else if(request()->row == 'completed_nonperiodic'){
                $tasks =Task::where('user_id',"=", $id)->where('periodic_nonperiodic',"=", 0)->orderBy('due_date', 'desc')->where('finished_at','!=',NULL)->paginate(5);
                $comp=1;
                $type='nonperiodic';
    
             }
             else if(request()->row == 'active_periodic'){
                $tasks =Task::where('user_id',"=", $id)->where('periodic_nonperiodic',"=", 1)->orderBy('due_date', 'desc')->where('finished_at',NULL)->paginate(5);
                $type='periodic';
             }
             else if(request()->type == 'periodic'){
                $tasks =Task::where('user_id',"=", $id)->where('periodic_nonperiodic',"=", 1)->orderBy('due_date', 'desc')->paginate(5);
                $type='periodic';
             }
             else if(request()->type == 'nonperiodic'){
                $tasks =Task::where('user_id',"=", $id)->where('periodic_nonperiodic',"=", 0)->orderBy('due_date', 'desc')->paginate(5);
                $type='nonperiodic';
             }
             
             
                 return view('parent.tasks.index')->with([
                     'tasks' => $tasks,
                     'comp' => $comp,
                     'type' => $type,
                     'edit' => $edit,
                     
                 ]);
        
            
          
            
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user=Auth::user();
      
        return view('parent.tasks.create')->with([
            'user'=>$user,
            'type'=>request()->type,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $date=Carbon::now()->format('d-m-Y');
    
        // Validate The Data
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date|after_or_equal:'.$date,
            
            
        ],[
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
            'due_date.required' => 'Due Date required',
            
            
        ]
    
    
    );
        if(request()->type=='nonperiodic'){
            $type=0;
        }
        else{
            $type=1;
        }

        // Create a New task
        $task = new Task;

        // Assign the Task data from our request
        $id=Auth::id();
        $user=Auth::user();
        $task->periodic_nonperiodic = $type;
        $task->name = $request->name;
        $task->finished_at = NULL;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->user_id = $id;
        $task->child_id=$request->child;
       

        // Save the task
        $task->save();

        // Flash Session Message with Success
        Session::flash('success', 'Created Task Successfully');

        // Return A Redirect
        
        if($type==0){
            return redirect()->route('task.index', ['type' => 'nonperiodic'])->with('success','Task created successfully!');
                
         }
        else{ 
            return redirect()->route('task.index', ['type' => 'periodic'])->with('success','Task created successfully!');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       

         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id,$type)
    {
        $task = Task::find($id);
        $user=Auth::user();
        $task->dueDateFormatting = false;

        return view('parent.tasks.edit')->with([ 
            
            'type'=>$type,
            'task'=> $task,
            'user'=>$user,
            
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        if(request()->type=='nonperiodic'){
            $type=0;
        }
        else{
            $type=1;
        }
        $date=Carbon::now()->format('d-m-Y');
        // Validate The Data
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date|after_or_equal:'.$date,
           
        ]);

        // Find the related task
        $task = Task::find($id);
        $id=Auth::id();
        $user=Auth::user();
        
        
        // Assign the Task data from our request
        $task->periodic_nonperiodic = $type;
        $task->name = $request->name;
        $task->finished_at = NULL;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->user_id = $id;
        $task->child_id=$request->child;
           
        // Save the task
        $task->save();
            
        // Flash Session Message with Success
        Session::flash('success', 'Saved The Task Successfully');

        // Return A Redirect
        if($type==0){
            return redirect()->route('task.index', ['type' => 'nonperiodic'])->with('success','Task updated successfully!');
                
         }
        else{ 
            return redirect()->route('task.index', ['type' => 'periodic'])->with('success','Task updated successfully!');
         }
    }
    public function repeat( $id)
    {
   
     

        // Find the related task
        $task = Task::find($id);

        // Assign the Task data from our request
        $task->picture = NULL;
        $task->finished_at = NULL;
     

        // Save the task
        $task->save();

        // Flash Session Message with Success
        Session::flash('success', 'Task '.$task->name.' successfully set to uncompleted');

        // Return A Redirect
        return redirect()->back();
    }
    public function refreshp( Request $request,$id)
    {
      
        $this->validate($request, [
            'periodic_days' => 'required|integer',
        
           
        ]);
          
        // Find the related task
        $task = Task::find($id);

        // Assign the Task data from our request
        $task->picture = NULL;
        $task->finished_at = NULL;
        $task->due_date = Carbon::parse($task->due_date)->addDays($request->periodic_days);
     

        // Save the task
        $task->save();

        // Flash Session Message with Success
        Session::flash('success', 'Task '.$task->name.' successfully set again');

        return redirect()->route('task.index', ['type' => 'periodic']);
       
    }
    public function refresh( $id)
    {
        $task = Task::find($id);
        return view('parent.tasks.periodic')->with('task',$task,);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){
        
        $task=Task::findOrFail($id);
        $task->delete();
        Session::flash('success', 'Task '.$task->name.' deleted successfully');
        return redirect()->back();
       /* if($type='nonperiodic'){
            return redirect()->route('task.index', ['type' => 'nonperiodic'])->with('success','Task deleted successfully!');
                
         }
        else{ 
            return redirect()->route('task.index', ['type' => 'periodic'])->with('success','Task deleted successfully!');
         }*/
    }
}