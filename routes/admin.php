<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SafariController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JoinSafariController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Guest routes (login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.index');

        // Safaris CRUD
        Route::resource('safaris', SafariController::class)->except(['show']);
        Route::patch('/safaris/{safari}/toggle-featured', [SafariController::class, 'toggleFeatured'])->name('safaris.toggle-featured');
        Route::patch('/safaris/{safari}/toggle-active', [SafariController::class, 'toggleActive'])->name('safaris.toggle-active');

        // Destinations CRUD
        Route::resource('destinations', DestinationController::class)->except(['show']);

        // Blog Posts CRUD
        Route::resource('blog', BlogPostController::class)->except(['show']);
        Route::patch('/blog/{slug}/toggle-publish', [BlogPostController::class, 'togglePublish'])->name('blog.toggle-publish');
        Route::post('/blog/upload-image', [BlogPostController::class, 'uploadImage'])->name('blog.upload-image');

        // Gallery Management
        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/gallery/upload', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery/upload', [GalleryController::class, 'store'])->name('gallery.store');
        Route::put('/gallery/{galleryImage}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::patch('/gallery/{galleryImage}/toggle-active', [GalleryController::class, 'toggleActive'])->name('gallery.toggle-active');
        Route::delete('/gallery/{galleryImage}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        Route::post('/gallery/reorder', [GalleryController::class, 'reorder'])->name('gallery.reorder');
        Route::post('/gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulk-delete');
        Route::post('/gallery/sync', [GalleryController::class, 'syncFromFilesystem'])->name('gallery.sync');

        // Bookings
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
        Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.update-status');
        Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

        // Inquiries
        Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::patch('/inquiries/{inquiry}/notes', [InquiryController::class, 'updateNotes'])->name('inquiries.update-notes');
        Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Contact Messages
        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::patch('/messages/{contactMessage}/notes', [ContactMessageController::class, 'updateNotes'])->name('messages.update-notes');
        Route::delete('/messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

        // Join Safaris CRUD
        Route::resource('join-safaris', JoinSafariController::class);
        Route::patch('/join-safaris/{joinSafari}/toggle-featured', [JoinSafariController::class, 'toggleFeatured'])->name('join-safaris.toggle-featured');
        Route::patch('/join-safaris/{joinSafari}/toggle-active', [JoinSafariController::class, 'toggleActive'])->name('join-safaris.toggle-active');
        Route::patch('/join-safaris/{joinSafari}/status', [JoinSafariController::class, 'updateStatus'])->name('join-safaris.update-status');

        // Join Safari Vehicle Management
        Route::patch('/join-safaris/{joinSafari}/check-vehicles', [JoinSafariController::class, 'checkVehicles'])->name('join-safaris.check-vehicles');
        Route::patch('/join-safari-vehicles/{vehicle}/cancel', [JoinSafariController::class, 'cancelVehicle'])->name('join-safari-vehicles.cancel');

        // Join Safari Participants
        Route::patch('/join-safari-participants/{participant}/confirm', [JoinSafariController::class, 'confirmParticipant'])->name('join-safari-participants.confirm');
        Route::delete('/join-safari-participants/{participant}', [JoinSafariController::class, 'destroyParticipant'])->name('join-safari-participants.destroy');

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
