<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course_order;
use App\Course_order_product;
use App\cart;
use App\Navbar;
use Session;
use DB;
use Auth;

class CourseOrderController extends Controller
{
    public function insert(Request $a)
    {
    	$co = new Course_order();
    	$co->name=$a->name;
    	$co->user_email=$a->user_email;
    	$co->user_id=$a->user_id;
    	$co->country=$a->country;
    	$co->address=$a->address;
    	$co->city=$a->city;
    	$co->state=$a->state;
    	$co->pincode=$a->pincode;
    	$co->order_note=$a->order_note;
    	$co->order_status=$a->order_status;
    	$co->payment_method=$a->payment_method;
    	$co->coupon_code=$a->coupon_code;
    	$co->coupon_amount=$a->coupon_amount;
    	$co->total=$a->total;
    	$co->save();
        $order_id=DB::getPdo()->lastinsertID();
        // print_r($order_id);
        // die;
    	$cartproduct=DB::table('carts')->where(['user_email'=>$a->user_email])->get();
    	foreach($cartproduct as $c)
    	{
    		$cp = new Course_order_product();
    		$cp->course_order_id=$order_id;
            $cp->user_id=$a->user_id;
            $cp->course_id=$c->course_id;
            $cp->course_name=$c->course_name;
            $cp->image=$c->image;
            $cp->course_price=$c->course_price;
            $cp->course_quantity=$c->course_quantity;
            $cp->save();
    	}
    	// print_r($cartproduct);
    	if($cp)
    	{
    		return redirect('front/thanks')->with('message','Addded successfully');
    	}
    }

    public function thank()
    {
        $disp = Navbar::all();
        $user_email = Auth::user()->email;
        DB::table('carts')->where('user_email',$user_email)->delete();
        return view('front.thanks',compact('disp'));
    }
}
