@extends('admin.admin_dashboard')
@section('admin')
    @php
        $isSerieExercicioIndexPage = true; // Esta variável define que você está na página correta
    @endphp
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

                        <div class="mb-3">
                            <label class="form-label">Programa de Treinamento</label>
                            <select class="form-select" id="id_programa_treinamento" data-width="100%">
                                @foreach($programasTreinamento as $programaTreinamento)
                                    <option
                                        value="{{ $programaTreinamento->id_programa_treinamento }}">{{ $programaTreinamento->nome_programa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sessão de Treinamento</label>
                            <select class="form-select" id="id_sessao_treinamento" data-width="100%">
{{--                            REALIZADO VIA SCRIPT--}}
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table id="tabela_serie_treinamento" class="table">
{{--                                REALIZADO VIA SCRIPT--}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
