<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cinemas-tab" data-toggle="tab" href="#cinemas" role="tab" aria-controls="cinemas"
        aria-selected="true">Cines</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rooms-tab" data-toggle="tab" href="#rooms" role="tab" aria-controls="rooms"
         aria-selected="false">Salas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="showtimes-tab" data-toggle="tab" href="#showtimes" role="tab" aria-controls="showtimes" 
        aria-selected="false">Funciones</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="cinemas" role="tabpanel" aria-labelledby="cinemas-tab">
        <?php require_once("admincinema.php"); ?>
    </div>
    <div class="tab-pane fade" id="rooms" role="tabpanel" aria-labelledby="rooms-tab">
    <?php require_once("adminRooms.php"); ?>
    </div>
    <div class="tab-pane fade" id="showtimes" role="tabpanel" aria-labelledby="showtimes-tab">
        <?php require_once("adminShowtimes.php"); ?>
    </div>
    </div>
</div>