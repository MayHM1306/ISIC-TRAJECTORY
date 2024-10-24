<!DOCTYPE html>
<?php session_start(); ?>
<?php
include_once '../controlador/ctrlDocenteDiv.php';
include_once '../modelo/mdlDocentes.php';
include_once '../modelo/conexion.php';
include_once '../modelo/popo/Docentes.php';
try {
    $Docentes = new ctrlDocenteDiv();
    $rs = $Docentes->buscarDocente();
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros de Docentes de División</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../utils/css/styles_Encabezado.css">  
        <!--<link rel="stylesheet" href="../utils/css/styles_Registro_Docentes.css">-->
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <style>
            .contDocen{
                border-top: solid 130px #fff;
                margin: 0 20px;
                top: 140px;
                width: 97%;
                height: 100vh;
                background-color: #E6EEEF;
                padding-bottom: 30px;
            }

            .fondoDDD{
                font-family: 'Bebas Neue', sans-serif;
                position: fixed;
                width: 97%;
                height: 130px;
                background-image: url('../utils/images/fondoDocentes.png');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: left;
            }

            .ddd{
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

            .contDoceFrom {
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
                margin-right: 10px;
            }
            .field:last-child {
                margin-right: 0;
            }
            .buttons {
                margin-top: 20px;
                text-align: center;
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

            .image-upload {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }
            .image-upload input[type="file"] {
                display: none;
            }
            .image-upload label {
                width: 150px;
                height: 150px;
                background-color: #fff;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
                cursor: pointer;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
            }
            .image-upload label img {
                max-width: 100%;
                max-height: 100%;
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
            
            .image-upload, .estado {
                flex: 1;
                margin-right: 10px;
            }
            
            button{
                background: none;
                border: none;

            }

            table{
                margin-top: 10px;
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
        <script src="../utils/js/js_registroDocentes.js"></script>
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
                <button onclick="window.location.href = 'DocentesDeDivision.php'" class="btnRH">
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

        <div class="contDocen">
            <div class="fondoDDD">
                <label class="ddd">DOCENTES DE DIVISIÓN</label>
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
            <div class="contDoceFrom" id="formContainer">
                <label class="tituloFormulario">AGREGAR DOCENTE DE DIVISIÓN</label>
                <form action="#" method="POST" onsubmit="return validarCedula()">
                    <!-- Nombre -->
                    <div class="row">
                        <div class="field">
                            <label for="nombre" class="etiquetas">Nombre (Completo):</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Nombre Completo" class="inputTextForm" 
                                   pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"
                                   required title="El formato de Nombre contiene caracteres no permitidos. Por favor, utiliza solo letras">
                        </div>
                        <div class="field">
                            <label for="profesion" class="etiquetas">Profesión:</label>
                            <select id="profesion" name="profesion" class="inputTextForm" required>
                                <option value="" disabled selected></option>
                                <option value="Ingeniero">Licenciado</option>
                                <option value="Ingeniero">Ingeniero</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Licenciado">Licenciado</option>
                            </select>
                        </div>
                    </div>

                    <!-- Cédula y Estudios de Posgrado -->
                    <div class="row">
                        <div class="field">
                            <label for="cedula" class="etiquetas">Cédula:</label>
                            <input type="text" id="cedula" name="cedula" required placeholder="Cédula" class="inputTextForm" 
                                   pattern="\d{3,10}" title="La cédula debe contener entre 3 y 10 números.">>
                        </div>
                        <div class="field">
                            <label for="postgrado" class="etiquetas">Estudios de Posgrado:</label>
                            <select id="postgrado" name="postgrado" class="inputTextForm" required>
                                <option value="" disabled selected></option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                                <option value="Doctorado">Pos Doctorado</option>
                            </select>
                        </div>
                    </div>

                    <!-- Años de experiencia y Docencia -->
                    <div class="row">
                        <div class="field">
                            <label for="experiencia" class="etiquetas">Años de experiencia:</label>
                            <input type="number" id="experiencia" name="experiencia" min="1" placeholder="Años de experiencia" class="inputTextForm" required>
                        </div>
                        <div class="field">
                            <label for="docencia" class="etiquetas">Docencia:</label>
                            <input type="number" id="docencia" name="docencia" min="1" placeholder="Años de Docencia" class="inputTextForm" required>

                        </div>
                    </div>

                    <!-- Categoría y Número de empleado -->
                    <div class="row">
                        <div class="field">
                            <label for="categoria" class="etiquetas">Categoría:</label>
                            <select id="categoria" name="categoria" class="inputTextForm" required>
                                <option value="" disabled selected></option>
                                <option value="Profesor A">Profesor A</option>
                                <option value="Profesor B">Profesor B</option>
                                <option value="Profesor C">Profesor C</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="empleado" class="etiquetas">Número de Empleado:</label>
                            <input type="text" id="empleado" name="empleado" placeholder="Número de Empleado" class="inputTextForm"
                                   pattern="\d{3}" required title="El número de empleado debe contener 3 dígitos.">
                        </div>
                    </div>

                    <!-- Seleccionar foto y Estado -->
                    <div class="row">
                        <div class="field image-upload">
                            <label for="imagen" style="background-image: url('../utils/images/subirImagen.png');">
                                <input type="file" id="imagen" name="imagen" accept=".png">
                            </label>
                            <span>Seleccionar</span> <!-- Etiqueta añadida aquí -->
                        </div>
                        <div class="field estado" >
                            <label for="estado" class="etiquetas">Estado:</label>
                            <select id="estado" name="estado" class="inputTextForm" required>
                                <option value="" disabled selected>Estatus del Docente</option>
                                <option value="Alta">Alta</option>
                                <option value="Baja">Baja</option>
                            </select>
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

            <div class="contDoceFrom" id="formContainerM">
                <label class="tituloFormulario">MODIFICAR DOCENTE DE DIVISIÓN</label>
                <form action="#" method="POST" onsubmit="return validarCedula()">
                    <!-- Nombre -->
                    <div class="row">
                        <div class="field">
                            <label for="nombre" class="etiquetas">Nombre (Completo):</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Nombre Completo" class="inputTextForm" 
                                   pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"
                                   required title="El formato de Nombre contiene caracteres no permitidos. Por favor, utiliza solo letras">
                        </div>
                        <div class="field">
                            <label for="profesion" class="etiquetas">Profesión:</label>
                            <select id="profesion" name="profesion" class="inputTextForm" required>
                                <option value="" disabled selected></option>
                                <option value="Ingeniero">Licenciado</option>
                                <option value="Ingeniero">Ingeniero</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Licenciado">Licenciado</option>
                            </select>
                        </div>
                    </div>

                    <!-- Cédula y Estudios de Posgrado -->
                    <div class="row">
                        <div class="field">
                            <label for="cedula" class="etiquetas">Cédula:</label>
                            <input type="text" id="cedula" name="cedula" required placeholder="Cédula" class="inputTextForm" 
                                   pattern="\d{3,10}" title="La cédula debe contener entre 3 y 10 números.">>
                        </div>
                        <div class="field">
                            <label for="postgrado" class="etiquetas">Estudios de Posgrado:</label>
                            <select id="postgrado" name="postgrado" class="inputTextForm" required>
                                <option value="" disabled selected></option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                                <option value="Doctorado">Pos Doctorado</option>
                            </select>
                        </div>
                    </div>

                    <!-- Años de experiencia y Docencia -->
                    <div class="row">
                        <div class="field">
                            <label for="experiencia" class="etiquetas">Años de experiencia:</label>
                            <input type="number" id="experiencia" name="experiencia" min="1" placeholder="Años de experiencia" class="inputTextForm" required>
                        </div>
                        <div class="field">
                            <label for="docencia" class="etiquetas">Docencia:</label>
                            <input type="number" id="docencia" name="docencia" min="1" placeholder="Años de Docencia" class="inputTextForm" required>

                        </div>
                    </div>

                    <!-- Categoría y Número de empleado -->
                    <div class="row">
                        <div class="field">
                            <label for="categoria" class="etiquetas">Categoría:</label>
                            <select id="categoria" name="categoria" class="inputTextForm" required>
                                <option value="" disabled selected></option>
                                <option value="Profesor A">Profesor A</option>
                                <option value="Profesor B">Profesor B</option>
                                <option value="Profesor C">Profesor C</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="empleado" class="etiquetas">Número de Empleado:</label>
                            <input type="text" id="empleado" name="empleado" placeholder="Número de Empleado" class="inputTextForm"
                                   pattern="\d{3}" required title="El número de empleado debe contener 3 dígitos.">
                        </div>
                    </div>

                    <!-- Seleccionar foto y Estado -->
                    <div class="row">
                        <div class="field image-upload">
                            <label for="imagen" style="background-image: url('../utils/images/subirImagen.png');">
                                <input type="file" id="imagen" name="imagen" accept=".png">
                            </label>
                            <span>Seleccionar</span> <!-- Etiqueta añadida aquí -->
                        </div>
                        <div class="field estado" >
                            <label for="estado" class="etiquetas">Estado:</label>
                            <select id="estado" name="estado" class="inputTextForm" required>
                                <option value="" disabled selected>Estatus del Docente</option>
                                <option value="Alta">Alta</option>
                                <option value="Baja">Baja</option>
                            </select>
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
                    <th># Empleado</th>
                    <th>Nombre</th>
                    <th>Profesión</th>
                    <th>Cedula</th>
                    <th>Estudios Post Grd.</th>
                    <th>Experiencia</th>
                    <th>Docencia</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Foto</th>
                </tr>
                <?php
                foreach ($rs as $Docentes) {
                    print "<tr>";
                    print "<td>$Docentes->numEmpleado</td>";
                    print "<td>$Docentes->nombre</td>";
                    print "<td>$Docentes->profesion</td>";
                    print "<td>$Docentes->cedula</td>";
                    print "<td>$Docentes->estudiosPost</td>";
                    print "<td>$Docentes->aniosExpe</td>";
                    print "<td>$Docentes->docencia</td>";
                    print "<td>$Docentes->categoria</td>";
                    print "<td>$Docentes->estado</td>";
                    print "<td>$Docentes->fotoDocen</td>";
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