<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    
  <section id="topo" class="container" >
    <div class="row"> 
      <div class="col-12" style="background-color: #320436ff; height:100px; padding-top:40px; color: #ffffff">
        <h2>RESERVAR SALA</h2>
      </div>
    </div>
  </section>

  <section id="menu" class="container" >
    <div class="row">
    <nav class="navbar navbar-expand-lg" style="background-color: #0d0032ff;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cadastrar.usuarios') }}" style="color:#ffffff">Cadastrar Usuários</a>
            </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('cadastrar.salas') }}" style="color:#ffffff" > Cadastrar Salas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('reservar') }}" style="color:#ffffff">Reservar Salas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('salas') }}" style="color:#ffffff">Ver Salas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('') }}" style="color:#ffffff">Salas reservadas</a>
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
      <div class="card-reader text-bg-sucess">
        <h5 class="card-title">Reservar Sala</h5>
      </div>
        <div class="card-body">
          <form action="{{ route('reservar') }}" method="POST">
                <div class="mb-3">
                    <label for="sala" class="form-label">Selecione sua Sala</label>
                    <select class="form-select" id="sala">
                    <option selected>Selecione</option>
                    @foreach ($salas as $key)
                    <option value="{{ $key->id }}">{{ $key->salas }}</option>
                    </select>
                </div>
                 <div class="mb-3">
                    <label for="nome" class="form-label">Selecione seu Usuário</label>
                    <select name="usuario_id" class="form-select" aria-label="Default select example">
                    <option selected>Selecione </option>
                    @foreach ($usuario as $key)
                    <option value="{{ $key->id }}">{{ $key->nome}}</option>
                       @endforeach
                     </select>
                 </div> 
                  <div class="mb-3">
                    <label for="horario" class="form-label">Selecione seu Horário</label>
                    <select class="form-select" id="horario">
                    <option selected>Selecione</option>
                    @foreach ($horario as $key)
                    <option value="{{ $key->id }}">{{ $key->horario }}</option>
                    </select>
                </div>

                  <button type="submit" class="btn btn-success">Cadastrar</button>
          </form>
        </div>
    </div>
  </div>
</section>

    </section>
  <section id="rodape" class="container" >
        <div>
           <div class="col-12 mt-5"  style="background-color: #320436ff; height:50px ">
         </div>
      </div>
    

  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>