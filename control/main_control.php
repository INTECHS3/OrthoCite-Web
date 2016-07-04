<?php
function ConnectBdd()
{
	try
			{
				$bdd = new PDO('mysql:host='.HOST_SQL.';dbname='.DB_SQL.';charset=utf8', USER_SQL, PASS_SQL);
				return $bdd;
			}
		catch (Exception $e)
			{
        		return die('Erreur : ' . $e->getMessage());
			}
}


function printDifferentXmlDb()
{
	$req = ConnectBdd()->query("SHOW TABLES");

	echo '<div class="col-lg-12"><div class="table-responsive table-bordered">
            <table class="table">
                 <thead>
                    <tr>
                        <th>Nom du mini-jeu</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>';

    while ($data = $req->fetch()) 
    {
    	echo '<tr>
                        <td>'.$data[0].'</td>
                        <td></td>
              </tr>';
    }

    echo '            </tbody>
            </table>
    </div></div>';
}