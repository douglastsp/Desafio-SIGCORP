<?php 
    include('config.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de eventos</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
	$url = isset($_GET['url']) ? $_GET['url'] : 'home';
?>
        <header>
            <nav>
                <?php if ($url != 'novo-evento' && $url != 'editar-evento') { ?>
                    <a href="<?php echo INCLUDE_PATH; ?>novo-evento" class="new event"><i class="far fa-plus-square"></i> Novo evento</a>
                    <div class="busca">
                        <h2>Sistema de Eventos</h2>
                    </div>
                <?php } else  { ?>
                    <a href="<?php echo INCLUDE_PATH; ?>" class="new event"><i class="fas fa-list"></i> Lista de Eventos</a>
                    <div class="busca">
                        <h2>Sistema de Eventos</h2>
                    </div>
                <?php } ?>
            </nav>
        </header><!--header-->

        <?php
		
		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			include('pages/home.php');
		}
	?>
   
    
</body>
</html>