<html>

<head>
    <link rel="stylesheet" href="Plugins/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="styles/styleCadastro.css"/>
    <script src="Plugins/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>MEU DEUS</title>
</head>
<body>
    <form id="form">
        <div class="container">
        <h1>Cadastro</h1>
        
        <div class="correto hidden" >CADASTRO REALIZADO COM SUCESSO</div>

        <div class="form">
            <div class="row justify-content-center">
                <div class="col-3">
                    <label for="nameInput" class="form-label">Seu nome:</label>
                    <input type="text" class="form-control" id="nameInput" name="name" placeholder="Nome Completo" required>
                </div>

                <div class="col-3">
                    <label for="loginInput" class="form-label">Digite um login:</label>
                    <input type="text" class="form-control" id="loginInput" name="login" placeholder="Login" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-6">
                    <label for="emailInput" class="form-label">Seu email:</label>
                    <input type="email" class="form-control" id="emailInput" name="email" placeholder="name@email.com" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-3">
                    <label for="passwordInput" class="form-label">Digite uma senha:</label>
                    <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
                </div>
                <div class="col-3">
                    <label for="passwordReInput" class="form-label">Confirme sua senha:</label>
                    <input type="password" class="form-control" id="passwordReInput" name="passwordAgain" placeholder="Password" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <div class="col-3">
                <button type="reset" class="btn btn-danger">Limpar</button>
                </div>
                <div class="col-5">
                <button type="submit" class="btn btn-success" onclick="confirmaCadastro()">Salvar</button>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>

</html>


<script type="text/javascript">
    // Fun????o que realiza a confirma????o se tudo foi digitado corretamente e se as senha coincidem, para ent??o a fun??ao de salvamento ser executada
    function confirmaCadastro(){
        nome = $('#nameInput').val();
        login = $('#loginInput').val();
        email = $('#emailInput').val();
        password = $('#passwordInput').val();
        rePassword = $('#passwordReInput').val();
        if(nome == "" || login == "" || email == "" || password == "" || rePassword == ""){
            confirm('CADASTRO CONT??M ERRO, VERIFICAR SE TODAS INFORMA????ES FORAM PREENCHIDAS');
        }
        else if(password!==rePassword){
            confirm('AS SENHAS DIGITADAS N??O COINCIDEM, REENSIRA-AS');

        }
        else{
            saveCadastro();
        }
    }
    // Fun????o que puxa e envia os dados do cadastro para realizar a inser????o no banco de dados
    function saveCadastro(){
        $.ajax({
            url: "services/saveCadastro.php",
            type: "POST",
            dataType: "text",
            data: $('#form').serialize(),
            success: function(response){
                $('.correto').show();
            }
        })
    }

</script>