<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use App\User;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\VerifyCsrfToken;
use App\News;

class MainController extends Controller
{
    
    //Register page for author
    function register(Author $author,Request $request ){
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:authors',
            'password'=>'required|min:8'
        ]);
        $author=new Author;
        $author->first_name=$request->first_name;
        $author->last_name=$request->last_name;
        $author->email=$request->email;
        $author->password=$request->password;
        $author->save();
       return redirect('/login');
    }


    // Show all author request in admin panel       
    function showRequests(Author $author){ 
    		  $authors=$author->get();
    		  return view('adminPanel.requests')
              ->with(compact('authors'))
              ->with(compact('user'));         
    }
    function search(Request $request){
        $searchKey=$request->search;
        $result = News::where('desc_az', 'like', '%'.$searchKey.'%')
                ->where('visibility',1)->get();
        return view('website.searchResults',compact('result'));
    }

    // Accepting author request
    function insert(Author $author,User $user){
        $user=new User;
        $users=User::all();
        $user->first_name=$author->first_name;
        $user->last_name=$author->last_name;
        $user->email=$author->email;               
        $user->password=\Hash::make($author->password);
        $user->status=1;
        $user->save();
        $author->delete();
        return back();
    }
    // Decline author request
    function delete(Author $author){
        $author->delete();
        return back();
    }
    // Deleting accepted author
    function userDelete(User $user){
        $user->delete();
        return back();
    }
}
