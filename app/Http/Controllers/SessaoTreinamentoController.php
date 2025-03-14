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
        $programasTreinamento = ProgramaTreinamento::all();
        return view('sessao_treinamento.sessao_treinamento_create',compact('programasTreinamento'));
    }

    public function store(SessaoTreinamentoRequest $request)
    {
        ///dd($request);
        ///  dd($request);
        //DB::enableQueryLog(); // Habilita o log de queries
        // Os dados já foram validados e preparados
        $dadosValidados = $request->validated();
        // Lógica para salvar os dados no banco

        // SessaoTreinamento::create($dadosValidados);
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
        return view('sessoes.show', compact('sessao'));
    }

    public function edit($idSessaoTreinamento)
    {
//        $sessaoTreinamento = SessaoTreinamento::findOrFail($idSessaoTreinamento);
        $sessaoTreinamento = SessaoTreinamento::with('programaTreinamento')->findOrFail($idSessaoTreinamento);
//        dd($sessaoTreinamento);

        $programaTreinamento = $sessaoTreinamento->programaTreinamento;
//        dd('Teste');
//        dd($programaTreinamento);
        return view('sessao_treinamento.sessao_treinamento_edite', compact('sessaoTreinamento','programaTreinamento'));
    }

    public function update(SessaoTreinamentoRequest  $request, $idSessaoTreinamento)
    {
      ///  dd($request);
        //DB::enableQueryLog(); // Habilita o log de queries
        // Os dados já foram validados e preparados
        $dadosValidados = $request->validated();
        // Lógica para salvar os dados no banco
      //  dd($dadosValidados);
       // SessaoTreinamento::create($dadosValidados);
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
        SessaoTreinamento::destroy($idSessaoTreinamento);
        return redirect()->route('sessao_treinamento.index')->with('success', 'Sessão de treinamento deletada com sucesso.');
    }
}
