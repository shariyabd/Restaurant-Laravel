<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
// Route::get('/story', [FrontendController::class, 'story'])->name('frontend.story');



// frontend controller 
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.home');
    Route::get('/story', 'story')->name('frontend.story');
    Route::get('/menu', 'menu')->name('frontend.menu');
    Route::get('/news', 'news')->name('frontend.news');
    Route::get('/contact', 'contact')->name('frontend.contact');

    Route::post('/contact/store', 'storeContact')->name('frontend.contact.store');
    Route::post('/reservation', 'reservation')->name('frontend.reservation');
});






// Backend Contrller 
Route::middleware('auth')->group(function () {

    // Socialite 
    Route::get('login/facebook', [SocialController::class, 'facebookredirect']);
    Route::get('login/facebook/callback', [SocialController::class, 'loginWithFacebook']);

    Route::get('login/google', [SocialController::class, 'googleredirect']);
    Route::get('login/google/callback', [SocialController::class, 'loginWithGoogle']);


    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('backend.dashboard');
    });
    Route::controller(MenuController::class)->group(function () {
        Route::get('/dashboard/menu/create', 'addMenu')->name('backend.menu.add');
        Route::post('/dashboard/menu/store', 'menuStore')->name('backend.menu.store');
        Route::get('/dashboard/menu/manage', 'manageMenu')->name('backend.menu.manage');

        Route::post('/dashboard/menu/delete/{id}', 'deleteMenu')->name('backend.menu.delete');
        Route::get('/dashboard/menu/edit/{id}', 'editMenu')->name('backend.menu.edit');
        Route::post('/dashboard/menu/update/{id}', 'updateMenu')->name('backend.menu.update');
        Route::get('/dashboard/menu/show/{id}', 'showMenu')->name('backend.menu.show');
        // Route::get('/dashboard/menu/manage', 'manageMenu')->name('backend.menu.manage');
        

    });

   
    Route::controller(NewsController::class)->group(function(){
        Route::get('/dashboard/news/create', 'addNews')->name('backend.news.add');
        Route::post('/dashboard/news/store', 'newsStore')->name('backend.news.store');
        Route::get('/dashboard/news/manage', 'newsManage')->name('backend.news.manage');

        Route::post('/dashboard/news/delete/{id}', 'deleteNews')->name('backend.news.delete');
        Route::get('/dashboard/news/edit/{id}', 'editNews')->name('backend.news.edit');
        Route::post('/dashboard/news/update/{id}', 'updateNews')->name('backend.news.update');
        Route::get('/dashboard/news/show/{id}', 'showNews')->name('backend.news.show');
    });

    Route::controller(MemberController::class)->group(function(){
        Route::get('/dashboard/member/create', 'createMember')->name('backend.member.create');
        Route::post('/dashboard/member/store', 'storeMember')->name('backend.member.store');
        Route::get('/dashboard/member/manage', 'memberManage')->name('backend.member.manage');

        Route::post('/dashboard/member/delete/{id}', 'deleteMember')->name('backend.member.delete');
        Route::get('/dashboard/member/edit/{id}', 'editMember')->name('backend.member.edit');
        Route::post('/dashboard/member/update/{id}', 'updateMember')->name('backend.member.update');
        Route::get('/dashboard/member/show/{id}', 'showMember')->name('backend.member.show');
    });
});




// Route::get('/dashboard', function () {
//     return view('backend.modules.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
