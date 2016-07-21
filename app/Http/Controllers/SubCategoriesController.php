<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\SubCategory;

class SubCategoriesController extends Controller
{
    public function index(){}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create(Category $catId)
    {   

        return view('sub.addSubCat',compact('catId'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request,Category $catId)
    {   
            
            $this->validate($request,[

                'title_az'=>'required',
                'title_en'=>'required',
                'title_ru'=>'required'

                ]);
            
            $sub=new SubCategory;
            $sub->category_id=$catId->id;            
            $catId->subcategories()->create($request->all());
            return redirect('/admin/category/'.$catId->id);
                   
    }
    public function show($id){}

    public function edit(SubCategory $catId)
    {
        return view('sub.editSubCat',compact('catId'));
    }

   
    public function update(Request $request, SubCategory $catId)
    {   


          
            
        $catId->update($request->all());
       return redirect('/admin/category/'.$catId->category_id);
                   
    }

    public function destroy(SubCategory $catId)
    {
        $catId->delete(); 
        return back();  
    }
}
