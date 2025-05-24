<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'home')->name('home');
Route::view('/video', 'pages.video')->name('video');
Route::view('/cerca', 'pages.cerca')->name('cerca');
Route::view('/chat', 'pages.chat')->name('chat');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('/myProfile', 'pages.myProfile')->name('myProfile');
    Route::view('/newPost', 'pages.newPost')->name('post.create');
    Route::view('/newAlbum', 'pages.newAlbum')->name('album.create');
    Route::view('/myAlbums', 'pages.myAlbums')->name('album.myAlbums');
    Route::view('/myPosts', 'pages.myPosts')->name('post.myPosts');
    Route::view('/myAlbums/{idAlbum}', 'pages.album')->name('album.album');
    Route::view('/post/{idPost}', 'pages.post')->name('post.post');
    Route::view('/changeMyPic', 'pages.changeMyPic')->name('profile.change.pic');


    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
