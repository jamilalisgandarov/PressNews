<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
//use App\SubCategory;
class CategoriesController extends Controller
{
	public function showall()
	{
		$datas=Category::all();
		return view('categories.showall',compact('datas'));
	}
	//=========================
	public function select()
	{
		$datas=Category::all();
		//$sdatas=Category::all();
		return view('select',compact('datas'));
	}

	//===============================
	public function create()
	{
		return view('categories.addCat');
	}
	public function store(Request $request)
	{

		$this->validate($request,[
		'title_az'=>'required',
		'title_en'=>'required',
		'title_ru'=>'required'
		]);
		Category::create($request->all());
		return redirect('/admin/category');


	}
	public function show(Category $catId)
	{
		return view('sub.showAll',compact('catId'));
	}
	public function edit(Category $catId)
	{
		return view('categories.editCat',compact('catId'));
	}
	public function update(Request $request, Category $catId)
	{

		$catId->update($request->all());
		return redirect('/admin/category');


	}
	public function destroy(Category $catId)
	{
		$catId->delete();
		return redirect('/admin/category');
	}
}