<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Banner;
use App\Navbar;
use App\Category;
use App\Courses;
use App\Online_course;
use App\User;
use App\cart;
use App\Team;
use App\Intern;
use App\Placement;
use App\Contact;
use App\Notification;
use App\Workshop;
use Session;
use DB;
use Auth;

class FrontendController extends Controller
{
    public function create()
    {
        $notify = Notification::all();
    	$display = Banner::all();
        $disp = Navbar::all();
        $dis = Online_course::all();
        $view = Category::all();
        $show = Courses::all();
    	return view('front.index',compact('display','disp','dis','view','show','notify'));
    }

    public function save(Request $b)
    {
    	// print_r($b->all());
    	$file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Online_course;
    	$data->title = $b->title;
    	$data->description = $b->description;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('front/online_course')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $dis = Online_course::all();
        // print_r($d);
        return view('front.online_course', compact('dis')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Online_course::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("front.online_course_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Online_course::find($u->id);
        $data->title = $u->title;
    	$data->description = $u->description;
    	$data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('front/online_course');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Online_course::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('front/online_course')->with('message','Registered successfully');; // 'attendance/display'=url
        } 
    }

    //frontend course detail

    public function course_detail($id)
    {
        $disp = Navbar::all();
        $show = Courses::find($id);
        return view('front.course_detail',compact('disp','show'));
    }

    public function courses_nav()
    {
        $disp = Navbar::all();
        $show = Courses::all();
        return view('front.category_courses',compact('disp','show'));
    }

    public function category_course($id)
    {
        $disp = Navbar::all();
        $show = Courses::all(); 
        $view = Category::find($id);  
        $dis = Online_course::all();
        return view('front.category_course',compact('disp','show','view','dis'));
    }

    public function signup()
    {
        $disp = Navbar::all();
        return view('front.signup',compact('disp'));
    }

    public function signup_save(Request $x)
    {
        $data = new User;
        $data->name = $x->name;
        $data->email = $x->email;
        $data->password = Hash::make($x->password);
        $data->save();
        if($data)
        {
            return redirect('front/signup')->with('message','Added successfully');
        }
    }

    public function login()
    {
        $disp = Navbar::all();
        return view('front.login',compact('disp'));
    }

    public function login_save(Request $a)
    {
        $session_id = Session::getId();
        $data=$a->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
            return redirect("front/cart")->with('message','Login Successfully');
        }
        else{
            return redirect("front/login")->with('message','Login Unsuccessfully');
        }
    }

    public function add_cart(Request $a)
    {
        // print_r($a->all());
        // die;
        if(Auth::check()) {
        $session_id = Session::getId();
        $user_email= Auth::User()->email;
        // print_r($session_id);
        // die;
        $data = new cart();
        $data->course_name = $a->course_name;
        $data->course_id = $a->course_id;
        $data->course_price = $a->course_price;
        $data->image = $a->course_image;
        $data->session_id = $session_id;
        $data->user_email = $user_email;
        $data->save();
        // print_r($data);
        // die;
        if ($data) {
            return redirect('front/cart');
        }

        }
        else {
        $session_id = Session::getId();
        // print_r($session_id);
        // die;
        $data = new cart();
        $data->course_name = $a->course_name;
        $data->course_id = $a->course_id;
        $data->course_price = $a->course_price;
        $data->image = $a->course_image;
        $data->session_id = $session_id;
        $data->save();
        // print_r($data);
        // die;
        if ($data) {
            return redirect('front/cart');
        }
        }
    }

    public function cart()
    {
        $session_id = Session::getId();
        // print_r($session_id);
        $disp = Navbar::all();
        if (Auth::check()) 
        {
            $user_email = Auth::User()->email;
            $cart =Cart::where('user_email',$user_email)->get();

        }
        else
        {
            $session_id = Session::getId();
            $cart =Cart::where('session_id',$session_id)->get();
        }
        
        return view('front.cart',compact('disp','cart'));
    }

    public function our_team()
    {
        $disp = Navbar::all();
        $t = Team::all();
        return view('front.our_team',compact('disp','t'));
    }

    public function interns()
    {
        $disp = Navbar::all();
        $i = Intern::all();
        return view('front.interns',compact('disp','i'));
    }

    public function placements()
    {
        $disp = Navbar::all();
        $p = Placement::all();
        return view('front.placements',compact('disp','p'));
    }

    public function contact()
    {
        $disp = Navbar::all();
        $con = Contact::all();
        return view('front.contact',compact('disp','con'));
    }

    public function MPCT_workshop()
    {
        $disp= Navbar::all();
        $work = Workshop::where('workshop_title','MPCT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.MPCT',compact('disp','work'));
    }
    
     public function Xiaomi_workshop()
    {
        $disp= Navbar::all();
        $work = Workshop::where('workshop_title','Xiaomi MI Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Xiaomi',compact('disp','work'));
    }

    public function Bentchair_workshop()
    {
        $disp= Navbar::all();
        $work= Workshop::where('workshop_title','Bentchair Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Bentchair',compact('disp','work'));
    }

    public function RJIT_workshop()
    {
        $disp= Navbar::all();
        $work = Workshop::where('workshop_title','RJIT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.RJIT',compact('disp','work'));
    }

    public function quantity_update($id=null,$course_quantity=null)
    {
        // echo $id;
        // echo $course_quantity;
        DB::table('carts')->where('id',$id)->increment('course_quantity',$course_quantity);
        return redirect('front/cart')->with('message','Product Quantity has been updated');
    }

    public function checkout()
    {
        $disp = Navbar::all();
        if (Auth::check()) 
        {
            $user_email = Auth::User()->email;
            $cart =Cart::where('user_email',$user_email)->get();

        }
        return view('front.checkout',compact('disp','cart'));
    }
}



