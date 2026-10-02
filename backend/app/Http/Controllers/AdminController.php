<?php

namespace App\Http\Controllers;


use App\Events\LoginAdmin;
use App\Models\Login;
use App\Models\Term;
use App\Services\Contracts\CheckDuplicateTermsServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    protected $checkduplicateterm;
    public function __construct(CheckDuplicateTermsServiceInterface $checkduplicateterm)
    {
        $this->checkduplicateterm = $checkduplicateterm;
    }

    public function login(Request $request)
    {

        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        
        if($request->isMethod("POST"))
        {
            // لاگین دستی
            // $username = $request->input("username");
            // $password = $request->input("password");
            
            // $result = Login::create([
            //     "username"=>$username,
            //     "password"=>password_hash($password,PASSWORD_DEFAULT),
            //     "role"=>'admin',
            //     "status"=>'active',
            //     "twostep"=>'sms',
            // ]);

            // $arr_response=[
            //     "status"=>"",
            //     "message"=>""
            // ];

            // $login = Login::find($username);

            // if(!$login)
            // {
            //     $arr_response=[
            //     "status"=>"danger",
            //     "message"=>"نام کاربری و رمز عبور اشتباه هست"
            //     ];
            //     return view("Admin/login",$arr_response);
            // }

            // $hash = $login->password;
            // if(!password_verify($password,$hash))
            // {
            //     $arr_response=[
            //     "status"=>"danger",
            //     "message"=>"نام کاربری و رمز عبور اشتباه هست"
            //     ];
            //     return view("Admin/login",$arr_response);
            // }

            // $status = $login->status;
            // if($status!="active")
            // {
            //     $arr_response=[
            //     "status"=>"danger",
            //     "message"=>"حساب کاربری مسدود است"
            //     ];
            //     return view("Admin/login",$arr_response);
            // }

            // session(["checklogin"=>true]);
            // session(["username"=>$username]);

            // return redirect()->intended("/adminpanel/dashboard");


            // لاگین به روش گارد
        
            $credentials = $request->only('username','password'); 

            if(Auth::guard('admin')->attempt($credentials))
            {
                $request->session()->regenerate(); 

                // فایِر کردن ایونت
                $username = $request->input("username");
                event(new LoginAdmin($username));

                return redirect()->intended('/adminpanel/dashboard');
            }
        }

        return view('Admin/index');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function terms(Request $request)
    {
        return view('admin/terms');
    }

    public function AddTerms(Request $request)
    {
        if($request->isMethod("POST"))
        {
            $title = $request->input("title");
            $master = $request->input("master");
            $capacity = $request->input("capacity");
            $price = $request->input("price");

            $request->validate([
                "title"=>"required",
                "master"=>"required",
                "capacity"=>"required|numeric",
                "price"=>"required|numeric",
                "pic"=>"required|image|mimes:jpg,png,jpeg|max:2048"
            ],
            [
                'title.required'=>'فیلد نام الزامی است',
                'master.required'=>'فیلد استاد الزامی است',
                'capacity.required'=>'فیلد ظرفیت الزامی است',
                'capacity.numeric'=>'لطفا ظرفیت را به عدد وارد کنید ',
                'price.required'=>'فیلد قیمت الزامی است',
                'price.numeric'=>'لطفا قیمت را به عدد وارد کنید',
                'pic.required'=>'لطفا یک تصویر انتخاب کنید',
                'pic.image'=>'فایل انتخابی باید تصویر باشد',
                'pic.mimes'=>'فرمت تصویر نامعتبر است',
                'pic.max'=>'حجم تصویر کمتر از ۲ مگابایت باشد'
            ]);


            // terms is exist
            $is_terms_exist = $this->checkduplicateterm->CheckTermisExist($title,$master);
            if($is_terms_exist)
            {
                $arr_response=[
                    "status"=>"danger",
                    "message"=>"دوره تکراری است"
                ];
                
                return json_encode($arr_response);
            }

            $pic = $request->file("pic");
            $newfilename = time().$pic->getClientOriginalName();
            $pic->move(public_path("uploads"),$newfilename);

            $result = Term::create([
                "title"=>$title,
                "master"=>$master,
                "capacity"=>$capacity,
                "price"=>$price,
                "pic"=>$newfilename,
            ]);

            if($result)
            {
                $arr_response=[
                    "status"=>"success",
                    "message"=>"اطلاعات با موفقیت ثبت شد"
                ];
                // return view('admin/terms',$arr_response);
                return json_encode($arr_response);
            }
            else
            {
                $arr_response=[
                    "status"=>"danger",
                    "message"=>"خطا در ثبت اطلاعات"
                ];
                // return view('admin/terms',$arr_response);
                return json_encode($arr_response);
            }

       }
    }

    public function GetAllTerms(Request $request)
    {
        // databasename(Term::count()); // تعداد رکورد موجود در جدول دیتابیس مدنظر
        
        if($request->isMethod("POST"))
        {
            $arr_response = [];
            $terms = Term::all();
            foreach($terms as $term)
            {
                $arr_response []= [
                    "id"=>$term->id,
                    "title"=>$term->title,
                    "master"=>$term->master,
                    "capacity"=>$term->capacity,
                    "price"=>$term->price,
                    "pic"=>$term->pic
                ];
            }

            return response()->json($arr_response);
        
        }
    }

    public function GetinfoTerms(Request $request)
    {
        if($request->isMethod("post"))
        {
            $id = $request->input("id_terms");
            $get_all_terms = Term::find($id);
            return response()->json($get_all_terms);
        }
    }
    
    public function EditTerms(Request $request)
    {
        if($request->isMethod("post"))
        {
            $id = $request->input("id_terms");
            $edit_terms = Term::find($id);
            $result = $edit_terms->delete();

            if($result)
            {
                $arr_response=[
                    "status"=>"success",
                    "message"=>"اطلاعات با موفقیت ویرایش شد"
                ];
                return response()->json($arr_response);
            }
            else
            {
                $arr_response=[
                    "status"=>"danger",
                    "message"=>"خطا در ویرایش اطلاعات"
                ];
                return response()->json($arr_response);
            }
        }
    }
    
    public function DeletTerms(Request $request)
    {
        if($request->isMethod("post"))
        {
            $id = $request->input("id_terms");
            $delet_terms = Term::find($id);
            $result = $delet_terms->delet();
            if($result)
            {
                $arr_response=[
                    "status"=>"success",
                    "message"=>"اطلاعات با موفقیت حذف شد"
                ];
                return response()->json($arr_response);
            }
            else
            {
                $arr_response=[
                    "status"=>"danger",
                    "message"=>"خطا در حذف اطلاعات"
                ];
                return response()->json($arr_response);
            }
        }
    }
}


