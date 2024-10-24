<!DOCTYPE html>
<?php session_start(); ?>
<?php
include_once '../controlador/ctrlReticula.php';
include_once '../modelo/mdlReticula.php';
include_once '../modelo/conexion.php';
include_once '../modelo/popo/Reticula.php';
try {
    $Reticula = new ctrlReticula();
    $rs = $Reticula->buscarReticula();
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros de Reticulas de División</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../utils/css/styles_Encabezado.css">  
        <!--<link rel="stylesheet" href="../utils/css/styles_Registro_Reticula.css">-->
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <style>
            .contReti{
                border-top: solid 130px #fff;
                margin: 0 20px;
                top: 140px;
                width: 97%;
                height: 100vh;
                background-color: #E6EEEF;
                padding-bottom: 30px;
            }

            .fondoR{
                font-family: 'Bebas Neue', sans-serif;
                position: fixed;
                width: 97%;
                height: 130px;
                background-image: url('../utils/images/fondoReticula.png');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: left;
            }

            .barraAgregar {
                position: fixed;
                width: 70px;
                height: 100%;
                background-color: #a4c2c7;
                left: 20px;
                top: 260px;
                display: flex; /* Activar Flexbox */
                justify-content: center; /* Centrar horizontalmente */
            }

            .titRJ{
                margin-left: 70px;
                margin-top: 150px;
                width: 95%;
                height: 35px;
                background: linear-gradient(to right, #313588, #E6EEEF);
                padding: 20px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                text-align: left;
                font-family: 'Arial';
                font-size: 23px;
                font-weight: bold;
            }

            .rdd{
                color: #fff;
                margin-left: 20px;
                font-size: 50px;
                border-bottom: solid 5px #fff;
            }

            .contBucarJefes{
                background-color: #fff;
                border-radius: 5px;
                width: 250px;
                height: 30px;
                margin-left: 70%;
                display: flex; /* Activar Flexbox */
                justify-content: center; /* Centrar horizontalmente */
                align-items: center; /* Centrar verticalmente */
                border: solid 2px #a2b0bd;
            }

            .contBucarJefes input{
                border: none;
                outline: none;
                margin: 0 5px;
                width: 80%;
            }

            .btnBuscarJefes{
                width: 35px;
                height: 30px;
                display: flex; /* Activar Flexbox */
                justify-content: center; /* Centrar horizontalmente */
                align-items: center;
                background: none;
                border: none;
                border-left: solid 2px #a2b0bd;
                cursor: pointer;
                color: #a2b0bd;
            }

            .btnBuscarJefes img{
                width: 30px;
                height: 28px;
            }

            .btnAgregarRegistro {
                padding-top: 30px; /* Ajustar el padding para el botón */
                background: none;
                border: none;
                width: 50px;
                height: 50px;
                position: relative; /* Necesario para posicionar el tooltip */
                cursor: pointer; /* Cambiar cursor al pasar sobre el botón */
            }

            .btnAgregarRegistro img{
                width: 50px;
                height: 50px;
            }

            .tooltip {
                display: none; /* Ocultar por defecto */
                position: absolute; /* Posicionar relativo al botón */
                left: 60px; /* Ajustar según el tamaño del botón */
                top: 50%; /* Centrar verticalmente respecto al botón */
                transform: translateY(-50%); /* Ajustar al centro verticalmente */
                background-color: #fff; /* Color de fondo blanco */
                color: #333; /* Color del texto */
                padding: 5px 10px;
                border-radius: 10px; /* Bordes redondeados */
                border: 1px solid #ccc; /* Borde gris claro */
                font-size: 12px;
                z-index: 100; /* Asegurar que esté por encima de otros elementos */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra opcional */
                margin-top: 30px;
            }

            .btnAgregarRegistro:hover .tooltip {
                display: block; /* Mostrar el tooltip al pasar el mouse */
            }

            /*Estilos para el formulario*/

            .contRetiDivi {
                width: 40%; /* Disminuir el ancho de la ventana emergente */
                margin: 0 auto;
                background-color: #021d34;
                padding: 20px; /* Ajustar el padding */
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
                max-width: 600px; /* Cambiar el tamaño máximo */
            }

            .tituloFormulario {
                display: block;
                text-align: left;
                margin-bottom: 20px;
                color: #fff;
                border-bottom: 4px solid #a4c2c7;
                padding-bottom: 10px;
                font-family: 'Bebas Neue', sans-serif;
                font-size: 30px;
            }

            .etiquetas {
                display: block;
                margin-top: 10px;
                color: #fff;
                font-family: 'Montserrat', sans-serif;
            }

            .inputTextForm {
                width: 100%;
                padding: 8px;
                margin: 5px 0;
                border: none;
                border-radius: 5px;
                background-color: #fff;
                color: #333;
                box-sizing: border-box;
            }

            .row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }
            .field {
                flex: 1;
                margin-right: -150px; /* Disminuir la separación entre columnas */
                text-align: left; /* Alinear texto a la izquierda */
            }
            .field.clave input[type="text"] {
                width: 150px; /* Ancho igual al botón de seleccionar PDF */
            }
            .field.materias input[type="text"] {
                width: 100%; /* Mantener ancho original */
            }
            .field:last-child {
                margin-right: 0;
            }

            .buttons {
                margin-top: 20px;
                display: flex; /* Activar Flexbox en el contenedor */
                justify-content: flex-end; /* Alinear los botones a la derecha */
            }

            .buttons button {
                display: flex; /* Activar Flexbox en los botones */
                align-items: center; /* Centrar verticalmente el contenido */
                width: 120px;
                padding: 6px 20px;
                margin: 5px;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                font-size: 14px;
                background-color: #fff;
                color: #021d34;
            }

            .limpiar:hover, .cancelar:hover, .agregar:hover {
                background-color: #689fc1;
            }

            .iconBtn {
                width: 20px;
                height: 20px;
                margin-right: 8px; /* Espacio entre el icono y el texto */
            }

            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7);
                display: none;
                z-index: 500;
            }
            .file-upload {
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Alinear a la izquierda */
                margin-top: 10px; /* Espacio superior */
            }
            .file-upload input[type="file"] {
                display: none;
            }
            .file-upload label {
                width: 100%; /* Ancho completo */
                max-width: 150px; /* Máximo ancho */
                height: 100px; /* Ajustar tamaño del botón */
                background-color: #fff;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 10px; /* Espacio entre el campo de texto y el botón */
            }
            .file-upload span {
                margin-top: 5px; /* Margen superior para separación */
                text-align: center; /* Centrar el texto */
            }

            button{
                background: none;
                border: none;

            }

            table{
                margin-top: 10px;
                margin-left: 75px;
                width: 94%;
                font-family: 'Arial';
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #4D519F; /* Darker purple for header */
                color: white;
                text-align: center;
            }

            tr:nth-child(even) {
                background-color: #D8DAF3; /* Alternate row colors */
            }

            tr:nth-child(odd) {
                background-color: #ECECFA;
            }
        </style>
        <script src="../utils/js/js_registroReticulas.js"></script>
    </head>
    <body>
        <div class="contenedor">
            <div class="encabezado">
                <!-- Contenedor que agrupa logo y título -->
                <div class="logo-titulo">
                    <img src="../utils/images/logo_c.png" class="logo" alt="Logo">
                    <label class="titulo">ISIC TRAJECTORY</label>
                </div>
                <!-- Contenedor para el menú ☰ -->
                <div class="menu-container">
                    <a href="#" class="salir" onclick="toggleMenu()">☰</a>
                    <div class="submenu" id="submenu">
                        <a href="../index.php">Salir</a>
                    </div>
                </div>
            </div>
            <nav class="barraMenu">
                <button onclick="window.location.href = 'ReticulasDeDivision.php'" class="btnRH">
                    <img src="../utils/images/regresarHome.png" class="regresarH">
                </button>

                <a href="Historico_AE.php" class="m">HISTÓRICO</a>
                <a href="#" class="m">INDICADORES ISIC</a>
                <a href="#" class="m">DOCENTES</a>
                <a href="#" class="m">ALUMNOS</a>
                <a href="#" class="m">DISTINCIONES</a>
            </nav>
        </div>

        <div class="barraAgregar"> 
            <button class="btnAgregarRegistro" onclick="openForm()">
                <img src="../utils/images/btnAgregarRegistro.png"/>
                <span class="tooltip">Agregar</span>
            </button>
        </div>

        <div class="contReti">
            <div class="fondoR">
                <label class="rdd">RÉTICULAS DE DIVISIÓN</label>
            </div>
            <div class="titRJ">
                Información
                <div class="contBucarJefes">
                    <input type="text" id="txtBurcarJefes" name="txtBuscarJefes" placeholder="Buscar">
                    <button class="btnBuscarJefes">
                        <img src="../utils/images/btnBuscarTabla.png"/>
                    </button>
                </div>
            </div>

            <div class="overlay" id="overlay"></div>
            <div class="contRetiDivi" id="formContainer">
                <label class="tituloFormulario">AGREGAR RETÍCULA</label>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Clave y Materias en columnas -->
                    <div class="row">
                        <div class="field clave">
                            <label for="clave" class="etiquetas">Clave:</label>
                            <input type="text" id="clave" name="clave" required placeholder="Clave" class="inputTextForm"
                                   pattern="^[A-Za-z]{4}-\d{4}-\d{3}$" title="Formato: AAAA-1234-123" />
                            <!-- Botón para seleccionar PDF debajo de Clave -->
                            <div class="file-upload">
                                <label for="pdf-upload" style="background-image: url('../utils/images/subirPDF.png');">
                                    <input type="file" id="pdf-upload" name="pdf-upload" accept="application/pdf" required class="inputTextForm">
                                </label>
                                <span class="etiquetas">Seleccionar PDF</span>
                            </div>
                        </div>
                        <div class="field materias">
                            <label for="materias" class="etiquetas">Materias:</label>
                            <input type="text" id="materias" name="materias" required placeholder="Materias" class="inputTextForm">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="buttons">
                        <button type="reset" class="limpiar">
                            <img src="../utils/images/agregarPrincipal.png" class="iconBtn">
                            Limpiar
                        </button>
                        <button type="button" class="cancelar" onclick="closeForm()">
                            <img src="../utils/images/cancelar.png" class="iconBtn">
                            Cancelar
                        </button>
                        <button type="submit" class="agregar">
                            <img src="../utils/images/limpiar.png" class="iconBtn">
                            Agregar
                        </button>
                    </div>
                </form>
            </div>

            <div class="overlay" id="overlayM"></div>
            <div class="contRetiDivi" id="formContainerM">
                <label class="tituloFormulario">AGREGAR RETÍCULA</label>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Clave y Materias en columnas -->
                    <div class="row">
                        <div class="field clave">
                            <label for="clave" class="etiquetas">Clave:</label>
                            <input type="text" id="clave" name="clave" required placeholder="Clave" class="inputTextForm"
                                   pattern="^[A-Za-z]{4}-\d{4}-\d{3}$" title="Formato: AAAA-1234-123" />
                            <!-- Botón para seleccionar PDF debajo de Clave -->
                            <div class="file-upload">
                                <label for="pdf-upload" style="background-image: url('../utils/images/subirPDF.png');">
                                    <input type="file" id="pdf-upload" name="pdf-upload" accept="application/pdf" required class="inputTextForm">
                                </label>
                                <span class="etiquetas">Seleccionar PDF</span>
                            </div>
                        </div>
                        <div class="field materias">
                            <label for="materias" class="etiquetas">Materias:</label>
                            <input type="text" id="materias" name="materias" required placeholder="Materias" class="inputTextForm">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="buttons">
                        <button type="button" class="cancelar" onclick="closeFormM()">
                            <img src="../utils/images/cancelar.png" class="iconBtn">
                            Cancelar
                        </button>
                        <button type="submit" class="agregar">
                            <img src="../utils/images/modificar.png" class="iconBtn">
                            Modificar
                        </button>
                    </div>
                </form>
            </div>

            <table id="jefesDivicion">
                <tr>
                    <th>Clave</th>
                    <th>Materias</th>
                    <th>PDF</th>
                </tr>

                <?php
                foreach ($rs as $Reticula) {
                    print "<tr>";
                    print "<td>$Reticula->clave</td>";
                    print "<td>$Reticula->materias</td>";
                    print "<td>$Reticula->pdfReticula</td>";
                    print'<td>'
                            . '
                                <input type="hidden" name="accion" value="borrar"> 
                                <button type="submit" class="btnEliminar">
                                    <img src="../utils/images/eliminar.png" style="width: 30px; height: 30px;">
                                </button>
                                </td>'
                            . '';
                    print'<td>'
                            . '
                                  <input type="hidden" name="accion" value="modificar" class="btnModificar"> 
                                  <button type="submit" class="btnModificar" onclick="openFormM()">
                                    <img src="../utils/images/modificar.png" style="width: 30px; height: 30px;">
                                </button>
                                  </td>'
                            . '';
                    print "</tr>";
                }
                ?>
            </table>
        </div>
            
            <script>
                function toggleMenu() {
                    const submenu = document.getElementById("submenu");
                    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                }

                function openFormM() {
                    document.getElementById('formContainerM').style.display = 'block';
                    document.getElementById('overlayM').style.display = 'block';
                }

                function closeFormM() {
                    document.getElementById('formContainerM').style.display = 'none';
                    document.getElementById('overlayM').style.display = 'none';
                }
            </script>

    </body>
</html>
