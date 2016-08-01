<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Http\Requests;
use App\Subcategory;
use Illuminate\Support\Facades\View;

class HomePageController extends Controller
{   
    protected $subcategory;
    protected $category;
    protected $newsAll;

    public function __construct(){
    $this->newsAll=\App\News::where('visibility',1)->whereHas('subcategory', function($query){
            $query->where('visibility', 1)->whereHas('category', function ($query){
                 $query->where('visibility', 1);
            });
        })->get();

     $this->subcategory=\App\Subcategory::where('visibility',1)->whereHas('category',function ($query){
            $query->where('visibility', 1);
            })->get(); 

     $this->category=\App\Category::where('visibility',1)->get();   

    View::share('subcategory',$this->subcategory);
    View::share('category',$this->category);
    View::share('newsAll',$this->newsAll); 
    }


    public function index()
    {

    	return view('website.index');
    	
    }
    public function show(News $news)
    {
    	return view('website.news',compact('news'));
    }
    public function subcategory($id){
        $catNews=$this->subcategory->find($id)->news->where('visibility',1);
        return view('website.category',compact('catNews'));
    }
}
