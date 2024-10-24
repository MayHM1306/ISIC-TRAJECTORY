<!DOCTYPE html>
<?php session_start(); ?>
<?php
include_once '../controlador/ctrlEspecialidad.php';
include_once '../modelo/mdlEspecialidad.php';
include_once '../modelo/conexion.php';
include_once '../modelo/popo/Especialidad.php';
try {
    $Especialidad = new ctrlEspecialidad();
    $rs = $Especialidad->buscarEspecialidad();
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros de Jefes de División</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../utils/css/styles_Encabezado.css">  
        <!--<link rel="stylesheet" href="../utils/css/styles_Registro_Especialidades.css">-->
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <style>
            .contEspe{
                border-top: solid 130px #fff;
                margin: 0 20px;
                top: 140px;
                width: 97%;
                height: 100vh;
                background-color: #E6EEEF;
                padding-bottom: 30px;
            }

            .fondoEDD{
                font-family: 'Bebas Neue', sans-serif;
                position: fixed;
                width: 97%;
                height: 130px;
                background-image: url('../utils/images/fondoEspecialidades.png');
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

            .edd{
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

            .contEspeFrom {
                width: 50%;
                margin: 0 auto;
                background-color: #021d34;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
                max-width: 700px;
                color: white;
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

            textarea {
                resize: vertical;
            }

            /* Flexbox para alinear Clave, Nombre y Materias */
            .row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }

            /* Estilos para las columnas */
            .left-column {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .right-column {
                flex: 1;
                margin-left: 20px;
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

            button{
                background: none;
                border: none;

            }

            table{
                margin-top: 5px;
                margin-left: 80px;
                width: 93.5%;
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
        <script src="../utils/js/js_registroJefes.js"></script>
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
                <button onclick="window.location.href = 'EspecialidadesDeDivision.php'" class="btnRH">
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

        <div class="contEspe">
            <div class="fondoEDD">
                <label class="edd">ESPECIALIDADES DE DIVISIÓN</label>
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
            <div class="contEspeFrom" id="formContainer">
                <label class="tituloFormulario">AGREGAR ESPECIALIDAD</label>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Filas y columnas con Clave, Nombre y Materias centrado -->
                    <div class="row">
                        <!-- Columna izquierda con Clave y Nombre -->
                        <div class="left-column">
                            <div class="field">
                                <label for="clave" class="etiquetas">Clave:</label>
                                <input type="text" id="clave" name="clave" required placeholder="Clave" class="inputTextForm">
                            </div>
                            <div class="field">
                                <label for="nombre" class="etiquetas">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required placeholder="Nombre" class="inputTextForm">
                            </div>
                        </div>

                        <!-- Columna derecha con Materias centrado verticalmente -->
                        <div class="right-column">
                            <div class="field">
                                <label for="materias" class="etiquetas">Materias:</label>
                                <textarea id="materias" name="materias" rows="4" required placeholder="Materias" class="inputTextForm"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons -->
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
            <div class="contEspeFrom" id="formContainerM">
                <label class="tituloFormulario">MODIFICAR ESPECIALIDAD</label>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Filas y columnas con Clave, Nombre y Materias centrado -->
                    <div class="row">
                        <!-- Columna izquierda con Clave y Nombre -->
                        <div class="left-column">
                            <div class="field">
                                <label for="clave" class="etiquetas">Clave:</label>
                                <input type="text" id="clave" name="clave" required placeholder="Clave" class="inputTextForm">
                            </div>
                            <div class="field">
                                <label for="nombre" class="etiquetas">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required placeholder="Nombre" class="inputTextForm">
                            </div>
                        </div>

                        <!-- Columna derecha con Materias centrado verticalmente -->
                        <div class="right-column">
                            <div class="field">
                                <label for="materias" class="etiquetas">Materias:</label>
                                <textarea id="materias" name="materias" rows="4" required placeholder="Materias" class="inputTextForm"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons -->
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
                    <th>Nombre</th>
                    <th>Materias</th>
                </tr>
                <?php
                foreach ($rs as $Especialidad) {
                    print "<tr>";
                    print "<td>$Especialidad->clave</td>";
                    print "<td>$Especialidad->nombre</td>";
                    print "<td>$Especialidad->materias</td>";
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

