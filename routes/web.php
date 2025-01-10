<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiMitraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MitraController;

Route::get('/', [UserController::class, 'showHome'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.action');

    Route::middleware(['auth:admin','autologout'])->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
    
    Route::middleware('auth:admin', 'separate.session:admin')->group(function () {
        Route::get('kategori', [AdminController::class, 'showKategori'])->name('admin.kategori');

        // Route untuk Kelola Kategori
        Route::get('add-kategori', [AdminController::class, 'showAddKategoriPage'])->name('admin.add-kategori-page');
        Route::post('add-kategori', [AdminController::class, 'addKategoriAction'])->name('admin.add-kategori-action');
        Route::get('edit-kategori/{id}', [AdminController::class, 'showEditKategoriPage'])->name('admin.edit-kategori-page');
        Route::put('edit-kategori/{id}', [AdminController::class, 'editKategoriAction'])->name('admin.edit-kategori-action');
        Route::delete('delete-kategori/{id}', [AdminController::class, 'deleteKategoriAction'])->name('admin.delete-kategori-action');

        // Route untuk Kelola User
        Route::get('user', [AdminController::class, 'showUserPage'])->name('admin.user');

        // Route untuk Kelola Employer
        Route::get('employer', [AdminController::class, 'showEmployerPage'])->name('admin.employer');

        // Route untuk Kelola Setting
        Route::get('setting', [AdminController::class, 'showSettingPage'])->name('admin.setting');
        Route::get('edit-setting/{id}', [AdminController::class, 'showEditSettingPage'])->name('admin.edit-setting-page');
        Route::put('edit-setting/{id}', [AdminController::class, 'editSettingAction'])->name('admin.edit-setting-action');
    });
});

Route::prefix('mitra')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginMitra'])->name('mitra.login');
    Route::post('login', [AuthController::class, 'loginMitra'])->name('mitra.login.action');
    Route::get('register', [AuthController::class, 'showRegisterMitra'])->name('mitra.register');
    Route::post('register', [AuthController::class, 'registerMitraAction'])->name('mitra.register.action');

    Route::get('logout', [AuthController::class, 'logoutMitra'])->name('mitra.logout');
        
    Route::middleware(['auth:mitra', 'separate.session:mitra'])->group(function () {
        // Route::get('dashboard/{id}', [MitraController::class, 'showDashboard'])->name('mitra.dashboard');

        // Kelola Kegiatan
        Route::get('kegiatan/{id}', [MitraController::class, 'showKegiatanPage'])->name('mitra.kegiatan');
        Route::get('add-kegiatan/{id}', [MitraController::class, 'showAddKegiatanPage'])->name('mitra.add-kegiatan-page');
        Route::post('add-kegiatan/{id}', [MitraController::class, 'addKegiatanAction'])->name('mitra.add-kegiatan-action');
        Route::get('detail-kegiatan/{id}/{id_keg}', [MitraController::class, 'showDetailKegiatanPage'])->name('mitra.detail-kegiatan-page');
        Route::get('edit-kegiatan/{id}/{id_keg}', [MitraController::class, 'showEditKegiatanPage'])->name('mitra.edit-kegiatan-page');
        Route::put('edit-kegiatan/{id}/{id_keg}', [MitraController::class, 'editKegiatanAction'])->name('mitra.edit-kegiatan-action');
        Route::delete('remove-kegiatan/{id}/{id_keg}', [MitraController::class, 'removeKegiatanAction'])->name('mitra.delete-kegiatan-action');

        Route::get('add-benefit-kegiatan/{id}/{id_keg}', [MitraController::class, 'showAddBenefitKegiatanPage'])->name('mitra.add-benefit-kegiatan-page');
        Route::post('add-benefit-kegiatan/{id_keg}', [MitraController::class, 'addBenefitKegiatanAction'])->name('mitra.add-benefit-kegiatan-action');
        Route::delete('{id_keg}/remove-benefit/{id_benefit}', [MitraController::class, 'removeBenefit'])->name('mitra.remove-benefit-action');

        Route::get('add-kriteria-kegiatan/{id}/{id_keg}', [MitraController::class, 'showAddKriteriaKegiatanPage'])->name('mitra.add-kriteria-kegiatan-page');
        Route::post('add-kriteria-kegiatan/{id_keg}', [MitraController::class, 'addKriteriaKegiatanAction'])->name('mitra.add-kriteria-kegiatan-action');
        Route::delete('{id_keg}/remove-kriteria/{id_kriteria}', [MitraController::class, 'removeKriteria'])->name('mitra.remove-kriteria-action');

        // Route untuk Kelola Pendaftar
        Route::get('pendaftar/{id}', [MitraController::class, 'showPendaftarPage'])->name('mitra.pendaftar');
        Route::get('detail-pendaftar/{id}/{id_pendaftar}', [MitraController::class, 'showDetailPendaftarPage'])->name('mitra.detail.pendaftar');
        Route::patch('pendaftar/{id}/update-status', [MitraController::class, 'updateStatus'])->name('mitra.updateStatus');
        Route::post('add-interview-date/{id_pendaftar}', [MitraController::class, 'addInterviewAction'])->name('mitra.add-interview-action');
        Route::put('edit-interview-date/{id_pendaftar}', [MitraController::class, 'editInterviewAction'])->name('mitra.edit-interview-action');
        Route::post('add-note/{id_pendaftar}', [MitraController::class, 'addNoteAction'])->name('mitra.add-note-action');
        Route::put('edit-note/{id_pendaftar}', [MitraController::class, 'editNoteAction'])->name('mitra.edit-note-action');
        // Route::post('send-note-hire/{id_pendaftar}', [MitraController::class, 'updateStatusHire'])->name('send.note.hire');
        // Route::post('send-note-reject/{id_pendaftar}', [MitraController::class, 'updateStatusReject'])->name('send.note.reject');
        
        //status applicant
        Route::post('pendaftar/shortlist/{id}/{id_pendaftar}', [MitraController::class, 'shortlist'])->name('applicant.shortlist');
        Route::post('pendaftar/interview/{id_pendaftar}', [MitraController::class, 'interview'])->name('applicant.interview');
        Route::post('pendaftar/hire/{id_pendaftar}', [MitraController::class, 'hire'])->name('applicant.hire');
        Route::post('pendaftar/reject/{id_pendaftar}', [MitraController::class, 'reject'])->name('applicant.reject');

        //Kelola Profile Perusahaan
        Route::get('edit-detail/{id}', [MitraController::class, 'showEditMitraPage'])->name('mitra.edit-profile-page');
        Route::put('edit-detail/{id}', [MitraController::class, 'editMitraAction'])->name('mitra.edit-profile-action');
        Route::post('edit-foto-profile/{id}', [MitraController::class, 'editFotoProfileAction'])->name('mitra.edit-foto-profile-action');
        Route::delete('delete-foto-profile/{id}', [MitraController::class, 'deleteFotoProfileAction'])->name('mitra.delete-foto-profile-action');

        // Change password
        Route::get('change-password/{id}', [MitraController::class, 'showChangePasswordPage'])->name('mitra.change-password-page');
    });
});

Route::prefix('user')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginUser'])->name('user.login');
    Route::post('login', [AuthController::class, 'loginUser'])->name('user.login.action');
    Route::get('register', [AuthController::class, 'showRegisterUser'])->name('user.register');
    Route::post('register', [AuthController::class, 'registerUserAction'])->name('user.register.action');
    Route::get('Kegiatan', [UserController::class, 'showDaftarKegiatan'])->name('daftar.kegiatan');
    Route::get('faq', [UserController::class, 'showFaqPage'])->name('user.faq');

    Route::get('search', [UserController::class, 'search'])->name('search');

    Route::get('detail-kegiatan/{id_kegiatan}', [UserController::class, 'showDetailKegiatan'])->name('user.detail-kegiatan');
    Route::get('/signup', function () {
        return view('user/layout/signup');
    });
   // Mitra page
    Route::get('partner', [UserController::class, 'showAllPartnerPage'])->name('partner');

    Route::middleware(['auth', 'separate.session:users'])->group(function () {
        Route::get('logout', [AuthController::class, 'logoutUser'])->name('user.logout');
        // Route::get('daftar-volunteer', function () {
        //     return view('user.layout.daftar-volunteer');
        // });

        // (User) Route untuk Daftar Kegiatan
        Route::get('kegiatan/{id}', [UserController::class, 'showDaftarKegiatanPage'])->name('user.daftarKegiatan');

        // (User) Route untuk Detail User
        Route::get('detail-profile/{id}', [UserController::class, 'showDetailUserPage'])->name('user.detail-profile-page');
        Route::put('edit-detail/{id}', [UserController::class, 'editUserAction'])->name('user.edit-profile-action');
        Route::put('edit-foto-profile/{id}', [UserController::class, 'editFotoProfileAction'])->name('user.edit-foto-profile-action');
        Route::put('edit-contact/{id}', [UserController::class, 'editContactAction'])->name('user.edit-contact-action');
        Route::put('edit-akun/{id}', [UserController::class, 'editAkunAction'])->name('user.edit-akun-action');
        Route::post('add-skill/{id}', [UserController::class, 'addSkillAction'])->name('user.add-skill-action');
        Route::delete('{id}/remove-skill/{id_skill}', [UserController::class, 'removeSkill'])->name('user.remove-skill-action');
        Route::post('add-experience/{id}', [UserController::class, 'addExperienceAction'])->name('user.add-experience-action');
        Route::put('edit-experience/{id}/{id_experience}', [UserController::class, 'editExperienceAction'])->name('user.edit-experience-action');
        Route::delete('remove-experience/{id}/{id_experience}', [UserController::class, 'removeExperienceAction'])->name('user.remove-experience-action');


        // (User) Route untuk Detail Kegiatan
        Route::get('{id}/detail-kegiatan/{id_kegiatan}', [UserController::class, 'showDetailKegiatanPage'])->name('user.detail-kegiatan-page');

        // (User) Route untuk Daftar Kegiatan
        Route::post('{id}/add-pendaftaran/{id_kegiatan}', [UserController::class, 'addPendaftaranAction'])->name('user.add-pendaftaran-action');
    });
});

Route::get('/home', [UserController::class, 'showHome'])->name('home');


// ROUTE API
Route::prefix('mitraApi')->group(function () {

    Route::get('login', [ApiMitraController::class, 'showLoginMitra'])->name('api.mitra.login');
    Route::post('login', [ApiMitraController::class, 'loginMitra'])->name('api.mitra.login.action');
    Route::get('register', [ApiMitraController::class, 'showRegisterMitra'])->name('api.mitra.register');
    Route::post('register', [ApiMitraController::class, 'registerMitraAction'])->name('api.mitra.register.action');

    Route::middleware(['auth.api'])->group(function () {
        Route::get('kegiatan/{id}', [ApiMitraController::class, 'showKegiatanPage'])->name('api.mitra.kegiatan');
    });
});
