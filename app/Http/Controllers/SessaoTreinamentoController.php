<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessaoTreinamentoRequest;
use App\Models\GrupoMuscular;
use App\Models\MaquinaTreino;
use App\Models\ProgramaTreinamento;
use App\Models\SerieExercicio;
use App\Models\SessaoTreinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SessaoTreinamentoController extends Controller
{

    public function index()
    {
        if (!Gate::allows('viewAny')) {
            abort(403, 'Acesso não autorizado.');
        }
        // Buscar todas as sessões de treinamento,banco de dados
        $programasTreinamento = ProgramaTreinamento::all();
        $sessoesTreinamento = SessaoTreinamento::all();
        return view('sessao_treinamento.sessao_treinamento_index', compact('sessoesTreinamento','programasTreinamento'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        $programasTreinamento = ProgramaTreinamento::all();
        return view('sessao_treinamento.sessao_treinamento_create',compact('programasTreinamento'));
    }

    public function store(SessaoTreinamentoRequest $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        $dadosValidados = $request->validated();

        try {
            SessaoTreinamento::Create($dadosValidados);
            // Sucesso
        } catch (\Exception $e) {
            // Tratamento de erro
        }
        // Redirecionar ou retornar resposta adequada
        return redirect()->route('sessao_treinamento.index')->with('success', 'Sessão de treinamento atualizada com sucesso.');
    }

    public function show(SessaoTreinamento $sessao)
    {
        if (!Gate::allows('view')) {
            abort(403, 'Acesso não autorizado.');
        }
        return view('sessoes.show', compact('sessao'));
    }

    public function edit($idSessaoTreinamento)
    {
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
//        $sessaoTreinamento = SessaoTreinamento::findOrFail($idSessaoTreinamento);
        $sessaoTreinamento = SessaoTreinamento::with('programaTreinamento')->findOrFail($idSessaoTreinamento);
//        dd($sessaoTreinamento);
        $programaTreinamento = $sessaoTreinamento->programaTreinamento;
        return view('sessao_treinamento.sessao_treinamento_edite', compact('sessaoTreinamento','programaTreinamento'));
    }

    public function update(SessaoTreinamentoRequest  $request, $idSessaoTreinamento)
    {
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
        $dadosValidados = $request->validated();
        try {
            SessaoTreinamento::updateOrCreate(
                ['id_sessao_treinamento' => $idSessaoTreinamento],
                $dadosValidados
            );
            // Sucesso
        } catch (\Exception $e) {
            // Tratamento de erro
        }
        // Redirecionar ou retornar resposta adequada
        return redirect()->route('sessao_treinamento.index')->with('success', 'Sessão de treinamento atualizada com sucesso.');
    }

    public function destroy($idSessaoTreinamento)
    {
        if (!Gate::allows('delete')) {
            abort(403, 'Acesso não autorizado.');
        }
        SessaoTreinamento::destroy($idSessaoTreinamento);
        return redirect()->route('sessao_treinamento.index')->with('success', 'Sessão de treinamento deletada com sucesso.');
    }
}
