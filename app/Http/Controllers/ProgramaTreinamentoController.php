<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramaTreinamentoRequest;
use App\Models\MaquinaTreino;
use App\Models\ProgramaTreinamento;
use App\Models\SessaoTreinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramaTreinamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $programas_treinamento = ProgramaTreinamento::all();
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
       // $programasTreinamento = ProgramaTreinamento::all();
      //  return view('programa_treinamento.programa_treinamento_create',compact('programasTreinamento'));
        return view('programa_treinamento.programa_treinamento_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramaTreinamentoRequest $request)
    {
        $dadosValidados = $request->validated();

        try {
            ProgramaTreinamento::Create($dadosValidados);
            // Sucesso
        } catch (\Exception $e) {
            // Tratamento de erro
        }
        // Redirecionar ou retornar resposta adequada
        return redirect()->route('programa_treinamento.index')->with('success', 'Programa de treinamento atualizado com sucesso.');
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
        //dd('Entrou no edit ');
        $programaTreinamento = ProgramaTreinamento::findOrFail($idProgramaTreinamento);
       // $programasTreinamento = ProgramaTreinamento::all();
       // dd($ProgramaTreinamento);
//        return view('programa_treinamento.programa_treinamento_edite', compact('programaTreinamento','programasTreinamento'));
        return view('programa_treinamento.programa_treinamento_edite', compact('programaTreinamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramaTreinamentoRequest $request, $idProgramaTreinamento)
    {
        DB::enableQueryLog();
      //  dd('entrou em update apos ProgramaTreinamentoRequest');
        $dadosValidados = $request->validated();
    //    dump($dadosValidados);
         try {
//            ProgramaTreinamento::updateOrCreate(
//                ['id_programa_treinamento' => $idProgramaTreinamento],
//                $dadosValidados
            ProgramaTreinamento::updateOrCreate($dadosValidados);
//            );
            // Sucesso
        } catch (\Exception $e) {
            // Tratamento de erro
        }

       $queries = DB::getQueryLog();
        $lastQuery = end($queries);
        //dd($lastQuery);
        // Redirecionar ou retornar resposta adequada
        return redirect()->route('programa_treinamento.index')->with('success', 'Programa de treinamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idSessaoTreinamento)
    {
        SessaoTreinamento::destroy($idSessaoTreinamento);
        return redirect()->route('programa_treinamento.index')->with('success', 'Programa de treinamento deletado com sucesso.');
    }
}
