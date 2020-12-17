<?php
		//define namespace para classe
		namespace aplicacao\models;

		require_once "DatabaseConnectInterface.php";
		require_once "ConnectMysql.php";

		class UsuarioDao {
			private $connectDb;

			public function __construct(DatabaseConnectInterface $connectDb) {
				if(isset($connectDb) AND is_object($connectDb)) {
					echo "Instancia(objeto) de fora recebida da classe: " . get_class($connectDb) . "<br>\n";
					$this->connectDb = $connectDb->connectDb();
				}else {
					echo "Instancia(objeto) não recebida !!";
				}
			}

			public function insert($nome, $datacadastro) {
				$query = "INSERT INTO usuarios (nome,datacadastro) VALUES (:nome, :datacadastro)";
				$query = $this->connectDb->prepare($query);
				$query->bindValue(":nome", $nome);
				$query->bindValue(":datacadastro", $datacadastro);
				$query->execute();
				return true;
			}

			public function getAll() {
				$query = "SELECT * FROM usuarios ORDER BY id ASC";
				$query = $this->connectDb->query($query);
				if($query->rowCount() > 0) {
					$dados = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dados as $usuario) {
						echo "<b>Id: </b>" . $usuario["id"] . "<br>\n";
						echo "<b>Nome: </b>" . $usuario["nome"] . "<br>\n";
						echo "<b>DataCadastro: </b>" . $usuario["datacadastro"] . "<br>\n";
						echo "<hr>";
					}
					return true;
				}else {
					return false;
				}
			}

			public function getId($id) {
				$query = "SELECT * FROM usuarios WHERE id = :id_usuario";
				$query = $this->connectDb->prepare($query);
				$query->bindValue(":id_usuario", $id);
				$query->execute();
				if($query->rowCount() > 0) {
					$dados = $query->fetch(\PDO::FETCH_ASSOC);
					echo "<b>Id: </b>" . $dados["id"] . "<br>\n";
					echo "<b>Nome: </b>" . $dados["nome"] . "<br>\n";
					echo "<b>DataCadastro: </b>" . $dados["datacadastro"] . "<br>\n";
					return true;
				}else {
					return false;
				}
			}

			public function update($nome, $datacadastro, $id) {
				$query = "UPDATE usuarios SET nome = :nome, datacadastro = :datacadastro WHERE id = :id_usuario";
				$query = $this->connectDb->prepare($query);
				$query->bindValue(":nome", $nome);
				$query->bindValue(":datacadastro", $datacadastro);
				$query->bindValue(":id_usuario", $id);
				$query->execute();
				return true;
			}

			public function delete($id) {
				$query = "DELETE FROM usuarios WHERE id = :id_usuario";
				$query = $this->connectDb->prepare($query);
				$query->bindValue(":id_usuario", $id);
				$query->execute();
				return true;
			}

			public function count() {
				$query = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
				$query = $this->connectDb->query($query);
				if($query->rowCount() > 0) {
					$total_usuarios = $query->fetch(\PDO::FETCH_ASSOC);
					echo $total_usuarios["total_usuarios"];
					return true;
				}else {
					return false;
				}
			}

			public function betweenDate($primeiraData, $segundaData) {
				$query = "SELECT * FROM usuarios WHERE datacadastro BETWEEN :primeira_data AND :segunda_data";
				$query = $this->connectDb->prepare($query);
				$query->bindValue(":primeira_data", $primeiraData);
				$query->bindValue(":segunda_data", $segundaData);
				$query->execute();
				if($query->rowCount() > 0) {
					$dados = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dados as $usuario) {
						echo "<b>Id: </b>" . $usuario["id"] . "<br>\n";
						echo "<b>Nome: </b>" . $usuario["nome"] . "<br>\n";
						echo "<b>DataCadastro: </b>" . $usuario["datacadastro"] . "<br>\n";
						echo "<hr>";
					}
					return true;
				}else {
					return false;
				}
			}

			public function getIdIn($primeiroId, $segundoId) {
				$query = "SELECT * FROM usuarios WHERE id IN(:primeiroId, :segundoId)";
				$query = $this->connectDb->prepare($query);
				$query->bindValue(":primeiroId", $primeiroId);
				$query->bindValue(":segundoId", $segundoId);
				$query->execute();
				if($query->rowCount() > 0) {
					$dados = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dados as $usuario) {
						echo "<b>Id: </b>" . $usuario["id"] . "<br>\n";
						echo "<b>Nome: </b>" . $usuario["nome"] . "<br>\n";
						echo "<b>DataCadastro: </b>" . $usuario["datacadastro"] . "<br>\n";
						echo "<hr>";
					}
					return true;
				}else {
					return false;
				}
			}
		}
?>