<?php
    $conexion = mysqli_connect("localhost", "root", "yes", "registrodepolizas");
    $consulta = "SELECT idPolizas, Nombre, Fechai, Fechav, Pdf, DATEDIFF(Fechav, CURDATE()) as 'Dias'
    FROM registrodepolizas";
    
    $result = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="es">
   <body>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximu-scalable=1.0,  minun-scalable=1.0">   
        <link rel="stylesheet" href="css\bootstrap.min.css">
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <title>Polizas</title>
    </head> 
    <div class="row d-flex">
      <div class="col-12 col-md-12 col-sm-12 text-center" ><h1>Polizas</h1></div>




      <!--Aquí va mi buscador-->
    <form method="POST" action="inicio.php">
    <div></div>
    </form>
      <div class="col-5 col-md-5 col-sm-5 text-center"><input class="form-control mr-sm-2" type="text" placeholder="Search" id="buscar" name="buscar" aria-label="Search"></div>

        <div class="col-2 col-md-2 col-sm-2 text-left"><button type="button" class="btn btn-outline-info">Buscar</button></div> 
        <div class="col-5 col-md-5 col-sm-5 text-center">
          <!--Con esto abro mi Modal-->
          <form action="almacen.php" class="form-register" method="POST" enctype="multipart/form-data">  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Añadir Poliza
              </button>
              <!--Aquí empieza mi Modal la cual es una tarjeta desplegables para subir polizas uwu -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLongTitle">Anexar una nueva poliza</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h2 class="form__title">Información de poliza</h2>
                        <div class="container--flex">
                          <label for="" class="form__label ">Nombre</label>
                          <input type="text" name="nombre" class="form__input" required>
                        </div>
                        <div class="container--flex">
                          <label for="" class="form__label ">Fecha de alta</label>
                          <input type="date" name="fechai" class="form__input" required>
                        </div>
                      <div class="container--flex">
                        <label for="" class="form__label ">Fecha de vencimiento</label>
                        <input type="date" name="fechav" class="form__input" required>
                      </div>
                    <input type="file" name="archivo" class="form__file" required>
                  </form>
                </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </form>
    <!--columnas de las polizas-->
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" class="col-1 col-md-1 col-sm-1 text-center">Id</th>
      <th scope="col" class="col-2 col-md-2 col-sm-2 text-center">Nombre</th>
      <th scope="col" class="col-2 col-md-2 col-sm-2 text-center">Fecha de alta</th>
      <th scope="col" class="col-2 col-md-2 col-sm-2 text-center">Fecha de vencimiento</th>
      <th scope="col" class="col-3 col-md-3 col-sm-3 text-center">PDF</th>
      <th scope="col" class="col-1 col-md-1 col-sm-1 text-center">Eliminar</th>
      <th scope="col" class="col-1 col-md-1 col-sm-1 text-center">Vence en: </th>
    </tr>
  </thead>
  <tbody>
  <?php
        if(!$result)
        {
            echo "Sorry bro no jalo ";
        }else
        {
          while ($colum = mysqli_fetch_array($result))
          {
              echo "<tr>";
              echo "<td align='center'><h4>" . $colum['idPolizas']. "</h4></td>";
              echo "<td align='center'><h4>" . $colum['Nombre']. "</h4></td>";
              echo "<td align='center'><h4>" . $colum['Fechai']. "</h4></td>";
              echo "<td align='center'><h4>" . $colum['Fechav']. "</h4></td>";
              echo "<td align='center'><h4> <a href=".$colum['Pdf'].">" . substr($colum['Pdf'],9). "</a></h4></td>"; ?>
              <td><button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar">Eliminar</button></td>
               <?php
              echo "<td align='center'><h4>" . $colum['Dias']. " días". "</h4></td>";
          } 
        }  
        ?>
  </tbody>
</table>
    <!--Modal de eliminar-->
        <!-- Modal Apertura-->
        <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="modelTitleId">Eliminar</h5>
                   
                  </div>
              <div class="modal-body">
              <h4 class="text-center">¿Estas Seguro de eliminar?</h4>  
              <form action="eliminar.php" method="POST">
                  <input type="hidden" name="idPolizas" id="delete_id">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </body> 

    <script>
      $('.deletebtn').on('click',function ()
      {
        $tr =$(this).closest('tr');
        var datos= $tr.children("td").map(function()
        {
          return $(this).text();
        });
        $('#delete_id').val(datos[0]);
      });
    </script>  
</html>