<main>
	<body class="bodyAdministration">
	<div class="container">
        <?php
        foreach ($cinemaArray as $value):?>
        
        <div class="jumbotron bg-dark text-white">
                <h1 class="display-4"><?php echo $value->getName(); ?></h1>
                <p class="lead">Direccion: <?php echo $value->getAddress(); ?></p>
                <p class="lead">Precio Ticket : $ <?php echo $value->getPrice(); ?></p>
                <hr class="my-4">
                <p>Cantidad de Salas: <?php echo count($value->getRoom()); ?></p>
               
        </div>

        <?php endforeach; ?>
	</div>
	</body>
</main>