<?php

use App\Http\Controllers\API\Device\AuthController;
use App\Http\Controllers\API\Device\FileUploadController;
use App\Http\Controllers\API\Device\OwnerTowerController;
use App\Http\Controllers\API\Device\TaskController;
use App\Http\Controllers\API\Device\TowerController;
use App\Http\Controllers\API\Device\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'validate.user']], function () {
    Route::post('owner-towers', [OwnerTowerController::class, 'store'])
        ->name('ownerTower.store')
        ->middleware(['permission:create_ownertower']);
    Route::get('owner-towers', [OwnerTowerController::class, 'index'])
        ->name('owner-towers.index')
        ->middleware(['permission:read_ownertower']);
    Route::get('owner-towers/{ownerTower}', [OwnerTowerController::class, 'show'])
        ->name('ownerTower.show')
        ->middleware(['permission:read_ownertower']);
    Route::put('owner-towers/{ownerTower}', [OwnerTowerController::class, 'update'])
        ->name('ownerTower.update')
        ->middleware(['permission:update_ownertower']);
    Route::delete('owner-towers/{ownerTower}', [OwnerTowerController::class, 'delete'])
        ->name('ownerTower.delete')
        ->middleware(['permission:delete_ownertower']);
    Route::post('owner-towers/bulk-create', [OwnerTowerController::class, 'bulkStore'])
        ->name('ownerTower.store.bulk')
        ->middleware(['permission:create_ownertower']);
    Route::post('owner-towers/bulk-update', [OwnerTowerController::class, 'bulkUpdate'])
        ->name('ownerTower.update.bulk')
        ->middleware(['permission:update_ownertower']);

    Route::post('towers', [TowerController::class, 'store'])
        ->name('tower.store')
        ->middleware(['permission:create_tower']);
    Route::get('towers', [TowerController::class, 'index'])
        ->name('towers.index')
        ->middleware(['permission:read_tower']);
    Route::get('towers/{tower}', [TowerController::class, 'show'])
        ->name('tower.show')
        ->middleware(['permission:read_tower']);
    Route::put('towers/{tower}', [TowerController::class, 'update'])
        ->name('tower.update')
        ->middleware(['permission:update_tower']);
    Route::delete('towers/{tower}', [TowerController::class, 'delete'])
        ->name('tower.delete')
        ->middleware(['permission:delete_tower']);
    Route::post('towers/bulk-create', [TowerController::class, 'bulkStore'])
        ->name('tower.store.bulk')
        ->middleware(['permission:create_tower']);
    Route::post('towers/bulk-update', [TowerController::class, 'bulkUpdate'])
        ->name('tower.update.bulk')
        ->middleware(['permission:update_tower']);

    Route::post('tasks', [TaskController::class, 'store'])
        ->name('task.store')
        ->middleware(['permission:create_task']);
    Route::get('tasks', [TaskController::class, 'index'])
        ->name('tasks.index')
        ->middleware(['permission:read_task']);
    Route::get('tasks/{task}', [TaskController::class, 'show'])
        ->name('task.show')
        ->middleware(['permission:read_task']);
    Route::put('tasks/{task}', [TaskController::class, 'update'])
        ->name('task.update')
        ->middleware(['permission:update_task']);
    Route::delete('tasks/{task}', [TaskController::class, 'delete'])
        ->name('task.delete')
        ->middleware(['permission:delete_task']);
    Route::post('tasks/bulk-create', [TaskController::class, 'bulkStore'])
        ->name('task.store.bulk')
        ->middleware(['permission:create_task']);
    Route::post('tasks/bulk-update', [TaskController::class, 'bulkUpdate'])
        ->name('task.update.bulk')
        ->middleware(['permission:update_task']);

    Route::post('users', [UserController::class, 'store'])
        ->name('user.store')
        ->middleware(['permission:create_user']);
    Route::get('users', [UserController::class, 'index'])
        ->name('users.index')
        ->middleware(['permission:read_user']);
    Route::get('users/{user}', [UserController::class, 'show'])
        ->name('user.show')
        ->middleware(['permission:read_user']);
    Route::put('users/{user}', [UserController::class, 'update'])
        ->name('user.update')
        ->middleware(['permission:update_user']);
    Route::delete('users/{user}', [UserController::class, 'delete'])
        ->name('user.delete')
        ->middleware(['permission:delete_user']);
    Route::post('users/bulk-create', [UserController::class, 'bulkStore'])
        ->name('user.store.bulk')
        ->middleware(['permission:create_user']);
    Route::post('users/bulk-update', [UserController::class, 'bulkUpdate'])
        ->name('user.update.bulk')
        ->middleware(['permission:update_user']);
});

Route::post('file-upload', [FileUploadController::class, 'upload'])
    ->name('file.upload');

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:sanctum');
Route::put('change-password', [AuthController::class, 'changePassword'])
    ->name('change.password')
    ->middleware(['auth:sanctum', 'validate.user']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');
Route::post('validate-otp', [AuthController::class, 'validateResetPasswordOtp'])
    ->name('reset.password.validate.otp');
Route::put('reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');
