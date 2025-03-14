@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('maquina_treino.create') }}" class="btn btn-inverse-info"> Adicionar programa de treinamento </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Programas Treinamento</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Programa</th>
                                    <th>Usuário</th>
                                    <th>Nome programa</th>
                                    <th>Data Inicio</th>
                                    <th>Data Fim</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($programas_treinamento as $programa_treinamento)
                                    <tr>
                                        <td>{{$programa_treinamento->id_programa_treinamento}}</td>

{{--                                        BUSCAR O NOME DO USUARIO A PARTIR DO ID--}}
                                        <td>{{$programa_treinamento->usuario->name}}</td>
                                        <td>{{$programa_treinamento->nome_programa}}</td>
                                        <td>{{$programa_treinamento->dt_inicio}}</td>
                                        <td>{{$programa_treinamento->dt_final}}</td>
                                        <td>
                                            <a href="{{ route('programa_treinamento.edit',$programa_treinamento->id_programa_treinamento) }}" class="btn btn-inverse-warning"> Editar </a>

                                            <form action="{{ route('programa_treinamento.destroy', $programa_treinamento->id_programa_treinamento) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
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
