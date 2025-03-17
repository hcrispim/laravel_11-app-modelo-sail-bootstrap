@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @php
        $isProgramaTreinamentoEditePage = true; // Esta variável define que você está na página correta
    @endphp
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edite Programa de Treinamento </h6>
                            <form method="POST"
                                  action="{{ route('programa_treinamento.update', $programaTreinamento->id_programa_treinamento) }}"
                                class="forms-sample">
                                @csrf
                                @method('PUT')
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Nome Programa de Treinamento</label>--}}
{{--                                    <select class="form-select" id="id_programa_treinamento" name="id_programa_treinamento" data-width="100%">--}}
{{--                                        @foreach($programasTreinamento as $programa)--}}
{{--                                            <option value="{{ $programa->id_programa_treinamento }}"--}}
{{--                                                {{ $programa->id_programa_treinamento == $programaTreinamento->id_programa_treinamento ? 'selected' : '' }}>--}}
{{--                                                {{ $programa->nome_programa }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                id usuario--}}
                                <input type="hidden" name="id_programa_treinamento" value="{{ $programaTreinamento->id_programa_treinamento }}">
                                <input type="hidden" name="id_usuario" value="{{ $programaTreinamento->id_usuario }}">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome programa </label>
                                    <input type="text" name="nome_programa"
                                           class="form-control @error('nome_programa') is-invalid @enderror "
                                           value="{{ $programaTreinamento->nome_programa }}">
                                    @error('nome_programa')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Data inicio programa treinamento</label>
                                    <input type="date" name="dt_inicio"
                                           value="{{ $programaTreinamento->dt_inicio }}"
                                           class="form-control
                                           @error('dt_inicio') is-invalid
                                           @enderror ">
                                    @error('dt_inicio')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Data final programa treinamento</label>
                                    <input type="date" name="dt_final"
                                           value="{{ $programaTreinamento->dt_final }}"
                                           class="form-control
                                           @error('dt_final') is-invalid
                                           @enderror ">
                                    @error('dt_final')
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
