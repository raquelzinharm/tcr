<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\FavoriteController;

//FAVORITAR RECEITA
Route::middleware(['auth'])->group(function () {
    Route::post('/receitas/{id}/favoritar', [FavoriteController::class, 'store'])->name('receitas.favoritar');
    Route::delete('/receitas/{id}/desfavoritar', [FavoriteController::class, 'destroy'])->name('receitas.desfavoritar');
});


//PERFIL CHEF
Route::middleware(['auth'])->group(function () {
    Route::get('/meu-perfil', [UserController::class, 'show'])->name('profile.show');
    Route::put('/meu-perfil', [UserController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});



// Página inicial
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/PostagemByCategoriaById/{id}', [SiteController::class, 'PostagemByCategoriaById'])->name('site.PostagemByCategoriaById');
Route::get('/PostagemByAutorId/{id}', [SiteController::class, 'PostagemByAutorById'])->name('site.PostagemByAutorById');

//
// ROTAS DE AUTENTICAÇÃO
//

// Login padrão do Laravel
Auth::routes();

// Recuperar senha - Mostrar formulário
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

// Recuperar senha - Enviar link por e-mail
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// Redefinir senha - Formulário com token
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

// Redefinir senha - Enviar nova senha
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

// Criar nova conta - Formulário
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// Criar nova conta - Submissão
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');


//
// ROTAS PROTEGIDAS (SOMENTE PARA USUÁRIOS AUTENTICADOS)
//

Route::middleware(['auth'])->group(function () {

    // Página inicial após login
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // ------------------------- CATEGORIAS -------------------------
    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    // ------------------------- POSTAGENS -------------------------
    Route::get('/postagem', [PostagemController::class, 'index'])->name('postagem.index');
    Route::get('/postagem/create', [PostagemController::class, 'create'])->name('postagem.create');
    Route::post('/postagem', [PostagemController::class, 'store'])->name('postagem.store');
    Route::get('/postagem/{id}', [PostagemController::class, 'show'])->name('postagem.show');
    Route::get('/postagem/{id}/edit', [PostagemController::class, 'edit'])->name('postagem.edit');
    Route::put('/postagem/{id}', [PostagemController::class, 'update'])->name('postagem.update');
    Route::delete('/postagem/{id}', [PostagemController::class, 'destroy'])->name('postagem.destroy');

    // ------------------------- ADMIN - ALTERAR SENHA -------------------------
    Route::get('/admin/alterarSenha', [UserController::class, 'alterarSenha'])->name('admin.alterarSenha');
    Route::put('/admin/updateSenha', [UserController::class, 'updateSenha'])->name('admin.updateSenha');

});
