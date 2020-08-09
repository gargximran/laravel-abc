<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\MSG;
use DB;
class AdminController extends Controller
{
    public function index(){
        $customers = DB::table('customers')->count();
        $products = DB::table('products')->count();
        $totalamountorder=Order::where('orderStatus','confirm')->sum('orderTotal');
        $orderRequest=Order::where('orderStatus','pendding')->count();
        $unseen=MSG::where('status','pendding')->count();
        $totalmsg=MSG::count();
        $lastedorderRequest=DB::table('orders')
      ->join('shippings','orders.shippingId','=','shippings.id') 
      ->where('orders.orderStatus','pending')   
      ->select('orders.*','shippings.name','shippings.phone','shippings.address','shippings.note')
      ->get();
    	return view('admin.home.main',['totalCustomer'=>$customers,'totalmsg'=>$totalmsg,'unseen'=>$unseen,'products'=>$products,'totalamountorder'=>$totalamountorder,'orderRequest'=>$orderRequest,'lastedorderRequest'=>$lastedorderRequest]);
    }
    public function user(){
    	return view('admin.user.newuser');
    }
     public function userlist(){
         $allUser=User::all();
    	return view('admin.user.userlist',['allUser'=>$allUser]);
    }
    public function addUser(Request $request){
    		$user=new User;
    		$images = $request->file('image');
    		$user->name=$request->name;
    		$user->email=$request->email;
    		$user->address=$request->address;
    		$user->phone=$request->phone;
    		$user->status=$request->status;
    				if($images){
	            $orginalname=$images->getClientOriginalName();
	            $str=str_replace(' ','-', $orginalname);
	            $name=time().'_'.$str;
	            $images->move(public_path('images'), $name);                     
	            $imageUrl =$name;
	            $user->images=$imageUrl;

	        }
    		$user->user_type=$request->user_type;
    		$user->per_edit=$request->per_edit;
    		$user->per_delete=$request->per_delete;
    		$user->password=bcrypt($request->password);
    		$user->save();
    		return back();
    }
    public function edit($id){
    	$user=User::where('id',$id)->first();
    	return view('admin.user.editProfile',['user'=>$user]);
	}
	public function updateData(Request $request){
		  	$id=$request->id;
    		$user=User::find($id);
    		$images = $request->file('image');
    		$user->name=$request->name;
    		$user->email=$request->email;
    		$user->address=$request->address;
    		$user->phone=$request->phone;
    		$user->status=$request->status;
    		if($images){
	            $orginalname=$images->getClientOriginalName();
	            $str=str_replace(' ','-', $orginalname);
	            $name=time().'_'.$str;
	            $images->move(public_path('images'), $name);                     
	            $imageUrl =$name;
	            $user->image=$imageUrl;

	        }
    		$user->user_type=$request->user_type;
    		$user->per_edit=$request->per_edit;
    		$user->per_delete=$request->per_delete;
    		$user->password=bcrypt($request->password);
    		$user->save();
    		return back();
	
	}
	public function profile(){
		$id = Auth::id();
		$user=User::where('id',$id)->first();
		return view('admin.user.profile',['user'=>$user]);
	}
		public function userprofile($id){
	
		$user=User::where('id',$id)->first();
		return view('admin.user.userprofile',['user'=>$user]);
	}
     public function changePass(){
    	return view('admin.user.changePass');
    }
    public function changePassword(Request $request){
        // if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        // }
        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     //Current password and new password are same
        //     return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        // }
        $validatedData = $request->validate([
            'newpassword' => 'required',
            'confirmpassword' => 'required|string|min:4',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
