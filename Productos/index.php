<?php include 'codeProductos.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">




        <form action="" method="post">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <!-- <label for="txtId">Id</label> -->
                                <input type="hidden" require name="id_productos" id="id_productos" placeholder="" value="<?php echo $id_productos ?>">
                                <!-- <br> -->

                                <div class="form-group col-md-12">
                                    <label for="nom_pro">Nombre del producto</label>
                                    <input type="text" class="form-control" require name="nom_pro" id="nom_pro" placeholder="" value="<?php echo $nom_pro ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="precio">Precio </label>
                                    <input type="text" class="form-control" require name="precio" id="precio" placeholder="" value="<?php echo $precio ?>">

                                </div>

                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar producto
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Id del producto</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaProductos->num_rows > 0) {

                        foreach ($listaProductos as $productos) {

                    ?>

                            <tr>



                                <td> <?php echo $productos['id_productos']        ?> </td>
                                <td> <?php echo $productos['nom_pro']    ?> </td>
                                <td> <?php echo $productos['precio'] ?> </td>


                                <form action="" method="post">

                                    <input type="hidden" name="id_productos" value="<?php echo $productos['id_productos'];  ?>">
                                    <input type="hidden" name="nom_pro" value="<?php echo $productos['nom_pro'];  ?>">
                                    <input type="hidden" name="precio" value="<?php echo $productoso['precio'];  ?>">


                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>