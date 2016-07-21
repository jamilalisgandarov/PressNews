<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Http\Requests;
use App\Subcategory;

class HomePageController extends Controller
{
    public function index()
    {
        $newsAll    =News::where('visibility',1)->whereHas('subcategory', function($query){
            $query->where('visibility', 1)->whereHas('category', function ($query){
                 $query->where('visibility', 1);
            });
        })->get();
     $subcategory=Subcategory::where('visibility',1)->whereHas('category',function ($query){
            $query->where('visibility', 1);
            })->get();
      
    	return view('website.index',compact('newsAll','subcategory'));
    	
    }
    public function show(News $news)
    {
    	$newsAll =News::all();
    	return view('website.news',compact('newsAll','news'));
    }
    public function subcategory($id){

         $catNews=Subcategory::where('id',$id)->get();
        //return $catNews=News::where('subcategory_id',$subcategory->id)->get();
        return view('website.category',compact('catNews'));
    }
}
