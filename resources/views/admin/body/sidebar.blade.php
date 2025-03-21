<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            My<span>Life</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href={{ route('admin.dashboard') }} class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Tabelas</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                   aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Programas de Treinamento</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route ('programa_treinamento.index')}}" class="nav-link">Programas</a>
                        </li>
                        @can('create', App\Models\ProgramaTreinamento::class)
                        <li class="nav-item">
                            <a href="{{ route('programa_treinamento.create') }}" class="nav-link">Adicionar programas</a>

                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                   aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Sessões de Treinamento</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route ('sessao_treinamento.index')}}" class="nav-link">Sessões</a>
                        </li>
                        @can('create', App\Models\SessaoTreinamento::class)
                        <li class="nav-item">
                            <a href="{{ route('sessao_treinamento.create') }}" class="nav-link">Adicionar sessões</a>

                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                   aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Série e exercícios</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route ('serie_exercicio.index')}}" class="nav-link">Séries e exercícios</a>
                        </li>
                        @can('create', App\Models\SerieExercicio::class)
                        <li class="nav-item">
                            <a href="{{ route('serie_exercicio.create') }}" class="nav-link">Adicionar séries e exercícios</a>

                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                   aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Máquinas para treino</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route ('maquina_treino.index')}}" class="nav-link">Máquinas</a>
{{--                            <a href="#" class="nav-link">Tipos</a>--}}
                        </li>
                        @can('create', App\Models\MaquinaTreino::class)
                        <li class="nav-item">
                            <a href="{{ route('maquina_treino.create') }}" class="nav-link">Adicionar máquina</a>
{{--                            <a href="#" class="nav-link">Adicionar máquina</a>--}}
                        </li>
                        @endcan

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                   aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Grupos musculareso</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route ('grupo_muscular.index')}}" class="nav-link">Grupos</a>
                        </li>
                        @can('create', App\Models\GrupoMuscular::class)
                        <li class="nav-item">
                            <a href="{{ route('grupo_muscular.create') }}" class="nav-link">Adicionar grupos</a>

                        </li>
                        @endcan
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
</nav>
