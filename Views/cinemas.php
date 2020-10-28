<main>
	<body class="bodyAdministration">
	<div class="container">
        <?php
         foreach ($cinemaArray as $value){
        echo "
        <div class='jumbotron bg-dark text-white'>
                <h1 class='display-4'>{$value->getName()}</h1>
                <p class='lead'>Direccion: {$value->getAddress()}</p>
             
                <hr class='my-4'>
                <p class='lead'>Cantidad de salas: {$value->getRooms()}</p>
        </div>";
        } 
        ?>

	</div>
	</body>
</main>