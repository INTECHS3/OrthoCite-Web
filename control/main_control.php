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
function doorGame()
{
    $req = ConnectBdd()->query("SELECT * FROM doorgame_1 WHERE valid = 1");
    $dom = new DomDocument("1.0", "UTF-8");
    $sentence = array();
    $count = 0;
    $dictionary = $dom->createElement('dictionary');
    $district1 = $dom->createElement('district');
    $district1->setAttribute('id', '1');
    $dictionary->appendChild($district1);
    $district2 = $dom->createElement('district');
    $district2->setAttribute('id', '2');
    $dictionary->appendChild($district2);
    $district3 = $dom->createElement('district');
    $district3->setAttribute('id', '3');
    $dictionary->appendChild($district3);
    $district4 = $dom->createElement('district');
    $district4->setAttribute('id', '4');
    $dictionary->appendChild($district4);
    $dom->appendChild( $dictionary );
    while($data = $req->fetch())
    {
        if($data['district'] == 1)
        {
            $sentence[$count] = $dom->createElement('sentence');
        $district1->appendChild($sentence[$count]);
        $sentence[$count]->appendChild($dom->createElement('valid', $data['word_valid']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_1']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_2']));
        }
        else if($data['district'] == 2)
        {
            $sentence[$count] = $dom->createElement('sentence');
        $district2->appendChild($sentence[$count]);
        $sentence[$count]->appendChild($dom->createElement('valid', $data['word_valid']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_1']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_2']));
        }
        else if($data['district'] == 3)
        {
            $sentence[$count] = $dom->createElement('sentence');
        $district3->appendChild($sentence[$count]);
        $sentence[$count]->appendChild($dom->createElement('valid', $data['word_valid']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_1']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_2']));
        }
        else if($data['district'] == 4)
        {
            $sentence[$count] = $dom->createElement('sentence');
        $district4->appendChild($sentence[$count]);
        $sentence[$count]->appendChild($dom->createElement('valid', $data['word_valid']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_1']));
        $sentence[$count]->appendChild($dom->createElement('invalid', $data['word_invalid_2']));
        }
        
        $count++;
    }
    $xml = $dom->saveXML();
    return $xml;



}