@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            @can('create')
            <ol class="breadcrumb">
                <a href="{{ route('grupo_muscular.create') }}" class="btn btn-inverse-info"> Adicionar grupo muscular </a>
            </ol>
            @endcan
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Grupos musculares</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Localização</th>
                                    @if(Gate::allows('update') || Gate::allows('create'))
                                        <th>Ações</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($gruposMusculares as $grupoMuscular)
                                    <tr>
                                        <td>{{ $grupoMuscular->id_grupo_muscular }}</td>
                                        <td>{{ $grupoMuscular->nome_grupo_muscular }}</td>
                                        <td>{{ $grupoMuscular->localizacao_grupo_muscular }}</td>
                                        <td>
                                            @can('update')
                                            <a href="{{ route('grupo_muscular.edit', $grupoMuscular->id_grupo_muscular) }}" class="btn btn-warning">Editar</a>
                                            @endcan
                                            @can('delete')
                                            <form action="{{ route('grupo_muscular.destroy', $grupoMuscular->id_grupo_muscular) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Apagar</button>
                                            </form>
                                                @endcan
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
