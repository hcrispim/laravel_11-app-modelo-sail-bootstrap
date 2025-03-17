@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Adicionar Sessão de Treinametno</h6>
                            <form action="{{ route('sessao_treinamento.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Programa de Treinamento</label>
                                    <select class="form-select" id="id_programa_treinamento" name="id_programa_treinamento" data-width="100%">
                                        @foreach($programasTreinamento as $programaTreinamento)
                                            <option
                                                value="{{ $programaTreinamento->id_programa_treinamento }}">{{ $programaTreinamento->nome_programa }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sessão data planejada</label>
                                    <input type="date" name="dt_sessao_planejada"
                                           value=""
                                           class="form-control
                                           @error('dt_sessao_planejada') is-invalid
                                           @enderror ">
                                    @error('dt_sessao_planejada')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="time">Sessão tempo duração planejada</label>
                                    {{--                                    <p class="form-control-plaintext">{{ $sessaoTreinamento->tempo_duracao_executada }}</p>--}}
                                    <input type="time" name="tempo_duracao_planejada"
                                           value=""
                                           class="form-control
                                           @error('tempo_duracao_planejada') is-invalid
                                           @enderror ">
                                    @error('tempo_duracao_planejada')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sessão data executada</label>
                                    <input type="date" name="dt_sessao_executada"
                                           value=""
                                           class="form-control
                                           @error('dt_sessao_executada') is-invalid
                                           @enderror ">
                                    @error('dt_sessao_executada')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sessão tempo duração executada</label>
                                    <input type="time" name="tempo_duracao_executada"
                                           value=""
                                           class="form-control
                                           @error('tempo_duracao_executada') is-invalid
                                           @enderror ">
                                    @error('tempo_duracao_executada')
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
