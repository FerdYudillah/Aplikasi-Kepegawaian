<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DataParkirController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NaikBerkalaController;
use App\Http\Controllers\NaikPangkatController;
use App\Http\Controllers\cetakPangkatController;
use App\Http\Controllers\cetakGolonganController;
use App\Http\Controllers\cetakNaikPangkatController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KepalaController;

// use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/download', [App\Http\Controllers\HomeController::class, 'download'])->name('download');

//Route Landing Page
Route::get('/', [LandingPageController::class, 'show']);

//Route Login
Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses')->name('login.proses');
    Route::post('logout', 'logout')->name('logout');
});

//Route Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register-create', [RegisterController::class, 'store'])->name('create.register');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('print-pegawai/{id}', [PegawaiController::class, 'printPegawai'])->name('print.pegawai')->middleware('auth');
    Route::get('print-berkala/{id}', [NaikBerkalaController::class, 'cetakBerkalaPegawai'])->name('print.usulan')->middleware('auth');


//ADMIN
Route::group(['prefix' => 'Admin', 'middleware' => ['auth','role:Admin|Kepala']], function(){
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('naik-berkala', NaikBerkalaController::class);
    Route::resource('gaji', GajiController::class);
    Route::resource('pangkat', PangkatController::class);
    Route::resource('kasat', KepalaController::class);

    //landing page crud
    Route::get('/landing-pages', [LandingPageController::class, 'list']);
    Route::get('/landing-page/{id}', [LandingPageController::class, 'form']);
    Route::post('/landing-page/{id}', [LandingPageController::class, 'save']);
    Route::post('/landing-page-delete', [LandingPageController::class, 'delete']);

    Route::get('show-riwayat-pendidikan/{id}', [PegawaiController::class, 'showRiwayatPend'])->name('show.pendidikan');
    //cetak Daftar PNS
    Route::get('print-pns', [PegawaiController::class, 'printPDF'])->name('print.listPns');
    Route::get('print-pns-excel', [PegawaiController::class, 'printExcel'])->name('print.listPns.excel');
    Route::get('print-satpol', [PegawaiController::class, 'printPegawaiSatpol'])->name('print.satpol');
    Route::get('print-damkar', [PegawaiController::class, 'printPegawaiDamkar'])->name('print.damkar');
    Route::get('print-laki', [PegawaiController::class, 'printPegawaiLaki'])->name('print.laki');
    Route::get('print-perempuan', [PegawaiController::class, 'printPegawaiperempuan'])->name('print.perempuan');
    Route::get('print-istri', [PegawaiController::class, 'printSI'])->name('print.istri');

    //route Data Kenaikan Pangkat :
    Route::get('/menu-kenaikan-pangkat', [NaikPangkatController::class, 'naikPangkatMenuAdmin'])->name('data.naikPangkat');

    //Jabatan Reguler Eselon Struktural
    Route::get('/index-struktural', [NaikPangkatController::class, 'AdminStruktural'])->name('index.struktural');
    Route::get('/approval-struktural/{kenaikan_id}', [NaikPangkatController::class, 'approvalStruktural'])->name('approval.struktural');
    Route::post('/approval-struktural/{kenaikan_id}', [NaikPangkatController::class, 'saveApprovalStruktural']);
    Route::get('/print-res/{id}', [NaikPangkatController::class, 'cetakListRES'])->name('cetak.res');
    Route::get('/print-list-res/{id}', [NaikPangkatController::class, 'cetakListEs'])->name('cetak.list.res');
    Route::get('/print-usulan-res/{id}', [NaikPangkatController::class, 'cetakUsulan'])->name('usulan.res');

    //Jabatan  Pelaksana Staf
    Route::get('/index-pelasana-staf', [NaikPangkatController::class, 'AdminPS'])->name('index.ps');
    Route::get('/approval-pelasana-staf/{kenaikan_id}', [NaikPangkatController::class, 'approvalPS'])->name('approval.ps');
    Route::post('/approval-pelasana-staf/{kenaikan_id}', [NaikPangkatController::class, 'saveApprovalPS']);
    Route::get('/print-list-ps/{id}', [NaikPangkatController::class, 'cetakListPS'])->name('cetak.list.ps');
    Route::get('/print-usulan-ps/{id}', [cetakNaikPangkatController::class, 'cetakUsulan'])->name('cetak.usulan.ps');

    //Jabatan  Pelaksana Staf Penyesuaian Ijazah
    Route::get('/index-pelasana-staf-ijazah', [NaikPangkatController::class, 'AdminPSI'])->name('index.psi');
    Route::get('/approval-pelasana-staf-ijazah/{kenaikan_id}', [NaikPangkatController::class, 'approvalPSI'])->name('approval.psi');
    Route::post('/approval-pelasana-staf-ijazah/{kenaikan_id}', [NaikPangkatController::class, 'saveApprovalPSI']);
    Route::get('/print-rekap-psi/{id}', [cetakNaikPangkatController::class, 'cetakListPSI'])->name('cetak.rekap.psi');
    Route::get('/print-usulan-psi/{id}', [cetakNaikPangkatController::class, 'cetakUsulanPSI'])->name('cetak.usulan.psi');

    //Jabatan Fungsional Tertentu
    Route::get('/index-fungsional', [NaikPangkatController::class, 'AdminFT'])->name('index.ft');
    Route::get('/approval-fungsional/{kenaikan_id}', [NaikPangkatController::class, 'approvalFT'])->name('approval.ft');
    Route::post('/approval-fungsional/{kenaikan_id}', [NaikPangkatController::class, 'saveApprovalFT']);

    //print
    Route::get('/print-rekap-ft/{id}', [cetakNaikPangkatController::class, 'cetakListFT'])->name('cetak.rekap.ft');
    Route::get('/print-usulan-ft/{id}', [cetakNaikPangkatController::class, 'cetakUsulanFT'])->name('cetak.usulan.ft');

    //Print Rekap Kenaikan Pangkat PNS Pertanggal
    Route::post('print-pangkat-pertanggal', [NaikPangkatController::class, 'cetakPertanggal'])->name('print-tanggal.NP');

    //route Data Kenaikan Gaji Berkala :
    Route::get('/index.berkala', [NaikBerkalaController::class, 'indexAdmin'])->name('berkala.admin');
    Route::get('/approval-berkala/{kenaikan_id}', [NaikBerkalaController::class, 'approvalAdmin'])->name('approval.berkala.admin');
    Route::post('/approval-berkala/{kenaikan_id}', [NaikBerkalaController::class, 'saveApprovalAdmin'])->name('saveapproval.berkala.admin');
    Route::get('print-berkala', [NaikBerkalaController::class, 'cetakBerkala'])->name('print-berkala');
    Route::post('print-berkala-pertanggal', [NaikBerkalaController::class, 'cetakPerbulan'])->name('print-tanggal');

    //Tambah ADmin
    Route::get('/tambah-admin/{id}', [PegawaiController::class, 'tambahAdmin'])->name('tambah.admin');
    Route::put('/update-admin/{id}', [PegawaiController::class, 'ubahRole'])->name('update.admin');

    //kirim email
    Route::post('/email-kirim-kenaikan/{kenaikan_id}', [HomeController::class, 'sendNotif'])->name('kirim-notif');
    Route::get('email', [PegawaiController::class, 'indexEmail'])->name('index.email');
    Route::post('email-kirim', [PegawaiController::class, 'sendEmail'])->name('kirim-email');

    //Route Cetak Berdasarkan Golongan
    Route::get('/index-cetak-BG', [cetakGolonganController::class, 'index'])->name('index.cetakBG');
    Route::get('print-golongan/{id}', [cetakGolonganController::class, 'printGolongan'])->name('cetak.golongan');

    //Route Cetak Berdasarkan Pangkat PNS
    Route::get('/index-cetak-BP', [cetakPangkatController::class, 'index'])->name('index.cetakBP');
    Route::get('/print-pangkat/{id}', [cetakPangkatController::class, 'printpangkat'])->name('cetak.pangkat');

    //Route Untuk Hapus Reminder
    Route::post('/hapus-reminder', [NaikPangkatController::class, 'hapusReminder'])->name('hapus.reminder');
    Route::post('/hapus-reminder-berkala', [NaikBerkalaController::class, 'hapusReminderBerkala'])->name('hapus.reminder.berkala');

    //Route Halaman Arsip Dokumen
    route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    route::get('/dokumen-tambah/{id}', [DokumenController::class, 'create'])->name('dokumen.create');
    route::post('/dokumen-simpan/{id}', [DokumenController::class, 'store'])->name('dokumen.store');

});

//PNS(PEGAWAI)
Route::group(['prefix' => 'PNS', 'middleware' => ['auth','role:Pegawai|Admin|Kepala']], function(){
    //-- Halaman profile Pegawai--//

    Route::get('profile-pegawai', [PegawaiController::class, 'showPegawai'])->name('show.pegawai');
    Route::put('/pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'updateData'])->name('update.pegawai');
    Route::post('/foto/{id}', [App\Http\Controllers\PegawaiController::class, 'uploadFoto'])->name('update.foto');
    Route::put('/kepegawaian/{id}', [App\Http\Controllers\PegawaiController::class, 'updateKepegawaian'])->name('update.kepegawaian');
    Route::put('/sutri/{id}', [App\Http\Controllers\PegawaiController::class, 'updateSI'])->name('update.sutri');
    //Data Anak :
    Route::get('/anak-tambah', [App\Http\Controllers\PegawaiController::class, 'createAnak'])->name('anak.tambah');
    Route::post('/anak-simpan', [App\Http\Controllers\PegawaiController::class, 'anakCreate'])->name('anak.store');
    Route::get('/anak/{id}/edit', [App\Http\Controllers\PegawaiController::class, 'editAnak'])->name('anak.edit');
    Route::put('/anak/{id}', [App\Http\Controllers\PegawaiController::class, 'updateAnak'])->name('anak.update');
    Route::delete('/anak/{id}', [App\Http\Controllers\PegawaiController::class, 'hapusAnak'])->name('anak.delete');
    //Data Riwayat Pendidikan
    Route::get('/riwayat-pendidikan', [PegawaiController::class, 'menuPendidikan'])->name('riwayat.pend');
    Route::get('/tambah-riwayat-pendidikan', [PegawaiController::class, 'createPendidikan'])->name('tambah.pend');
    Route::post('/simpan-riwayat-pendidikan', [App\Http\Controllers\PegawaiController::class, 'storePendidikan'])->name('pend.store');
    Route::get('/pendidikan/{id}/edit', [App\Http\Controllers\PegawaiController::class, 'editPendidikan'])->name('pendidikan.edit');
    Route::put('/pendidikan/{id}', [App\Http\Controllers\PegawaiController::class, 'updatePendidikan'])->name('pendidikan.update');
    Route::delete('/pendidikan/{id}', [App\Http\Controllers\PegawaiController::class, 'hapusPendidikan'])->name('pendidikan.hapus');
    //Route Data Diklat :
    Route::get('/tambah-diklat', [PegawaiController::class, 'tambahDiklat'])->name('tambah.diklat');
    Route::post('/simpan-diklat', [PegawaiController::class, 'storeDiklat'])->name('simpan.diklat');
    Route::get('/edit-diklat/{id}/edit', [PegawaiController::class, 'editDiklat'])->name('edit.diklat');
    Route::put('/edit-diklat/{id}', [PegawaiController::class, 'updateDiklat'])->name('update.diklat');
    Route::delete('/diklat/{id}', [PegawaiController::class, 'hapusDiklat'])->name('hapus.diklat');


    //Route Kenaikan Gaji Berkala :
    Route::get('/index-naik-berkala', [NaikBerkalaController::class, 'indexPegawai'])->name('index.berkala');
    Route::get('/tambah-naik-berkala/{kenaikan_id}', [NaikBerkalaController::class, 'createNaikBerkala'])->name('tambah.berkala');
    Route::post('/naik-berkala-simpan/{kenaikan_id}', [App\Http\Controllers\NaikBerkalaController::class, 'simpanData'])->name('simpan.berkala');
    Route::delete('/delete-usulan-gaji', [App\Http\Controllers\NaikBerkalaController::class, 'deleteData'])->name('delete.berkala');

    //Route Kenaikan Pangkat
    Route::get('/menu-naik-pangkat', [NaikPangkatController::class, 'naikPangkatMenu'])->name('menu.naik.pangkat');

    //Reguler Eselon Struktural
    Route::get('/menu-naik-struktural', [NaikPangkatController::class, 'pangkatStrutural'])->name('menu.pangkat.struktural');
    Route::get('/tambah-naik-struktural/{kenaikan_id}', [NaikPangkatController::class, 'formStruktural'])->name('tambah.pangkat.struktural');
    Route::post('/simpan-naik-struktural/{kenaikan_id}', [NaikPangkatController::class, 'storeStruktrural'])->name('simpan.pangkat.struktural');
    Route::delete('/delete-usulan-kenaikan', [NaikPangkatController::class, 'deleteUsulanKenaikan'])->name('hapus.np');

    //Pelaksana Staf
    Route::get('/menu-naik-Pelaksana-staf', [NaikPangkatController::class, 'pangkatPelaksanaStaf'])->name('menu.pangkat.pestaf');
    Route::get('/tambah-naik-Pelaksana-staf/{kenaikan_id}', [NaikPangkatController::class, 'formPelaksanaStaf'])->name('tambah.pangkat.pestaf');
    Route::post('/simpan-naik-Pelaksana-staf/{kenaikan_id}', [NaikPangkatController::class, 'simpanPelaksanaStaf'])->name('simpan.pangkat.pestaf');

    //Pelaksana Staf Penyesuaian Ijazah
    Route::get('/menu-naik-Pelaksana-staf-penyesuaian', [NaikPangkatController::class, 'pangkatPeStafijazah'])->name('menu.pangkat.pestafijazah');
    Route::get('/tambah-naik-Pelaksana-staf-penyesuaian/{kenaikan_id}', [NaikPangkatController::class, 'formPSI'])->name('tambah.pangkat.psi');
    Route::post('/tambah-naik-Pelaksana-staf-penyesuaian/{kenaikan_id}', [NaikPangkatController::class, 'simpanPSI'])->name('simpan.pangkat.psi');

    //Fungsional Tertentu
    Route::get('/menu-naik-Pelaksana-fungsional-tertentu', [NaikPangkatController::class, 'naikPangkatFt'])->name('menu.pangkat.ft');
    Route::get('/tambah-naik-Pelaksana-fungsional-tertentu/{kenaikan_id}', [NaikPangkatController::class, 'formFt'])->name('tambah.pangkat.ft');
    Route::post('/tambah-naik-Pelaksana-fungsional-tertentu/{kenaikan_id}', [NaikPangkatController::class, 'insertOrUpdateFt'])->name('simpan.pangkat.ft');

    //Ambil Data Padaringan
    Route::get('/fetchPadaringan', [PegawaiController::class, 'fetchPadaringan'])->name('get.padaringan');

    //Print Riwayat Kenaikan Pangkat
    Route::get('/print-riwayat-np/{id}', [cetakNaikPangkatController::class, 'cetakRiwayat'])->name('print.riwayat.np');

});


//Route Setting AKun
// Route::get('/settings', [App\Http\Controllers\PegawaiController::class, 'changePassword'])->name('setting');
// Route::put('/change/{id}', [App\Http\Controllers\PegawaiController::class, 'updatePassword'])->name('update.pass');


