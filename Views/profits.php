<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >

<form class="form ml-5" action="<?php echo FRONT_ROOT.'/Admin/MoneyStats';?>" method="post">
      <label class="text-dark mr-3" for="desde">Fecha inicial </label>
      <input type="date" name="desde" id="desde" required>
      <label class="text-dark mr-3" for="hasta">Fecha final </label>
      <input type="date" name="hasta" id="hasta" required>
      <input type="hidden" name="idMovie" value="<?php echo $_POST['idMovie']; ?>">
          <button type="submit" class="btn btn-success ml-3"> Buscar </button>
    </form>

  
<div class="row text-center my-5">
<?php if(!empty($show))
    { ?>
      <div class="col-md-4">
      <h1 class="page-header">
        <img src="<?php       
        echo $show[0]['poster']; ?>" width="200px" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
      </h1>
    </div>
    <div class="col text-center my-5">
      <h1>GANANCIAS A LA FECHA</h1>
      <h2><?php
      foreach ($show as $value) {
        $gananciasMovie += $value['ganancias'];
      }
      
      echo "$ ".$gananciasMovie ; ?></h2>   
      </div>
   <?php }else{
     throw new Exception("No existen peliculas en las fechas indicadas", 1);
     
     require_once(VIEWS_PATH.'error.php');
   } ?>
  
</div>