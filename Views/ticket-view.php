<div class="container">
    <div class="row m-auto mx-5 p-5 " style="opacity: 0.8">
        <div class="col-md bg-light rounded text-center">
            <h5>Gracias por tu compra <?php echo $user->getFirstName();?>!!</h5>
            <p>Tu ticket para <?php echo $showtime->getMovie()->getTitle();?> se ha generado y se ha enviado a tu mail <?php echo $user->getEmail();?></p>
            <div class="mb-4">
            <a type="button" class="btn btn-primary text-light" href="<?php echo FRONT_ROOT;?>">Continuar</a>
            </div>
        </div>
    </div>    
</div>