<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../utils/css/styles_home.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="iconEncabezado">
            <img src="../utils/images/encabezado.png"/>
        </div>
        
        <nav class="barraMenu">
            <a href="Historico_AE.php" class="m">HISTÓRICO</a>
            <a href="#" class="m">INDICADORES ISIC</a>
            <a href="#" class="m">DOCENTES</a>
            <a href="#" class="m">ALUMNOS</a>
            <a href="#" class="m">DISTINCIONES</a>
            <div class="menu-container">
                <a href="#" class="salir" onclick="toggleMenu()">☰</a>
                <div class="submenu" id="submenu">
                    <a href="../index.php">Salir</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="contEsparco">
        <img src="../utils/images/ESPARCO.png" class="esparco">
    </div>
    
    <script>
        function toggleMenu() {
            const submenu = document.getElementById("submenu");
            submenu.style.display = submenu.style.display === "block" ? "none" : "block";
        }
    </script>
</body>
</html>


