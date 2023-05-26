<!DOCTYPE html>

<html lang = "pl">
    <head>
        <title>Tabelka</title>
        <style>
            table, tr, td, th{
                border: 1px solid #4FB3BF;
                border-collapse: collapse;
                padding: 4px;
            }
            tr {
            }

        </style>
    </head>
    <body>
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

            if(!$conn) {
                echo "Błąd połączenia z bazą.";
            } else {
                $q = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3";
                $result = mysqli_query($conn, $q);
                $i = 0;
                while($i < mysqli_num_rows($result)) {
                    $i++;
                    $p = mysqli_fetch_array($result);
                    echo "<li>".$p['nazwa']." pływa w rzece ".$p['akwen'].", ".$p['wojewodztwo']."</li>";
                }
            }
        ?>
        </ol>
        <h3>Ryby drapieżne naszych wód</h3>
        <table id = "tb">
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
                            if(!$conn) {
                                echo "Błąd połączenia z bazą.";
                            } else {
                                $q2 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
                                $result2 = mysqli_query($conn, $q2);
                                $j = 0;
                                while($j < mysqli_num_rows($result2)) {
                                    $j++;
                                    $r = mysqli_fetch_array($result2);
                                    echo "<tr>
                                    <td>".$r['id']."</td>
                                    <td>".$r['nazwa']."</td>
                                    <td>".$r['wystepowanie']."</td>
                                    </tr>";
                                }
                            }

                

            ?>
        </table>
    </body>
</html>