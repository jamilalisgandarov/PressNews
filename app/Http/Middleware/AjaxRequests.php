<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\AjaxRequests;
use App\User;
use App\Author;
//use AjaxRequests;
class AjaxRequests extends Controller
{
	function userData(Request $request){
      if($request->ajax()){
            $userData=User::find($request->id);
            return response()->json($userData);
        }
    }

    function checkAuthors(){
        $count=count(Author::all());
        return $count;
    }
}