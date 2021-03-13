<!DOCTYPE html>
<html>
    <head>
        <title>CovidWatch</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
            body{
                font-family: 'Lato', sans-serif;
                display: flex;
                flex-direction: column;
                align-items: center;
                background-image: url('./imagen.jpg');
                color:white;
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
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST['enviar'])){
                $login = $_POST['login'];
                $password = $_POST['pass'];
                if ($login=="yorks" && $password=="1234"){
                session_start();
                $_SESSION['usuario']=$login;
                header("Location: seleccion.php");
                }
                else if ($login=="carlos" && $password=="5678"){
                    session_start();
                    $_SESSION['usuario']=$login;
                    header("Location: seleccion.php");
                }
                else{
                session_start();
                $_SESSION['usuario']="";
                header("Location: index.php");
                }
            }
            else{
            ?>
            <br>
            <h1>CovidWatch</h1>
            <div class='container'>
            
                <h2>INGRESO</h2>
                <form class='formu' action="index.php" method="POST">
                    LOGIN: <br>
                    <input type="text" name="login" width="50"><br><br>
                    PASSWORD: <br>
                    <input type="password" name="pass" width="50"><br><br>
                    <input class="btn" type="submit" name="enviar" value="ENVIAR">
                </form>
            </div>
        <?php } ?>
    </body>
</html>