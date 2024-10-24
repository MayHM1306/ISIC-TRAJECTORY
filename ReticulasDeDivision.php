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
        <title>Réticulas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../utils/css/styles_Encabezado.css">  
        <!--<link rel="stylesheet" href="../utils/css/styles_reticulaDivision.css">-->  
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <style>
            .barraRegistros{
                position: fixed;
                width: 70px;
                height: 100%;
                top: 115px;
                left: 0px;
                background-color: #58888c;
                align-items: center;
                justify-content: center; /* Alinear horizontalmente */
            }

            .imgR{
                width: 50px;
                height: 50px;
            }

            .btnR{
                background: none;
                border: none;
                color: #fff;
                width: 70px;
                height: 100px;
            }

            .btnR:hover{
                background-color: #a4c2c7;
            }
            a{
                text-decoration: none;
                color: #fff;
            }

            .contRegJefes{
                border-top: solid 130px #fff;
                margin: 0 20px;
                margin-left: 80px;
                left: 80px;
                width: 93.5%;
                height: 100vh;
                background-color: #E6EEEF;
            }

            .fondoJefes{
                font-family: 'Bebas Neue', sans-serif;
                position: fixed;
                width: 93.5%;
                height: 130px;
                background-image: url('../utils/images/fondoReticula.png');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: left;
            }
            .titRJ{
                margin-top: 150px;
                width: 100%;
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

            table{
                margin-top: 10px;
                margin-left: 5px;
                width: 99%;
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
        <script src="../utils/js/js_Historico.js"></script>
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
                <button onclick="window.location.href = 'Historico_AE.php'" class="btnRH">
                    <img src="../utils/images/regresarHome.png" class="regresarH">
                </button>

                <a href="Historico_AE.php" class="m">HISTÓRICO</a>
                <a href="#" class="m">INDICADORES ISIC</a>
                <a href="#" class="m">DOCENTES</a>
                <a href="#" class="m">ALUMNOS</a>
                <a href="#" class="m">DISTINCIONES</a>
            </nav>
        </div>
        <div class="barraRegistros">
            <button  class="btnR" onclick="window.location.href = 'Registros_Reticula.php'">
                <a href="#">
                    <img src="../utils/images/btnRegistros.png" class="imgR">
                    <label>Registros</label>
                </a>
            </button>
        </div>

        <div class="contRegJefes">
            <div class="fondoJefes">
                <label class="jdd">RÉTICULA DE DIVISIÓN</label>
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
            <table id="jefesDivicion">
                <tr>
                    <th>Clave</th>
                    <th>Materias</th>
                    <th></th>
                </tr>
                <?php
                foreach ($rs as $Reticula) {
                    print "<tr>";
                    print "<td>$Reticula->clave</td>";
                    print "<td>$Reticula->materias</td>";
                    print "<td>$Reticula->pdfReticula</td>";
                    print "</tr>";
                }
                ?>
            </table>

        </div>   

    </body>
</html>
