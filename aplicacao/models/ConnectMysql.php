<?php
		//define namespace para classe
		namespace aplicacao\models;

		class ConnectMysql implements DatabaseConnectInterface {
			public function connectDb() {
				try {
					$pdo = new \PDO("mysql:dbname=crm;host=localhost", "root", "");
					$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
					return $pdo;
				} catch (PDOException $erro) {
					echo "Erro de Conexão: " . $erro->getMessage() . "<br>\n";
					echo "Linha: " . $erro->getLine() . "<br>\n";
				}
			}
		}
?>