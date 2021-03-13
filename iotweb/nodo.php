<html>
        <head>
            <title>CovidWatch - Canal</title>
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
                margin-bottom: 1rem;
            }
            .btn{
                text-decoration: none;
                font-size:1rem;
                font-weight: 600;
                padding: 0.8rem;
                background-color: #4AA3D4;
                color: white;
                border-style: none;
                border-radius: 10px;
                outline: none;
            }
            .btn:hover{
                cursor:pointer;
                background-color: #2196F3;
            }
            table{
                margin-bottom: 1rem;
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
            //$nodo = $_POST["nodo"];
            //$var = $_POST["variable"];
            $canal = $_POST["ChannelID"];
            $field = $_POST["field"];
            ?>
            <h1>CovidWatch</h1>
            <h2>Datos del Canal <?php echo $canal; ?> y la Variable <?php echo $field; ?> </h2>
            <div class='container'>
            <table border="2px">
                <tr><th>VALOR</th><th>FECHA</th></tr>
                <?php
                    //$url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=BBFF-xrbsHfcbZmpO83O6FSLmfzMan8y2WE ";
                    $url_rest = "https://api.thingspeak.com/channels/$canal/fields/$field.json?api_key=34ORZJ6IO6MVMWFH";
                    $curl = curl_init($url_rest);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $respuesta = curl_exec($curl);

                    if($respuesta===false){
                        curl_close($curl);
                        die ("Error...");
                    }
                    curl_close($curl);
                    //echo $respuesta;
                    $resp = json_decode($respuesta);
                    $result = $resp -> feeds;
                    $tam = count($result);

                    for ($i=0; $i<$tam; $i++){
                        $j = $result[$i];
                        $valor = $j -> field3;
                        $time = $j -> created_at;
                        //$fecha = date('d-m-Y H:i:s', $time);
                        echo "<tr><td>$valor</td><td>$time</td></tr>";
                    }
                ?>
    </table>
    </div>
    <a class="btn" href="seleccion.php">Volver</a><br>
    <a class="btn" href="logout.php">Cerrar sesión</a>
        </body>
</html>