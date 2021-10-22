<?php
     echo $role;
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar alumno</h2>
               <form action="<?php echo FRONT_ROOT ?>Student/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="firstName" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Apellido</label>
                                   <input type="text" name="lastName" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">DNI</label>
                                   <input type="text" name="dni" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group"> 
                                   <select class="form-select form-select-sm" name="gender" aria-label=".form-select-sm example">
                                        <option selected>Genero</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="O">Otro</option>
                                   </select>
                              </div>
                              <div class="form-group">
                                   <label for="">Fecha nacimiento</label> <br>
                                   <input type="date" name="birthDate" min="<?php echo time();?>" >
                              </div>
                              <div class="form-group">
                                   <label for="">Numero de Telefono</label> <br>
                                   <input type="text" name="phoneNumber">
                              </div>
                              <div class="form-group">
                                   <label for="">Email</label> <br>
                                   <input type="email" name="email">
                              </div>
                              <div class="form-group">
                                   <label for="">Constraseña</label> <br>
                                   <input type="password" name="password">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
               
          </div>
     </section>
</main>