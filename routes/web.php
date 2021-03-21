<?php

Route::redirect('/', '/login');

Route::get('/linkstorage', function () {
Artisan::call('storage:link');
return 'good';

});

Route::get('/clear-cache', function() {
$run = Artisan::call('config:clear');
$run = Artisan::call('cache:clear');
$run = Artisan::call('config:cache');
return 'FINISHED';
});

Route::get('/home', function () {


    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin
 

Route::group(['prefix' => 'admin', 
  'as' => 'admin.',
  'namespace' => 'Admin',
  'middleware' => ['auth']], function () {
    
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');


    // sections
    Route::resource('sections', 'SectionController');
    Route::get('sections/create', 'SectionController@create')->name('section-create');

    Route::get('questionanswer/{answer}', 'SectionController@deleteAnswer')->name('questionanswer.delete');

       // end routres for section
      Route::get('sections/{section}/update', 'SectionController@edit')->name('section.edit');
      Route::get('sections/{section}', 'SectionController@show')->name('section.show');
      Route::get('sections/{section}/status', 'SectionController@status')->name('section.status');

      Route::post('sections/{section}/update', 'SectionController@update')->name('section.update');
      Route::get('sections/{section}/delete', 'SectionController@destroy')->name('section.delete');
      Route::get('questionanswer/{answer}', 'SectionController@deleteAnswer')->name('questionanswer.delete');
       // routes for questiones
       Route::get('/section/{section}/question/create', 'QuestionController@create')->name('question.create');
       Route::post('/section/{section}/question/create', 'QuestionController@store')->name('question.store');
       Route::get('/section/{section}/question/{question}/update', 'QuestionController@edit')->name('question.edit');
       Route::post('/section/{section}/question/{question}/update',
       'QuestionController@update')->name('question.update');
       Route::get('/section/{section}/question/{question}/delete',
       'QuestionController@destroy')->name('question.delete');
       //end routes for questions

           Route::get('/questionnaire/{section}', 'QuestionnaireController@formShow')->name('questionnaire.show');
            Route::post('/questionnaire/{section}', 'QuestionnaireController@formStore')->name('questionnaire.store');



              Route::get('/questionnaire/{section}', 'QuestionnaireController@formShow')->name('questionnaire.show');
              Route::post('/questionnaire/{section}', 'QuestionnaireController@formStore')->name('questionnaire.store');

           
});
   // update excel file
   Route::get('/file/{section}', 'Admin\ExceleController@storeExcel')->name('file.store');
   
     Route::get('/download/file/{section}', 'Admin\ExceleController@downloadFile')->name('file.download');
