<?php
		//define autoload realizando carregamento automatico de arquivo(classe) de acordo
		//com seu diretorio especifico no momento de sua instancia na aplicação
		spl_autoload_register(function($classe) {
			$diretorioBase = __DIR__."/".str_replace("\\", "/", $classe).".php";
			if(file_exists($diretorioBase)) {
				require_once $diretorioBase;
				return true;
			}else {
				echo "Arquivo com implementação da classe inexistente em diretorio !!";
				return false;
			}
		});
?>