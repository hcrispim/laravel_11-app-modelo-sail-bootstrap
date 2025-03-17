<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramaTreinamentoRequest;
use App\Models\MaquinaTreino;
use App\Models\ProgramaTreinamento;
use App\Models\SessaoTreinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProgramaTreinamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('viewAny')) {
            abort(403, 'Acesso não autorizado.');
        }
        $user = Auth::user();
        $programas_treinamento = ProgramaTreinamento::with('usuario')
            ->where('id_usuario', $user->id)
            ->get();
        // dd($programas_treinamento);
        return view('programa_treinamento.programa_treinamento_index', compact('programas_treinamento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        return view('programa_treinamento.programa_treinamento_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Acesso não autorizado.');
        }
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_programa' => 'required|string',
            'dt_inicio' => 'required|date_format:Y-m-d',
            'dt_final' => 'required|date_format:Y-m-d',
        ]);
        // Adicionando o id do usuário logado
        $validatedData['id_usuario'] = auth()->id();

        try {
            // Criando o registro no banco
            ProgramaTreinamento::create($validatedData);

            return redirect()->route('programa_treinamento.index')
                ->with('success', 'Programa de treinamento cadastrado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o programa de treinamento. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idProgramaTreinamento)
    {
        dd('ProgrmaTreinamento show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idProgramaTreinamento)
    {
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
        $programaTreinamento = ProgramaTreinamento::findOrFail($idProgramaTreinamento);
        return view('programa_treinamento.programa_treinamento_edite', compact('programaTreinamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramaTreinamentoRequest $request, $idProgramaTreinamento)
    {
        if (!Gate::allows('update')) {
            abort(403, 'Acesso não autorizado.');
        }
        DB::enableQueryLog();
        $dadosValidados = $request->validated();
        try {
            ProgramaTreinamento::updateOrCreate($dadosValidados);
        } catch (\Exception $e) {
            // Tratamento de erro
        }
        $queries = DB::getQueryLog();
        $lastQuery = end($queries);
        return redirect()->route('programa_treinamento.index')->with('success', 'Programa de treinamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idProgramaTreinamento)
    {
        if (!Gate::allows('delete')) {
            abort(403, 'Acesso não autorizado.');
        }
        ProgramaTreinamento::destroy($idProgramaTreinamento);
        return redirect()->route('programa_treinamento.index')->with('success', 'Programa de treinamento deletado com sucesso.');
    }
}
