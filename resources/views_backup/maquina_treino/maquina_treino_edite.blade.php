{{--@extends('admin.admin_dashboard')--}}
{{--@section('admin')--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>--}}
{{--    <div class="page-content">--}}
{{--        <div class="row profile-body">--}}
{{--            <div class="col-md-8 col-xl-8 middle-wrapper">--}}
{{--                <div class="row">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="card-title">Edite máquina </h6>--}}
{{--                            <form method="POST" action="{{ route('maquina_treino.update', $maquina->id_maquina_treino) }}" class="forms-sample">--}}
{{--                              @csrf--}}
{{--                                <input type="hidden" name="id_maquina_treino" value="{{ $maquina->id_maquina_treino }}">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Nome </label>--}}
{{--                                    <input type="text" name="nome_maquina_treino"--}}
{{--                                           class="form-control @error('nome_maquina_treino') is-invalid @enderror "--}}
{{--                                           value="{{ $maquina->nome_maquina_treino }}">--}}
{{--                                    @error('nome_maquina_treino')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Foto </label>--}}
{{--                                    <input type="text" name="foto_maquina_treino"--}}
{{--                                           class="form-control @error('foto_maquina_treino') is-invalid @enderror "--}}
{{--                                           value="{{ $maquina->foto_maquina_treino }}">--}}
{{--                                    @error('foto_maquina_treino')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn btn-primary me-2">Salvar</button>--}}
{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edite máquina</h6>

                            @can('update')
                                <form method="POST" action="{{ route('maquina_treino.update', $maquinaTreino->id_maquina_treino) }}" class="forms-sample">
                                    @csrf
                                    <input type="hidden" name="id_maquina_treino" value="{{ $maquinaTreino->id_maquina_treino }}">

                                    <div class="mb-3">
                                        <label class="form-label">Nome</label>
                                        <input type="text" name="nome_maquina_treino"
                                               class="form-control @error('nome_maquina_treino') is-invalid @enderror"
                                               value="{{ $maquinaTreino->nome_maquina_treino }}">
                                        @error('nome_maquina_treino')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Foto</label>
                                        <input type="text" name="foto_maquina_treino"
                                               class="form-control @error('foto_maquina_treino') is-invalid @enderror"
                                               value="{{ $maquinaTreino->foto_maquina_treino }}">
                                        @error('foto_maquina_treino')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                                </form>
                            @else
                                <div class="alert alert-danger">Você não tem permissão para editar esta máquina.</div>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


