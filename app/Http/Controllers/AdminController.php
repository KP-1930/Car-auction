<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomRequest;
use App\User;
use App\Role;
use Session;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function adminView(){
        $data = User::orderBy('id','DESC')->where('role_id', '!=', '1')->paginate(4);
        //dd($data);
        return view('Admin.adminView',compact('data'));
    }

    public function adminsearch(Request $request){
        //dd($user);  
        $data=User::query();
        if ($request->has('name')) {
          $data->where('name','like', '%'.$request->input('name').'%')->whereNotIn('role_id', [1]);
             
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


   
}
