<!DOCTYPE html>
<html>
<head>
        <?php

            $months = array("", "Jan", "Feb", "Mar", "Apr");
            $formbtn = 0;

        ?>
    <meta charset='UTF-8'>
    <title>2010 temperaturen</title>
    <style>
        table {border : 1px solid black}
        td {text-align : right}
    </style>
</head>
<body>
    <form action="" method="get">
        Maand: <select name="maand" onchange="this.form.submit()">
        <option value="0">selecteer een optie</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maart</option>
        <option value="4">April</option>
        </select></br>
        <input type="radio" id="Celsius" name="formtempbtn" value="0" required>
        <label for="Celsius">Celsius</label><br>
        <input type="radio" id="Farenheit" name="formtempbtn" value="1" required>
        <label for="Farenheit">Farenheit</label><br>
    </form>


    <h1>Maand: <?php echo $months[$maand]; ?></h1>

    <table>
    <tr><th>Dag</th><th>Minimum</th><th>Maximum</th></tr>



    <?php
        $formbtn = $_GET['formtempbtn'];
        if ($formbtn == 0) {
            foreach ($meting as $m)
            {
                $dag = $m->dagnr;
                $min = $m->minimum;
                $max = $m->maximum;
                echo "<tr><td>$dag</td><td>$min &deg;C</td><td>$max &deg;C</td></tr>";
            }
        }
        else if($formbtn == 1){
            foreach ($meting as $m)
            {
                $dag = $m->dagnr;
                $min = $m->minimum;
                $minfar = round((9*$min)/5+32, 1);
                $max = $m->maximum;
                $maxfar = round((9*$max)/5+32, 1);
                echo "<tr><td>$dag</td><td>$minfar &deg;F</td><td>$maxfar &deg;F</td></tr>";
            }
        }

    ?>

    </table>
</body>
</html>
