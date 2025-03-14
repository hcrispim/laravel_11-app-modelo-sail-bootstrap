<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComumController;
use App\Http\Controllers\GrupoMuscularController;
use App\Http\Controllers\MaquinaTreinoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramaTreinamentoController;
use App\Http\Controllers\SerieExercicioController;
use App\Http\Controllers\SessaoTreinamentoController;
use App\Mail\TestEmail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    //  return 'localhost';
    // return view('welcome');
    if (Auth::check()) {
        //se for logado como admin
        $role = Auth::user()->getAttributeValue('role');
        if ($role == 'admin') {
           // dd('entrou admin');
            return redirect('/admin/dashboard');
           // return ('admin');
        }
        if ($role == 'comum') {
            dd('entrou comum');
//           // return redirect('/dashboard');
            return '/comum/dashboard';
        }
//  se nao estiver logado
    } else {
        return redirect('/login');
    }
});

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::get('/send-test-email', function () {
    Mail::to('hcrispim@gmail.com')->send(new TestMail());
    return 'Email enviado com sucesso!';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', function () {
        return view('users');
    })->name('users');
});


Route::controller(MaquinaTreinoController::class)->group(function(){
    Route::get('/maquina_treino/index', 'index')->name('maquina_treino.index');
    Route::get('/maquina_treino/create', 'create')->name('maquina_treino.create');
    Route::post('/maquina_treino/store', 'store')->name('maquina_treino.store');
    Route::get('/maquina_treino/edit/{idMaquina}', 'edit')->name('maquina_treino.edit');
    Route::post('/maquina_treino/update/{idMaquina}', 'update')->name('maquina_treino.update');
    Route::delete('/maquina_treino/destroy/{idMaquina}', 'destroy')->name('maquina_treino.destroy');
});

Route::controller(GrupoMuscularController::class)->group(function(){
    Route::get('/grupo_muscular/index', 'index')->name('grupo_muscular.index');
    Route::get('/grupo_muscular/create', 'create')->name('grupo_muscular.create');
    Route::post('/grupo_muscular/store', 'store')->name('grupo_muscular.store');
    Route::get('/grupo_muscular/edit/{idGrupo}', 'edit')->name('grupo_muscular.edit');
    Route::post('/grupo_muscular/update/{idGrupo}', 'update')->name('grupo_muscular.update');
    Route::delete('/grupo_muscular/destroy/{idGrupo}', 'destroy')->name('grupo_muscular.destroy');
});

Route::controller(SerieExercicioController::class)->group(function(){
    Route::get('/serie_exercicio/index', 'index')->name('serie_exercicio.index');
    Route::get('/serie_exercicio/create', 'create')->name('serie_exercicio.create');
    Route::post('/serie_exercicio/store', 'store')->name('serie_exercicio.store');
    Route::get('/serie_exercicio/edit/{idSerieExercicio}', 'edit')->name('serie_exercicio.edit');
    Route::post('/serie_exercicio/update/{idSerieExercicio}', 'update')->name('serie_exercicio.update');
    Route::delete('/serie_exercicio/destroy/{idSerieExercicio}', 'destroy')->name('serie_exercicio.destroy');
});


Route::controller(SessaoTreinamentoController::class)->group(function(){
    Route::get('/sessao_treinamento/index', 'index')->name('sessao_treinamento.index');
    Route::get('/sessao_treinamento/create', 'create')->name('sessao_treinamento.create');
    Route::post('/sessao_treinamento/store', 'store')->name('sessao_treinamento.store');
    Route::get('/sessao_treinamento/edit/{idSessaoTreinamento}', 'edit')->name('sessao_treinamento.edit');
    Route::put('/sessao_treinamento/update/{idSessaoTreinamento}', 'update')->name('sessao_treinamento.update');
    Route::delete('/sessao_treinamento/destroy/{idSessaoTreinamento}', 'destroy')->name('sessao_treinamento.destroy');
});

Route::controller(ProgramaTreinamentoController::class)->group(function(){
    Route::get('/programa_treinamento/index', 'index')->name('programa_treinamento.index');
    Route::get('/programa_treinamento/create', 'create')->name('programa_treinamento.create');
    Route::post('/programa_treinamento/store', 'store')->name('programa_treinamento.store');
    Route::get('/programa_treinamento/edit/{idProgramaTreinamento}', 'edit')->name('programa_treinamento.edit');
    Route::put('/programa_treinamento/update/{idProgramaTreinamento}', 'update')->name('programa_treinamento.update');
    Route::delete('/programa_treinamento/destroy/{idProgramaTreinamento}', 'destroy')->name('programa_treinamento.destroy');
});

require __DIR__ . '/auth.php';
