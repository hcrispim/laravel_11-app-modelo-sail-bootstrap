@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('serie_exercicio.create') }}" class="btn btn-inverse-info"> Adicionar série/exercício </a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Séries e exercícios</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sessão Treino</th>
                                    <th>Grupo Muscular</th>
                                    <th>Máquina de Treino</th>
                                    <th>Número de Séries</th>
                                    <th>Repetições</th>
                                    <th>Carga</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($seriesExercicio as $serie)
                                    {{--                {{ dump($serie) }}--}}
                                    <tr>
                                        <td>{{ $serie->id_sessao_treinamento }}</td>
                                        @foreach($gruposMusculares as $grupo)
                                            @if($grupo->id_grupo_muscular == $serie->id_grupo_muscular)
                                                <td>{{ $grupo->nome_grupo_muscular }}</td>
                                            @endif
                                        @endforeach

                                        @foreach($maquinasTreino as $maquina)
                                            @if($maquina->id_maquina_treino == $serie->id_maquina_treino)
                                                <td>{{ $maquina->nome_maquina_treino }}</td>
                                            @endif
                                        @endforeach

                                        <td>{{ $serie->numero_series }}</td>
                                        <td>{{ $serie->repeticoes_series }}</td>
                                        <td>{{ $serie->carga }}</td>
                                        <td>
                                            <a href="{{ route('serie_exercicio.edit',$serie->id_serie_exercicio) }}" class="btn btn-inverse-warning"> Editar </a>

                                            <form action="{{ route('serie_exercicio.destroy', $serie->id_serie_exercicio) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                {{--                                                Tratar o javascript id="delete" depois--}}
                                                {{--                                                <button type="submit" class="btn btn-inverse-danger" id="delete" >Apagar</button>--}}
                                                <button type="submit" class="btn btn-inverse-danger" >Apagar</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
