<section>
		
			<?php 
			
				if(isset($acao)){
					
					switch($acao){
						
						case 'novo':
							$aluno['id']="";
							$aluno['nome']="";
							$aluno['matricula']="";
							$aluno['email']="";
							include "fomulario.php";
							break;
						
						case 'salvar':
								$nome=$_POST['nome'];
								$matricula=$_POST['matricula'];
								$email=$_POST['email'];
								$id=$_POST['id'];
								
							if($_POST['id']>0){
								
								$sqlupdate="UPDATE aluno SET nome='".$nome."',matricula=".$matricula.",email='".$email."'WHERE id=".$id;
								$resultado=executar($sqlupdate);
							}else{
								
								$sqlinsert="INSERT INTO aluno (nome, matricula, email) VALUES ('".$nome."','".$matricula."', '".$email."')";
								$resultado=executar($sqlinsert);
							}
							header("location:http://localhost/siteinfo/index.php?path=alunos");
							break;
							
						case 'editar':
							$sql="select * from aluno where id=".$id=$param[2];
							$resultado=executar($sql);
							$aluno=$resultado->fetch_array();
							
							$aluno['id'];
							$aluno['nome'];
							$aluno['matricula'];
							$aluno['email'];
							
							include "fomulario.php";
							break;
							
						case 'excluir':
							$id=$_GET['id'];
							$sqldelete="DELETE FROM aluno WHERE id=".$id=$param[2];
							$resultado=executar($sqldelete);
							header("location:http://localhost/siteinfo/index.php?path=alunos");
							break;
					}
					
				}else{
					
					if(isset($_SESSION['usuario'])){
			?>
		
		
			</br>
			<a href="http://localhost/siteinfo/index.php?path=alunos/novo" class=generic_btn> Novo Aluno </a>
					<?php }?>
			</br></br>
			<?php
				$mysqli=new mysqli("localhost","root","vertrigo","mydb");
				
				if(mysqli_connect_error()){
					echo "Falha ao conectar!";
				}else{
					$sql="select * from aluno";
					$resultado=$mysqli->query($sql);
					
				}
			?>
			<table  cellpadding="5px" cellspacing="2" border="5px" ;>
				<theader>
					<tr>
						<th>Aluno</th><th>Matricula</th><th>Email</th><th></th><th></th>
					</tr>
				</theader>
				<tbody>
					<?php
						while($aluno=$resultado->fetch_array()){
							echo"<tr>
							<td>".$aluno['nome']."</td>
							<td>".$aluno['matricula']."</td>
							<td>".$aluno['email']."</td> ";
							if(isset($_SESSION['usuario'])){
								echo "
							<td><div class=generic_btn><a href='http://localhost/siteinfo/index.php?path=alunos/excluir/".$aluno['id']."'><h3>Excluir</h3></a></div></td>
							<td><div class=generic_btn><a href='http://localhost/siteinfo/index.php?path=alunos/editar/".$aluno['id']."'><h3>Editar</h3></a></div></td>
							</tr>";}
								
						}
				
					?>
				</tbody>
			</table>
			<?php } //final do else ?>
</section>
	