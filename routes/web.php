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
//Login

//
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', [
        'uses' => 'AuthController@getLogin',
        'as' => 'Auth.login.getLogin'
    ]);
    Route::post('/login', [
        'uses' => 'AuthController@postLogin',
        'as' => 'Auth.login.postLogin'
    ]);
    Route::get('/logout', [
        'uses' => 'AuthController@logout',
        'as' => 'Auth.logout.logout'
    ]);
});

//Route::namespace('Admin')->prefix('/admin')->group(function () {
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    //Trang index
    Route::get('/', [
        'uses' => 'IndexController@index',
        'as' => 'admin.admin.index'
    ]);

    //Quan ly phong
    //Danh sach phong
    Route::get('/room', [
        'uses' => 'RoomController@getRoom',
        'as' => 'admin.room.getRoom'
    ]);

    // Sua phong
    Route::get('/edit-room/{id}', [
        'uses' => 'RoomController@getEditRoom',
        'as' => 'admin.room.getEditRoom'
    ])->middleware('role:Admin|Mod');

    Route::post('/edit-room', [
        'uses' => 'RoomController@postEditRoom',
        'as' => 'admin.room.postEditRoom'
    ])->middleware('role:Admin|Mod');
    //Them phong
    Route::get('/add-room', [
        'uses' => 'RoomController@getAddRoom',
        'as' => 'admin.room.getAddRoom'
    ])->middleware('role:Admin|Mod');

    Route::post('/add-room', [
        'uses' => 'RoomController@postAddRoom',
        'as' => 'admin.room.postAddRoom'
    ])->middleware('role:Admin|Mod');
    // Xoa phong
    Route::get('/delete-room/{id}', [
        'uses' => 'RoomController@deleteRoom',
        'as' => 'admin.room.deleteRoom'
    ])->middleware('role:Admin|Mod');

    //
    /*===================================================================
     * Quan ly user
     *===================================================================
     * */
    Route::get('/user', [
        'uses' => 'UserController@index',
        'as' => 'admin.user.index'
    ]);

    Route::get('/user/{id}', [
        'uses' => 'UserController@getEdit',
        'as' => 'admin.user.getEdit'
    ]);

    Route::post('/user', [
        'uses' => 'UserController@postEdit',
        'as' => 'admin.user.postEdit'
    ]);

    Route::get('add-user', [
        'uses' => 'UserController@getAdd',
        'as' => 'admin.user.getAdd'
    ])->middleware('role:Admin');

    Route::post('/add-user', [
        'uses' => 'UserController@postAdd',
        'as' => 'admin.user.postAdd'
    ])->middleware('role:Admin');

    Route::get('/delete-user/{id}', [
        'uses' => 'UserController@deleteUser',
        'as' => 'admin.user.deleteUser'
    ])->middleware('role:Admin');

    /*
     *===================================================================
     * */
    // Room-type
    Route::get('/room-type', [
        'uses' => 'RoomTypeController@getRoomType',
        'as' => 'admin.roomType.getRoomType'
    ]);

    //ADD
    Route::get('/add-room-type', [
        'uses' => 'RoomTypeController@addRoomType',
        'as' => 'admin.roomType.addRoomType'
    ])->middleware('role:Admin|Mod');

    Route::post('/add-room-type', [
        'uses' => 'RoomTypeController@addPostRoomType',
        'as' => 'admin.roomType.addPostRoomType'
    ])->middleware('role:Admin|Mod');

    //Edit
    Route::get('/edit-room-type/{id}', [
        'uses' => 'RoomTypeController@editGetRoomType',
        'as' => 'admin.roomType.editGetRoomType'
    ])->middleware('role:Admin|Mod');

    Route::post('/edit-room-type', [
        'uses' => 'RoomTypeController@editPostRoomType',
        'as' => 'admin.roomType.editPostRoomType'
    ])->middleware('role:Admin|Mod');

    //DEL
    Route::get('/delete-room-type/{id}', [
        'uses' => 'RoomTypeController@deleteRoomType',
        'as' => 'admin.roomType.deleteRoomType'
    ])->middleware('role:Admin|Mod');

    //================================================
    Route::get('/utility', [
        'uses' => 'UtilityController@getUtility',
        'as' => 'admin.utility.getUtility'
    ]);
    //add
    Route::get('/add-utility', [
        'uses' => 'UtilityController@getAddUtility',
        'as' => 'admin.utility.getAddUtility'
    ])->middleware('role:Admin|Mod');

    Route::post('/add-utility', [
        'uses' => 'UtilityController@postAddUtility',
        'as' => 'admin.utility.postAddUtility'
    ])->middleware('role:Admin|Mod');

    //edit
    Route::get('/edit-utility/{id}', [
        'uses' => 'UtilityController@getEditUtility',
        'as' => 'admin.utility.getEditUtility'
    ])->middleware('role:Admin|Mod');
    Route::post('/edit-utility', [
        'uses' => 'UtilityController@postEditUtility',
        'as' => 'admin.utility.postEditUtility'
    ])->middleware('role:Admin|Mod');
    //delete
    Route::get('/delete-utility/{id}', [
        'uses' => 'UtilityController@deleteUtility',
        'as' => 'admin.utility.deleteUtility'
    ])->middleware('role:Admin|Mod');

    //CONTACT
    Route::get('/contact', [
        'uses' => 'ContactController@getContact',
        'as' => 'admin.contact.getContact'
    ]);
    //About
    Route::get('/about', [
        'uses' => 'AboutController@getAbout',
        'as' => 'admin.about.getAbout'
    ]);

});

/*
 * ========================================================
 * Chotel
 * ========================================================
 * */

Route::namespace('Chotel')->group(function () {
    Route::get('/', [
        'uses' => 'IndexController@getIndex'
    ]);
    Route::get('/home', [
        'uses' => 'IndexController@getIndex',
        'as' => 'chotel.chotel.getIndex'
    ]);

    // Xem chi tiet
    Route::get('/detail/{id}', [
        'uses' => 'IndexController@detail',
        'as' => 'chotel.chotel.detail'
    ]);

    // Xem theo danh muc
    Route::get('/category/{type_id}', [
        'uses' => 'IndexController@getCategory',
        'as' => 'chotel.chotel.getCategory'
    ]);

    // ABout
    Route::get('/about', [
        'uses' => 'IndexController@getAbout',
        'as' => 'chotel.chotel.getAbout'
    ]);

    //contact
    Route::get('/contact', [
        'uses' => 'IndexController@getContact',
        'as' => 'chotel.chotel.getContact'
    ]);

    Route::post('/contact', [
        'uses' => 'IndexController@postContact',
        'as' => 'chotel.chotel.postContact'
    ]);

    //tim kiem
    Route::post('/search', [
        'uses' => 'IndexController@getSearch',
        'as' => 'chotel.chotel.getSearch'
    ]);
});



