<?php
namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\activation;
use App\User;
use App\Ticket;
use App\ApiSetting;


class DashboardController extends Controller{

  public function __construct(){

    $this->middleware('auth');

  }

 
  public function index(){
    //$user = Auth::user()->id;

    $act = User::withCount('activations')->where("id",\Auth::user()->id)->first();
    $ticket = User::withCount('tickets')->where("id",\Auth::user()->id)->first();

    /////isactive code////
    $actives = User::withCount(['activations as isactive' => function ($query) {$query->where('is_active', 1);}])->where("id",\Auth::user()->id)->first();
    $inactives = User::withCount(['activations as inactive' => function ($query) {$query->where('is_active', 0);}])->where("id",\Auth::user()->id)->first();

    return view('seller.index', compact('act','ticket','actives','inactives'));

  }


  public function getCodesByReseller($id){

    $user = Auth::user()->id;
    $activations = User::find($user)->activations;

    //$pdo = DB::getQueryLog();
    //$query = "SELECT * FROM activations WHERE id = $id";
    //$result = mysqli_query($pdo, $query);
    //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //return $activations;
    return view('seller.lines',['activations'=>$activations,'id'=>$user]);

  }

   // Store user actiation data
  public function CreateFormApi(Request $request){

    $user = Auth::user();
    //$package = DB::select('select * from packages');
    $packages = DB::table('packages')->get();

   return view('seller.newline',['packages'=>$packages]);
  }


  public function SendFormApi (Request $request){
    // Form validation
      $this->validate($request, [
          'nbr' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:2',
          'mySelect' => 'required',
       ]);
      $nombre=$request->input('nbr');
      if(isset($nombre) && !empty($nombre)){

      
      $put_result=array();
      for ($i=1; $i <=intval($nombre) ; $i++) { 

      $user = Auth::user()->id;
      $res = User::find($user);
      $getdata = DB::select('select * from api_settings where id='.$user);
      $key = $getdata[0]->key;
      $urlt = $getdata[0]->url;
      $updated = $getdata[0]->updated_at;
      $apiEndpoint = "$urlt/reseller/reseller_api.php"; 
      $opUrl = $apiEndpoint;
      $url = $opUrl;
      $data = array("api_key"=>$key,"action"=>"usercreate",'username'=>'ANYUSERNAME','password'=>'ANYPASSWORD','trial'=>'1','reseller_notes'=>'ANY RESELLER NOTE','package'=>$request->mySelect);
      $postdata = $data;
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query ($postdata));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      $jsonrez = json_decode($result, true);

      $put_result[]=$jsonrez;
      }
      }else{}
      $datasending=array();
      curl_close($ch);
      $number_of_try=0;
        foreach ($put_result as $insterdata) {
        if ($insterdata['result'] == 'error'){
          
          $number_of_try+=1;
          if($number_of_try==$nombre){
            $datasending=array();
          }else
          {}

        }else{
          $usr =  $insterdata['username'];
          $pss =  $insterdata['password'];
          $msg = $insterdata['message'];
          $act = new activation();
          $act->username = $usr;
          $act->password = $pss;
          $act->package = $request->mySelect;
          $act->m3u = "http://magico.com:8000/mpeg/ssdfsdfsdf65sdfsdf";
          $act->active_code = "999988877744";
          $act->is_active = True;
          $res->activations()->save($act);
          $array_sending=array();
          $array_sending=array($usr,$pss,$msg);
          $datasending[]=$array_sending;
        }
        
      }  
     
      return view('/seller.mylines',['datasending'=>$datasending,'nombre'=>$nombre])->with('success', 'Your Operation has been completed successfuly.');

      }



  public function Profile(){

      return view('seller.profile');
  }

  public function disableActivation(Request $request, $id){

    //$act = DB::table('activations')->find($id);
    $activation = Activation::where('id', $id)->firstOrFail();

    $user = Auth::user()->id;
    $getdata = DB::select('select * from api_settings where id='.$user);
    $key = $getdata[0]->key;
    $urlt = $getdata[0]->url;
    $updated = $getdata[0]->updated_at;
    $apiEndpoint = "$urlt/reseller/reseller_api.php"; 

    $opUrl = $apiEndpoint;
    $url = $opUrl;
    $data = array("api_key"=>$key, 'action'=>'userdisable','producttype'=>'streamlineonly','username'=>'$act->username','reseller_notes'=>'ANY RESELLER NOTE');
    $postdata = $data;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query ($postdata));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    $jsonrez = json_decode($result, true);

    $result = $jsonrez["result"];
    $msg = $jsonrez["message"];

    $err = curl_error($ch);
    curl_close($ch);

    $activation->is_active = '0';
    $activation->save();

    return back()->with('success','$msg.');

  }


  public function Tickets(){
        //return $activations;
      return view('seller.tickets');

  }

  public function ErrorConnection(){
        //return $activations;
      return view('seller.error');

  }


  public function EditProfile(Request $request){

    $user = Auth::user();
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $validator = Validator::make($request->all(), [
            'email' => 'email|unique:users|max:255',
            'password' => 'confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                        ->withErrors($validator)
                        ->withInput();
        }

    $user->save();
    //dd('all work fine :');
    return back()->with('success','Your information has been updated successfuly ;) .');

  }



  public function Api(Request $request){

    $user = Auth::user()->id;
    $getdata = DB::select('select * from api_settings where id='.$user);
    $key = $getdata[0]->key;
    $urlt = $getdata[0]->url;
    $updated = $getdata[0]->updated_at;
    $apiEndpoint = "$urlt/reseller/reseller_api.php"; 

    $opUrl = $apiEndpoint;
    $url = $opUrl;
    $data = array("api_key" => $key,"action" =>'getresellerinfo');
    $postdata = $data;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query ($postdata));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $result = curl_exec($ch);


    $jsonrez = json_decode($result, true);
    $username =  $jsonrez["username"];
    $credits = $jsonrez["credits"];
    $result = $jsonrez["result"];

    $err = curl_error($ch);
    curl_close($ch);

    return view('seller.api_setting',['username'=>$username, 'updated'=>$updated, 'key'=>$key,'urlt'=>$urlt, 'credits'=>$credits, 'result'=>$result, 'err'=>$err]);
    }


}