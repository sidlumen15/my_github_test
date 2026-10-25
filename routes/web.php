
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Database is running! Connected to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Could not connect to the database. Error: " . $e->getMessage();
    }
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [
        AuthController::class,
        'showLogin'
    ])->name('login');

    Route::post('/login', [
        AuthController::class,
        'login'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');

    Route::post('/logout', [
        AuthController::class,
        'logout'
    ])->name('logout');

    Route::get('/employees', [EmployeeController::class, 'index'])
        ->name('employees.index');

    Route::get('/employee/create', [EmployeeController::class, 'create'])
        ->name('employee.create');

    Route::post('/employee/store', [EmployeeController::class, 'store'])
        ->name('employee.store');

    Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])
        ->name('employee.edit');

    Route::put('/employee/{employee}', [EmployeeController::class, 'update'])
        ->name('employee.update');

    Route::get('/employee/{employee}', [EmployeeController::class, 'show'])
        ->name('employee.show');

    Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])
        ->name('employee.delete');
});
