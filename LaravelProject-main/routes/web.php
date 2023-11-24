<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OffreClientController;
use App\Http\Controllers\ContratClientController;
use App\Http\Controllers\ContratAdminController;
use App\Http\Controllers\OffreAdminController;






Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::post('/register', 'Auth\RegisterController@register');



Route::get('/', 'HomeController@index')->name('home');
Route::get('search', 'HomeController@search')->name('search');
Route::resource('jobs', 'JobController')->only(['index', 'show']);
Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');
Route::resource('projects', 'ProjectController')->only(['index', 'show']);

//claims
use App\Http\Controllers\ClaimController;
Route::post('/claim/submit', [ClaimController::class, 'submitClaim'])->name('claim.submit');
//claims comment
Route::get('/claim_comment', 'ClaimcommentController@index')->name('claimcomment.index');
Route::post('/claimcomment', 'ClaimcommentController@store')->name('claimcomment.store');


// navbar paths those should be shown in the home page to redirect us to the module of each one
Route::get('/facture', 'FactureController@index')->name('facture.index');
Route::get('/offres', 'OffreController@index')->name('offre.index');
Route::get('/contrats', 'ContratController@index')->name('contrat.index');

//
//route offre
Route::resource('offres', OffreController::class);
//route contrat
Route::resource('contrats', ContratController::class);

//route offre client
Route::resource('offresclient', OffreClientController::class);


//route contrat client
Route::resource('contratsclient', ContratClientController::class);
//route contrat admin
Route::get('/admin/contrats', 'ContratAdminController@index')->name('contratsadmin.index');
//route offre admin
Route::get('/admin/offres', 'OffreAdminController@index')->name('offresadmin.index');



//anas Payment

Route::post('/stripe/session/{facture_id}', 'PaymentController@session')->name('stripe.session');

Route::get('/success', [PaymentController::class, 'success'])->name('success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
Route::prefix('admin')->group(function() {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/edit/{id}', 'PaymentController@edit')->name('payment.edit');
    Route::put('/payment/update/{id}', 'PaymentController@update')->name('payment.update');

Route::get('/payment/view/{id}', 'PaymentController@view')->name('payment.view');
Route::delete('/payment/delete/{id}', 'PaymentController@delete')->name('payment.delete');
});

//TAHA BLOGS
Route::resource('blogs', BlogController::class);
Route::resource('comments', CommentController::class);

Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');



//anas facture
Route::resource('facture', FactureController::class);



//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
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

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // claims
    Route::delete('claims/destroy', 'ClaimController@massDestroy')->name('claims.massDestroy');
    Route::resource('claims', 'ClaimController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::resource('companies', 'CompaniesController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');

        //TASKS
    Route::delete('tasks/destroy', 'TasksController@massDestroy')->name('tasks.massDestroy');
    Route::resource('tasks', 'TasksController');

        //Projects
    Route::delete('project/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectsController');
    // Route::post('/admin/projects/{project}/update-status', [ProjectsController::class, 'updateStatus'])->name('admin.projects.updateStatus');


    Route::post('projects/{project}/update-status', 'ProjectsController@updateStatus')->name('admin.projects.updateStatus');


});
