<?php
$req = selectOneTable($_GET["name"]);
$reqDescribe = describeOneTable($_GET["name"]);


echo '<div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead><tr>';
$a = 0;
while($query = $reqDescribe->fetch())
{
    echo "<th>".$query[0]." ".$query[1]."</th>";
    $a++;
}                                
echo '<th>Actions</th></tr></thead>
                                    <tbody>';



$i = 0;                                                                       
while ($query = $req->fetch()) 
{
	echo '<tr>';
    for($e = 0; $e < $a; $e++)
    {
        echo "<td>".$query[$e]."</td>";
    }
                                     
    echo    '<td><a href="index.php?page=deleteOneRowFromTable&name='.$_GET["name"].'&id='.$query["id"].'"><button type="button" class="btn btn-danger">Supprimer</button></a>
                 <a href="index.php?page=updateOneRowFromTableForm&name='.$_GET["name"].'&id='.$query["id"].'"><button type="button" class="btn btn-warning">Mettre à jour</button></a></td></tr>';
$i++;
}


if($i == 0)
{
    for ($e=0; $e < $a; $e++) 
    { 
        if($e == 0) echo "<td>Aucune ligne</td>";
        else echo "<td></td>";
    }
    echo "<td></td>";
}

echo '</tbody></table></div><a href="index.php?page=addOneRowFromTable&name='.$_GET["name"].'"><button type="button" class="btn btn-success">Ajouter</button></a>';
?>