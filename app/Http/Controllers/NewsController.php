<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Subcategory;
use App\User;
use DB;
use App\Http\Requests;

class NewsController extends Controller
{
    public function showNews()
    {               
        $id                    =\Auth::user()->id;
        $user                  =User::find($id);
    	$newsAll               =News::all();
    	return view('home',compact('newsAll','user'));	
    }
    public function addNews()
    {
        $id                    =\Auth::user()->id;
        $user                  =User::find($id);
    	$news                  =News::all();
        $categories            =Category::all();
    	return view('news.add',compact('news','categories','user'));
    }
    public function insert(Request $request){
        $this->validate($request, [
        
        'short_desc_az' => 'required',
        'title_az'      =>'required',
        'desc_az'       => 'required',
        'keywords'      => 'required',
        'main_img'      => 'required',
        'category_id'   => 'required',
        ]);

        if($request->visibility =='on'){
            $request->visibility=1;
        }else{
            $request->visibility=0;
        };
        $subcat                 = DB::table('subcategories')->where('title_az',$request->category_id)->get();

        if ($request->main_img!="") { 
            $fileName=$request->main_img->getClientOriginalName();
            $newName=time().'_'.$fileName;
            $request->main_img->move('/images/news_img/',$newName);
        }else{
            $newName='no_photo.jpg';
        }

        $news                   = new News;
        $news->subcategory_id   =$subcat[0]->id;
        $news->category_id      =$subcat[0]->category_id;
        $news->user_id          =\Auth::user()->id;
        $news->title_az         =$request->title_az;
        $news->title_en         =$request->title_en;
        $news->title_ru         =$request->title_ru;
        $news->short_desc_az    =$request->short_desc_az;
        $news->short_desc_en    =$request->short_desc_ru;
        $news->short_desc_ru    =$request->short_desc_ru;
        $news->desc_az          =$request->desc_az;
        $news->desc_en          =$request->desc_en;
        $news->desc_ru          =$request->desc_ru;
        $news->main_img         =$newName;
        $news->keywords         =$request->keywords;
        $news->visibility       =$request->visibility;
        $news->save();
        return redirect('/admin');

    }
    public function edit(News $news)
    {
        $id                    =\Auth::user()->id;
        $user                  =User::find($id);
        $categories            =Category::all();
        return view('news.edit',compact('news','categories','user'));
    }
    public function update(Request $request,News $news)
    {
        $this->validate($request, [
        
        'short_desc_az' => 'required',
        'title_az'      =>'required',
        'desc_az'       => 'required',
        'keywords'      => 'required',
        ]);

        if($request->visibility=='on'){
            $request->visibility=1;
        }else{
            $request->visibility=0;
        };
        $subcat                 = DB::table('subcategories')->where('title_az',$request->category_id)->get();
        if ($request->main_img!="") { 
            $fileName           =$request->main_img->getClientOriginalName();
            $newName            =time().'_'.$fileName;
            $request->main_img->move('/images/news_img/',$newName);
        }else{
            $newName            =$news->main_img;
        }
        $news->subcategory_id   =$subcat[0]->id;
        $news->category_id      =$subcat[0]->category_id;
        $news->user_id          =\Auth::user()->id;
        $news->title_az         =$request->title_az;
        $news->title_en         =$request->title_en;
        $news->title_ru         =$request->title_ru;
        $news->short_desc_az    =$request->short_desc_az;
        $news->short_desc_en    =$request->short_desc_ru;
        $news->short_desc_ru    =$request->short_desc_ru;
        $news->desc_az          =$request->desc_az;
        $news->desc_en          =$request->desc_en;
        $news->desc_ru          =$request->desc_ru;
        $news->main_img         =$newName;
        $news->keywords         =$request->keywords;
        $news->visibility       =$request->visibility;

        $news->save();
        return redirect('/admin');
    }
    public function delete(News $news)
    {
        $news->delete();
        \File::delete('/images/news_img/'.$news->main_img);
        return back();
        
    }
}
