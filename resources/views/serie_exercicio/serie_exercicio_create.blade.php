@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Adicionar Série/Exercício</h6>
                            <form action="{{ route('serie_exercicio.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Sessão de Treinamento</label>
                                    <select class="js-example-basic-single form-select" name="id_maquina_treino"
                                            data-width="100%">
                                        @foreach($sessoesTreinamento as $sessao)
                                            <option
                                                value="{{ $sessao->id_sessao_treinamento }}">{{ $sessao->dt_sessao_planejada }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Grupo Muscular</label>
                                    <select class="js-example-basic-single form-select" name="id_maquina_treino"
                                            data-width="100%">
                                        @foreach($gruposMusculares as $grupoMuscular)
                                            <option
                                                value="{{ $grupoMuscular->id_grupo_muscular }}">{{ $grupoMuscular->nome_grupo_muscular }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Máquina treino</label>
                                    <select class="js-example-basic-single form-select" name="id_maquina_treino"
                                            data-width="100%">
                                        @foreach($maquinasTreino as $maquinaTreino)
                                            <option
                                                value="{{ $maquinaTreino->id_maquina_treino }}">{{ $maquinaTreino->nome_maquina_treino }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Número de Séries </label>
                                    <input type="number" name="numero_series"
                                           class="form-control @error('numero_series') is-invalid @enderror ">
                                    @error('numero_series')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Repetições por Série </label>
                                    <input type="number" name="repeticoes_series"
                                           class="form-control @error('repeticoes_series') is-invalid @enderror ">
                                    @error('repeticoes_series')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Carga </label>
                                    <input type="number" name="carga"
                                           class="form-control @error('carga') is-invalid @enderror ">
                                    @error('carga')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
