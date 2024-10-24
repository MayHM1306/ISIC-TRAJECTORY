<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../utils/css/styles_Encabezado.css">  
        <!--<link rel="stylesheet" href="../utils/css/styles_Historico_AE.css">-->
        <link rel="stylesheet" href="../utils/css/styles_contHistorico.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.google.com/share?selection.family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400" rel="stylesheet">
        <link href="https://fonts.google.com/share?selection.family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400|Stardos+Stencil:wght@400;700" rel="stylesheet">
        <script src="../utils/js/js_Historico.js"></script>
        <style>
            .contHistorico{
                border-top: solid 130px #fff;
                margin: 0 20px;
                top: 140px;
                width: 97%;
                height: 100%;
                background-color: #E6EEEF;
            }

            .fondoISIC {
                font-family: 'Bebas Neue', sans-serif;
                width: 100%;
                height: 130px;
                background-image: url('../utils/images/fondoISIC.jpg');
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

            .vmi{
                margin: 0 10px 0 10px;
                margin-top: 20px;
                border-bottom: solid 2px #1d217f;
            }

            .boton {
                background-color: #3B3B98;
                color: white;
                border: none;
                padding: 10px 20px;
                margin: 5px;
                border-radius: 20px;
                cursor: pointer;
            }
            .boton.active {
                background-color: white;
                color: #3B3B98;
                border: 2px solid #3B3B98;
            }
            .contenido {
                margin:  0 10px 0 10px;
                display: flex;
                align-items: center; /* Alinea la imagen y el texto al centro verticalmente */
                margin-top: 8px;
                padding: 20px;
                border: none;
                background: none;
            }
            .contenido img {
                max-width: 50px; /* Tamaño máximo de la imagen */
                margin-right: 20px; /* Espacio entre la imagen y el texto */
            }
            .contenido-texto {
                flex-grow: 1; /* El texto ocupará el espacio restante */
            }

            .textH{
                text-align: justify;
            }

            /*Contenido de la Histori*/
            .container {
                text-align: center;
            }

            button:hover{
                background-color: #313588;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .modal-content {
                background-color: #021d34;
                margin: 15% auto;
                padding: 20px;
                border-radius: 10px;
                width: 50%;
                color: white;
                text-align: left;
            }


            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #aaa;
                text-decoration: none;
                cursor: pointer;
            }

            /*Diseño de los contenedores de submenu*/
            .card-container {
                display: flex;
                justify-content: space-between; /* Espaciado uniforme entre tarjetas */
                width: 100%; /* Ancho completo */
                max-width: 900px; /* Ancho máximo para mantener el diseño centrado */
                align-items: center;
                margin-left: 90px
            }

            /* Contenedor principal de la tarjeta */
            .card {
                flex: 1; /* Las tarjetas se expanden uniformemente */
                margin: 10px; /* Espaciado entre tarjetas */
                background-color: #f3f7f9;
                border: 1px solid #e0e0e0;
                border-radius: 10px;
                overflow: hidden;
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 10px;
                min-width: 290px; /* Ancho mínimo para cada tarjeta */
                height: 370px
            }

            /* Imagen en la parte superior */
            .card-img {
                width: 100%;
                border-radius: 10px 10px 0 0;
                height: 200px;
                margin-bottom: -10px;
            }

            /* Contenedor del título */
            .title-container {
                background-color: #b0c4c8;
                padding: 10px 5px;
                margin-top: -90px; /* Para superponer el título a la imagen */
                border-radius: 10px;
                display: inline-block;
                width: 240px;
            }

            .title-container:hover {
                transform: scale(1.1); /* Aumenta el tamaño un 10% */
                background-color: #8ca3a8; /* Cambia el color de fondo */
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
            }

            /* Enlace del título (Jefe de división) */
            .card-title {
                color: white;
                text-decoration: none;
                font-size: 18px;
                font-weight: bold;
                font-family: Arial, sans-serif;
            }

            /* Estilo del texto de la descripción */
            .card-description {
                font-family: Arial, sans-serif;
                margin-top: 10px;
                text-align: justify;
            }

            .card-description ul {
                list-style-type: disc;
                margin: 0;
                padding-left: 20px;
                list-style-type: none;
            }
        </style>
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
                <button onclick="window.location.href = 'Home.php'" class="btnRH">
                    <img src="../utils/images/regresarHome.png" class="regresarH">
                </button>

                <a href="Historico_AE.php" class="m">HISTÓRICO</a>
                <a href="#" class="m">INDICADORES ISIC</a>
                <a href="#" class="m">DOCENTES</a>
                <a href="#" class="m">ALUMNOS</a>
                <a href="#" class="m">DISTINCIONES</a>
            </nav>
        </div>

        <div class="contHistorico">
            <div class="fondoISIC">
                <label class="insc">Ing. Sistemas <br>Computacionales</label>
            </div>

            <div class="vmi">
                <button class="boton" id="mision-btn">Misión</button>
                <button class="boton" id="vision-btn">Visión</button>
                <button class="boton" id="openModalBtn">Inicio</button>
            </div>

            <div class="contenido" id="contenido">
                <img id="contenido-imagen" src="../utils/images/imgMision.png">
                <div class="contenido-texto" id="contenido-texto">
                    Formar ingenieros en sistemas computacionales con conocimientos significativos y habilidades 
                    pertinentes; a través de una formación integral en un programa educativo certificado y acreditado 
                    con estándares de calidad, que den solución a los problemas de los sectores de la producción, 
                    transformación y de servicios.
                </div>
            </div>

            <div class="container">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2 class="h">Historia</h2>
                        <p class="textH">
                            La carrera de Ingeniería en Sistemas Computacionales fue creada en el año de 2003 en el
                            Instituto Tecnológico Superior del Occidente del Estado de Hidalgo.
                            <br><br>
                            Desde su establecimiento, esta carrera ha buscado formar profesionales altamente
                            capacitados en el ámbito de la tecnología, preparados para enfrentar los retos del 
                            mundo digital. Con un enfoque en la innovación y el desarrollo de soluciones tecnológicas,
                            el programa ha brindado conocimientos constantemente alineados con las necesidades 
                            industriales de la región y promover el crecimiento de la industria. A través de un 
                            plan de estudios integral, los estudiantes adquieren habilidades de programación, 
                            redes y administración de sistemas, posicionándose como agentes de cambio en un 
                            entorno cada vez más digitalizado.
                        </p>
                    </div>
                </div>
            </div>
            <div id="titAE">
                Atributos de Egreso
            </div>

            <table>
                <tr>
                    <td class="side-cell">AE1</td>
                    <td>
                        Implementa aplicaciones computacionales para solucionar problemas complejos de ingeniería en 
                        contextos de ciencias sociales naturales, matemáticas, fundamentos de la ingeniería y 
                        vanguardia de la disciplina, integrando hardware y software, plataformas o dispositivos,
                        implicando conocimiento profundo de ingeniería dentro de una organización, considerando
                        cuestiones éticas, sostenibles, legales, políticas y sociales.
                    </td>
                </tr>
                <tr>
                    <td class="side-cell">AE2</td>
                    <td>
                        Diseña, desarrolla y aplica modelos computacionales innovadores para solucionar problemas 
                        complejos de ingeniería en contextos multidisciplinarios, mediante la selección y uso de 
                        herramientas matemáticas, de tecnologías y de ingeniería.
                    </td>
                </tr>
                <tr>
                    <td class="side-cell">AE3</td>
                    <td>
                        Coordina y participa en equipos multidisciplinarios, inclusivos, presenciales o remotos para 
                        la aplicación de soluciones innovadoras mediante comunicación oral y escrita efectiva en 
                        diferentes contextos, para la toma de decisiones económicas en la gestión de proyectos con 
                        una visión empresarial.
                    </td>
                </tr>
                <tr>
                    <td class="side-cell">AE4</td>
                    <td>
                        Investiga problemas de ingeniería complejos utilizando métodos de investigación, incluyendo el 
                        conocimiento d¿basado en la investigación, el diseño de experimentos, el análisis y la 
                        interpretación de los datos, y la síntesis de la información en la gestión de proyectos
                        con una visión empresarial.
                    </td>
                </tr>
                <tr>
                    <td class="side-cell">AE5</td>
                    <td>
                        Reconoce  y se prepara para un aprendizaje independiente, enfocándose a su vida profesional 
                        con el objetivo de adaptarse y consciente del impacto de los cambios tecnoloógicos en la profesión.
                    </td>
                </tr>
            </table>

            <div class="card-container">
                <div class="card">
                    <img src="../utils/images/imgJefe.png" alt="Imagen jefe" class="card-img">
                    <div class="title-container">
                        <a href="../vista/JefeDeDivision.php" class="card-title">Jefe de división</a>
                    </div>
                    <div class="card-description">
                        <ul>
                            <li>Historial y trayectoria de los jefes anteriores en este cargo,
                                así como la gestión general de la división.</li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <img src="../utils/images/imgDocentes.png" alt="Imagen jefe" class="card-img">
                    <div class="title-container">
                        <a href="../vista/DocentesDeDivision.php" class="card-title">Docentes de división</a>
                    </div>
                    <div class="card-description">
                        <ul>
                            <li>Información sobre la plantilla actual de profesores y sus perfiles de 
                                especialización.</li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <img src="../utils/images/imgReticulas.png" alt="Imagen jefe" class="card-img">
                    <div class="title-container">
                        <a href="../vista/ReticulasDeDivision.php" class="card-title">Retículas</a>
                    </div>
                    <div class="card-description">
                        <ul>
                            <li>Retículas curriculares de la división, incluyendo las asignaturas y la organización
                                de los contenidos académicos.</li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <img src="../utils/images/imgEspecialidades.png" alt="Imagen jefe" class="card-img">
                    <div class="title-container">
                        <a href="../vista/EspecialidadesDeDivision.php" class="card-title">Especialidades</a>
                    </div>
                    <div class="card-description">
                        <ul>
                            <li>Especialidades y áreas de conocimiento ofrecidas por la división, detallando los enfoques
                                y competencias que se desarrollan en cada una de ellas.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--            <div class="distribucionT">
                             Tarjeta 1 
                            <a href="JefeDeDivision.php" class="tarjeta">
                                <img src="../utils/images/imgJefe.png" alt="Jefe de División">
                                <div class="tarjeta-titulo">Jefe de división</div>
                                <div class="tarjeta-descripcion">
                                    <p>• Historial y trayectoria de los jefes anteriores en este cargo,
                                        así como la gestión general de la división.</p>
                                </div>
                            </a>
            
                             Tarjeta 2 
                            <a href="DocentesDeDivision.php" class="tarjeta">
                                <img src="../utils/images/imgDocentes.png" alt="Docentes de División">
                                <div class="tarjeta-titulo">Docentes de división</div>
                                <div class="tarjeta-descripcion">
                                    <p>• Información sobre la plantilla actual de profesores y sus perfiles de 
                                        especialización.</p>
                                </div>
                            </a>
            
                             Tarjeta 3 
                            <a href="ReticulasDeDivision.php" class="tarjeta">
                                <img src="../utils/images/imgReticulas.png" alt="Retículas">
                                <div class="tarjeta-titulo">Retículas</div>
                                <div class="tarjeta-descripcion">
                                    <p>• Retículas curriculares de la división, incluyendo las asignaturas y la organización
                                        de los contenidos académicos.</p>
                                </div>
                            </a>
            
                             Tarjeta 4 
                            <a href="EspecialidadesDeDivision.php" class="tarjeta">
                                <img src="../utils/images/imgEspecialidades.png" alt="Especialidades">
                                <div class="tarjeta-titulo">Especialidades</div>
                                <div class="tarjeta-descripcion">
                                    <p>• Especialidades y áreas de conocimiento ofrecidas por la división, detallando los enfoques
                                        y competencias que se desarrollan en cada una de ellas.</p>
                                </div>
                            </a>
                        </div>-->


        </div>
    </body>
</html>
