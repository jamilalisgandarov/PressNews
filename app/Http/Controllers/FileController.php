<?php

namespace App\Http\Controllers;
//
//use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Gallery;

class FileController extends Controller
{	
    public function index()
    {
      $galleryAll= Gallery::all();
      $newsAll   = News::all();
      return view('gallery.show',compact('galleryAll','newsAll'));
    }
    public function withNews()
    {
      $newsAll =News::all();
      return view('gallery.withnews',compact('newsAll'));
    }
    public function newsPhoto(News $news)
    {
        return view('gallery.newsphoto',compact('news'));
    }


	  public function add(News $news)
    {
  	 	$gallery= Gallery::all();
      return view('gallery.fileUpload',compact('gallery','news'));
    }
    public function store(Request $request,News $news)
    {
      $img=\Image::make($request->file->getRealPath())->resize(70, 70);
      if ($request->file!="") { 
            $fileName   =$request->file->getClientOriginalName();
            $largeName  =time().'_'.'lg_img'.'_'.$fileName;
            $smallName  =time().'_'.'sm_img'.'_'.$fileName;
            $request->file->move('images/gallery_img/lg_img/',$largeName);
            $smallPath = public_path('images/gallery_img/sm_img/' . $smallName);
            $img->save($smallPath);
            $gallery = new Gallery;
            $gallery->news_id   =$news->id;
            $gallery->title_az  =$news->title_az;
            $gallery->title_en  =$news->title_en;
            $gallery->title_ru  =$news->title_ru;
            $gallery->path_large=$largeName;
            $gallery->path_small=$smallName;
            $gallery->save();
        }
        return redirect('/admin/gallery');
    	
  }
  public function edit(Gallery $gallery)
  {
      $news   = News::all();
      return view('gallery.edit',compact('gallery','news'));
  }
  public function update(Request $request,News $news,Gallery $gallery)
    {
      if ($request->file!="") { 
            $fileName   =$request->file->getClientOriginalName();
            $largeName  =time().'_'.'lg_img'.'_'.$fileName;
            $smallName  =time().'_'.'sm_img'.'_'.$fileName;
            $request->file->move('images/gallery_img/lg_img/',$largeName);
            // $request->file->move('images/gallery_img/sm_img/',$smallName);

            $gallery->news_id   =$news->id;
            $gallery->title_az  =$news->title_az;
            $gallery->title_en  =$news->title_en;
            $gallery->title_ru  =$news->title_ru;
            $gallery->path_large=$largeName;
            $gallery->path_small='$smallName';
            $gallery->save();
        }
        return redirect('/admin/gallery');
      
  }

  public function delete(Gallery $gallery)
  {
  	\File::delete('images/gallery_img/lg_img//'.$gallery->path_large);
    // \File::delete('images/gallery_img/sm_img//'.$gallery->small_large);
  	$gallery->delete();
  	return back();
  }
}
