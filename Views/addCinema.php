<main>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">

        <form  action="<?php echo FRONT_ROOT; ?>/Cinema/Add" method="POST"> 

        
            <div class="row m-auto mb-4">
            <div class="col-md">
                    <label class="text-light" for="id">ID</label>
                    <input type="number" name="id" class="form-control" id="id" placeholder="ID" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="nameInput">Nombre</label>
                    <input type="text" name="name" class="form-control m-auto" id="nameInput" placeholder="Ingrese un nombre" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Ingrese una direccion" required>
                </div>

                <div class="col-md">
                    <div class="form-group">
                        <label class="text-light" for="cantSalas"> Cantidad de salas </label>
                        <select class="form-control m-auto" name="cantSalas" id="cantSalas" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <label class="text-light" for="price">Precio Ticket</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Ticket price $$" required>
                </div>
            </div>
            <div class="row align-right p-2">
                <input type="submit" name="submit" class="btn btn-primary m-auto" style="text-align: right;" value="Agregar">
            </div>
            
        </form>
	</div>
	</body>
</main>