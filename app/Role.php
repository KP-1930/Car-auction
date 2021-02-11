<?php

namespace App;
use Illuminate\Database\DB;
use App\User;
use Auth;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "role";
    protected $fillable = [
        'name'
    ];
   
    public static function  getRolesListBackend(){
        if(Auth::guest()){
            $data = \DB::table('role')->pluck('name','id')->toArray();

        }else{

            $currentrole = Auth::user()->role_id;
      
            if($currentrole == 1) {
                $data = \DB::table('role')->pluck('name','id')->toArray();            
            }elseif ($currentrole == 2) {
                $data = \DB::table('role')->whereNotIn('id', [1])->pluck('name','id')->toArray();
                
            }elseif ($currentrole == 3) {
                $data = \DB::table('role')->whereNotIn('id',[1,2])->pluck('name' ,'id')->toArray();
            }     
        }  
        // $data = \DB::table('role')->pluck('name','id')->toArray();
        return $data;
        
    }

    
}

