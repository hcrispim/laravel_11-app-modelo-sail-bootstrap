<?php

namespace App\Http\Controllers;

use App\Models\SessaoTreinamento;
use Illuminate\Http\Request;

class SessaoTreinamentoController extends Controller
{
    public function index()
    {
        $sessoes = SessaoTreinamento::all();
        return view('sessoes.index', compact('sessoes'));
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

    public function edit(SessaoTreinamento $sessao)
    {
        return view('sessoes.edit', compact('sessao'));
    }

    public function update(Request $request, SessaoTreinamento $sessao)
    {
        $request->validate([
            'id_programa_treinamento' => 'required|integer',
            'dt_sessao' => 'nullable|date',
            'tempo_duracao' => 'nullable|date_format:H:i:s',
        ]);

        $sessao->update($request->all());

        return redirect()->route('sessoes.index')->with('success', 'Sessão de treinamento atualizada com sucesso.');
    }

    public function destroy(SessaoTreinamento $sessao)
    {
        $sessao->delete();
        return redirect()->route('sessoes.index')->with('success', 'Sessão de treinamento deletada com sucesso.');
    }
}
