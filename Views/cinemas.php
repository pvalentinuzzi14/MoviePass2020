<main>
	<body class="bodyAdministration">
	<div class="container">
        <?php
        foreach ($cinemaArray as $value):?>
        
        <div class="jumbotron bg-dark text-white">
                <h1 class="display-4"><?php echo $value->getName(); ?></h1>
                <p class="lead">Direccion: <?php echo $value->getAddress(); ?></p>
                <hr class="my-4">
                <p>Cantidad de Salas: <?php echo count($value->getRoom()); ?></p>
                <a class="btn btn-outline-success btn-lg" href="#" role="button">Seleccionar</a>
                <a class="btn btn-outline-primary btn-lg ml-2" href="#" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-lg ml-2" href="#" role="button">Borrar</a>
        </div>

        <?php endforeach; ?>
	</div>
	</body>
</main>