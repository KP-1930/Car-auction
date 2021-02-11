<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\User;
use App\Role;

class DynamicPDFController extends Controller
{
    
    function index()
    {
     $user_data = $this->get_user_data();
     return view('dynamic_pdf')->with('user_data', $user_data);
    }

    function get_user_data()
    {
     $user_data = User::with('roles')
         //->limit(10)
         ->get();
     return $user_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_user_data_to_html());
     return $pdf->stream();
    }

    function convert_user_data_to_html()
    {
     $user_data = $this->get_user_data();
     $output = '
     <h3 align="center">User Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">LastName</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Role</th>
   </tr>
     ';  
     foreach($user_data as $data)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$data->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->lastname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->roles['name'].'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}


