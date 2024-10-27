<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE - MODAL PHP</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <!-- jQuery 3.x CDN -->
    <script src="../js/jquery.min.js"></script>



    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">ELIMINAR REGISTROS EN MODAL | SOFTCODEPM</h2>
            <br>
            <div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar"> Agregar </button>



            </div>
            <br>
            <br>
            <br>


            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Apellido</th>
                            <th>Descripcion</th>
                            <th>Archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../includes/db.php");
                        $result = mysqli_query($conexion, "SELECT * FROM documento");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['apellido']; ?></td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td><?php echo $fila['archivo']; ?></td>
                                <td>
                                    <a href="../includes/download.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-download"></i></a>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['id']; ?>">
                                        <i class="fa fa-edit "></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id']; ?>">
                                        <i class="fa fa-trash "></i>
                                    </button>


                                </td>

                            </tr>
                            <?php include "../includes/editar.php"; ?>
                            <?php include "../includes/eliminar.php"; ?>
                            
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>

</body>
<style>
    a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
</style>

<footer>
    <p class="s">Visitanos en <a href="https://www.softcodepm.com/">SOFTCODEPM</a></p>
</footer>

<?php include "agregar.php"; ?>

</html>