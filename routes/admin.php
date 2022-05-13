<?php

use App\Http\Controllers\API\Admin\ActivityLogController;
use App\Http\Controllers\API\Admin\AuthController;
use App\Http\Controllers\API\Admin\FileUploadController;
use App\Http\Controllers\API\Admin\OwnerTowerController;
use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Admin\TaskController;
use App\Http\Controllers\API\Admin\TowerController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\UserRoleController;
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

    Route::get('roles', [RoleController::class, 'index'])
        ->name('role.index')
        ->middleware(['permission:manage_roles']);
    Route::get('roles/{role}', [RoleController::class, 'show'])
        ->name('role.show')
        ->middleware(['permission:manage_roles']);
    Route::post('roles', [RoleController::class, 'store'])
        ->name('role.store')
        ->middleware(['permission:manage_roles']);
    Route::put('roles/{role}', [RoleController::class, 'update'])
        ->name('role.update')
        ->middleware(['permission:manage_roles']);
    Route::delete('roles/{role}', [RoleController::class, 'delete'])
        ->name('role.delete')
        ->middleware(['permission:manage_roles']);
    Route::post('roles/bulk-create', [RoleController::class, 'bulkStore'])
        ->name('role.store.bulk')
        ->middleware(['permission:manage_roles']);
    Route::post('roles/bulk-update', [RoleController::class, 'bulkUpdate'])
        ->name('role.update.bulk')
        ->middleware(['permission:manage_roles']);

    Route::get('permissions', [PermissionController::class, 'index'])
        ->name('permission.index')
        ->middleware(['permission:manage_roles']);
    Route::get('permissions/{permission}', [PermissionController::class, 'show'])
        ->name('permission.show')
        ->middleware(['permission:manage_roles']);

    Route::post('users/assign-role', [UserRoleController::class, 'assignRole'])
        ->name('users.role.assign')
        ->middleware(['permission:manage_roles']);
    Route::get('users/{user}/roles', [UserRoleController::class, 'getAssignedRoles'])
        ->name('get.assigned.roles')
        ->middleware(['permission:manage_roles']);
    Route::put('users/{user}/update-role', [UserRoleController::class, 'updateUserRole'])
        ->name('users.role.update')
        ->middleware(['permission:manage_roles']);
    Route::post('users/bulk-assign-role', [UserRoleController::class, 'bulkAssignRole'])
        ->name('users.bulk.assign.roles')
        ->middleware(['permission:manage_roles']);

    Route::get('activity-logs', [ActivityLogController::class, 'index'])
        ->name('activity-logs.index');
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
