
	<?php 
	$aluno['id'] = $id;
	
	
	
	if($id == null){ 
	
			
			//salvar aluno
			$nome=$_POST['nome'];
			$matricula=$_POST['matricula'];
			$email=$_POST['email'];
			
			
			
				echo "INSERT INTO aluno (nome, matricula, email) VALUES ('".$nome."','".$matricula."', '".$email."')";
				//conectar no banco de dados
				$mysqli=new mysqli("localhost","root","vertrigo","bancodecursos");
						
				if(mysqli_connect_error()){
					echo "Falha ao conectar!";
				}else{
					
					//executar uma consulta no banco de dados
					$sqlinsert="INSERT INTO aluno (nome, matricula, email) VALUES ('".$nome."','".$matricula."', '".$email."')";
					
					$resultado=$mysqli->query($sqlinsert);
					
				}
				
				//retornar pra lista pagina alunos
				header("location:alunos.php");

			
			
			
			
		
	}else{
		
		
				
					//editar aluno
					$mysqli=new mysqli("localhost","root","vertrigo","bancodecursos");
								
						if(mysqli_connect_error()){
							echo "Falha ao conectar";
						}else{
							$nome = $_POST['nome'];
							$email = $_POST['email'];
							$matricula = $_POST['matricula'];
							$id= $_POST['id'];
							
							$sqln="UPDATE aluno SET nome='".$nome."',matricula=".$matricula.",email='".$email."'WHERE id=".$id;
							
							
							$resultado=$mysqli->query($sqln);
							header("location:alunos.php");
					
						}
					//retornar pra lista pagina alunos
					header("location:alunos.php");


			
		}
	?>