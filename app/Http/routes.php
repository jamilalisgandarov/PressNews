<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//adminPamnel

Route::group(['middleware'=>['web','auth']],function (){

	//gallery , slider 
	Route::get('/admin/gallery','FileController@index');
	Route::get('/admin/{news}/gallery','FileController@newsPhoto');
	Route::get('/admin/{news}/add/photo','FileController@add');
	Route::get('/admin/add/news/gallery','FileController@withNews');
	Route::post('/admin/gallery/{news}/upload','FileController@store');
	Route::get('/admin/gallery/{gallery}/edit' ,'FileController@edit');
	Route::patch('/admin/gallery/{news}/{gallery}/update' ,'FileController@update');
	Route::get('/admin/gallery/{gallery}/delete' ,'FileController@delete');

	//news
	Route::get('/admin','NewsController@showNews');
	Route::get('/admin/news/add','NewsController@addNews');
	Route::post('/admin/news/insert','NewsController@insert');
	Route::get('/admin/news/{news}/edit','NewsController@edit');
	Route::patch('/admin/news/{news}/update','NewsController@update');
	Route::get('/admin/news/{news}/delete','NewsController@delete');
	//sliderNews
		Route::get('/admin/sliderNews','NewsController@sliderNews');
		Route::get('/admin/slider/add/{id}','NewsController@sliderAdd')->middleware('slider');
		Route::get('/admin/slider/remove/{id}','NewsController@sliderTake');
	//========================== Category =============================

	Route::group(['middleware'=>['status']],function (){
		Route::get('/admin/category/{catId}','CategoriesController@show');
		Route::get('/admin/add/category','CategoriesController@create');
		Route::post('/admin/add/store','CategoriesController@store');
		Route::get('/admin/edit/{catId}/category','CategoriesController@edit');
		Route::patch('/admin/update/{catId}/category','CategoriesController@update');
		Route::get('/admin/delete/{catId}/category','CategoriesController@destroy');
		Route::get('/admin/category','CategoriesController@showall');
		Route::get('/admin/select','CategoriesController@select');
	
	//========================== SubCategory =============================

		Route::get('/admin/add/{catId}/subcategory','SubCategoriesController@create');
		Route::post('/admin/store/{catId}/subcategory','SubCategoriesController@store');
		Route::get('/admin/edit/{catId}/subcategory','SubCategoriesController@edit');
		Route::patch('/admin/update/{catId}/subcategory','SubCategoriesController@update');
		Route::get('/admin/delete/{catId}/subcategory','SubCategoriesController@destroy');

		Route::get('/admin/requests', 'MainController@showRequests');
		Route::get('/admin/delete/{author}', 'MainController@delete');

		Route::get('/admin/editorsInfo', function (){
		return view('adminPanel.editorsInfo');
		});
		Route::get('/admin/insert/{author}','MainController@insert');
		Route::get('/admin/user/delete/{user}', 'MainController@userDelete');
		Route::get('/admin/editorsInfo', function (){
		return view('adminPanel.editorsInfo');
		});

		
		//Ajax Requests authors
		Route::post('/admin/userData', 'AjaxRequest@userData');
		Route::post('/admin/authorData', 'AjaxRequest@authorData');
		Route::get('/admin/checkAuthors', 'AjaxRequest@checkAuthors');
		// news
		Route::post('/newsData', 'AjaxRequest@newsData');
	});
});
Route::get('/authorRegistration', function () {
    return view('registrationForm.register');});
Route::post('/authorRegistration/submitted', 'MainController@register');
Route::auth();


	
// website routes

Route::get('/','HomePageController@index');
Route::get('/news/{news}','HomePageController@show');
Route::get('/news/category/{id}','HomePageController@subcategory');
Route::post('/news/search','MainController@search');
