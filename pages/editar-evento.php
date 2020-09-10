<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$eventos = Eventos::select('desafio.eventos','id = ?',array($id));
	}else{
		Eventos::alert('erro','Você precisa passar o parametro ID. ');
		die();
	}
?>
<div class="container">
    <?php
		if(isset($_POST['acao'])){
			if(Eventos::update($_POST)){
				Eventos::alert('sucesso','O evento foi editado com sucesso !');
				$eventos = Eventos::select('desafio.eventos','id = ?',array($id));
			}else{
				Eventos::alert('erro','Campos vazios não são permitidos!');
			}
			
		}
    ?>

    <h2><i class="fas fa-pen"></i> Editar evento</h2>
    <div class="formGroup">
        <form method="post" enctype="multipart/form-data">
            <label for="tema">Tema:</label>
            <input type="text" name="tema" value="<?php echo $eventos['tema']; ?>">
            <label for="local">Local:</label>
            <input type="text" name="local" value="<?php echo $eventos['local']; ?>">
            
            <div class="dateTime">
                <label for="data">Data:</label>
                <input type="date" name="data" value="<?php echo $eventos['data']; ?>">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" value="<?php echo $eventos['hora']; ?>">
            </div><!--dateTime-->
            
            <label for="Qtd Pessoas">Qtd Pessoas:</label>
            <input type="number" name="qtd_pessoas" value="<?php echo $eventos['qtd_pessoas']; ?>">
            <label for="lote">Lote:</label>
            <input type="text" name="lote" value="<?php echo $eventos['lote']; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="desafio.eventos">
            <input type="submit" name="acao" value="Editar!">
        </form>
    </div><!--formGroup-->
    
</div><!--container-->