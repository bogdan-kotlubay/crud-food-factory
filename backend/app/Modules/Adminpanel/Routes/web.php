<?php

Route::group( [ 'namespace' => 'App\Modules\Adminpanel\Controllers', 'as' => 'adminpanel.', 'middleware' => 'auth', 'middleware' => 'web', 'prefix' => 'admin',
], function(){
    Route::get('/', ['uses' => 'AdminController@index']);
    Route::post('/sendcomingproducts', ['uses' => 'AdminController@send', 'as' => 'sendproducts']);
    Route::resource('users', 'UsersController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('branches', 'BranchesController');
    Route::resource('positions', 'PositionsController');
    Route::resource('tasks', 'TasksController');
    Route::resource('comingproducts', 'ComingProductsController');
    Route::resource('uncomingproducts', 'UncomingProductsController');
    Route::delete('/destroyAll', ['as'=>'destroyAll', 'uses'=>'DirectoryProductsController@directoryDestroyAll']);
    Route::delete('adminpanel.directory.destroy', 'DirectoryProductsController@destroy');
    Route::resource('directory', 'DirectoryProductsController');
    Route::resource('proposallogs', 'ProposalLogsController');
});
