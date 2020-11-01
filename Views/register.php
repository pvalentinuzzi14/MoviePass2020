<div class="container bg-light p-3 rounded" style="opacity: 0.8">

<header>

    <h1 class="text-center mb-5">Registro</h1>

    <form  action="<?php echo FRONT_ROOT; ?>/User/Add" method="POST"> 
            <div class="row m-auto mb-4">
                <div class="col-md">
                    <label class="text-dark" for="user">Email</label>
                    <input type="email" name="user" class="form-control m-auto" id="user" placeholder="Ingrese su email" required>
                </div>
                <div class="col-md">
                    <label class="text-dark" for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese una password" required>
                </div>
                <div class="col-md">
                    <label class="text-dark" for="firstName">Nombre</label>
                    <input type="text" name="firstName" class="form-control m-auto" id="firstName" placeholder="Ingrese su nombre" required>
                </div>
                <div class="col-md">
                    <label class="text-dark" for="lastName">Apellido</label>
                    <input type="text" name="lastName" class="form-control m-auto" id="lastName" placeholder="Ingrese su apellido" required>
                </div>
            </div>
            <div class="row align-right p-2">
                <div class="col-md-10"></div>
                <div class="col-md-1">
                <input type="submit" name="submit" class="btn btn-primary m-auto" style="text-align: right;" value="Aceptar">
                </div>

            </div>
            
        </form>
  </div>  