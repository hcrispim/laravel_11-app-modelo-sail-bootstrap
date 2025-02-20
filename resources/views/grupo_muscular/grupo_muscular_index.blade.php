@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('grupo_muscular.create') }}" class="btn btn-inverse-info"> Adicionar grupo muscular </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Máquinas para treino</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Localização</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($gruposMusculares as $grupoMuscular)
                                    <tr>
                                        <td>{{ $grupoMuscular->id_grupo_muscular }}</td>
                                        <td>{{ $grupoMuscular->nome_grupo_muscular }}</td>
                                        <td>{{ $grupoMuscular->localizacao_grupo_muscular }}</td>
                                        <td>
                                            <a href="{{ route('grupo_muscular.edit', $grupoMuscular->id_grupo_muscular) }}" class="btn btn-warning">Editar</a>
                                            <form action="{{ route('grupo_muscular.destroy', $grupoMuscular->id_grupo_muscular) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Apagar</button>
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
