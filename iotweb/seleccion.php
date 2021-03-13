<!DOCTYPE html>
<html>
    <head>
        <title>CovidWatch - seleccion</title>
        <style>
         @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
            body{
                font-family: 'Lato', sans-serif;
                display: flex;
                flex-direction: column;
                align-items: center;
                background-image: url('./imagen.jpg');
                color: white;
            }
            .container{
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 1rem;
                border-radius: 10px;
                width: 20rem;
                background-color: #5F94EB;
                -webkit-box-shadow: 0px 5px 9px -1px rgba(186,186,186,0.87);
                -moz-box-shadow: 0px 5px 9px -1px rgba(186,186,186,0.87);
                box-shadow: 0px 5px 9px -1px rgba(186,186,186,0.87);
            }
            .btn{
                font-size:1rem;
                font-weight: 600;
                padding: 0.8rem;
                background-color: #4A5BD4;
                color: white;
                border-style: none;
                border-radius: 10px;
                outline: none;
            }
            .btn:hover{
                cursor:pointer;
                background-color: #56E7F6;
            }
            .formu{
                display:flex;
                flex-direction: column;
                align-items: center;
            }
            h2{
                margin: 0 0 1rem 0;
                text-align: center;
            }
            a{
                text-decoration: none;
                color: white;
            }

            a:hover{
                color: #56E7F6;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            $us=$_SESSION['usuario'];
            if($us== "")
            {
                header("Location: index.php");
            }
        ?>
        <h1>CovidWatch</h1>
        <div class="container">
            <h2>Seleccione el Canal y la variable que desea visualizar: </h2>
            <form class="formu" action="nodo.php" method="POST">
                CANAL: <input type="text" name="ChannelID"><br>
                VARIABLE: <input type="text" name="field"><br><br>
                <input class="btn" type="submit" name="enviar" value="ENVIAR">
            </form>
        </div>
        <h4><a href="logout.php">CERRAR SESION</a></h4>
    </body>
</html>