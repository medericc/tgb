<?php
// Inclure le script login.php
include '../login/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../sass/styles.css">
    <title>Carla Leite</title>
  
</head>
<body>
    <div id="header" style="margin-bottom:40px">
        
    </div>
    <main>
        <h1 style="margin-bottom:40px">En Clubs</h1>
    
            <div class="table-container">
                <div class="scrollable-table center-table">
                    <table id="myTable" class="table table-striped table-bordered">
                    <tr>
                    <th onclick="sortByColumn(0)">SAISON</th>
                    <th onclick="sortByColumn(1)">ANNEE</th>
<th onclick="sortByColumn(2)">CHAMPIONNAT</th>
<th onclick="sortByColumn(3)">ADVERSAIRE</th>
<th onclick="sortByColumn(4)">PTS</th>
<th onclick="sortByColumn(5)">RBD</th>
<th onclick="sortByColumn(6)">AST</th>
<th onclick="sortByColumn(7)">STL</th>
<th onclick="sortByColumn(8)">BLK</th>
<th onclick="sortByColumn(9)">P</th>
<th onclick="sortByColumn(10)">PA</th>
<th onclick="sortByColumn(11)">3P</th>
<th onclick="sortByColumn(12)">3PA</th>
<th onclick="sortByColumn(13)">1P</th>
<th onclick="sortByColumn(14)">1PA</th>
<th onclick="sortByColumn(15)">TO</th>
<th onclick="sortByColumn(16)">EFF</th>
<th onclick="sortByColumn(17)">MIN</th>
</tr>
                        <?php 
// Compter le nombre de lignes qui correspondent à la condition pas 'EURO U20'
$euroU20RowCount = 0;
foreach ($donnees as $row) {
   
        if (strpos($row['CHAMPIONNAT'], 'EURO U') === false) {
        $euroU20RowCount++;
    }
}
?>

<?php
// Parcourir le tableau $donnees dans l'ordre inverse
for ($i = count($donnees) - 1; $i >= 0; $i--):
    $row = $donnees[$i];
    // Vérifier si le championnat n'est 'EURO U20'
    if (strpos($row['CHAMPIONNAT'], 'EURO U') === false): ?>

    <tr>
       
    <td><?php echo $row['SAISON']; ?></td>
                            <td><?php echo $row['ANNEE']; ?></td>
                            <td><?php echo $row['CHAMPIONNAT']; ?></td>
                            <td><?php echo $row['ADVERSAIRE']; ?></td>
                            <td><?php echo $row['PTS']; ?></td>
                            <td><?php echo $row['RBD']; ?></td>
                            <td><?php echo $row['AST']; ?></td>
                            <td><?php echo $row['STL']; ?></td>
                            <td><?php echo $row['BLK']; ?></td>
                            <td><?php echo $row['P']; ?></td>
                            <td><?php echo $row['PA']; ?></td>
                            <td><?php echo $row['3P']; ?></td>
                            <td><?php echo $row['3PA']; ?></td>
                            <td><?php echo $row['1P']; ?></td>
                            <td><?php echo $row['1PA']; ?></td>
                            <td><?php echo $row['TON']; ?></td>
                            <td><?php echo $row['EFF']; ?></td>
                            <td><?php echo $row['MIN']; ?></td>
    </tr>
<?php
    endif;
endfor;
?>
<tr>

                        <?php 
// Initialiser la somme des points
$totalPoints = 0;
$totalRebonds = 0;
$totalAssists = 0;
$totalSTL = 0;
$totalBLK = 0;
$totalP = 0;
$totalPAT = 0;
$total3P = 0;
$total3PA = 0;
$total1P = 0;
$total1PA = 0;
$totalTO = 0;
$totalEFF = 0;
$totalMIN = 0;

// Boucle à travers les données pour calculer la somme des points
foreach ($donnees as $row) {
    // Vérifier si le championnat n'est Euro U20
    if (strpos($row['CHAMPIONNAT'], 'EURO U') === false) {
       
        $totalPoints += $row['PTS'];
        $totalRebonds += $row['RBD'];
        $totalAssists += $row['AST'];
        $totalSTL += $row['STL'];
        $totalBLK += $row['BLK'];
        $totalP += $row['P'];
        $totalPAT += $row['PA'];
        $total3P += $row['3P'];
        $total3PA += $row['3PA'];
        $total1P += $row['1P'];
        $total1PA += $row['1PA'];
        $totalTO += $row['TON'];
        $totalEFF += $row['EFF'];
        $totalMIN += $row['MIN'];

    }
}
?>  </table>
</div>
</div>
<table class="table table-striped table-bordered" style="margin-top: 5em">
<tr>
                    <th onclick="sortByColumn(0)">SAISON</th>
                    <th onclick="sortByColumn(1)">ANNEE</th>
<th onclick="sortByColumn(2)">CHAMPIONNAT</th>
<th onclick="sortByColumn(3)">ADVERSAIRE</th>
<th onclick="sortByColumn(4)">PTS</th>
<th onclick="sortByColumn(5)">RBD</th>
<th onclick="sortByColumn(6)">AST</th>
<th onclick="sortByColumn(7)">STL</th>
<th onclick="sortByColumn(8)">BLK</th>
<th onclick="sortByColumn(9)">P</th>
<th onclick="sortByColumn(10)">PA</th>
<th onclick="sortByColumn(11)">3P</th>
<th onclick="sortByColumn(12)">3PA</th>
<th onclick="sortByColumn(13)">1P</th>
<th onclick="sortByColumn(14)">1PA</th>
<th onclick="sortByColumn(15)">TO</th>
<th onclick="sortByColumn(16)">EFF</th>
<th onclick="sortByColumn(17)">MIN</th>
</tr>
<tr>
<th colspan="4">Total</th> <!-- Colonne 1-3 fusionnées -->
    <th><?php echo $totalPoints; ?></th> <!-- Colonne PTS -->
    <th><?php echo $totalRebonds; ?></th> <!-- Colonne RBD -->
    <th><?php echo $totalAssists; ?></th> <!-- Colonne AST -->
    <th><?php echo $totalSTL; ?></th> <!-- Colonne STL -->
    <th><?php echo $totalBLK; ?></th> <!-- Colonne BLK -->
    <th><?php echo $totalP; ?></th> <!-- Colonne P -->
    <th><?php echo $totalPAT; ?></th> <!-- Colonne PA -->
    <th><?php echo $total3P; ?></th> <!-- Colonne 3P -->
    <th><?php echo $total3PA; ?></th> <!-- Colonne 3PA -->
    <th><?php echo $total1P; ?></th> <!-- Colonne 1P -->
    <th><?php echo $total1PA; ?></th> <!-- Colonne 1PA -->
    <th><?php echo $totalTO; ?></th> <!-- Colonne TO -->
    <th><?php echo $totalEFF; ?></th> <!-- Colonne EFF -->
    <th><?php echo $totalMIN; ?></th> <!-- Colonne MIN -->
</tr>

<tr>
    <th colspan="4">Moyenne</th>
    <th><?php echo number_format($totalPoints / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalRebonds / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalAssists / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalSTL / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalBLK / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalP / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalPAT / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($total3P / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($total3PA / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($total1P / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($total1PA / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalTO / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalEFF / $euroU20RowCount, 1); ?></th>
    <th><?php echo number_format($totalMIN / $euroU20RowCount, 1); ?></th>
</tr>
</table>





                  
        
    </main>
    <div id="footer"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/add2.js"></script>
    <script src="../js/tri.js"></script>
</body>
</html>
