<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservar Sala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section id="topo" class="container">
    <div class="row">
        <div class="col-12" style="background-color: #320436ff; height:100px; padding-top:40px; color:#ffffff">
            <h2>RESERVAR SALA</h2>
        </div>
    </div>
</section>

<section id="menu" class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg" style="background-color: #0d0032ff;">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cadastrar.usuario') }}" style="color:#ffffff">
                                Cadastrar Usuários
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cadastrar.sala') }}" style="color:#ffffff">
                                Cadastrar Salas
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('reservar.sala') }}" style="color:#ffffff">
                                Reservar Salas
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('relatorios') }}" style="color:#ffffff">
                                Salas Reservadas
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>

<section id="ress" class="container" style="min-height: 650px">
    <br>
    <div class="row">
        <div class="card">

            <div class="card-reader" style="background-color:#320436ff; height:80px; color:#ffffff; padding-top:20px;">
                <h5 class="card-title p-3">Reservar Sala</h5>
            </div>

            <div class="card-body">

                {{-- MENSAGENS DE ERRO --}}
                @if(session('erro'))
                    <div class="alert alert-danger">{{ session('erro') }}</div>
                @endif

                {{-- MENSAGEM DE SUCESSO --}}
                @if(session('sucesso'))
                    <div class="alert alert-success">{{ session('sucesso') }}</div>
                @endif

                <form action="{{ route('salvar.reserva') }}" method="POST">
                    @csrf

                    <!-- SALA -->
                    <div class="mb-3">
                        <label for="sala" class="form-label">Selecione a Sala</label>
                        <select name="sala_id" id="sala" class="form-select" required>
                            <option selected disabled>Selecione</option>

                            @foreach($salas as $sala)
                                <option value="{{ $sala->id }}">
                                    {{ $sala->nome }} (Capacidade: {{ $sala->capacidade }})
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- USUÁRIO -->
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Selecione o Usuário</label>
                        <select name="usuario_id" id="usuario" class="form-select" required>
                            <option selected disabled>Selecione</option>

                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">
                                    {{ $usuario->nome }} ({{ $usuario->matricula }})
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- INÍCIO -->
                    <div class="mb-3">
                        <label for="data_hora_inicio" class="form-label">Início da Reserva</label>
                        <input type="datetime-local" id="data_hora_inicio" name="data_hora_inicio" class="form-control" required>
                    </div>

                    <!-- FIM -->
                    <div class="mb-3">
                        <label for="data_hora_fim" class="form-label">Fim da Reserva</label>
                        <input type="datetime-local" id="data_hora_fim" name="data_hora_fim" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Reservar</button>

                </form>

            </div>
        </div>
    </div>
</section>

<section id="rodape" class="container">
    <div>
        <div class="col-12 mt-5" style="background-color:#320436ff; height:50px"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
