<?php

include('config.php');

?>

<html>

<head>
  <meta charset="utf-8" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    input[type=text] {
      width: 20vw;
      box-sizing: border-box;
      font-size: 16px;
      background-color: #fcfcfc;
      padding: 20px 10px 3px 40px;
      outline: none;
      border: none;
      border-bottom: solid black 1px;
    }

    .pesquisar-logo {
      background-image: url(../assets/images/pesquisa-logo.png);
      background-size: cover;
      background-color: transparent;
      position: absolute;
      top: 107%;
      width: 35px;
      height: 35px;
      border: none;
    }
  </style>
  <title>Servicinho - admin</title>
</head>

<body>
  <header id="header">
    <section class="header-left">
      <p>&nbsp; Servicinho</p>
    </section>
    <section class="header-right">
      <nav>
        <ul>
          <li><a href="#inicio">Início</a></li>
          <li><a href="#sobre">Pesquisa</a></li>
        </ul>
      </nav>
      <button class="btn-entrar" onclick="document.getElementById('modal-cadastro').style.display='flex';">
        <p>Sair</p>
      </button>
    </section>
  </header>
  <div id="modal-login">
    <div class="modal-container">
      <header>
        <span></span>
        <h2>Login</h2>
        <img onclick="document.getElementById('modal-login').style.display='none'" src="../assets/images/fechar.png" />
      </header>
      <div class="modal-content">
        <p>
          Com qual login deseja prosseguir?
        </p>
      </div>
      <div class="cadastro-buttons">
        <button class="botao-primario" onclick="location.href='./login.php'">Login de usuário</button>
        <button class="botao-secundario" onclick="location.href='./login-admin.php'">Login admnistrativo</button>
      </div>
    </div>
  </div>
  <div id="modal-cadastro">
    <div class="modal-container">
      <header>
        <span></span>
        <h2>Confirmação</h2>
        <img onclick="document.getElementById('modal-cadastro').style.display='none'"
          src="../assets/images/fechar.png" />
      </header>
      <div class="modal-content">
        <p>
          Você realmente deseja encerrar a sessão?
        </p>
      </div>
      <div class="cadastro-buttons">
        <button class="botao-primario"
          onclick="document.getElementById('modal-cadastro').style.display='none'">Não</button>
        <button class="botao-secundario" onclick="location.href='./index.html'">Sim</button>
      </div>
    </div>
  </div>
  <main>
    <section id="inicio">
      <article>
        <h1>Servicinho</h1>
        <h3>Serviço administrativo</h3>
        <p>
          Serviço administrativo com funcionalidades de pesquisa de informações do Banco de Dados.
        </p>
      </article>
      <article class="projeto-logo">
        <img src="../assets/images/eavy-logo.png" width="500" />
      </article>
    </section>
    <section id="sobre">
      <h3>Sistema de busca</h3>
      <article class="carousel-membros">
        <div class="card-membros">
          <h5>Pesquisar</h5>
          <form>
            <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Pesquisar"
              type="text">
            &nbsp;
            <button class="pesquisar-logo" type="submit"></button>
          </form>
          <br>
          <table>
            <thead>
              <tr>
                <th>Código</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Senha</th>
              </tr>
            </thead>
            <?php
        if (!isset($_GET['busca'])) {
            ?>
            <tr>
              <td colspan="3">Digite algo para pesquisar...</td>
            </tr>
            <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM tb_usuario 
                WHERE cd_usuario LIKE '%$pesquisa%'
				OR tipo LIKE '%$pesquisa%'
                OR email LIKE '%$pesquisa%'
                OR senha LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
              <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
            <tr>
              <td>
                <?php echo $dados['cd_usuario']; ?>
              </td>
              <td>
                <?php echo $dados['tipo']; ?>
              </td>
              <td>
                <?php echo $dados['email']; ?>
              </td>
              <td>
                <?php echo $dados['senha']; ?>
              </td>
            </tr>
            <?php
                }
            }
            ?>
            <?php
        } ?>
          </table>
        </div>
      </article>
    </section>
    <div class="footer">
      <p class="cp-text">
        © Copyright 2023 Servicinho Inc.
      </p>
  </main>
</body>

</html>