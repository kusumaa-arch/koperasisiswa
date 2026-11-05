<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/operational', [PageController::class, 'operational'])->name('operational');

Route::get('/admin/login', function (Request $request) {
    if ($request->session()->get('admin_authenticated') === true) {
        return redirect()->route('admin.products.index');
    }

    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    if ($request->session()->get('admin_authenticated') === true) {
        return redirect()->route('admin.products.index');
    }

    $credentials = $request->validate([
        'username' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:7'],
    ], [
        'username.required' => 'Username wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 7 karakter.',
    ]);

    $adminUsername = (string) config('admin.username');
    $adminPassword = (string) config('admin.password');

    if (
        $adminUsername === ''
        || $adminPassword === ''
        || !hash_equals($adminUsername, $credentials['username'])
        || !hash_equals($adminPassword, $credentials['password'])
    ) {
        return back()
            ->withErrors(['credentials' => 'Username atau password salah.'])
            ->onlyInput('username');
    }

    $request->session()->regenerate();
    $request->session()->put('admin_authenticated', true);

    return redirect()->route('admin.products.index');
})->middleware('throttle:5,1')->name('admin.authenticate');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {
        Route::post('/logout', function (Request $request) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login');
        })->name('logout');

        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::patch('/products/{product}/stock', [AdminProductController::class, 'updateStock'])->name('products.stock');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    });