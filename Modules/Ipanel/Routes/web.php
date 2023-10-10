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

Route::prefix('ipanel')->group(function() {
    Route::get('/', 'IpanelController@index');
});

// Route::group(['prefix'=>'ipanel'],function(){
//     Route::get('/','IpanelController@index');
// });
use App\Http\Controllers\BooksController;
Route::prefix("ipanel")->namespace('\Modules\Ipanel\Http\Controllers')->middleware(['auth'])->group(function(){
    Route::resource('categoripembelajaran','CategoriPembelajaranController');
    Route::resource('mpembelajaran','PembelajaranController');

    
    #Route::resource('tambahdata', BooksController::class);
    #Route::get('mpembelajaran/tambahdata/{id}', 'PembelajaranController@tambahdata')->name('mpembelajaran.tambahdata');
    Route::get('mpembelajaran/create_submateri/{id}', 'PembelajaranController@create_submateri')->name('mpembelajaran.create_submateri');
    Route::post('mpembelajaran/store_submateri/{id}', 'PembelajaranController@store_submateri')->name('mpembelajaran.store_submateri');
    Route::get('mpembelajaran/edit_submateri/{id}', 'PembelajaranController@edit_submateri')->name('mpembelajaran.edit_submateri');
    Route::get('mpembelajaran/destroy_submateri/{id}', 'PembelajaranController@destroy_submateri')->name('mpembelajaran.destroy_submateri');
    Route::post('mpembelajaran/update_submateri/{id}', 'PembelajaranController@update_submateri')->name('mpembelajaran.update_submateri');
    
    #NEW_MENU_NYA_YAA########################################################################################
    Route::resource('pengetahuan','PengetahuanController');
    Route::get('pengetahuan/create_submateri/{id}', 'PengetahuanController@create_submateri')->name('pengetahuan.create_submateri');
    Route::post('pengetahuan/store_submateri/{id}', 'PengetahuanController@store_submateri')->name('pengetahuan.store_submateri');
    Route::get('pengetahuan/edit_submateri/{id}', 'PengetahuanController@edit_submateri')->name('pengetahuan.edit_submateri');
    Route::get('pengetahuan/destroy_submateri/{id}', 'PengetahuanController@destroy_submateri')->name('pengetahuan.destroy_submateri');
    Route::post('pengetahuan/update_submateri/{id}', 'PengetahuanController@update_submateri')->name('pengetahuan.update_submateri');
    
    Route::get('pengetahuan/displayImage/{id}', 'PengetahuanController@displayImage')->name('pengetahuan.displayImage');

    ########################################################################################################################################
    // bellow this one
    Route::get('/threads/{channel}/{thread}', ['as' => 'thread.show', 'uses' => 'ThreadsController@show']);
    // this is missing
    Route::delete('threads/{channel}/{thread}', 'ThreadsController@destroy');
    ########################################################################################################################################
    /*
    Route::get('pengetahuan/displayImage/{id}', 'PengetahuanController@displayImage')->name('pengetahuan.displayImage');
    Route::get('pengetahuan/{filename}', 'PengetahuanController@displayImage')->name('pengetahuan.displayImage');
    Route::get('pengetahuan/img/{image}', function($image = null){
        $file = Storage::get('storage/images/assets_pengetahuan/' . $image);
        $mimetype = Storage::mimeType('storage/images/assets_pengetahuan/' . $image);
        return response($file, 200)->header('Content-Type', $mimetype);
    });*/
    Route::get('storage/{year}/{month}/{date}/{filename}', function ($year,$month,$date,$filename){
        $path = storage_path('/images/assets_pengetahuan/' .$year.'/'.$month.'/'.$date.'/'.$filename);//storage_public

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    });



    Route::resource('pengetahuan_category','PengetahuanCategoryController');
    Route::resource('pengetahuan_highlight','PengetahuanHighlightController');
    Route::resource('pengetahuan_rating','PengetahuanRatingController');
    Route::resource('pengetahuan_comments','PengetahuanCommentController');
    

    Route::resource('contact_us','ContactUsController');

    Route::resource('hubungi_admin','HubungiAdminController');
    Route::post('hubungi_admin/reply_comments/{id}', 'HubungiAdminController@reply_comments')->name('hubungi_admin.reply_comments');

    
    
    #Route::resource('create_submateri','PembelajaranController');  
    #Route::get('create_submateri', 'PembelajaranController@open'); 
    
    #Route::get('Purchase_details/open', 'Purchase_detailsController@open');
    #Route::resource('Purchase_details', 'Purchase_detailsController');
});