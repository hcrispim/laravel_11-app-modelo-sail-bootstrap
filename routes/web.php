<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrupoMuscularController;
use App\Http\Controllers\MaquinaTreinoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramaTreinamentoController;
use App\Http\Controllers\SerieExercicioController;
use App\Http\Controllers\SessaoTreinamentoController;
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
            return redirect('admin.dashboard');
           // return ('admin');
        }
        if ($role == 'comum') {
            dd('entrou comum');
//           // return redirect('/dashboard');
            return redirect('admin.dashboard');
        }
//  se nao estiver logado
    } else {
        return redirect('/login');
    }
//    if ( Auth::user()){
//        return redirect('/admin/dashboard');
//    }else
//    {
//        return redirect('/login');
//    }
});

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
    ->middleware('auth:web')
    ->name('admin.logout');

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

//Route::controller(MaquinaTreinoController::class)->group(function () {
//    Route::get('/maquina_treino/index', 'index')
//        ->middleware('can:viewAny')
//        ->name('maquina_treino.index');
//
//    Route::get('/maquina_treino/create', 'create')
//        ->middleware('can:create')
//        ->name('maquina_treino.create');
//
//    Route::post('/maquina_treino/store', 'store')
//        ->middleware('can:create')
//        ->name('maquina_treino.store');
//
//    Route::get('/maquina_treino/edit/{idMaquina}', 'edit')
//        ->middleware('can:update')
//        ->name('maquina_treino.edit');
//
//    Route::post('/maquina_treino/update/{idMaquina}', 'update')
//        ->middleware('can:update)
//        ->name('maquina_treino.update');
//
//    Route::delete('/maquina_treino/destroy/{idMaquina}', 'destroy')
//        ->middleware('can:delete)
//        ->name('maquina_treino.destroy');
//});

Route::controller(MaquinaTreinoController::class)->group(function () {
    Route::get('/maquina_treino/index', 'index')->name('maquina_treino.index');
    Route::get('/maquina_treino/create', 'create')
        ->middleware('can:create')
        ->name('maquina_treino.create');
    Route::post('/maquina_treino/store', 'store')
        ->middleware('can:create')
        ->name('maquina_treino.store');
    Route::get('/maquina_treino/edit/{idMaquina}', 'edit')
        ->middleware('can:update')
        ->name('maquina_treino.edit');
    Route::post('/maquina_treino/update/{idMaquina}', 'update')
        ->middleware('can:update')
        ->name('maquina_treino.update');
    Route::delete('/maquina_treino/destroy/{idMaquina}', 'destroy')
        ->middleware('can:delete')
        ->name('maquina_treino.destroy');
});

Route::controller(GrupoMuscularController::class)->group(function(){
    Route::get('/grupo_muscular/index', 'index')
        ->middleware('can:viewAny')
        ->name('grupo_muscular.index');
    Route::get('/grupo_muscular/create', 'create')
        ->middleware('can:create')
        ->name('grupo_muscular.create');
    Route::post('/grupo_muscular/store', 'store')
        ->middleware('can:create')
        ->name('grupo_muscular.store');
    Route::get('/grupo_muscular/edit/{idGrupo}', 'edit')
        ->middleware('can:update')
        ->name('grupo_muscular.edit');
    Route::post('/grupo_muscular/update/{idGrupo}', 'update')
        ->middleware('can:update')
        ->name('grupo_muscular.update');
    Route::delete('/grupo_muscular/destroy/{idGrupo}', 'destroy')
        ->middleware('can:delete')
        ->name('grupo_muscular.destroy');
});

Route::controller(SerieExercicioController::class)->group(function(){
    Route::get('/serie_exercicio/index', 'index')
        ->middleware('can:viewAny')
        ->name('serie_exercicio.index');
    Route::get('/serie_exercicio/create', 'create')
        ->middleware('can:create')
        ->name('serie_exercicio.create');
    Route::post('/serie_exercicio/store', 'store')
        ->middleware('can:create')
        ->name('serie_exercicio.store');
    Route::get('/serie_exercicio/edit/{idSerieExercicio}', 'edit')
        ->middleware('can:update')
        ->name('serie_exercicio.edit');
    Route::post('/serie_exercicio/update/{idSerieExercicio}', 'update')
        ->middleware('can:update')
        ->name('serie_exercicio.update');
    Route::delete('/serie_exercicio/destroy/{idSerieExercicio}', 'destroy')
        ->middleware('can:delete')
        ->name('serie_exercicio.destroy');
});


Route::controller(SessaoTreinamentoController::class)->group(function(){
    Route::get('/sessao_treinamento/index', 'index')
        ->middleware('can:viewAny')
        ->name('sessao_treinamento.index');
    Route::get('/sessao_treinamento/create', 'create')
        ->middleware('can:create')
        ->name('sessao_treinamento.create');
    Route::post('/sessao_treinamento/store', 'store')
        ->middleware('can:create')
        ->name('sessao_treinamento.store');
    Route::get('/sessao_treinamento/edit/{idSessaoTreinamento}', 'edit')
        ->middleware('can:update')
        ->name('sessao_treinamento.edit');
    Route::put('/sessao_treinamento/update/{idSessaoTreinamento}', 'update')
        ->middleware('can:update')
        ->name('sessao_treinamento.update');
    Route::delete('/sessao_treinamento/destroy/{idSessaoTreinamento}', 'destroy')
        ->middleware('can:delete')
        ->name('sessao_treinamento.destroy');
});

Route::controller(ProgramaTreinamentoController::class)->group(function(){
    Route::get('/programa_treinamento/index', 'index')
        ->middleware('can:viewAny')
        ->name('programa_treinamento.index');
    Route::get('/programa_treinamento/create', 'create')
        ->middleware('can:create')
        ->name('programa_treinamento.create');
    Route::post('/programa_treinamento/store', 'store')
        ->middleware('can:create')
        ->name('programa_treinamento.store');
    Route::get('/programa_treinamento/edit/{idProgramaTreinamento}', 'edit')
        ->middleware('can:update')
        ->name('programa_treinamento.edit');
    Route::put('/programa_treinamento/update/{idProgramaTreinamento}', 'update')
        ->middleware('can:update')
        ->name('programa_treinamento.update');
    Route::delete('/programa_treinamento/destroy/{idProgramaTreinamento}', 'destroy')
        ->middleware('can:delete')
        ->name('programa_treinamento.destroy');
});

require __DIR__ . '/auth.php';
