<?php
		declare(strict_types=1);

		require_once "autoload.php";

		use \aplicacao\models\ConnectMysql;
		use \aplicacao\models\UsuarioDao;

		$connectdb = new ConnectMysql();
		$usuarioDao = new UsuarioDao($connectdb);
		$usuarioDao->insert("...", "...");
?>