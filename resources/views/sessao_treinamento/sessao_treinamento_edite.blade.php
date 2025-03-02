@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edite Sessão Treinamento </h6>
                            <form method="POST"
                                  action="{{ route('sessao_treinamento.update', $SessaoTreinamento->id_sessao_treinamento) }}"
                                  class="forms-sample">
                                @csrf
                                {{--                                @method('PUT')--}}

                                <div class="mb-3">
                                    <label class="form-label">Sessão de Treinamento</label>
                                    <p class="form-control-plaintext">{{ $programaTreinamento->nome_programa }}</p>
                                    @error('nome_programa')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" id= "hidden_id_sessao_treinamento" name="id_sessao_treinamento" value="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Programa de Treinamento</label>
                                    <p class="form-control-plaintext">{{ $sessaoTreinamento->dt_sessao_planejada }}</p>
                                    @error('dt_sessao_planejada')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Grupo Muscular</label>--}}
{{--                                    <select class="js-example-basic-single form-select" name="id_grupo_muscular"--}}
{{--                                            data-width="100%">--}}
{{--                                        @foreach($gruposMusculares as $grupoMuscular)--}}
{{--                                            <option--}}
{{--                                                value="{{ $grupoMuscular->id_grupo_muscular }}"--}}
{{--                                                {{ $grupoMuscular->id_grupo_muscular == $serieExercicio->id_grupo_muscular ? 'selected' : '' }}>--}}
{{--                                                {{ $grupoMuscular->nome_grupo_muscular }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Máquina de treino</label>--}}
{{--                                    <select class="js-example-basic-single form-select" name="id_maquina_treino"--}}
{{--                                            data-width="100%">--}}
{{--                                        @foreach($maquinasTreino as $maquinaTreino)--}}
{{--                                            <option--}}
{{--                                                value="{{ $maquinaTreino->id_maquina_treino }}"--}}
{{--                                                {{ $maquinaTreino->id_maquina_treino == $serieExercicio->id_maquina_treino ? 'selected' : '' }}>--}}
{{--                                                {{ $maquinaTreino->nome_maquina_treino }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="mb-3">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Número de Séries </label>--}}
{{--                                    <input type="number" name="numero_series"--}}
{{--                                           value="{{ $serieExercicio->numero_series }}"--}}
{{--                                           class="form-control @error('numero_series') is-invalid @enderror ">--}}
{{--                                    @error('numero_series')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                                <div class="mb-3">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Repetições por Série </label>--}}
{{--                                    <input type="number" name="repeticoes_series"--}}
{{--                                           value="{{ $serieExercicio->repeticoes_series }}"--}}
{{--                                           class="form-control @error('repeticoes_series') is-invalid @enderror ">--}}
{{--                                    @error('repeticoes_series')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                                <div class="mb-3">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Carga </label>--}}
{{--                                    <input type="number" name="carga"--}}
{{--                                           value="{{ $serieExercicio->carga }}"--}}
{{--                                           class="form-control @error('carga') is-invalid @enderror ">--}}
{{--                                    @error('carga')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-primary me-2">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
