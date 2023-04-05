<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\AccountController;


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

/*-----------------admin route----------------- */

// Route::prefix('admin')->group(function (){
    // Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    // Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    // Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    // Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    // Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');
    // Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
    // Route::get('/delete/{id}', [AdminController::class, 'UserDelete'])->name('users.delete');

// });


/*-----------------end admin route----------------- */



// Route::prefix('receipts_admin')->group(function(){
//     // test receipts Routes


// });



// Route::prefix('receipts_user')->group(function(){
//     // test receipts Routes


// });


Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::prefix('receipts_user')->group(function(){

  Route::get('receipts_user/receipt/details/{name}', [UserReceiptsController::class, 'DetailsReceipts'])->name('receipts_user.receipt.details');
});
Route::prefix('receipts_admin')->group(function(){

  Route::get('receipts_admin/receipt/details/{name}', [ReceiptsController::class, 'DetailsReceipts'])->name('receipts_admin.receipt.details');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user/index');
    })->name('web.dashboard');

    Route::prefix('receipts_user')->group(function(){


    Route::get('receipts_user/receipt/view', [UserReceiptsController::class, 'ViewReceipts'])->name('receipts_user.receipt.view');
    Route::get('receipts_user/receipt/add', [UserReceiptsController::class, 'AddReceipts'])->name('receipts_user.receipt.add');
    Route::post('receipts_user/receipt/store', [UserReceiptsController::class, 'StoreReceipts'])->name('user_store.receipts.receipt');
    Route::get('/receipts_user/receipt/edit/{name}', [UserReceiptsController::class, 'edit'])->name('receipts_user.receipt.edit');
    Route::put('/receipts_user/receipt/update/{id}',  [UserReceiptsController::class, 'update'])->name('receipts_user.receipt.update');
    Route::delete('/receipts_user/receipt/delete/{name}', [UserReceiptsController::class,'deleteReceipt'])->name('receipts_user.receipt.delete');
    Route::get('receipts_user/receipt/print/{name}', [UserReceiptsController::class, 'print'])->name('receipts_user.print');
});
});
Route::middleware(['auth:admin' ])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin/index');
    })->name('admin.dashboard');

    Route::prefix('receipts_admin')->group(function(){

    Route::get('receipts_admin/receipt/view', [ReceiptsController::class, 'ViewReceipts'])->name('receipts_admin.receipt.view');
    Route::get('receipts_admin/receipt/add', [ReceiptsController::class, 'AddReceipts'])->name('receipts_admin.receipt.add');
    Route::post('receipts_admin/receipt/store', [ReceiptsController::class, 'StoreReceipts'])->name('admin_store.receipts.receipt');
    Route::get('/receipts_admin/receipt/edit/{name}', [ReceiptsController::class, 'edit'])->name('receipts_admin.receipt.edit');
    Route::put('/receipts_admin/receipt/update/{id}',  [ReceiptsController::class, 'update'])->name('receipts_admin.receipt.update');
    Route::delete('/receipts_admin/receipt/delete/{name}', [ReceiptsController::class,'deleteReceipt'])->name('receipts_admin.receipt.delete');
    Route::get('receipts_admin/receipt/print/{name}', [ReceiptsController::class, 'print'])->name('receipts_admin.print');
});


    Route::prefix('accounts')->group(function(){

        Route::get('accounts/create',[AccountController::class, 'create'])->name('accounts.create');
        Route::post('accounts',[AccountController::class, 'store'])->name('accounts.store');
        Route::get('accounts/show',[AccountController::class, 'index'])->name('accounts.show');
        Route::delete('accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');

        });
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

require __DIR__.'/auth.php';
