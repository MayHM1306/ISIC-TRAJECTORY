<!DOCTYPE html>
<?php session_start(); ?>
<?php
include_once '../controlador/ctrlJefeDivision.php';
include_once '../modelo/mdlJefe.php';
include_once '../modelo/conexion.php';
include_once '../modelo/popo/Jefe.php';
try {
    $Jefes = new ctrlJefeDivision();
    $rs = $Jefes->buscarJefe();
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
        <!--<link rel="stylesheet" href="../utils/css/style_Registros_Jefes.css">-->
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <style>
            .contHistorico{
                border-top: solid 130px #fff;
                margin: 0 20px;
                top: 140px;
                width: 97%;
                height: 100vh;
                background-color: #E6EEEF;
                padding-bottom: 30px;
            }

            .fondoISIC{
                position: fixed;
                font-family: 'Bebas Neue', sans-serif;
                width: 97%;
                height: 130px;
                background-image: url('../utils/images/imgJefeDivision.png');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: left;
            }

            .insc{
                color: #fff;
                padding-left: 20px;
                font-size: 50px;
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
                position: fixed;
                margin-left: 70px;
                margin-top: 140px;
                width: 92%;
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

            .jdd{
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

            .formulario {
                width: 45%;
                margin: 50px auto;
                background-color: #021d34;
                padding: 40px 50px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
                max-width: 800px;
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

            .inputTextFormTele{
                width: 50%;
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
                margin-right: 10px;
            }
            .field:last-child {
                margin-right: 0;
            }
            .periodo {
                display: flex;
                align-items: center;
            }
            .periodo input {
                width: 45%;
            }
            .separator {
                margin: 0 10px;
                color: white;
                font-family: 'Montserrat', sans-serif;
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

            /*Estilos para la botones del formulario*/

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

            .close-btn {
                background-color: #ff5f5f;
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
                border: none;
                float: right;
                cursor: pointer;
            }
            .main-buttons {
                margin: 50px;
                text-align: center;
            }
            .main-buttons button {
                padding: 15px 30px;
                font-size: 16px;
                background-color: #1976d2;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            button{
                background: none;
                border: none;

            }

            table{
                margin-top: 190px;
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

            .formularioEliminar {
                width: 33%;
                margin: 50px auto;
                background-color: #fff;
                padding: 40px 50px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
                max-width: 800px;
            }

            .imgAdvertencia{
                width: 100px;
                height: 100px;
                margin-left: 140px;
                margin-bottom: 20px;
            }
            
            .txtAdvertencia{
                color: #a60101;
                text-align: center;
                font-size: 25px;
                width: 100%;
            }
            
            .buttonsEliminar {
                margin-top: 20px;
                display: flex; /* Activar Flexbox en el contenedor */
                justify-content: center; /* Alinear los botones a la derecha */
            }

            .buttonsEliminar button {
                display: flex; /* Activar Flexbox en los botones */
                align-items: center; /* Centrar verticalmente el contenido */
                width: 120px;
                padding: 6px 35px;
                margin: 5px;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                font-size: 14px;
                color: #fff;
            }
            
            .eliminarR{
                background-color: #689fc1;
            }
            
            .cancelarE{
                background-color: #a60101;
            }
            
            .formularioEliminar from{
                display: flex;
                justify-content: center;
            }
            
            .eliminarR:hover{
                background-color: #83c7f1;
            }
            
            .cancelarE:hover{
                background-color: #be1e2d;
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
                <button onclick="window.location.href = 'JefeDeDivision.php'" class="btnRH">
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

        <div class="contHistorico">
            <div class="fondoISIC">
                <label class="jdd">JEFES DE DIVISIÓN</label>
            </div>
            <div class="titRJ">
                Información
                <div class="contBucarJefes">
                    <input type="text" id="txtBurcarJefes" name="txtBuscarJefes" placeholder="Buscar" pattern="">
                    <button class="btnBuscarJefes">
                        <img src="../utils/images/btnBuscarTabla.png"/>
                    </button>
                </div>
            </div>

            <div class="overlay" id="overlay"></div>

            <div class="formulario" id="formContainer">
                <label class="tituloFormulario">AGREGAR JEFE DE DIVISIÓN</label>
                <form action="#" method="POST" onsubmit="return validarSeleccion() && validarPeriodos()">
                    <div class="row">
                        <div class="field">
                            <label for="nombre" class="etiquetas">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Nombre" class="inputTextForm"
                                   pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"
                                   required title="El formato de Nombre contiene caracteres no permitidos. Por favor, utiliza solo letras">
                        </div>
                        <div class="field">
                            <label for="apellidoPaterno" class="etiquetas">Apellido Paterno:</label>
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required placeholder="Apellido Paterno" 
                                   class="inputTextForm" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$" 
                                   required title="“El formato de Apellido Paterno contiene caracteres no permitidos. Por favor, utiliza solo letras">
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="field">
                            <label for="apellidoMaterno" class="etiquetas">Apellido Materno:</label>
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required placeholder="Apellido Materno" 
                                   class="inputTextForm" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"
                                   required title="“El formato de Apellido Paterno contiene caracteres no permitidos. Por favor, utiliza solo letras">
                        </div>
                        <div class="field">
                            <label for="gradoAcademico" class="etiquetas">Grado Académico:</label>
                            <select id="gradoAcademico" name="gradoAcademico" class="inputTextForm">
                                <option value="" disabled selected></option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div style="width: calc(50% - 10px); ">
                            <label for="periodo" class="etiquetas">Periodo:</label>
                            <div class="periodo">
                                <input type="number" id="periodoInicio" name="periodoInicio" min="2003" max="2100" placeholder="Año Inicio" class="inputTextForm">
                                <span class="separator">al</span>
                                <input type="number" id="periodoFin" name="periodoFin" min="2003" max="2100" placeholder="Año Fin" class="inputTextForm">
                            </div>
                        </div>
                        <div class="field" style="margin-left: 10px; width: 100%;">
                            <label for="email" class="etiquetas">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required placeholder="Correo Electrónico" 
                                   class="inputTextForm"  pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                                   required title="Verifica que el correo esté escrito correctamente.">
                        </div>
                    </div>

                    <div class="row">
                        <div class="field">
                            <label for="telefono" class="etiquetas">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" required placeholder="Teléfono" class="inputTextFormTele"
                                   pattern="\d{10}" 
                                   required title="Introduce un número de teléfono válido de 10 dígitos.">
                        </div>
                    </div>


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

            <div class="formulario" id="formContainerM">
                <label class="tituloFormulario">MODIFICAR JEFE DE DIVISIÓN</label>
                <form action="#" method="POST" onsubmit="return validarSeleccion() && validarPeriodos()">
                    <div class="row">
                        <div class="field">
                            <label for="nombre" class="etiquetas">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Nombre" class="inputTextForm"
                                   pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"
                                   required title="El formato de Nombre contiene caracteres no permitidos. Por favor, utiliza solo letras">
                        </div>
                        <div class="field">
                            <label for="apellidoPaterno" class="etiquetas">Apellido Paterno:</label>
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required placeholder="Apellido Paterno" 
                                   class="inputTextForm" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$" 
                                   required title="“El formato de Apellido Paterno contiene caracteres no permitidos. Por favor, utiliza solo letras">
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="field">
                            <label for="apellidoMaterno" class="etiquetas">Apellido Materno:</label>
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required placeholder="Apellido Materno" 
                                   class="inputTextForm" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"
                                   required title="“El formato de Apellido Paterno contiene caracteres no permitidos. Por favor, utiliza solo letras">
                        </div>
                        <div class="field">
                            <label for="gradoAcademico" class="etiquetas">Grado Académico:</label>
                            <select id="gradoAcademico" name="gradoAcademico" class="inputTextForm">
                                <option value="" disabled selected></option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div style="width: calc(50% - 10px); ">
                            <label for="periodo" class="etiquetas">Periodo:</label>
                            <div class="periodo">
                                <input type="number" id="periodoInicio" name="periodoInicio" min="2003" max="2100" placeholder="Año Inicio" class="inputTextForm">
                                <span class="separator">al</span>
                                <input type="number" id="periodoFin" name="periodoFin" min="2003" max="2100" placeholder="Año Fin" class="inputTextForm">
                            </div>
                        </div>
                        <div class="field" style="margin-left: 10px; width: 100%;">
                            <label for="email" class="etiquetas">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required placeholder="Correo Electrónico" 
                                   class="inputTextForm"  pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                                   required title="Verifica que el correo esté escrito correctamente.">
                        </div>
                    </div>

                    <div class="row">
                        <div class="field">
                            <label for="telefono" class="etiquetas">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" required placeholder="Teléfono" class="inputTextFormTele"
                                   pattern="\d{10}" 
                                   required title="Introduce un número de teléfono válido de 10 dígitos.">
                        </div>
                    </div>


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

            <div class="overlay" id="overlayE"></div>

            <div class="formularioEliminar" id="formContainerE">
                <form action="#" method="POST">
                    <img src="../utils/images/advertencias.png" class="imgAdvertencia"> <br>
                    <label class="txtAdvertencia">Seguro que desea eliminar el registro</label>
                    <div class="buttonsEliminar">
                        <button type="reset" class="eliminarR">
                            Confirmar
                        </button>
                        <button type="button" class="cancelarE" onclick="closeFormE()">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>

            <table id="jefesDivicion">
                <tr>
                    <th>ID Jefe</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Grado Academino</th>
                    <th>Periodo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                </tr>
                <?php
                foreach ($rs as $Jefe) {
                    print "<tr>";
                    print "<td>$Jefe->idJefe</td>";
                    print "<td>$Jefe->nombre</td>";
                    print "<td>$Jefe->apPaterno</td>";
                    print "<td>$Jefe->apMaterno</td>";
                    print "<td>$Jefe->gradoAcademico</td>";
                    print "<td>$Jefe->periodo</td>";
                    print "<td>$Jefe->telefono</td>";
                    print "<td>$Jefe->correo</td>";
                    print'<td>'
                            . '
                                <input type="hidden" name="accion" value="borrar"> 
                                <button type="submit" class="btnEliminar" onclick="openFormE()">
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
            function openFormE() {
                document.getElementById('formContainerE').style.display = 'block';
                document.getElementById('overlayE').style.display = 'block';
            }

            function closeFormE() {
                document.getElementById('formContainerE').style.display = 'none';
                document.getElementById('overlayE').style.display = 'none';
            }

        </script>
    </body>
</html>