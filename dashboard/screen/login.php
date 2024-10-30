<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form id="login-form" action="#" class="sign-in-form">
            <h2 class="title">login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="log-user" id="log-user" placeholder="Usuário"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="log-password" id="log-password" placeholder="Senha"/>
            </div>
            <input type="submit" value="Login" class="newcl2 solid" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Digital informática</h3>
            <p>
              Aqui é a melhor assitência técnica de informática de Campo Verde, pode ter certeza!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Informações
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Fazer login</h3>
            <p>
              Acesse sua conta e comece a gerenciar agora mesmo!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#cad-repass').on('keyup', function () {
                var password = $('#cad-password').val();
                var confirmPassword = $(this).val();

                if (password === confirmPassword) {
                    $('.sign-up-form .btn').prop('disabled', false);
                    $('#clnew, #clnew2').removeClass('newcl');
                    $('#btcl').removeClass('btn');
                    $('#btcl').addClass('newcl2');
                } else {
                    $('.sign-up-form .btn').prop('disabled', true);
                    $('#clnew, #clnew2').addClass('newcl');
                    $('#btcl').removeClass('newcl2');
                    $('#btcl').addClass('btn');
                }
            });

            $('#cad-password').on('keyup', function () {
                var password = $(this).val();
                var confirmPassword = $('#cad-repass').val();

                if (confirmPassword === password) {
                    $('.sign-up-form .btn').prop('disabled', false);
                    $('#clnew, #clnew2').removeClass('newcl');
                    $('#btcl').removeClass('btn');
                    $('#btcl').addClass('newcl2');
                } else {
                    $('.sign-up-form .btn').prop('disabled', true);
                    $('#clnew, #clnew2').addClass('newcl');
                    $('#btcl').removeClass('newcl2');
                    $('#btcl').addClass('btn');
                }
            });

          $('#btcl').on('click', function (event) {
              event.preventDefault();

              const usuario = $('#cad-user').val();
              const email = $('#cad-email').val();
              const senha = $('#cad-password').val();

              console.log('Enviando requisição para cadastro.php');
              console.log('Usuário:', usuario);
              console.log('Email:', email);
              console.log('Senha:', senha);

              $.ajax({
                  type: 'POST',
                  url: 'cadastro.php',
                  data: { usuario, email, senha },
                  success: function (response) {
                      console.log('Resposta recebida:', response);

                      if (response.includes('Cadastro realizado com sucesso')) {
                          console.log('Cadastro bem-sucedido. Redirecionando para tela1.php');
                          window.location.href = 'tela1.php';
                      }
                  },
                  error: function (xhr, status, error) {
                      console.error('Erro ao processar a requisição:', status, error);
                  }
              });
          });
          $('#login-form').submit(function (event) {
              event.preventDefault();

              const usuario = $('#log-user').val();
              const senha = $('#log-password').val();

              console.log('Enviando requisição para entra.php');
              console.log('Usuário:', usuario);
              console.log('Senha:', senha);

              $.ajax({
                  type: 'POST',
                  url: 'entra.php',
                  data: { usuario, senha },
                  success: function (response) {
                      console.log('Resposta recebida:', response);

                      if (response.includes('Login realizado com sucesso')) {
                          console.log('Login bem sucedido. Redirecionando para tela1.php');
                          window.location.href = 'dashinfo.php';
                      }
                  },
                  error: function (xhr, status, error) {
                      console.error('Erro ao processar a requisição:', status, error);
                  }
              });
          });
      });
    </script>
    <script src="../script/app.js"></script>
  </body>
</html>