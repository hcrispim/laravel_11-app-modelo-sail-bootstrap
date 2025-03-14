<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
          content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Admin Panel </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    @include('admin.body.sidebar')

    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        @include('admin.body.header')
        <!-- partial -->

        @yield('admin')

        <!-- partial:partials/_footer.html -->
        @include('admin.body.footer')
        <!-- partial -->

    </div>
</div>

<!-- core:js -->
<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/template.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
<!-- End custom js for this page -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code/code.js') }}"></script>
<script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>

<!-- Start datatables -->
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
<!-- End datatables -->


<!-- Input Tags -->
<script src="{{ asset('backend/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>

<script src="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/inputmask.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead.js') }}"></script>
<script src="{{ asset('backend/assets/js/tags-input.js') }}"></script>

<!-- Input Tags -->

<!-- tinymce -->
<script src="{{ asset('backend/assets/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/tinymce.js') }}"></script>
<!-- tinymce -->

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@if(isset($sessoesTreinamento) && isset($isSerieExercicioCreatePage))
    <script>
        var programaTreinamentoSelect = document.getElementById('id_programa_treinamento');
        programaTreinamentoSelect.addEventListener('click', function () {
            var programaTreinamentoId = this.value;
            var sessoesTreinamento = @json($sessoesTreinamento);
            var sessaoTreinamentoSelect = document.getElementById('id_sessao_treinamento');
            var hiddenSessaoTreinamento = document.getElementById('hidden_id_sessao_treinamento'); // Localizar o campo hidden

            sessaoTreinamentoSelect.innerHTML = '';
            sessoesTreinamento.forEach(sessao => {
                if (sessao.id_programa_treinamento == programaTreinamentoId) {
                    var option = document.createElement('option');
                    option.value = sessao.id_sessao_treinamento;
                    option.text = sessao.dt_sessao_planejada;
                    sessaoTreinamentoSelect.appendChild(option);
                }
            });

            // Atualiza o valor do campo hidden ao selecionar a primeira opção
            if (sessaoTreinamentoSelect.options.length > 0) {
                hiddenSessaoTreinamento.value = sessaoTreinamentoSelect.options[0].value;
            }

            // Adiciona listener para atualizar o campo hidden quando o valor do select mudar
            sessaoTreinamentoSelect.addEventListener('change', function () {
                hiddenSessaoTreinamento.value = this.value;
            });
            //fim declaracao hidden
        });
    </script>
@endif

@if(isset($sessoesTreinamento) && isset($isSerieExercicioIndexPage))
    <script>
        var programaTreinamentoSelect = document.getElementById('id_programa_treinamento');
        programaTreinamentoSelect.addEventListener('click', function () {
            var programaTreinamentoId = this.value;
            var sessoesTreinamento = @json($sessoesTreinamento);
            var sessaoTreinamentoSelect = document.getElementById('id_sessao_treinamento');
            var hiddenSessaoTreinamento = document.getElementById('hidden_id_sessao_treinamento'); // Localizar o campo hidden

            sessaoTreinamentoSelect.innerHTML = '';
            sessoesTreinamento.forEach(sessao => {
                if (sessao.id_programa_treinamento == programaTreinamentoId) {
                    var option = document.createElement('option');
                    option.value = sessao.id_sessao_treinamento;
                    option.text = sessao.dt_sessao_planejada;
                    sessaoTreinamentoSelect.appendChild(option);
                }
              });

             // Atualiza o valor do campo hidden ao selecionar a primeira opção
            if (sessaoTreinamentoSelect.options.length > 0) {
                hiddenSessaoTreinamento.value = sessaoTreinamentoSelect.options[0].value;
            }

            // Adiciona listener para atualizar o campo hidden quando o valor do select mudar
            sessaoTreinamentoSelect.addEventListener('change', function () {
                hiddenSessaoTreinamento.value = this.value;
            });
            //fim declaracao hidden
       });
    </script>
@endif

{{--//IMPLEMENTAR A ESCOLHA DA SESSAO DE TREINAMENTO--}}
{{--//QUE APARECE POR DATA, MAS PRECISA DO NUMERO PARA INCLUSAO--}}

@if(isset($seriesExercicio) and isset($gruposMusculares) and isset($maquinasTreino) )
<script>
    document.getElementById('id_sessao_treinamento').addEventListener('click', function () {
        var sessaoTreinamentoId = this.value;
        var seriesExercicio = @json($seriesExercicio);
        var gruposMusculares = @json($gruposMusculares);
        var maquinasTreino = @json($maquinasTreino);
        var tabelaSerieTreinamento = document.getElementById('tabela_serie_treinamento');
        tabelaSerieTreinamento.innerHTML = `
        <tr>
            <th>Sessão Treino</th>
            <th>Grupo Muscular</th>
            <th>Máquina de Treino</th>
            <th>Número de Séries</th>
            <th>Repetições</th>
            <th>Carga</th>
        </tr>
    `;
        seriesExercicio.forEach(serie => {
            if (serie.id_sessao_treinamento == sessaoTreinamentoId) {

                // Encontrar o nome do grupo muscular correspondente
                var nomeGrupoMuscular = gruposMusculares.find(grupo => grupo.id_grupo_muscular == serie.id_grupo_muscular).nome_grupo_muscular;
                // Encontrar o nome da máquina de treino correspondente
                var nomeMaquinaTreino = maquinasTreino.find(maquina => maquina.id_maquina_treino == serie.id_maquina_treino).nome_maquina_treino
                var editUrl = "{{ route('serie_exercicio.edit', ':id') }}".replace(':id', serie.id_serie_exercicio);
                var deleteUrl = "{{ route('serie_exercicio.destroy', ':id') }}".replace(':id', serie.id_serie_exercicio);
                var row = `
                <tr>
                    <td>${serie.id_sessao_treinamento}</td>
                    <td>${nomeGrupoMuscular}</td>
                    <td>${nomeMaquinaTreino}</td>
                    <td>${serie.numero_series}</td>
                    <td>${serie.repeticoes_series}</td>
                    <td>${serie.carga}</td>
                    <td>
                      <a href="${editUrl}" class="btn btn-inverse-warning"> Editar </a>
                      <form action="${deleteUrl}" method="POST" style="display:inline-block;">
                       @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-inverse-danger"  >Apagar</button>
                </form>
              </td>
          </tr>
`;
                tabelaSerieTreinamento.innerHTML += row;
            }
        });
    });
</script>
@endif

@if(isset($sessoesTreinamento) && isset($isSessaoTreinamentoIndexPage))
    <script>
        document.getElementById('id_programa_treinamento').addEventListener('click', function () {
            var programaTreinamentoId = this.value;
            var sessoesTreinamento = @json($sessoesTreinamento);
            var tabelaSessaoTreinamento = document.getElementById('tabela_sessao_treinamento');
            tabelaSessaoTreinamento.innerHTML = `
        <tr>
            <th>Prog Treinamento</th>
            <th>Dt Sessao pla</th>
            <th>Tempo duração plan</th>
            <th>Dt Sessao exec</th>
            <th>Tempo duração exec</th>
        </tr>
    `;
            // Função para formatar a data no formato dd-mm-yyyy
            function formatarData(data) {
                if (!data) return ''; // Verifica se a data é nula ou indefinida
                var partes = data.split('-');
                return partes.reverse().join('-');
            }
            sessoesTreinamento.forEach(sessao => {
                if (sessao.id_programa_treinamento == programaTreinamentoId) {
                    var editUrl = "{{ route('sessao_treinamento.edit', ':id') }}".replace(':id', sessao.id_sessao_treinamento);
                    var deleteUrl = "{{ route('sessao_treinamento.destroy', ':id') }}".replace(':id', sessao.id_sessao_treinamento);
                    var row = `
                <tr>
                    <td>${sessao.id_programa_treinamento}</td>
                    <td>${formatarData(sessao.dt_sessao_planejada)}</td>
                    <td>${sessao.tempo_duracao_planejada}</td>
                    <td>${formatarData(sessao.dt_sessao_executada)}</td>
                    <td>${sessao.tempo_duracao_executada}</td>
                    <td>
                      <a href="${editUrl}" class="btn btn-inverse-warning"> Editar </a>
                      <form action="${deleteUrl}" method="POST" style="display:inline-block;">
                       @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-inverse-danger"  >Apagar</button>
                    </form>
                  </td>
              </tr>
`               ;
                    tabelaSessaoTreinamento.innerHTML += row;
                }
            });
        });
    </script>
@endif

@if(isset($sessoesTreinamento) && isset($isSessaoTreinamentoEditePage))
    <script>
        document.getElementById('id_programa_treinamento').addEventListener('click', function () {
            var programaTreinamentoId = this.value;
            var sessoesTreinamento = @json($sessoesTreinamento);
            var tabelaSessaoTreinamento = document.getElementById('tabela_sessao_treinamento');
            tabelaSessaoTreinamento.innerHTML = `
        <tr>
            <th>Prog Treinamento</th>
            <th>Dt Sessao pla</th>
            <th>Tempo duração plan</th>
            <th>Dt Sessao exec</th>
            <th>Tempo duração exec</th>
        </tr>
    `;
            sessoesTreinamento.forEach(sessao => {
                if (sessao.id_programa_treinamento == programaTreinamentoId) {
                    var editUrl = "{{ route('sessao_treinamento.edit', ':id') }}".replace(':id', sessao.id_sessao_treinamento);
                    var deleteUrl = "{{ route('sessao_treinamento.destroy', ':id') }}".replace(':id', sessao.id_sessao_treinamento);
                    var row = `
                <tr>
                    <td>${sessao.id_programa_treinamento}</td>
                    <td>${sessao.dt_sessao_planejada}</td>
                    <td>${sessao.tempo_duracao_planejada}</td>
                    <td>${sessao.dt_sessao_executada}</td>
                    <td>${sessao.tempo_duracao_executada}</td>
                    <td>
                      <a href="${editUrl}" class="btn btn-inverse-warning"> Editar </a>
                      <form action="${deleteUrl}" method="POST" style="display:inline-block;">
                       @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-inverse-danger"  >Apagar</button>
                    </form>
                  </td>
              </tr>
`               ;
                    tabelaSessaoTreinamento.innerHTML += row;
                }
            });
        });
    </script>
@endif

{{--@if(isset($programaTreinamento) && isset($isProgramaTreinamentoIndexPage))--}}
{{--    <script>--}}
{{--        document.getElementById('id_programa_treinamento').addEventListener('change', function () {--}}
{{--            var programaTreinamentoId = this.value;--}}
{{--            // Array de programas de treinamento vindo do Blade para uso no JavaScript--}}
{{--            var programasTreinamento = @json($programasTreinamento);--}}
{{--            // Função para formatar a data no formato dd-mm-yyyy--}}

{{--            function formatarData(data) {--}}
{{--                if (!data) return ''; // Verifica se a data é nula ou indefinida--}}
{{--                var partes = data.split('-');--}}
{{--                return partes.reverse().join('-');--}}
{{--            }--}}
{{--            // Encontrando o programa selecionado--}}
{{--            var programaSelecionado = programasTreinamento.find(programa =>--}}
{{--                programa.id_programa_treinamento == programaTreinamentoId--}}
{{--            );--}}
{{--            console.log(programaSelecionado);--}}
{{--        });--}}
{{--    </script>--}}
{{--@endif--}}
</body>
</html>

