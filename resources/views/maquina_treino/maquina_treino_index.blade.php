@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('maquina_treino.create') }}" class="btn btn-inverse-info"> Adicionar máquina </a>
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
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Foto</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($maquina_treino as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->nome_maquina_treino}}</td>
                                        <td>{{$item->foto_maquina_treino}}</td>
                                        <td>
                                            <a href="{{ route('maquina_treino.edit',$item->id_maquina_treino) }}" class="btn btn-inverse-warning"> Editar </a>

                                            <form action="{{ route('maquina_treino.destroy', $item->id_maquina_treino) }}" method="POST" style="display:inline-block;">
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
