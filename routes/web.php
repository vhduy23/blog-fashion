<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin', 'UserController@admin');
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/logout', 'UserController@getLogout');

Route::get('/', 'FrontController@home');
Route::get('/lien-he', 'FrontController@contact');
Route::get('/ve-chung-toi', 'FrontController@about');
Route::get('/tim-kiem', 'FrontController@search');

Route::post('/dang-ky-nhan-tin-khuyen-mai', 'FrontController@subEmail');
Route::post('/gui-email-lien-he', 'FrontController@contactSendEmail');

Route::get('{slug}.html','FrontController@slugHtml');
Route::get('{slug}','FrontController@slug');


//administrator
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	//welcome to admin
	Route::get('/home', 'BackController@home');
	//Staff
	Route::group(['prefix' => 'staff'], function(){
		Route::get('profile', 'BackController@staff_profile');
		Route::post('profile', 'BackController@staff_profile_post');
		Route::get('list', 'BackController@staff_list');
		Route::get('add', 'BackController@staff_add');
		Route::post('add', 'BackController@staff_add_post');
		Route::get('edit/{id}', 'BackController@staff_edit');
		Route::post('edit/{id}', 'BackController@staff_edit_post');
		Route::get('delete/{id}', 'BackController@staff_delete');

	});	
	// system 
	Route::get('/system', 'BackController@system');
	Route::post('/system', 'BackController@system_post');

	// page 
	Route::group(['prefix' => 'page'], function(){
		Route::get('list', 'BackController@page_list');
		Route::get('edit/{id}', 'BackController@page_edit');
		Route::post('edit/{id}', 'BackController@page_edit_post');
	}); 
		// social 
	Route::group(['prefix' => 'social'], function(){
		Route::get('list', 'BackController@social_list');
		Route::get('edit/{id}', 'BackController@social_edit');
		Route::post('edit/{id}', 'BackController@social_edit_post');
	}); 
		// newsletter 
	Route::group(['prefix' => 'newsletter'], function(){
		Route::get('list', 'BackController@newsletter_list');
		Route::get('edit/{id}', 'BackController@newsletter_edit');
		Route::post('edit/{id}', 'BackController@newsletter_edit_post');
		Route::get('delete/{id}', 'BackController@newsletter_delete');
	});	
		// newsletter 
	Route::group(['prefix' => 'social'], function(){
		Route::get('list', 'BackController@social_list');
		Route::get('edit/{id}', 'BackController@social_edit');
		Route::post('edit/{id}', 'BackController@social_edit_post');
	});	
		// contact 
	Route::group(['prefix' => 'contact'], function(){
		Route::get('list', 'BackController@contact_list');
		Route::get('edit/{id}', 'BackController@contact_edit');
		Route::post('edit/{id}', 'BackController@contact_edit_post');
		Route::get('delete/{id}', 'BackController@contact_delete');
	});
		// news category 
	Route::group(['prefix' => 'news_cat'], function(){
		Route::get('list', 'BackController@news_cat_list');
		Route::get('edit/{id}', 'BackController@news_cat_getedit');	
		Route::post('edit/{id}', 'BackController@news_cat_edit');
	});	
		// news 
	Route::group(['prefix' => 'news'], function(){
		Route::get('list', 'BackController@news_list');
		Route::get('add', 'BackController@news_getadd');
		Route::post('add', 'BackController@news_add');
		Route::get('edit/{id}', 'BackController@news_getedit');
		Route::post('edit/{id}', 'BackController@news_edit');
		Route::get('delete/{id}', 'BackController@news_delete');
		Route::post('sort/{id}', 'BackController@news_cat_update_sort');
	});
		// slider 
	Route::group(['prefix' => 'slider'], function(){
		Route::get('list', 'BackController@slider_list');
		Route::get('add', 'BackController@slider_getadd');
		Route::post('add', 'BackController@slider_add');
		Route::get('edit/{id}', 'BackController@slider_getedit');
		Route::post('edit/{id}', 'BackController@slider_edit');
		Route::get('delete/{id}', 'BackController@slider_delete');
	});
}); 

