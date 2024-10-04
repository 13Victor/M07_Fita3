<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex31</title>
    <style>
        h1 {
            text-align: center;
        }

        table {
            border: 2px solid #000;
            border-collapse: collapse;
            margin: auto;
            width: 500px;
            background-color: #cce2ff;
        }

        td, th {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            text-transform: uppercase;
            text-align: center;
            background-color: #add0ff;
        }

        td:not(:last-child) {
            padding-left: 5px;
        }

        td:last-child {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Processa contactes</h1>
    <?php
        $contactes = fopen("contactes31.txt", "r");
        $array_contactes = [];

        while (($line = fgets($contactes)) == true) {
            $line = explode(",", trim($line));
            array_push($array_contactes, $line);
        }
        fclose($contactes);
    ?>

    <table>
        <tr>
            <th>Nom</th>
            <th>Cognom 1</th>
            <th>Cognom 2</th>
            <th>Telèfon</th>
        </tr>
        <?php
            foreach ($array_contactes as $user) {
                echo "<tr>";
                foreach ($user as $user_data) {
                    echo "<td>$user_data</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    <?php
        $contactes_2 = fopen("contactes31b.txt", "w");

        foreach ($array_contactes as $user) {
            $linea_nova = implode("#", $user);
            fwrite($contactes_2, $linea_nova . "\n");
        }

        fclose($contactes_2);
    ?>
</body>
</html>
