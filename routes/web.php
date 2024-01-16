<?php

use App\Http\Controllers\FamilyMemberController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', [FamilyMemberController::class, 'HeadList'])->name('HeadList');
Route::get('/showAddMember', [FamilyMemberController::class, 'index'])->name('showFamForm');
Route::post('/add-member', [FamilyMemberController::class, 'store'])->name('addMember');
Route::get('/view-member/{id}', [FamilyMemberController::class, 'ViewMember'])->name('ViewMember');
Route::post('/upload-member-photo', [FamilyMemberController::class, 'uploadMemberPhoto'])->name('uploadMemberPhoto');
Route::get('/get-cities/{stateId}', [FamilyMemberController::class,'getCities'])->name('getCities');
