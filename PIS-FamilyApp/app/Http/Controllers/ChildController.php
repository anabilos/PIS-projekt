<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Child;
use Illuminate\Support\Facades\Session;

class ChildController extends Controller
{
    public function index(){
        $id=Auth::id();
        $children=Child::where('user_id',"=", $id)->get();
        return view('parent.children.index')->with('children',$children);
    }
    public function edit($id)
    {
        $child = Child::find($id);

        return view('parent.children.edit')->withChild($child);
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
        // Validate The Data
       $this->validate($request, [
            'firstName' => 'required|string|max:255|min:2',
            'lastName' => 'required|string|max:255|min:2',
            'education' => 'required|string|max:10000|min:5',
            'age' => 'required|integer|min:1',
            
        ]);

        $child= Child::find($id);
        $child->firstName = $request->firstName;
        $child->lastName = $request->lastName;
        $child->education = $request->education;
        $child->age = $request->age;

       
        $child->save();

        // Flash Session Message with Success
        Session::flash('success', 'Child saved successfully');

        // Return A Redirect
        return redirect()->route('child.index');
    }

    public function store(Request $request)
    {
        // Validate The Data
        $this->validate($request, [
            'firstName' => 'required|string|max:255|min:2',
            'lastName' => 'required|string|max:255|min:2',
            'education' => 'required|string|max:10000|min:5',
            'age' => 'required|integer|min:1',
            
        ]);

        // Create a New task
        $child = new Child;
        
        // Assign the Task data from our request
        $child->firstName = $request->firstName;
        $child->lastName = $request->lastName;
        $child->education = $request->education;
        $child->age = $request->age;
        $child->user_id = Auth::id();

        // Save the task
        $child->save();

        // Flash Session Message with Success
        Session::flash('success', 'Child created successfully');

        // Return A Redirect
        return redirect()->route('child.index');
    }
    public function create()
    {
        return view('parent.children.create');
    }
    public function destroy(Request $request, $id){
        $child=Child::findOrFail($id);
        $child->delete();
        
        return redirect()->route('child.index')->with('success','Child deleted successfully!');
    }
    
}
