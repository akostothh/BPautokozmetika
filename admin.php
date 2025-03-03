<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>felhasználónév</th>
            <th>dátum</th>
            <th>státusz</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'kapcsolat.php';
        $sql = 'SELECT uid, unick, udatum, ustatusz FROM user';
        $userek = mysqli_query($adb, $sql);

        while ($sor = mysqli_fetch_assoc($userek)) {
            echo "<tr>";
            echo "<td>" . $sor['uid'] . "</td>";
            echo "<td>" . $sor['unick'] . "</td>";
            echo "<td>" . $sor['udatum'] . "</td>";
            echo "<td>" . $sor['ustatusz'] . "</td>";
            echo "<td> <form method='POST' action='userdelete.php'> <input type='hidden' name='uid' value='". $sor['uid'] . "'><button type='submit' >törlés</button> </form> </td>";
            echo "</tr>";

            
        }
        ?>
    </tbody>
</table>
