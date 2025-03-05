<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

Class UserController extends Controller {
       
       use ApiResponser;

       private $request;
       
       public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function getUsers(){
        

        $users = DB::connection('mysql')
        ->select("Select * from tbluser");

        return response()->json($users, 200);

        //return $this->successResponse($users);
        return $this->successResponse($users);
    }

    public function index()
    {
        $users = User::all();
        
        return $this->successResponse($users);
    }
}