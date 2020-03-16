<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url?>asset/css/styles.css">
    <title>Document</title>
</head>

<body>

    <section class='head'>
        <section class='menu'>
            <section class='sec_logo'>
                <div> <img class='logo' src="<?=base_url?>asset/img/camiseta.png" alt="logo">
                </div>
                <a href="index.php" class='title'>Tienda camiseta </a>
            </section>
            <nav>
                <ul>
                    <?php $resultado=Utils::getAllCategorias()?>
                    <li><a href="<?=base_url?>">Inicio</a></li>

                    <?php while($result=$resultado->fetch_object()): ?>
                    <li><a href="<?=base_url?>categoria/ver&id=<?=$result->id?>"><?=$result->nombre?></a></li>
                    <?php endwhile;?>
                </ul>
            </nav>
        </section>

    </section>