<?php
	class Eventos
	{   
        //Alertas
        public static function alert($tipo,$mensagem){
			if($tipo == 'sucesso'){
				echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro"><i class="fas fa-ban"></i> '.$mensagem.'</div>';
			}
        }
        
        //Inserir dados no BD
        public static function insert($arr){
			$certo = true;
			$nome_tabela = $arr['nome_tabela'];
			$query = "INSERT INTO `$nome_tabela` VALUES (null";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				$query.=",?";
				$parametros[] = $value;
			}
			$query.=")";
			if($certo == true){
				$sql = MySql::conectar()->prepare($query);
				$sql->execute($parametros); 
			}
			return $certo;
		}

        //Selecionar dados do BD
        public static function selectAll($tabela, $start = null, $end = null){
			if($start == null && $end == null)
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY data ASC");
				
			else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY data ASC LIMIT $start, $end");
			$sql->execute();
			return $sql->fetchAll();
		}

		//Deletar info do BD
		public static function deletar($tabela, $id = false){
			if($id == false){
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
			}else{
				echo '<script>alert("Evento deletado com sucesso!")</script>';
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id =  $id");
			}
			$sql->execute();
		}

		//redirecionar usuário
		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		//Metodo especifico para apenas selecionar um registro

		public static function select($table,$query,$arr){
			$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
			$sql->execute($arr);
			return $sql->fetch();
		}

		//Alterar dados da Tabela no BD
		public static function update($arr){
			$certo = true;
			$first = false;
			$nome_tabela = $arr['nome_tabela'];
			$query = "UPDATE `$nome_tabela` SET ";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				
				if($first == false){
					$first = true;
					$query.="$nome=?";
				}else{
					$query.=",$nome=?";
				}
				$parametros[] = $value;
			}
			if($certo == true){
				$parametros[] = $arr['id'];
				$sql = MySql::conectar()->prepare($query.' WHERE id=?');
				$sql->execute($parametros);
			}
			return $certo;
		}
    }

?>