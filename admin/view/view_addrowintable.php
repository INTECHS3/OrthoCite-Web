<?php
$reqDescribe = describeOneTable($_GET["name"]);


echo '<table class="table table-striped table-bordered table-hover">
                                    <thead><tr>';

$a = 0;
while($query = $reqDescribe->fetch())
{
    echo "<th>".$query[0]." ".$query[1]."</th>";
    $a++;
}                                
echo '<th>Actions</th></tr></thead><tbody>';


echo '<tr><form method="POST" action="index.php?page=AddRowSql&name='.$_GET["name"].'">';
    for($e = 0; $e < $a; $e++)
    {
        if($e == 0) echo "<td>ID : AutoIncrement</td>";
        else echo '<td><input type="text" name="data['.($e-1).']"></td>';
    }                                    
echo '<td><input type="submit" class="btn btn-success" value="Add"></td></tr></tbody></table>';                                    
?>