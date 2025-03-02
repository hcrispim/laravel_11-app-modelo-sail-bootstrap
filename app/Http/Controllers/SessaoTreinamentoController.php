<?php

namespace App\Http\Controllers;

use App\Models\GrupoMuscular;
use App\Models\MaquinaTreino;
use App\Models\ProgramaTreinamento;
use App\Models\SerieExercicio;
use App\Models\SessaoTreinamento;
use Illuminate\Http\Request;

class SessaoTreinamentoController extends Controller
{
    public function index()
    {
        // Buscar todas as sessões de treinamento,banco de dados
        $programasTreinamento = ProgramaTreinamento::all();
        $sessoesTreinamento = SessaoTreinamento::all();
        return view('sessao_treinamento.sessao_treinamento_index', compact('sessoesTreinamento','programasTreinamento'));
    }

    public function create()
    {
        return view('sessoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_programa_treinamento' => 'required|integer',
            'dt_sessao' => 'nullable|date',
            'tempo_duracao' => 'nullable|date_format:H:i:s',
        ]);

        SessaoTreinamento::create($request->all());

        return redirect()->route('sessoes.index')->with('success', 'Sessão de treinamento criada com sucesso.');
    }

    public function show(SessaoTreinamento $sessao)
    {
        return view('sessoes.show', compact('sessao'));
    }

    public function edit($idSessaoTreinamento)
    {
        $SessaoTreinamento = SessaoTreinamento::findOrFail($idSessaoTreinamento);
        // Recuperar o programa de treinamento associado à sessão de treinamento
        $programaTreinamento = $SessaoTreinamento->programaTreinamento;
        return view('sessao_treinamento.sessao_treinamento_edite', compact('SessaoTreinamento','programaTreinamento'));
    }

    public function update(Request $request, $idSessaoTreinamento)
    {
        $request->validate([
            'id_programa_treinamento' => 'required|integer',
            'dt_sessao' => 'nullable|date',
            'tempo_duracao' => 'nullable|date_format:H:i:s',
        ]);

        $sessao->update($request->all());

        return redirect()->route('sessoes.index')->with('success', 'Sessão de treinamento atualizada com sucesso.');
    }

    public function destroy($idSessaoTreinamento)
    {
        $sessao->delete();
        return redirect()->route('sessoes.index')->with('success', 'Sessão de treinamento deletada com sucesso.');
    }
}
