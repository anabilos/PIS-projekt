<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ChildrenController extends Controller
{
    public function index(){
        $id=Auth::id();
        $children=Child::where('user_id',"=", $id)->with(array('tasks' => function($query) {
            $query->where('finished_at', '=', NULL);
        }))->get();
        
        return view('children.tasks.index',compact('children'));  

    }
    public function show($id){

        
        if (request()->row == 'today') {
            $tasks=Task::where('child_id',$id)->where('finished_at',NULL)->where('due_date',Carbon::now()->toDateString())->paginate(5);
            
        }
      
        else{
            $tasks=Task::where('child_id',$id)->where('finished_at',NULL)->paginate(5);

        }  
        
        return view('children.tasks.child')->with([
            
            'tasks'=> $tasks,
            'id' => $id,
        ]);
            
    
      }
      public function update(Request $request, $id)
    {  
        
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
     
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
       
        $task = Task::find($id);
        $task->picture=$imageName;
        $child_id=$task->child_id;
        
        $task->save();
            $tasks=Task::where('finished_at',NULL)->where('child_id',$child_id);
       

        Session::flash('success', 'Image added for task '.$task->name);
        return redirect()->route('tasks.show', ['id' => $child_id]);
     
        
    }
    public function edit($id)
    {
        $task = Task::find($id);
        return view('children.tasks.edit')->with('task',$task,);

     }
     public function finished($id){
        $task=Task::find($id);
         if($task->picture==NULL){
           
            Session::flash('success', 'Task ' .$task->name.' is not finished picture missing!!');

         }
         else{
            $task->finished_at= Carbon::now();
            $task->save();
            Session::flash('success', 'Task ' .$task->name.' finished successfully!!');
         }

         return redirect()->back();
         
       

     }
}

