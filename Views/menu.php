<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Home.php">PanAir Linhas Aéreas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuários</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../Views/cadastroAtendente.php">Cadastrar Novo Atendente</a>
              <a class="dropdown-item" href="../Views/listagemAtendente.php"> Lista de Atendentes</a>
              <a class="dropdown-item" href="../Views/cadastroCliente.php"> Cadastrar Novo Cliente</a>
              <a class="dropdown-item" href="../Views/listagemClientes.php"> Lista de Clientes </a>
            <div class="dropdown-divider"></div>          
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Avões</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Views/cadastroAviao.php">Cadastrar Novo Avião</a>
            <a class="dropdown-item" href="../Views/listagemAviao.php">Lista de Aviõess</a>
            <div class="dropdown-divider"></div>          
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Vôos</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Views/cadastroVoo.php">Cadastrar Novo Vôo</a>
            <a class="dropdown-item" href="../Views/listagemVoo.php">Lista de Vôos</a>
            <div class="dropdown-divider"></div>          
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Aeroportos</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../Views/cadastroAeroporto.php">Cadastrar Novo Aeroporto</a>
              <a class="dropdown-item" href="../Views/listagemAeroporto.php">Lista de Aeroportos</a>
            <div class="dropdown-divider"></div>          
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Compra de Passagem</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../Views/compraPassagem.php">Comprar Passagem</a>
              <a class="dropdown-item" href="../Views/listagemPassagem.php">Lista de Passagens</a>
            <div class="dropdown-divider"></div>          
          </div>
        </li>
        
        <div>
          <li>
              <a class="nav-link" href="../Login/logout.php">Logout</a>
          </li>
        </div>
      </ul>
    </div>
</nav>

