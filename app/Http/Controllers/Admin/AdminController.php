<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Admin\AdminCollection;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Auth;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            //dd($request->all());
            $datas = Admin::orderBy('admins.created_at','desc')->whereNotIn('admins.id',[1])->join('roles','roles.id','admins.role_id')->select(['admins.id as id','roles.name as role','admins.name as name','email','admins.status']);

            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();

            return response()->json(new AdminCollection($datas));
           
        }
        return view('admin.admin.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $roles = Role::whereNotIn('id',[1])->select(['id','name'])->get()->pluck('name','id')->toArray();
        return view('admin.admin.create',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, admin $admin )
    {   
        $loginTimes = adminLogin::where('admin_id',$admin->id)->get();
        $policy = DB::table('role_policies')->where('role_id',$admin->role_id)->first();
        return view('admin.admin.view',compact('admin','loginTimes','policy'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request) {

            $this->validate($request,[
                'name'=>'required|string|max:255',
                'password'=>'required|string|min:6',
                'role'=>'required',
                'email'=>'required|email|max:255|unique:admins',    
            ]);

            $admin = new Admin;
          
            $admin->role_id = $request->role;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->mobile = $request->contact_number;
            $admin->gender = $request->gender;
            $admin->status = $request->status??0;
            $admin->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            $admin->password = bcrypt($request->password);

            if($request->hasFile('avatar')){
                $image_name = time().".".$request->file('avatar')->getClientOriginalExtension();
                $image = $request->file('avatar')->storeAs('admin', $image_name);
                $admin->avatar = 'storage/'.$image;
            }

            if($admin->save()){ 

                // $data = [
                //     'name'=>$admin->name,
                //     'url'=>url('/').'/admin/new-password/'.Crypt::encrypt($admin->id),
                //     'role'=>Role::where('id',$request->role)->value('name')
                // ];
                // Mail::send('emails.admin.new-password', $data, function($message) use($admin){
                //     $message->to($admin->email, $admin->name)->subject
                //         ('Set Keep backend password');
                //     $message->from('testing@sanix.in','Keep');
                // });

                return redirect()->route('admin.admin.index')->with(['class'=>'success','message'=>'Admin Created successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }


        public function edit(Request $request, $id ){   
            $admin = Admin::find($id);
            return view('admin.admin.edit',compact('admin'));
        }






        public function update(Request $request, $id) {

            $this->validate($request,[
                'name'=>'required',
                'role'=>'required',    
            ]);

            $admin = Admin::find($id);
          
            $admin->role_id = $request->role;
            $admin->name = $request->name;
            $admin->mobile = $request->contact_number;
            $admin->gender = $request->gender;
            $admin->status = $request->status??0;
            $admin->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            if($request->password != '' || $request->password != null || $request->password != NULL || $request->password != Null){
                $admin->password = bcrypt($request->password);
            }

            if($request->hasFile('avatar')){
                $image_name = time().".".$request->file('avatar')->getClientOriginalExtension();
                $image = $request->file('avatar')->storeAs('admin', $image_name);
                $admin->avatar = 'storage/'.$image;
            }

            if($admin->save()){ 
                return redirect()->route('admin.admin.index', )->with(['class'=>'success','message'=>'Admin updated successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }







         public function profileUpdate(Request $request) {

           // return $request->all();
            $this->validate($request,[
                'name'=>'required',   
            ]);

            $admin = Auth::guard('admin')->user();
          
            $admin->name = $request->name;
            $admin->mobile = $request->mobile_no;
            $admin->gender = $request->gender;
            $admin->state = $request->state;
            $admin->city = $request->city;
            $admin->pincode = $request->zipcode;
            $admin->address = $request->address;
            $admin->bio = $request->bio;
            $admin->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
           
 
            if($admin->save()){ 
                return response()->json(['message'=>'Profile  Updated', 'class'=>'success']);
            }

             return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
        }


    
    public function destroy(Request $request, Admin $admin)
    {
       
        if($admin->delete()){
            
            return response()->json(['message'=>'Admin deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }




    public function profilePhotoUpdate(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request,[
            'avatar'=>'required',   
        ]);

        $admin = Auth::guard('admin')->user();

       if($request->hasFile('avatar')){
            $image_name = time().".".$request->file('avatar')->getClientOriginalExtension();
            $image = $request->file('avatar')->storeAs('admin', $image_name);
            $admin->avatar = 'storage/'.$image;
        }

        if($admin->save()){ 
            return response()->json(['message'=>'Profile Photo Updated', 'class'=>'success']);
        }

        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }


    public function profileCoverPhotoUpdate(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request,[
            'cover_photo'=>'required',   
        ]);

        $admin = Auth::guard('admin')->user();

       if($request->hasFile('cover_photo')){
            $image_name = time().".".$request->file('cover_photo')->getClientOriginalExtension();
            $image = $request->file('cover_photo')->storeAs('admin', $image_name);
            $admin->cover_photo = 'storage/'.$image;
        }

        if($admin->save()){ 
            return response()->json(['message'=>'Profile Photo Updated', 'class'=>'success']);
        }

        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }






    public function updatePassword(Request $request)
    {
       // return $request->all();
        $this->validate($request,[
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',

        ]);

        if(Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            $admin = Auth::guard('admin')->user();
            $admin->password = bcrypt($request->new_password);
            if($admin->save()){
                return response()->json(['message'=>'Password changed successfully.', 'class'=>'success']);
                //return redirect()->route('admin.admin.profile', $admin->id)->with(['class'=>'success','message'=>'Password changed successfully.']);
            }
            return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
            //return redirect()->back()->with(['message'=>'Whoops, looks like something went wrong ! Try again ...','class'=>'danger']);
        }
        return response()->json(['message'=>'Old Password is not match', 'class'=>'error']);
        //return redirect()->back()->with(['message'=>'Current Password is not match','class'=>'error']);
    }




    public function profile(Request $request)
    {
        //return $request->all();
        $admin = Auth::guard('admin')->user();
        return view('admin.admin.profile', compact('admin'));
    }


    public function changePassword(Request $request, $id)
    {
        return view('admin.admin.change-password');
    }
}
