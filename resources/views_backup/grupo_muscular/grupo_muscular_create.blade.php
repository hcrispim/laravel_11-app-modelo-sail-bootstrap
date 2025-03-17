
@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Adicionar grupo</h6>
                        @can('create')
                        <form method="POST" action="{{ route('grupo_muscular.store') }}" class="forms-sample">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nome  </label>
                                <input type="text" name="nome_grupo_muscular" class="form-control @error('nome_grupo_muscular') is-invalid @enderror " >
                                @error('nome_grupo_muscular')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Localização grupo muscular   </label>
                                <input type="text" name="localizacao_grupo_muscular" class="form-control @error('localizacao_grupo_muscular') is-invalid @enderror " >
                                @error('localizacao_maquina_treino')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Salvar </button>

                        </form>
                            @endcan

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
