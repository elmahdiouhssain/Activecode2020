<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use App\Activation;
use App\User;
use Sessions;


class IndexController extends Controller {

   	public function insert() {
	    //return view('stud_create');
	    return view('seller.newseller');

   }
	
   	public function create(Request $request){
   		// Form validation
      	$this->validate($request, [
          'fullname' => 'required|min:2|max:15',
          'email' => 'email|unique:users|max:255',
          'password' => 'confirmed|min:8',
          //'inputstate' => 'required',
          'comment' => 'required',
       ]);

	      $seller = new User();
	      $seller->fullname = $request->input('fullname');
          $seller->email = $request->input('email');
          $seller->password = Hash::make($request->input('password'));
          $seller->inputstate = $request->input('inputstate');
          $seller->comment = $request->input('comment');

          $seller->save();

		return redirect()->action('IndexController@create')->with('success', 'Your request is under review w ll contact you soon !.');
   		
  
    }

   
}
