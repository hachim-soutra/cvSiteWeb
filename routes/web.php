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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resources([
    'cvs'=> 'CvController',
    'experiences'=> 'ExperienceController',
    ]);
    
Route::get('/getdata/{id}','CvController@getdata');


Route::put('/updateformation','FormationController@updateformation');
Route::post('/addformation', 'FormationController@addformation');
Route::delete('/deleteformation/{id}','FormationController@deleteformation' );

Route::put('/updateexperience','ExperienceController@updateExp');
Route::post('/addexperience', 'ExperienceController@addExperience');
Route::delete('/deleteexperience/{id}','ExperienceController@deleteExperiences' );


Route::put('/updatecompetence','CompetenceControoler@updatecompetence');
Route::post('/addcompetence', 'CompetenceControoler@addcompetence');
Route::delete('/deletecompetence/{id}','CompetenceControoler@deletecompetence' );

Route::put('/updateprojet','PortfolioController@updateprojet');
Route::post('/addprojet', 'PortfolioController@addprojet');
Route::delete('/deleteprojet/{id}','PortfolioController@deleteprojet' );




Route::get('/home', 'HomeController@index')->name('home');
