
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <?php require_once "scripts.php"; ?>
</head>
<body >
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel panel-heading">Nuevo Contacto</div>
                <div class="panel panel-body">
                    <form id="frmRegistroCliente" method="POST" action="">
                        <label>Nombres</label>
                        <input type="text" class="form-control input-sm" id="con_nombres" name="">
                        <label>Apellidos</label>
                        <input type="text" class="form-control input-sm" id="con_apellidos" name="">
                        <label>Identificación</label>
                        <input type="text" class="form-control input-sm" id="con_cedula" name="">
                        <label>Email</label>
                        <input type="text" class="form-control input-sm" id="con_email" name="">
                        <label>Télefono</label>
                        <input type="text" class="form-control input-sm" id="con_movil" name="">
                        <label>Dirección</label>
                        <input type="text" class="form-control input-sm" id="con_direccion" name="">
                        <label>Observaciones</label>
                        <textarea class="form-control input-sm" id="con_observaciones"></textarea>
                        <p></p>
                        <span class="btn btn-primary" id="registraNuevoCliente">Guardar</span>
                        <a class="btn btn-danger" href="inicio.php">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#registraNuevoCliente').click(function(){

            if($('#con_nombres').val()==""){
                alertify.alert("Debes agregar los nombres");
                return false;
            }else if($('#con_apellidos').val()==""){
                alertify.alert("Debes agregar los apellidos");
                return false;
            }else if ($('#con_email').val()==""){
                alertify.alert("Debes agregar el email");
                return false;
            }else if ($('#con_movil').val()==""){
                alertify.alert("Debes agregar el telefono");
                return false;
            }

            cadena="con_nombres=" + $('#con_nombres').val() +
                    "&con_apellidos=" + $('#con_apellidos').val() +
                    "&con_email=" + $('#con_email').val() +
                    "&con_movil=" + $('#con_movil').val() +
                    "&con_direccion=" + $('#con_direccion').val() +
                    "&con_cedula=" + $('#con_cedula').val() +
                    "&con_observaciones=" + $('#con_observaciones').val();

                    $.ajax({
                        type:"POST",
                        url:"php/registroContactos.php",
                        data:cadena,
                        success:function(r){
                            if(r==1){
                                $('#frmRegistroCliente')[0].reset();
                                alertify.success("Agregado con exito");
                                window.location="inicio.php";
                            }else{
                                alertify.error("Fallo al agregar");
                            }
                        }
                    });
        });
    });
</script>

