<?php
    $eventos = Eventos::selectAll('desafio.eventos');
    if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Eventos::deletar('desafio.eventos', $idExcluir);
		Eventos::redirect(INCLUDE_PATH);
    }
?>

<div class="container">
    <div class="busca">
        <form method="post">
            <input type="text" name="busca" Placeholder="Filtre por tema ou local ou vazio para todos...">
            <input type="submit" name="acao" value="Filtrar">
        </form>
    </div><!--busca-->
    <div class="wraper-table">
        <table>
            <tr>
                <td>Tema</td>
                <td>local</td>
                <td>Data e Hora</td>
                <td>Qtd Pessoas</td>
                <td>Lote</td>
                <td>Opções</td>
            </tr>

            <?php 
            if (isset($_POST['acao'])){
                $busca = $_POST['busca'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `desafio.eventos` WHERE tema LIKE '%$busca%' or local LIKE '%$busca%'ORDER BY data ASC");
                $sql->execute();
                $sql = $sql->fetchAll();
                $sql2 = MySql::conectar()->prepare("SELECT * FROM `desafio.eventos` WHERE tema LIKE '%$busca%' or local LIKE '%$busca%'");
                $sql2->execute();
                if ($sql2->rowCount() == 0) {
                    foreach ($eventos as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['tema']; ?></td>
                            <td><?php echo $value['local']; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($value['data'])).' - '.date('H:i',strtotime($value['hora'])); ?></td>
                            <td><?php echo $value['qtd_pessoas']; ?></td>
                            <td><?php echo $value['lote']; ?></td>
                            <td><a href="<?php echo INCLUDE_PATH ?>editar-evento?id=<?php echo $value['id']; ?>" class="btn edit">Editar</a> <a href="<?php INCLUDE_PATH ?>?excluir=<?php echo $value['id']; ?>" class="btn delete">Excluir</a></td>
                        </tr>
                    <?php } 
                }else {
                    foreach ($sql as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['tema']; ?></td>
                            <td><?php echo $value['local']; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($value['data'])).' - '.date('H:i',strtotime($value['hora'])); ?></td>
                            <td><?php echo $value['qtd_pessoas']; ?></td>
                            <td><?php echo $value['lote']; ?></td>
                            <td><a href="<?php echo INCLUDE_PATH ?>editar-evento?id=<?php echo $value['id']; ?>" class="btn edit">Editar</a> <a href="<?php INCLUDE_PATH ?>?excluir=<?php echo $value['id']; ?>" class="btn delete">Excluir</a></td>
                        </tr>
                    <?php } 
                } 
            } else {
                foreach ($eventos as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['tema']; ?></td>
                        <td><?php echo $value['local']; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($value['data'])).' - '.date('H:i',strtotime($value['hora'])); ?></td>
                        <td><?php echo $value['qtd_pessoas']; ?></td>
                        <td><?php echo $value['lote']; ?></td>
                        <td><a href="<?php echo INCLUDE_PATH ?>editar-evento?id=<?php echo $value['id']; ?>" class="btn edit"><i class="fas fa-pen"></i> Editar</a> 
                        <a href="<?php INCLUDE_PATH ?>?excluir=<?php echo $value['id']; ?>" class="btn delete"><i class="fas fa-trash-alt"></i> Excluir</a></td>
                    </tr>
                <?php } 
            }?>

        </table>
    
    </div><!-- wraper-table -->
</div><!--container-->