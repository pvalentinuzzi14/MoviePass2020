<?php require_once(VIEWS_PATH."header.php"); ?>

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
        <footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>

