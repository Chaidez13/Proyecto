<?php
	
	function connectDB() 
		{
			$dsn = 'mysql:host=localhost;dbname=denuncias';
			$username = 'root';
			$password = '';
			return new PDO($dsn, $username);
		}



		function saveTask ($task) 
			{
				$dbh = connectDB();
				$query = 'INSERT INTO task(name) VALUES (:name)';
				$stm = $dbh->prepare($query);
				$stm->bindParam(':name', $task);
				$stm->execute();
				showSuccess('Task added correctly');
			}


		function saveUser($nombre, $aP, $aM, $mail, $pass, $fecha, $tipo) 
			{
					$dbh = connectDB();
					$query = 'INSERT INTO users (nombre,apellidoPaterno,apellidoMaterno,eMail,pass,fechaDeNacimiento,tipo)VALUES(:name, :aP, :aM, :mail,:pass, :fecha, :type)';
					$stm = $dbh->prepare($query);
					$stm->bindParam(':name', $nombre);
					$stm->bindParam(':aP', $aP);
					$stm->bindParam(':aM', $aM);
					$stm->bindParam(':mail', $mail);
					$stm->bindParam(':pass', $pass);
					$stm->bindParam(':fecha', $fecha);
					$stm->bindParam(':type', $tipo);
					$stm->execute();
			}

			function getUsers() 
			{
				$dbh = connectDB();
				$query = "SELECT * FROM users";
				$stm = $dbh->prepare($query);
				$stm->setFetchMode(PDO::FETCH_ASSOC);
				$task = '';
				$stm->execute();
				while($row=$stm->fetch()) {
					echo $row['nombre'];
					
				}
			}

		function showError($msj) 
		{
			echo "<div class=\"alert alert-danger mt-3\" role=\"alert\">$msj</div>";
		}
		function showSuccess($msj) 
		{
			echo "<div class=\"alert alert-success mt-3\" role=\"alert\">$msj</div>";
		}


?>