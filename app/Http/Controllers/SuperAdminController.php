<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Session;



class SuperAdminController extends Controller
{
    
    public function index()
    {
        
        $data = User::orderBy('id', 'DESC')->paginate(4);
        return view('index',compact('data'));
    }

    public function search(Request $request){

        // $search = $request->get('search');   <!-- All search in one code  -->
        // // User --> model & roles --> method of user model which contains relationship B/W User and Role
        // $data = User::with('roles')->where('id', 'like', '%'.$search.'%')
        //                             ->orWhere('name','like','%'.$search.'%')
        //                             ->orWhere('lastname','like','%'.$search.'%')
        //                             ->orWhere('email','like','%'.$search.'%')
        //                             ->orWhereHas ('roles', function($q) use ($search) {
        //                                 return $q->where('name', 'LIKE', '%'. $search . '%');
        //                             })
        //                             ->paginate(4);
        //                             // ->get();
        //                             if (!$data || !$data->count()) {
        //                                 Session::flash('no-results', 'Data Not Found');
        //                             }
            
        //                           return view('home',compact('data'));
    
    }

    public function particularsearch(Request $request){
        //dd($user);  
        $data=User::query();
        if ($request->has('name')) {
          $data->where('name','like', '%'.$request->input('name').'%');
             
        }
        
        // Search for a user based on their lastname.
        if ($request->has('lastname')) {
            $data->where('lastname','like',  '%'.$request->input('lastname').'%');
        }
    
        // Search for a user based on their email.
        if ($request->has('email')) {
           $data->where('email','like',  '%'.$request->input('email').'%');
        }

        if ($request->has('role_id')) {
            $data->where('role_id','like',  '%'.$request->input('role_id').'%');
         }

         if (!$data || !$data->count()) {
            Session::flash('no-results', 'Data Not Found');
        }


        $data =$data->paginate(10);
        return view('index',compact('data'));
        

    }

    public function create(){
        return view('create ');
    }

    public function store(StoreCustomRequest $request) {
        $validated = $request->validated(); //for validation which is custom
        $save = new User();
        $save->name=$request->get('name');
        $save->lastname=$request->get('lastname');
        $save->email=$request->get('email');
        $save->password = Hash::make($request->password);
        $save->password_confirmation = Hash::make($request->password_confirmation);
        $save->role_id=$request->get('role_id');
        $save->save();
       // dd($save);
    		return redirect('SuperAdmin')->with('success','Added Successfully');

    }
    
    public function edit(User $user,$id) {
    	
        //return view('edit');
        $user=User::findOrFail($id);
        return view('edit',compact('user'));
    }

    public function update(request $request,$id) {
        $request->validate([
            'name' => 'required|min:3|max:10',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns',
            'role_id' => 'required'   
        ]);      
        $user=User::findOrFail($id);
    	$data=$request->all();
    	$user->update($data);
    	return redirect('SuperAdmin')->with('success','Updated SuccessFully');
    }

    public function delete($id) {
        $user=User::whereId($id)->delete();
            	return redirect('SuperAdmin')->with('success','Deleted SuccessFully');
    }

    

    
}
