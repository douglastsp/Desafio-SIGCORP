<div class="container">
<?php
		if(isset($_POST['acao'])){
			if(Eventos::insert($_POST)){
				Eventos::alert('sucesso','O cadastro do serviço foi realizado com sucesso!');
			}else{
				Eventos::alert('erro','Ops, campos vazios não são permitidos!');
			}	
		}
?>

    <h2><i class="far fa-plus-square"></i> Cadastre um novo evento</h2>
    <div class="formGroup">
        <form method="post" enctype="multipart/form-data">
            <label for="tema">Tema:</label>
            <input type="text" name="tema">
            <label for="local">Local:</label>
            <input type="text" name="local">
            
            <div class="dateTime">
                <label for="data">Data:</label>
                <input type="date" name="data">
                <label for="hora">Hora:</label>
                <input type="time" name="hora">
            </div><!--dateTime-->
            
            <label for="Qtd Pessoas">Qtd Pessoas:</label>
            <input type="number" name="qtd_pessoas">
            <label for="lote">Lote:</label>
            <input type="text" name="lote">
            <input type="hidden" name="nome_tabela" value="desafio.eventos">
            <input type="submit" name="acao" value="Cadastrar!">
        </form>
    </div><!--formGroup-->
    
</div><!--container-->