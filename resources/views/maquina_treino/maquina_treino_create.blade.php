@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            @can('create')
                            <h6 class="card-title">Adicionar máquina</h6>

                            <form method="POST" action="{{ route('maquina_treino.store') }}" class="forms-sample">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome </label>
                                    <input type="text" name="nome_maquina_treino"
                                           class="form-control @error('nome_maquina_treino') is-invalid @enderror ">
                                    @error('nome_maquina_treino')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Foto </label>
                                    <input type="text" name="foto_maquina_treino"
                                           class="form-control @error('foto_maquina_treino') is-invalid @enderror ">
                                    @error('foto_maquina_treino')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Salvar</button>

                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
