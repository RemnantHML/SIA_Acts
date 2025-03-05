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
        

        $user = DB::connection('mysql')
        ->select("Select * from tbluser");

        return response()->json($users, 200);
    }

    public function index()
    {
        $user = User::all();
        
        return $this->successResponse($user);
    }
}