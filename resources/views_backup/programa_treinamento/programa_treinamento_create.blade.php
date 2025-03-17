@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Adicionar Programa de Treinametno</h6>
                            <form action="{{ route('programa_treinamento.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nome programa treinamento</label>
                                    <input type="text" name="nome_programa"
                                           value=""
                                           class="form-control
                                           @error('nome_programa') is-invalid
                                           @enderror ">
                                    @error('nome_programa')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label">Data inicio programa treinamento</label>
                                    <input type="date" name="dt_inicio"
                                           value=""
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
                                           value=""
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
