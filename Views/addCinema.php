<main>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">

        <form  action="<?php echo FRONT_ROOT; ?>Cinema/showAddView" method="POST"> 

        
            <div class="row m-auto">
                <div class="col">
                    <label class="text-light" for="nameInput">Nombre</label>
                    <input type="name" name="name" class="form-control m-auto" id="nameInput" placeholder="Ingrese un nombre">
                </div>
                <div class="col">
                    <label class="text-light" for="address">Direccion</label>
                    <input type="address" name="address" class="form-control" id="address" placeholder="Ingrese una direccion">
                </div>

                <div class="col">
                    <div class="form-group">
                        <label class="text-light" for="cantSalas"> Cantidad de salas </label>
                        <select class="form-control m-auto" name="cantSalas" id="cantSalas">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                </div>
            </div>
                <input type="submit" name="submit" class="btn btn-primary"></button>
        </form>
	</div>
	</body>
</main>