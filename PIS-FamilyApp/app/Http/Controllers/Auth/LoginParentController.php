<?php


namespace App\Http\Controllers\Auth;
use App\User; 
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginParentController extends Controller
{
    use AuthenticatesUsers;
public function dologin(Request $request){
  

   
    if (Hash::check($request->parent_password, Auth::user()->parent_password)) {
        
        return redirect()->intended('child');
     }
   
    
        return redirect('parentpassword')->with('alert', 'Neispravna lozinka, pokušajte ponovno!');;

    

  }
 }