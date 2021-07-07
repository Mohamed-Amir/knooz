<?php

Route::post('/admin/login', 'AuthController@login')->name('admin.login');

Route::prefix('Admin')->group(function () {
    Route::get('/login', function () {
        return view('Admin.loginAdmin');
    });
    Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function () {

        Route::get('/logout/logout', 'AuthController@logout')->name('user.logout');
        Route::get('/home', 'AuthController@index')->name('admin.dashboard');

        // Profile Route
        Route::prefix('profile')->group(function () {
            Route::get('/index', 'profileController@index')->name('profile.index');
            Route::post('/index', 'profileController@update')->name('profile.update');
        });

        // Admin Routes
        Route::prefix('Admin')->group(function () {
            Route::get('/index', 'AdminController@index')->name('Admin.index');
            Route::get('/allData', 'AdminController@allData')->name('Admin.allData');
            Route::post('/create', 'AdminController@create')->name('Admin.create');
            Route::get('/edit/{id}', 'AdminController@edit')->name('Admin.edit');
            Route::post('/update', 'AdminController@update')->name('Admin.update');
            Route::get('/destroy/{id}', 'AdminController@destroy')->name('Admin.destroy');
        });

        /** Sliders */
        Route::prefix('Sliders')->group(function () {
            Route::get('/index', 'SlidersController@index')->name('Sliders.index');
            Route::get('/allData', 'SlidersController@allData')->name('Sliders.allData');
            Route::post('/create', 'SlidersController@create')->name('Sliders.create');
            Route::get('/edit/{id}', 'SlidersController@edit')->name('Sliders.edit');
            Route::post('/update', 'SlidersController@update')->name('Sliders.update');
            Route::get('/destroy/{id}', 'SlidersController@destroy')->name('Sliders.destroy');
        });

        /** Categories */
        Route::prefix('Categories')->group(function () {
            Route::get('/index', 'CategoriesController@index')->name('Categories.index');
            Route::get('/allData', 'CategoriesController@allData')->name('Categories.allData');
            Route::post('/create', 'CategoriesController@create')->name('Categories.create');
            Route::get('/edit/{id}', 'CategoriesController@edit')->name('Categories.edit');
            Route::post('/update', 'CategoriesController@update')->name('Categories.update');
            Route::get('/destroy/{id}', 'CategoriesController@destroy')->name('Categories.destroy');
        });

        /** Products */
        Route::prefix('Products')->group(function () {
            Route::get('/index', 'ProductsController@index')->name('Products.index');
            Route::get('/allData', 'ProductsController@allData')->name('Products.allData');
            Route::post('/create', 'ProductsController@create')->name('Products.create');
            Route::get('/edit/{id}', 'ProductsController@edit')->name('Products.edit');
            Route::post('/update', 'ProductsController@update')->name('Products.update');
            Route::get('/destroy/{id}', 'ProductsController@destroy')->name('Products.destroy');
        });

        /** Projects */
        Route::prefix('Projects')->group(function () {
            Route::get('/index', 'ProjectsController@index')->name('Projects.index');
            Route::get('/allData', 'ProjectsController@allData')->name('Projects.allData');
            Route::post('/create', 'ProjectsController@create')->name('Projects.create');
            Route::get('/edit/{id}', 'ProjectsController@edit')->name('Projects.edit');
            Route::post('/update', 'ProjectsController@update')->name('Projects.update');
            Route::get('/destroy/{id}', 'ProjectsController@destroy')->name('Projects.destroy');
        });

        /** About */
        Route::prefix('About')->group(function () {
            Route::get('/index', 'AboutController@index')->name('About.index');
            Route::get('/allData', 'AboutController@allData')->name('About.allData');
            Route::get('/edit/{id}', 'AboutController@edit')->name('About.edit');
            Route::post('/update', 'AboutController@update')->name('About.update');
        });

        /** NewsLetter */
        Route::prefix('NewsLetter')->group(function () {
            Route::get('/index', 'NewsLetterController@index')->name('NewsLetter.index');
            Route::get('/allData', 'NewsLetterController@allData')->name('NewsLetter.allData');
        });


        /** Project_images */
        Route::prefix('Project_images')->group(function () {
            Route::get('/index', 'Project_imagesController@index')->name('Project_images.index');
            Route::get('/allData', 'Project_imagesController@allData')->name('Project_images.allData');
            Route::post('/create', 'Project_imagesController@create')->name('Project_images.create');
            Route::get('/edit/{id}', 'Project_imagesController@edit')->name('Project_images.edit');
            Route::post('/update', 'Project_imagesController@update')->name('Project_images.update');
            Route::get('/destroy/{id}', 'Project_imagesController@destroy')->name('Project_images.destroy');
        });

        /** Massages */
        Route::prefix('Massages')->group(function () {
            Route::get('/index', 'MassagesController@index')->name('Massages.index');
            Route::get('/allData', 'MassagesController@allData')->name('Massages.allData');
            Route::get('/show/{id}', 'MassagesController@show')->name('Massages.show');
            Route::get('/destroy/{id}', 'MassagesController@destroy')->name('Massages.destroy');
        });
});
});

