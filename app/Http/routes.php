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

Route::get('/',function(){
    if(auth()->check())
    {
       if(\Illuminate\Support\Facades\Auth::user()->role == 1)
           return redirect('/truck-owner');
       elseif(\Illuminate\Support\Facades\Auth::user()->role == 2)
           return redirect('/transporter');
        return redirect('/admin');
    }
    return redirect('/login');
});


// Authentication routes...
Route::get('/login', 'Login\LoginController@getLogin');
Route::post('/login', 'Login\LoginController@postLogin');
Route::get('/logout', 'Login\LoginController@getLogout');


/*
 * Routes related to admin
 */

Route::group([
    'middleware'=>  'admin',
    'prefix'    =>  'admin',
    'before'    =>  'auth'
],function(){

    Route::get('/','Admin\AdminController@index');

    /*
     * Routes for truck owner CRUD
     */
    Route::get('/truck-owner/create','Admin\TruckOwnerController@showCreate');
    Route::post('/truck-owner/create','Admin\TruckOwnerController@create');
    Route::get('/truck-owner/{id}/add-personal','Admin\TruckOwnerController@showAddPersonal');
    Route::post('/truck-owner/add-personal','Admin\TruckOwnerController@addPersonal');
    Route::get('/truck-owner/list','Admin\TruckOwnerController@showList');
    Route::get('/truck-owner/{id}/view','Admin\TruckOwnerController@showOwner');


    /*
     * Routes for Trucks CRUD
     */
    Route::get('/truck/{owner_id}/create','Admin\TruckController@showCreateTruck');
    Route::POST('/truck/create','Admin\TruckController@createTruck');

    Route::get('/truck/{id}/view','Admin\TruckController@view');

    Route::POST('/truck/add-files/{owner_id}','Admin\TruckController@addFilesToOwner');
    Route::get('/truck/list','Admin\TruckController@listTrucks');


    /*
     * Routes for Transporters
     */
    Route::get('transporter/create','Admin\TransporterController@showCreateTransporter');
    Route::post('transporter/create','Admin\TransporterController@createTransporter');
    Route::get('transporter/{id}/add-personal','Admin\TransporterController@showAddPersonal');
    Route::post('transporter/add-personal','Admin\TransporterController@addPersonal');
    Route::get('transporter/{id}/view','Admin\TransporterController@showTransporter');
    Route::get('transporter/list','Admin\TransporterController@showList');

    /*
     * API End points
     */
    Route::get('/truck-owner/get-owners','Admin\APIController@getOwners');
    Route::get('/trucks/get-trucks','Admin\APIController@getTrucks');
    Route::get('/trucks/get-models','Admin\APIController@getTruckModels');
    Route::get('/trucks/get-model-details','Admin\APIController@getTruckModelDetails');
    Route::get('/transporters/get-transporters','Admin\APIController@getTransporters');

});





/*
 * Routes related to truck owner
 */

Route::group([
        'middleware'=>  'truckowner',
        'prefix'    =>  'truck-owner',
        'before'    =>  'auth'
    ],function(){

    Route::get('/','Owner\TruckOwnerController@index');
    Route::get('/trucks','Owner\TruckOwnerController@showTrucks');
    Route::get('/trucks/{id}/view','Owner\TruckOwnerController@viewTruck');
    Route::get('/track-trucks','Owner\TruckOwnerController@trackTrucks');
    Route::get('/live-bids','Owner\TruckOwnerController@viewLiveBids');
    Route::get('/search-loads','Owner\TruckOwnerController@searchLoads');
    Route::get('/view-participation','Owner\TruckOwnerController@viewParticipation');
    Route::get('/current-transactions','Owner\TruckOwnerController@currentTransactions');
    Route::get('/transaction-history','Owner\TruckOwnerController@transactionHistory');
    Route::get('/profile/{id}','owner\TruckOwnerController@profile');
});


Route::group([
    'middleware'=>  'transporter',
    'prefix'    =>  'transporter',
    'before'    =>  'auth'
],function() {

    Route::get('/', 'Transporter\TransporterController@index');

    Route::get('/requirement/create','Transporter\TransporterController@create');
    Route::post('/requirement/create','Transporter\TransporterController@createRequirement');
    Route::get('/requirement/list','Transporter\TransporterController@viewRequirement');

});


