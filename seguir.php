<?php 
//Conexão com o banco de dados
    try {
        $dns = "mysql:dbname=nome_do_Banco_De_DADOS;host=NOME_DO_HOST";
        $user = "nome_do_usuario_do_banco";
        $pass = "Senha_do_banco";
        $pdo = new PDO($dns, $user, $pass);
    }catch (PDOException $e){
        echo "Falha: ". $e->getMessage();
    }

    //Pegando nome do Usuário logado no sistema
    session_start();

    $usulogado = $_SESSION['usuario'];
    //Pegando usuário através do método Get
    $s = $_POST['nome'];
    $status = 1;
    //Selecionando a tabela de Seguidores para verificar se o usuário logado está seguindo o usuário.
    $sql = $pdo->query("SELECT * FROM seguidores WHERE seguindo= '$s' and usuario= '$usulogado' and status= '$status'");
    //Verifica se o usuário está logado e se o mesmo já segue este usuário
    if ($sql->rowCount() > 0 or empty($usulogado)) {
       echo "Você já está seguindo este usuario ou não está logado!!!";
    //Caso ele estiver logado então faça isso, ou seja segue o determinado usuário
    }else{
         $pdo->query("INSERT INTO segui1 SET seguindo= '$s', usuario= '$usulogado', status= '$status'");
        echo "Você está seguindo: ".$s;
        echo "<script>location.href='usuarios.php'</script>";
    }


?>  