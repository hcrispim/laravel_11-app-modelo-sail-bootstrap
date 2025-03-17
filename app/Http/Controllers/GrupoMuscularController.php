<?php

namespace App\Http\Controllers;

use App\Models\GrupoMuscular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GrupoMuscularController extends Controller
{
    public function index()
    {
        if (!Gate::allows('viewAny')) {
            abort(403, 'Acesso não autorizado.');
        }
        $gruposMusculares = GrupoMuscular::all();
        return view('grupo_muscular.grupo_muscular_index', compact('gruposMusculares'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        return view('grupo_muscular.grupo_muscular_create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        $request->validate([
            'nome_grupo_muscular' => 'required|unique:grupo_muscular|max:45',
            'localizacao_grupo_muscular' => 'required|max:45',
        ]);
        GrupoMuscular::create($request->all());
        return redirect()->route('grupo_muscular.index')->with('success', 'Grupo Muscular criado com sucesso!');
    }

    public function show($idGrupo)
    {
        if (!Gate::allows('view')) {
            abort(403, 'Acesso não autorizado.');
        }
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
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
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
        if (!Gate::allows('delete')) {
            abort(403, 'Acesso não autorizado.');
        }
        $grupoMuscular = GrupoMuscular::findOrFail($idGrupo);
        $grupoMuscular->delete();
        return redirect()->route('grupo_muscular.index')->with('success', 'Grupo Muscular deletado com sucesso!');
    }
}
