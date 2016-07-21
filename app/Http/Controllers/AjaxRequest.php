<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use App\User;
use App\News;

class AjaxRequest extends Controller
{
         function userData(Request $request){
        if($request->ajax()){
            $userData=User::find($request->id);
            return response()->json($userData);
            }
        }
        function authorData(Request $request){
            if($request->ajax()){
            $authorData=Author::find($request->id);
            return response()->json($authorData);
            }
        }
        function checkAuthors(){
            $count=count(Author::all());
            return $count;
        }
        // news
        function newsData(Request $request)
        {
            if($request->ajax()){
            $newsData=News::find($request->id);
            return response()->json($newsData);
            }
        }
}
