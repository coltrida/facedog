<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/sign-in-advance', 'pages.sign-in-advance')->name('sign-in-advance');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'home')->name('home');

    // --------------------------- Profile ---------------------------//
    Route::view('/myProfile/connections', 'pages.myProfile.connections')->name('myProfile.connections');
    Route::view('/myProfile/posts', 'pages.myProfile.posts')->name('myProfile.posts');
    Route::view('/myProfile/about', 'pages.myProfile.about')->name('myProfile.about');
    Route::view('/myProfile/photos', 'pages.myProfile.photos')->name('myProfile.photos');
    Route::view('/myProfile/videos', 'pages.myProfile.videos')->name('myProfile.videos');

    // --------------------------           ------------------------- //
    Route::view('/newPost', 'pages.newPost')->name('post.create');
    Route::view('/newAlbum', 'pages.newAlbum')->name('album.create');
    Route::view('/myAlbums', 'pages.myAlbums')->name('album.myAlbums');
    Route::view('/myPosts', 'pages.myPosts')->name('post.myPosts');
    Route::view('/myAlbums/{idAlbum}', 'pages.album')->name('album.album');
    Route::view('/post/{idPost}', 'pages.post')->name('post.post');
    Route::view('/changeMyPic', 'pages.changeMyPic')->name('myProfile.change.pic');
    Route::view('/settings', 'pages.settings')->name('settings');




/*    Route::redirect('settings', 'settings/myProfile');
    Volt::route('settings/myProfile', 'settings.myProfile')->name('settings.myProfile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');*/
});

require __DIR__.'/auth.php';
