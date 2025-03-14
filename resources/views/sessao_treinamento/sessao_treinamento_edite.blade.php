@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @php
        $isSessaoTreinamentoEditePage = true; // Esta variável define que você está na página correta
//        dd($sessaoTreinamento);
//        dd($programaTreinamento);
//        dd('Teste');
    @endphp
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edite Sessão Treinamento </h6>
                            <form method="POST"
                                  action="{{ route('sessao_treinamento.update', $sessaoTreinamento->id_sessao_treinamento) }}"
                                  class="forms-sample">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Programa de Treinamento</label>
                                    <p class="form-control-plaintext">{{ $programaTreinamento->nome_programa }}</p>
{{--                                    <input type="datetime-local" name="nome_programa"--}}
{{--                                           value="{{ $sessaoTreinamento->nome_programa }}"--}}
{{--                                           class="form-control--}}
{{--                                           @error('nome_programa') is-invalid--}}
{{--                                           @enderror ">--}}
{{--                                    @error('nome_programa')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" id= "hidden_id_programa_treinamento" name="id_programa_treinamento" value={{$programaTreinamento->id_programa_treinamento}}>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sessão data planejada</label>
                                    <input type="date" name="dt_sessao_planejada"
                                           value="{{ $sessaoTreinamento->dt_sessao_planejada }}"
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
                                           value="{{ $sessaoTreinamento->tempo_duracao_planejada }}"
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
                                           value="{{ $sessaoTreinamento->dt_sessao_executada }}"
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
                                           value="{{ $sessaoTreinamento->tempo_duracao_executada }}"
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
