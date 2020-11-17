<?php //include("header.php");

?>
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Funciones</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Purchase/getTickets" method="GET"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
                    <select class="form-control" name="id" id="id">
                    <?php foreach($showtime as $value):?>
                        <?php if($value['tickets_sold'] >= $value['total_tickets'])
                        {?>
                            <option value="<?php echo $value['id'];?>" disabled><?php echo 'TICKETS AGOTADOS      // '.$value['cinema_name']."-".$value['room_name']."-".$value['date_showtime']."-".$value['opening_time'];?></option>  
                        <?php }else{
                            $close_time_date=strtotime($value['opening_time']);
                            
                        ?>
                        <option value="<?php echo $value['id'];?>" ><?php echo $value['cinema_name']."-".$value['room_name']."-".date('d/m/y',strtotime($value['date_showtime']))."-".date("h:i A", $close_time_date);;?></option>  
                    <?php } endforeach;?>                   
                    </select>                
            </div>
            </div>
            <div class="row align-right p-2">
                <div class="col-md-10"></div>   
                <div class="col-md-1">
                <input type="submit" name="" class="btn btn-primary m-auto" style="text-align: right;" value="Agregar">
                </div>

            </div>
            
        </form>
	</div>





<?php //include("footer.php")?>