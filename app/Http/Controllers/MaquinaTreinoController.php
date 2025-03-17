<?php
namespace App\Http\Controllers;

use App\Models\MaquinaTreino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MaquinaTreinoController extends Controller
{
    public function index()
    {
        if (!Gate::allows('viewAny')) {
            abort(403, 'Acesso não autorizado.');
        }
        $maquinasTreino = MaquinaTreino::all();
        return view('maquina_treino.maquina_treino_index', compact('maquinasTreino'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        return view('maquina_treino.maquina_treino_create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        $request->validate([
            'nome_maquina_treino' => 'required|unique:maquina_treino|max:200',
            'foto_maquina_treino' => 'required'
        ]);
        MaquinaTreino::create($request->only(['nome_maquina_treino', 'foto_maquina_treino']));
        return redirect()->route('maquina_treino.index')
            ->with('message', 'Máquina criada com sucesso!');
    }

    public function edit($idMaquina)
    {
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
        $maquinaTreino = MaquinaTreino::findOrFail($idMaquina);
        return view('maquina_treino.maquina_treino_edite', compact('maquinaTreino'));
    }

    public function update(Request $request, $idMaquina)
    {
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
        $maquinaTreino = MaquinaTreino::findOrFail($idMaquina);
        $maquinaTreino->update($request->all());
        return redirect()->route('maquina_treino.index')
            ->with('message', 'Máquina atualizada com sucesso!');
    }

    public function destroy($idMaquina)
    {
        if (!Gate::allows('delete')) {
            abort(403, 'Acesso não autorizado.');
        }
        $maquinaTreino = MaquinaTreino::findOrFail($idMaquina);
        $maquinaTreino->delete();
        return redirect()->route('maquina_treino.index')
            ->with('message', 'Máquina excluída com sucesso!');
    }
}
//namespace App\Http\Controllers;
//use App\Http\Requests\StoreTipoMaquinaRequest;
//use App\Http\Requests\UpdateTipoMaquinaRequest;
//use App\Models\MaquinaTreino;
//use Illuminate\Http\Request;
//
//class MaquinaTreinoController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        $maquina_treino = MaquinaTreino::all();
//        return view('maquina_treino.maquina_treino_index', compact('maquina_treino'));
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create(Request $request)
//    {
//       return view('maquina_treino.maquina_treino_create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'nome_maquina_treino' => 'required|unique:maquina_treino|max:200',
//            'foto_maquina_treino' => 'required'
//        ]);
//        MaquinaTreino::insert([
//            'nome_maquina_treino' => $request->nome_maquina_treino,
//            'foto_maquina_treino' => $request->foto_maquina_treino,
//        ]);
//        $notification = array(
//            'message' => 'Property Type Create Successfully',
//            'alert-type' => 'success'
//        );
//        return redirect()->route('maquina_treino.index')->with($notification);
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(MaquinaTreino $tipoMaquina)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit($idMaquina)
//    {
//        $maquina = MaquinaTreino::findOrFail($idMaquina);
//        return view('maquina_treino.maquina_treino_edite', compact('maquina'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, $idMaquina)
//    {
//        $maquinaTreino = MaquinaTreino::find($idMaquina);
//        $maquinaTreino->update($request->all());
//        $notification = array(
//            'message' => 'Property Type Updated Successfully',
//            'alert-type' => 'success'
//        );
//        return redirect()->route('maquina_treino.index')->with($notification);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy($idMaquina)
//    {
//                $maquinaTreino = MaquinaTreino::findOrFail($idMaquina);
//                $maquinaTreino->delete();
//               // MaquinaTreino::findOrFail($idMaquina)->delete();
//                $notification = array(
//                    'message' => 'Property Type Deleted Successfully',
//                    'alert-type' => 'success'
//                );
//                return redirect()->route('maquina_treino.index')->with($notification);
//
//    }
//}

