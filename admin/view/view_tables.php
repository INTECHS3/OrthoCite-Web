<?php
$req = selectAllTable();
echo '<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        
$i = 1;                                    
while ($query = $req->fetch()) 
{
	echo '<tr>
                                            <td>'.$i++.'</td>
                                            <td>'.$query[0].'</td>
                                            <td>
                                                <a href="?page=ViewTable&name='.$query[0].'"><button type="button" class="btn btn-success">Voir</button></a>
                                           </td>
                                           
        </tr>';

}
if($i == 1) echo '<tr>
                                            <td>Aucune table</td>
                                            <td></td>
                                            <td>
                                           </td>
                                           
                    </tr>';
echo '</tbody></table>';
?>