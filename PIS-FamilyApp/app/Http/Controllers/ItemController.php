<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index(){
        $id=Auth::id();
        $groceries=Item::where('user_id',"=", $id)->get();
        if (request()->sort == 'high_low') {
            $groceries =Item::where('user_id',"=", $id)->orderBy('name', 'desc')->paginate(5);
        }
        else{
            $groceries = Item::where('user_id',"=", $id)->paginate(5);
        }
        return view('parent.groceries.index')->with('groceries',$groceries);
    }
    public function edit($id)
    {
        $item = Item::find($id);

        return view('parent.groceries.edit')->withItem($item);
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
            'name' => 'required|string|max:255|min:3',
            'quantity' => 'required|string|max:255|min:3',
            
        ]);

        $item= Item::find($id);
        $item->name = $request->name;
        $item->quantity = $request->quantity;

       
        $item->save();

        // Flash Session Message with Success
        Session::flash('success', 'Item saved successfully');

        // Return A Redirect
        return redirect()->route('item.index');
    }
    public function store(Request $request)
    {
        // Validate The Data
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'quantity' => 'required|string|max:255|min:3',
            
        ]);

        // Create a New task
        $item = new Item;
        
        // Assign the Task data from our request
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->user_id = Auth::id();

        // Save the task
        $item->save();

        // Flash Session Message with Success
        Session::flash('success', 'Item created successfully');

        // Return A Redirect
        return redirect()->route('item.index');
    }
    public function create()
    {
        return view('parent.groceries.create');
    }

    public function destroy(Request $request, $id){
        $item=Item::findOrFail($id);
        $item->delete();
        
        return redirect()->route('item.index')->with('success','Item deleted successfully!');
    }
}
