<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../utils/css/styles_login.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="../utils/js/js_login.js"></script>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="login-box">
                <h2>INICIAR SESIÓN</h2>
                <form action="../controlador/validarUsuario.php" method="get">
                    <div class="input-group">
                        <input type="text" id="txtUsuario" placeholder="Email" name="usuario" 
                               pattern="(?=(?:.*\d){8})([a-zA-Z0-9._%+-]+)@itsoeh\.edu\.mx" required 
                               title="Asegúrate de ingresar un email con 8 dígitos numéricos y que la extensión sea la correcta.">
                       
                        <span class="icon email-icon"></span>
                    </div>
                    <div class="input-group">
                        <input type="password" id="txtContrasenia" placeholder="Contraseña"  name="contrasenia">
                        <span class="icon password-icon"></span>
                    </div>
                    <div class="input-group">
                        <select id="txtRol" name="rol">
                            <option value="" disabled selected>Roles</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Presidente académico">Presidente académico</option>
                            <option value="Secretario académico">Secretario académico</option>
                            <option value="Líder del cuerpo académico">Líder del cuerpo académico</option>
                            <option value="Lider de LGAC">Lider de LGAC</option>
                            <option value="Docente">Docente</option>
                            <option value="Estudiante">Estudiante</option>
                        </select> 
                    </div>
                    <button type="submit" id="acceder-btn">ACCEDER</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </form>
            </div>
        </div>
        <div class="back-button-container">
            <button class="back-button" onclick="window.location.href = '../index.php'">
                <img src="../utils/images/regresarIS.png" alt="Regresar">
            </button>
        </div>

    </body>
</html>
