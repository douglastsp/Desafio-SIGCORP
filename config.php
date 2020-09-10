<?php
    date_default_timezone_set('America/Sao_Paulo');
    
    $autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

    /**
     * CONSTANTES
     */
    define('INCLUDE_PATH','http://localhost:8080/eventos/');

    //Conectar com o banco de dados.
	define('HOST','localhost');
	define('USER', 'root');
	define('PASSWORD','');
	define('DATABASE','desafio_sigcorp');
?>