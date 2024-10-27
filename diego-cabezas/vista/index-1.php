<?php
include "configSession.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Archivos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <br>
            <center>
                <h3>Gestor de Archivos</h3>
                <br>
                <button type="button" class="btn btn-primary btn-sm" style="width: 80%;" data-toggle="modal" data-target="#imporFile">
                    Subir Archivo <i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
            </center>
            <?php include "formImport.php"; ?>
        </div>
        <br>
        <div class="table-responsive">

            <table class="table">
                <tr>
                    <th>Tipo de Archivo</th>
                    <th>Descripcion</th>
                    <th>Archivo</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Visualizar</th>
                    <!-- Solo mostrar acciones si el usuario tiene permisos -->
                    <?php if ($id_rol != 2) { ?>
                        <th>Acciones</th>
                    <?php } ?>
                </tr>
                <tbody>
                    <!-- Iterar sobre los archivos y mostrar cada fila -->
                    <?php

                    require_once("../includes/db.php");
                    $result = mysqli_query($conexion, "SELECT * FROM archivos");
                    while ($fila = mysqli_fetch_assoc($result)) :
                        $url = "../includes/files/"; // Definir la ruta por defecto
                    ?>
                        <tr>
                            <td><img src="../img/logoWord.png" width="80px" alt=""></td>
                            <td><?php echo $fila['descripcion']; ?></td>
                            <td><?php echo $fila['name_file']; ?></td>
                            <td><?php echo $fila['id_user']; ?></td>
                            <td><?php echo $fila['fecha']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-visualizar" data-url="<?php echo $url . $fila['name_file']; ?>">
                                    <i class="fa fa-expand"></i> Visualizar
                                </button>
                            </td>
                            <?php if ($id_rol != 2) { ?>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['id']; ?>">
                                        <i class="fa fa-edit "></i>
                                    </button>
                                    <a href="../includes/eliminar_per.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger btn-del">
                                        <i class="fa fa-trash "></i></a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para visualizar archivos Word -->
    <div class="modal fade" id="modalWord" tabindex="-1" aria-labelledby="modalWord" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí se carga el iframe con el archivo Word -->
                    <iframe id="iframeWord" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Función para abrir el modal y cargar el archivo Word en el iframe
            function openModelWord(url) {
                $('#modalWord').modal('show');
                $('#iframeWord').attr('src', url);
            }

            // Escuchar el evento click en los botones de visualizar
            $('.btn-visualizar').click(function() {
                var url = $(this).data('url'); // Obtener la URL del archivo
                openModelWord(url); // Abrir el modal con el archivo Word
            });
        });
    </script>
</body>

</html>