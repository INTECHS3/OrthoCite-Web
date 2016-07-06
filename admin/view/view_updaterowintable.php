<?php
$reqDescribe = describeOneTable($_GET["name"]);
$reqSelect = selectIdFromTable($_GET['name'], $_GET['id']);

echo '<table class="table table-striped table-bordered table-hover">
                                    <thead><tr>';

$a = 0;
while($query = $reqDescribe->fetch())
{
    echo "<th>".$query[0]." ".$query[1]."</th>";
    $a++;
}                                
echo '<th>Actions</th></tr></thead><tbody>';


echo '<tr><form method="POST" action="index.php?page=updateOneRowFromTable&name='.$_GET["name"].'&id='.$_GET["id"].'">';

    for($e = 0; $e < $a; $e++)
    {
        if($e == 0) echo "<td>ID : ".$_GET['id']."</td>";
        else echo '<td><input type="text" name="data['.($e-1).']" value="'.$reqSelect[$e].'"></td>';
    }                                    
echo '<td><input type="submit" class="btn btn-success" value="Mettre à jour"></td></tr></tbody></table>';                                    
?>