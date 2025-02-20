<?php

namespace App\Http\Controllers;

use App\Models\GrupoMuscular;
use Illuminate\Http\Request;

class GrupoMuscularController extends Controller
{
    public function index()
    {
        $gruposMusculares = GrupoMuscular::all();
        return view('grupo_muscular.grupo_muscular_index', compact('gruposMusculares'));
    }

    public function create()
    {
        return view('grupo_muscular.grupo_muscular_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_grupo_muscular' => 'required|unique:grupo_muscular|max:45',
            'localizacao_grupo_muscular' => 'required|max:45',
        ]);

        GrupoMuscular::create($request->all());

        return redirect()->route('grupo_muscular.index')->with('success', 'Grupo Muscular criado com sucesso!');
    }

    public function show($idGrupo)
    {
        $grupoMuscular = GrupoMuscular::findOrFail($idGrupo);
        return view('grupo_muscular.grupo_muscular_show', compact('grupoMuscular'));
    }

    public function edit($idGrupo)
    {
        $grupoMuscular = GrupoMuscular::findOrFail($idGrupo);
        return view('grupo_muscular.grupo_muscular_edite', compact('grupoMuscular'));
    }

    public function update(Request $request, $idGrupo)
    {
        $request->validate([
            'nome_grupo_muscular' => 'required|max:45',
            'localizacao_grupo_muscular' => 'required|max:45',
        ]);

        $grupoMuscular = GrupoMuscular::findOrFail($idGrupo);
        $grupoMuscular->update($request->all());

        return redirect()->route('grupo_muscular.index')->with('success', 'Grupo Muscular atualizado com sucesso!');
    }

    public function destroy($idGrupo)
    {
        $grupoMuscular = GrupoMuscular::findOrFail($idGrupo);
        $grupoMuscular->delete();

        return redirect()->route('grupo_muscular.index')->with('success', 'Grupo Muscular deletado com sucesso!');
    }
}
