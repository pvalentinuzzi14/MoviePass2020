<?php require_once(VIEWS_PATH."header.php"); ?>

<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
     <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="cinemas" role="tabpanel" aria-labelledby="cinemas-tab">
            <form class="form ml-5" action="<?php echo FRONT_ROOT."/Movie";?>" method="get">
            <label class="text-dark mr-3" for="genre_movie"></label>
            <select class="form-control-sm" name="genre">
                <option value="-1">Totales en pesos</option>
                <option value="0">Tickets</option>          
           </select>
                <button type="submit" class="btn btn-success ml-3"> Buscar </button>
            </form>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo FRONT_ROOT.'/layout/logo.png' ;?>" class="card-img-top" alt="...">
                <div class="card-body bg-light">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary text-light">Go somewhere</a>
                </div>
                </div>
        </div>
    </div>
</div>
<footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>
