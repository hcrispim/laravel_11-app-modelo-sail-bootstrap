<?php

namespace App\Http\Controllers;

use App\Models\GrupoMuscular;
use App\Models\MaquinaTreino;
use App\Models\ProgramaTreinamento;
use App\Models\SerieExercicio;
use App\Models\SessaoTreinamento;
use Illuminate\Http\Request;

class SerieExercicioController extends Controller
{
    public function index()
    {
        // Buscar todas as sessões de treinamento, grupos musculares e máquinas de treino do banco de dados
        $programasTreinamento = ProgramaTreinamento::all();
        $sessoesTreinamento = SessaoTreinamento::all();
        $gruposMusculares = GrupoMuscular::all();
        $maquinasTreino = MaquinaTreino::all();
        // Buscar todas as séries de exercício
        $seriesExercicio = SerieExercicio::all();
        // Passar os dados para a view
        return view('serie_exercicio.serie_exercicio_index', compact('seriesExercicio', 'sessoesTreinamento', 'gruposMusculares', 'maquinasTreino','programasTreinamento'));
    }

    public function create()
    {
        $sessoesTreinamento = SessaoTreinamento::all();
        $gruposMusculares = GrupoMuscular::all();
        $maquinasTreino = MaquinaTreino::all();
        $programasTreinamento = ProgramaTreinamento::all();

        return view('serie_exercicio.serie_exercicio_create',
            compact('sessoesTreinamento', 'gruposMusculares',
                'maquinasTreino', 'programasTreinamento'));

        return view('serie_exercicio.serie_exercicio_create', [
            'sessoesTreinamento' => $sessoesTreinamento,
            'gruposMusculares' => $gruposMusculares,
            'maquinasTreino' => $maquinasTreino,
            'programasTreinamento' => $programasTreinamento,
        ]);
    }

    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'id_sessao_treinamento' => 'required|exists:sessao_treinamento,id_sessao_treinamento',
            'id_grupo_muscular' => 'required|exists:grupo_muscular,id_grupo_muscular',
            'id_maquina_treino' => 'required|exists:maquina_treino,id_maquina_treino',
            'numero_series' => 'required|integer',
            'repeticoes_series' => 'required|integer',
            'carga' => 'required|numeric',
        ]);
        SerieExercicio::create($request->all());
        return redirect()->route('serie_exercicio.index')->with('success', 'Série de Exercício criada com sucesso!');
    }

    public function show($idSerieExercicio)
    {
        $serieExercicio = SerieExercicio::findOrFail($idSerieExercicio);
        return view('serie_exercicio.show', compact('serieExercicio'));
    }

    public function edit($idSerieExercicio)
    {
        $gruposMusculares = GrupoMuscular::all();
        $maquinasTreino = MaquinaTreino::all();
        $serieExercicio = SerieExercicio::findOrFail($idSerieExercicio);
        // Recuperar a sessão de treinamento associada
        $sessaoTreinamento = $serieExercicio->sessaoTreinamento;

        // Recuperar o programa de treinamento associado à sessão de treinamento
        $programaTreinamento = $sessaoTreinamento->programaTreinamento;

        return view('serie_exercicio.serie_exercicio_edite',
            compact( 'gruposMusculares','maquinasTreino',
                              'serieExercicio', 'sessaoTreinamento',
                              'programaTreinamento' ));
    }

    public function update(Request $request, $idSerieExercicio)
    {
//        dd($request); //DADOS INCOMPLETOS NO REQUEST VER NO EDIT SERIE_EXERCICIO

        $request->validate([
            'id_sessao_treinamento' => 'required|exists:sessao_treinamento,id_sessao_treinamento',
            'id_grupo_muscular' => 'required|exists:grupo_muscular,id_grupo_muscular',
            'id_maquina_treino' => 'required|exists:maquina_treino,id_maquina_treino',
            'numero_series' => 'required|integer',
            'repeticoes_series' => 'required|integer',
            'carga' => 'required|numeric',
        ]);

        $serieExercicio = SerieExercicio::findOrFail($idSerieExercicio);
        $serieExercicio->update($request->all());
        return redirect()->route('serie_exercicio.index')->with('success', 'Série de Exercício atualizada com sucesso!');
    }

    public function destroy($idSerieExercicio)
    {
        $serieExercicio = SerieExercicio::findOrFail($idSerieExercicio);
        $serieExercicio->delete();
        return redirect()->route('serie_exercicio.index')->with('success', 'Série de Exercício deletada com sucesso!');
    }
}
