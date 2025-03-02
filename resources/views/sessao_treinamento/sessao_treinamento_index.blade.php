@extends('admin.admin_dashboard')
@section('admin')
    @php
        $isSessaoTreinamentoPage = true; // Esta variável define que você está na página correta
    @endphp

    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('sessao_treinamento.create') }}" class="btn btn-inverse-info"> Adicionar
                    sessão de treinamento </a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Sessões Treinamento</h6>

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
                            <label class="form-label">Sessões de Treinamento</label>
                        </div>
                        <div class="table-responsive">
                            <table id="tabela_sessao_treinamento" class="table">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
