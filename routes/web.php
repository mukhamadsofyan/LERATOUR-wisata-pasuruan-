<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\landingpage\HomeController as LandingpageHomeController;
use App\Http\Controllers\admin\{
    AdminChatController,
    WisataController,
    KategoriController,
    KeunggulanController,
    TestimoniController,
    GaleriController,
    InvoiceController,
    SliderController,
    SocialAuthController,
    TiketController
};
use App\Http\Controllers\landingpage\UserChatController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| PUBLIC / GUEST
|--------------------------------------------------------------------------
*/

// Route::get('/test-mail', function () {
//     Mail::raw('Tes Gmail SMTP berhasil', function ($m) {
//         $m->to('emailuser@gmail.com')->subject('Tes Gmail OTP');
//     });

//     return 'Email terkirim';
// });

Route::get('/chat', [UserChatController::class, 'show'])->name('chat.user');

// SEND message (user/admin)
Route::post('/chat/{conversation}/send', [MessageController::class, 'send'])->name('chat.send');
Route::get('/verify-email', [AuthController::class, 'form'])->name('verify.form');
Route::post('/verify-email', [AuthController::class, 'verify'])->name('verify.process');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('otp.resend');


Route::get('/', [LandingpageHomeController::class, 'index'])
    ->name('landingpage.home');

Route::get('/about', [LandingpageHomeController::class, 'about'])
    ->name('landingpage.about');
Route::get('/wisata-list', [LandingpageHomeController::class, 'WisataList'])
    ->name('landingpage.WisataList');



// Route::post('/tiket/selesai', [TiketController::class, 'selesai'])
//     ->name('tiket.selesai');
// Route::post('/tiket/pending', [TiketController::class, 'pending'])->name('tiket.pending');
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| USER (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/testimonial', [TestimoniController::class, 'createstimonialte'])
        ->name('user.testimonial.form');

    Route::post('/inserttestimonial', [TestimoniController::class, 'storetestimoni'])
        ->name('user.inserttestimoni');

    Route::get('/testimonial/succes', [TestimoniController::class, 'succestestimonial'])
        ->name('testimonial.succes');

    Route::post('/tiket/bayar', [TiketController::class, 'bayar'])
        ->name('tiket.bayar');
    Route::get('/invoice/{order_id}', [InvoiceController::class, 'show']);
    Route::get('/tiket/print/{order_id}', [InvoiceController::class, 'printTiket'])
        ->name('tiket.print');

    Route::get('/payment/pending', [TiketController::class, 'showPending'])
        ->name('payment.pending');
    Route::post('/tiket/pending', [TiketController::class, 'pending'])->name('tiket.pending');
    Route::post('/tiket/bayar-ulang', [TiketController::class, 'bayarUlang'])
        ->name('tiket.bayarUlang');

    Route::get('/payment/check/{order_id}', [TiketController::class, 'checkStatus'])
        ->name('payment.check');

    Route::get('/payment/finish', [TiketController::class, 'finish'])
        ->name('payment.finish');
    Route::get('/payment/poll/{order_id}', [TiketController::class, 'pollStatus'])
        ->name('payment.poll');
});

Route::get('/auth/google', [SocialAuthController::class, 'redirectGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [SocialAuthController::class, 'callbackGoogle']);

Route::get('/auth/github', [SocialAuthController::class, 'redirectGithub'])
    ->name('github.login');

Route::get('/auth/github/callback', [SocialAuthController::class, 'callbackGithub']);

/*
|--------------------------------------------------------------------------
| ADMIN (HARUS LOGIN → KALAU BELUM LOGIN AUTO KE /login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [WisataController::class, 'index'])
            ->name('admin.dashboard');

        // Slider
        Route::get('/admin/slider', [SliderController::class, 'slider'])->name('admin.slider');
        Route::get('/admin/editslider/{id}', [SliderController::class, 'editslider'])->name('admin.editslider');
        Route::put('/admin/updateslider/{id}', [SliderController::class, 'updateslider'])->name('admin.updateslider');
        // Kategori
        Route::get('/admin/kategori', [KategoriController::class, 'kategori'])->name('admin.kategori');
        Route::get('/admin/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('admin.tambahkategori');
        Route::post('/admin/insertkategori', [KategoriController::class, 'insertkategori'])->name('admin.insertkategori');
        Route::get('/admin/editkategori/{id}', [KategoriController::class, 'editkategori'])->name('admin.editkategori');
        Route::put('/admin/updatekategori/{id}', [KategoriController::class, 'updatekategori'])->name('admin.updatekategori');
        Route::delete('/admin/hapuskategori/{id}', [KategoriController::class, 'destroy'])->name('admin.hapuskategori');

        // Wisata
        Route::get('/admin/wisata', [WisataController::class, 'wisata'])->name('admin.wisata');
        Route::get('/admin/tambahwisata', [WisataController::class, 'tambahwisata'])->name('admin.tambahwisata');
        Route::post('/admin/insertwisata', [WisataController::class, 'insertwisata'])->name('admin.insertwisata');
        Route::get('/admin/editwisata/{id}', [WisataController::class, 'editwisata'])->name('admin.editwisata');
        Route::put('/admin/updatewisata/{id}', [WisataController::class, 'updatewisata'])->name('admin.updatewisata');
        Route::delete('/admin/hapuswisata/{id}', [WisataController::class, 'hapuswisata'])->name('admin.hapuswisata');

        // Keunggulan
        Route::get('/admin/keunggulan', [KeunggulanController::class, 'keunggulan'])->name('admin.keunggulan');
        Route::get('/admin/editkeunggulan/{id}', [KeunggulanController::class, 'editkeunggulan'])->name('admin.editkeunggulan');
        Route::put('/admin/updatekeunggulan/{id}', [KeunggulanController::class, 'updatekeunggulan'])->name('admin.updatekeunggulan');

        // Testimoni
        Route::get('/admin/testimonial', [TestimoniController::class, 'admintestimonial'])->name('admin.testimonial.index');
        Route::post('/testimonial/{id}/accept', [TestimoniController::class, 'accept'])->name('admin.testimonial.accept');
        Route::post('/testimonial/{id}/reject', [TestimoniController::class, 'reject'])->name('admin.testimonial.reject');
        Route::delete('/testimonial/{id}', [TestimoniController::class, 'delete'])->name('admin.testimonial.delete');
        // Galeri
        Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
        Route::get('/admin/tambahgaleri', [GaleriController::class, 'tambahgaleri'])->name('admin.tambahgaleri');
        Route::post('/admin/insertgaleri', [GaleriController::class, 'insertgaleri'])->name('admin.insertgaleri');
        Route::get('/admin/editgaleri/{id}', [GaleriController::class, 'editgaleri'])->name('admin.editgaleri');
        Route::put('/admin/updategaleri/{id}', [GaleriController::class, 'updategaleri'])->name('admin.updategaleri');
        Route::delete('/admin/hapusgaleri/{id}', [GaleriController::class, 'hapusgaleri'])->name('admin.hapusgaleri');

        // Invoice Admin
        Route::get('/invoice-admin', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])
            ->name('admin.invoice');

        Route::get('/invoice/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'showadmin'])
            ->name('admin.invoice.show');
        Route::get('/chat', [AdminChatController::class, 'index'])->name('admin.chat.index');
        Route::get('/chat/{conversation}', [AdminChatController::class, 'show'])->name('admin.chat.show');
        Route::post(
            '/admin/chat/{conversation}/send',
            [AdminChatController::class, 'send']
        )->name('chat.admin.send');
    });
