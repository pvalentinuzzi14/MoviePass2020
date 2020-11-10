<?php require_once(VIEWS_PATH."header.php"); ?>

<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo VIEWS_PATH.'img/background.jpg' ; ?>" alt="">
        </div>
        <div class="col-md-8">
            <h2>TITULO</h2>
            <p>PARRAFO</p>    
            <form action="">
            <div class="form-group">
                <label for="salas">Salas</label>
                <select class="form-control" id="salas">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cantTicket">CANTIDAD DE TICKETS</label>
                <input type="number" class="form-control" id="cantTicket" placeholder="Cantidad">
            </div>

            </form>
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
