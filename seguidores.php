<!DOCTYPE html>
<html>
<head>
	<title>Seguidores</title>
</head>
<body bgcolor="black">

<?php
	//conexão com o banco de dados
	try {
        $dns = "mysql:dbname=nome_do_Banco_De_DADOS;host=NOME_DO_HOST";
        $user = "nome_do_usuario_do_banco";
        $pass = "Senha_do_banco";
        $pdo = new PDO($dns, $user, $pass);
    }catch (PDOException $e){
        echo "Falha: ". $e->getMessage();
    }
   	//pegando o usuário pelo metodos GET
    $s = htmlspecialchars(addslashes($_POST['nome']));
    //Selecionando a tabela de seguidores e seguindo
    $seguidores = "SELECT * FROM segui1 WHERE seguindo= '$s'";
	$seguidores = $pdo->query($seguidores);

  	echo "<center>";
  	//Mostrando quem está seguindo o usuário que pegamos através do metodo GET
    foreach ($seguidores->fetchAll() as $key) {
    	echo "<h3 style='color:green'>".$key['usuario'].": Está seguindo o usuário: ".$s."</h3>";
    }
    echo "</center>";
?>
</body>
</html>
