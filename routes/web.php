<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
        ->name('home');

Route::get('/ordertrete', [\App\Http\Controllers\OrderController::class, 'ordertrete']);


Route::get('/film/{id}', [\App\Http\Controllers\FilmController::class, 'film'])->name('film');

Route::get('/films/filter', [\App\Http\Controllers\FilmController::class, 'filter'])->name('filter');

Route::get('/create/{id}', [\App\Http\Controllers\FilmController::class, 'create'])->name('create');

Route::get('/show/{id}', [\App\Http\Controllers\FilmController::class, 'show']);

Route::get('/blognews/{category?}', [\App\Http\Controllers\BlogNewsController::class, 'index'])->name('blodnews');

Route::get('/photo/{id}', [\App\Http\Controllers\PhotoController::class, 'showphoto'])->name('photo');

Route::get('/UridInfo', function () {
    return Inertia::render('UridInfo');
})->name('UridInfo');

Route::get('photoalbum', [\App\Http\Controllers\PhotoController::class, 'index'])->name('photoalbum');

Route::get('studia/{id}', [\App\Http\Controllers\FilmController::class, 'studia'])->name('studia');

Route::get('photoalbum/{id}', [\App\Http\Controllers\PhotoController::class, 'show'])->name('photoalbums');

Route::get('photoofalbum/{id}', [\App\Http\Controllers\PhotoController::class, 'albomshow'])->name('photoofalbumview');

Route::get('kinoarchive', [\App\Http\Controllers\FilmController::class, 'index']
)->name('kinoarchive');

Route::get('actor/{id}', [\App\Http\Controllers\ActorController::class, 'index'])->name('actor');

Route::get('ContactsView', function () {
    return Inertia::render('ContactsView');
})->name('ContactsView');

Route::get('news/{id}', [\App\Http\Controllers\NewsController::class, 'show']
)->name('news');


Route::post('update/photo', [\App\Http\Controllers\PersonalController::class, 'updatePhoto']
)->name('upload_photo');

Route::get('personal', [\App\Http\Controllers\PersonalController::class, 'personal'])->middleware(['auth', 'verified'])->name('personal');

Route::post('personal/callback', [\App\Http\Controllers\PersonalController::class, 'callback'])->name('callback');

Route::post('orderes/photo', [\App\Http\Controllers\OrderController::class, 'orderPhoto'])->name('orderPhoto');

Route::post('orderes/photocolection', [\App\Http\Controllers\OrderController::class, 'orderPhotoCollection'])->name('orderPhotoCollection');

Route::get('search', [\App\Http\Controllers\SearchController::class, 'search']
)->name('search');

Route::get('search/{cat}/{data?}', [\App\Http\Controllers\SearchController::class, 'searchs']
)->name('searchs');

Route::post('searched', [\App\Http\Controllers\SearchController::class, 'searchdata']
)->name('searchdata');

Route::get('tag/search/{data?}', [\App\Http\Controllers\SearchController::class, 'searchtags']
)->name('searchtags');

//Route::get('personal', [\App\Http\Controllers\HomeController::class, 'personal'])->name('personal');





//Route::get('SearchView', function () {
//    return Inertia::render('SearchView');
//})->name('SearchView');

Route::get('/example/sale', function () {
    return Inertia::render('ExampleSaly');
})->name('examplesale');

Route::get('/doc/authors', function () {
    return Inertia::render('DocAuthor');
})->name('docauthors');

Route::get('/help', function () {
    return Inertia::render('Helps');
})->name('help');

Route::get('/terms/of/use', function () {
    return Inertia::render('Termsofuse');
})->name('termsofuse');

Route::get('/use/archive', function () {
    return Inertia::render('UseArchive');
})->name('usearchive');

Route::get('/privacy/policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacypolicy');

Route::get('/agreement/personal', function () {
    return Inertia::render('AgreementPersonal');
})->name('agreementpersonal');

Route::get('/policy/cookies', function () {
    return Inertia::render('PolicyCookies');
})->name('policycookies');

Route::get('/agreement/lisence', function () {
    return Inertia::render('AgreementLisence');
})->name('agreementlisence');

Route::get('/agreement/aurtor', function () {
    return Inertia::render('AgreementAurtor');
})->name('agreementaurtor');

Route::get('/agreement/model', function () {
    return Inertia::render('AgreementModel');
})->name('agreementmodel');

Route::get('/agreement/model/child', function () {
    return Inertia::render('AgreementModelChild');
})->name('agreementmodelchild');

Route::get('/agreement/property/owner', function () {
    return Inertia::render('AgreementPropertyOwner');
})->name('agreementpropertyowner');

Route::get('/VideoExample', function () {
    return Inertia::render('VideoExample');
})->name('VideoExample');


Route::get('/dashboard', function () {
    return redirect('personal');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
