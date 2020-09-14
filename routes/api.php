<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parameters\{CountryController, DepartamentController, MunicipalityController, LocationController, NeighborhoodController, IdentificationController};
use App\Http\Controllers\Settings\{RoleController, PermissionController, PermissionsRoleController, DashboardSystemController, DashboardParametersController, ModuleController};

Route::group(['prefix' => 'admin'], function () {
    //** CRUD settings **/
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class)->parameters(['roles' => 'role_id']);
    Route::resource('permissions_role', PermissionsRoleController::class)->parameters(['permissions_role' => 'role_id']);
    Route::resource('systems', DashboardSystemController::class);
    Route::resource('parameters', DashboardParametersController::class);
    Route::resource('modules', ModuleController::class);

    //** PARAMETERS  **/
    //** CRUD BASIC INFO **/
    Route::resource('identifications', IdentificationController::class);
    //** CRUD DEMOGRA INFO **/
    Route::resource('countries', CountryController::class);
    Route::resource('departaments', DepartamentController::class)->parameters(['departaments' => 'country_id']);
    Route::resource('municipalities', MunicipalityController::class)->parameters(['municipalities' => 'departament_id']);
    Route::resource('locations', LocationController::class)->parameters(['locations' => 'municipality_id']);
    Route::resource('neigborhoods', NeighborhoodController::class)->parameters(['neigborhoods' => 'location_id']);
});

