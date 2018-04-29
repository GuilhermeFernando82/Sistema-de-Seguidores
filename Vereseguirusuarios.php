<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Usuários Cadastrados</title>
</head>
<body bgcolor="black">
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
    //Selecionando a tabela onde se encontra os usuários cadastrados
    $p = "SELECT * FROM taela_usuarios_cadastrados";
    $p = $pdo->query($p);
 	//Selecionando a tabela de seguidores
    $seguidores = "SELECT * FROM seguidores";
	$seguidores = $pdo->query($seguidores);
	?>
	
	<table>
		<tr>
			<td width="50%" height="100%">
				<font color="green"><h3>Usuários</h3></font>
			<?php 
			//Mostrando os usuários que estão cadastrados no banco de dados
			//Também criei dois forms para seguir e ver quem está seguindo
			foreach ($p->fetchAll() as $key) {
			
				echo "<font color='green'><h3>".$key['usuario']."</h3>"."</font>"."<img src="."images/".$key['img']." width='80' height='80'>"."<form method='post' action='seguir.php'>"."<input type='hidden' name='nome' value=".$key['usuario'].">"."<input type='submit' value='Seguir'>"."</form>"."<br>"."<form method='post' action='seguidores.php'>"."<input type='hidden' name='nome' value=".$key['usuario'].">"."<input type='submit' value='Seguidores'>"."</form>";
			}
		?>
			</td>
		</tr>

	</table>

</body>
</html>