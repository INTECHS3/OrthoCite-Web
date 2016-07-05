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

function printDifferentGame($difXmlGame)
{


	echo '<div class="col-lg-12"><div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                 <thead>
                    <tr>
                        <th>Nom du mini-jeu</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>';

    foreach ($difXmlGame as $key => $value)
    {
    	echo '<tr>
                        <td>'.$value.'</td>
                        <td>
                            <a href="index.php?page=addWord&action=addInTheGame&name='.$key.'"><button type="button" class="btn btn-success">Ajouter</button></a>
                            <a href="index.php?page=addWord&action=viewWord&name='.$key.'&valid=1"><button type="button" class="btn btn-default">Mots Validés</button></a>
                            <a href="index.php?page=addWord&action=viewWord&name='.$key.'&valid=0"><button type="button" class="btn btn-warning">Mots en Attentes</button></a>
                        </td>
              </tr>';
    }

    echo '</tbody>
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

function printFormForAddInGame($name)
{
    $name = htmlspecialchars($name);

    echo 'Rappel des règles :';

    echo '  </br></br></br>
            <div class="row"><div class="col-lg-1"></div><div class="col-lg-4">
            <form role="form" action="index.php?page=addWord&action=addInGamePost&name='.$name.'" method="POST">';

    switch ($name) 
    {
        case 'doorgame':
            echo '
                    <label>Quartier : </label>
                    <select class="form-control" name="district">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                     </select>
                     </br>
                     <label>Nombre de porte </label>
                    <select class="form-control" name="porte">
                        <option>2</option>
                        <option>3</option>
                     </select>
                     </br>
                    <div class="form-group has-success">          
                    <label>Mot Valide</label>
                    <input id="inputSuccess" class="form-control" name="word_valid">
                    </div>    
                    <div class="form-group has-error">        
                    <label>Mot InValide 1</label>
                    <input id="inputError"class="form-control" name="word_invalid_1">
                    </br>           
                    <label>Mot InValide 2</label>
                    <input id="inputError"class="form-control" name="word_invalid_2">
                    </div>
                    <p class="help-block">Optionnel si vous choisissez 2 portes</p>
                    
                ';
            break;
        case 'platformer':
            echo '
                    <label>Quartier : </label>
                    <select class="form-control" name="district">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                     </select>
                     </br>
                     <div class="form-group has-success">   
                     <label>Mot Valide</label>
                    <input id="inputSuccess" class="form-control" name="word_valid">
                    </div>  
                    </br>           
                    <div class="form-group has-error">
                    <label>Mot InValide 1</label>
                    <input id="inputError" class="form-control" name="word_invalid_1">
                    </br>           
                    <label>Mot InValide 2</label>
                    <input id="inputError" class="form-control" name="word_invalid_2">
                    </br>           
                    <label>Mot InValide 3</label>
                    <input id="inputError" class="form-control" name="word_invalid_3">
                    </br>           
                    <label>Mot InValide 4</label>
                    <input id="inputError" class="form-control" name="word_invalid_4">
                    </br>   
                    </div>
                ';
            break;
        case 'rearranger':
            echo '
                    <label>Quartier : </label>
                    <select class="form-control" name="district">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                     </select>
                     </br>
                     <label>Mot</label>
                    <input class="form-control" name="word">
                    </br> 
                    
                ';
            break;
        case 'guessgame':
                echo '
                <label>Mot</label>
                    <input class="form-control" name="word">
                    </br> 
                    <label>Vrai ou Faux</label>
                    <select class="form-control" name="validornot">
                        <option value="true">Vrai</option>
                        <option value="false">Faux</option>
                     </select>
                     </br>';
            break;
        case 'stopgame':
            echo '<div class="col-lg-3">
            <div class="form-group has-error">
                <label>Mot Invalide</label>
                <input id="inputError" class="form-control" name="word_invalid">
                </br> 
                <label>Terminaison Mot Invalide</label>
                <input id="inputError" class="form-control" name="term_word_invalid"></div></div>
                <div class="col-lg-3">
                <div class="form-group has-success">
                <label>Mot Valide 1</label>
                <input id="inputSuccess" class="form-control" name="word_valid_1">
                </br> 
                <label>Terminaison Mot Valide 1</label>
                <input id="inputSuccess" class="form-control" name="term_word_valid_1">
                </br>
                <label>Mot Valide 2</label>
                <input id="inputSuccess" class="form-control" name="word_valid_2">
                </br> 
                <label>Terminaison Mot Valide 2</label>
                <input id="inputSuccess" class="form-control" name="term_word_valid_2">
                </br>
                <label>Mot Valide 3</label>
                <input id="inputSuccess" class="form-control" name="word_valid_3">
                </br> 
                <label>Terminaison Mot Valide 3</label>
                <input id="inputSuccess" class="form-control" name="term_word_valid_3"></div></div>
                </br>
                    ';
            break;
        case 'throwgame':
            echo '
                <label>Mot</label>
                    <input class="form-control" name="word">
                    </br> 
                    <label>Vrai ou Faux</label>
                    <select class="form-control" name="validornot">
                        <option value="true">Vrai</option>
                        <option value="false">Faux</option>
                     </select>
                     </br>';
            break;
        case 'superboss':
            echo '
                <label>Mot</label>
                    <input class="form-control" name="word">
                    </br>';
            break;
        default:
            redirectAddWord();
            break;
    }

    echo '                       <button type="submit" class="btn btn-default">Envoyer</button>
                        <button type="reset" class="btn btn-default">Réinitialiser</button>
                </form></div></div>';
}

function redirectAddWord()
{
    echo '<SCRIPT LANGUAGE="JavaScript">
                                document.location.href="index.php?page=addWord"
                                </SCRIPT>';
}
function redirectAddWordGood()
{
    echo '<SCRIPT LANGUAGE="JavaScript">
                                document.location.href="index.php?page=addWord&actionSuccess"
                                </SCRIPT>';
}

function addInDoorGame($district, $porte, $word_valid, $word_invalid_1, $word_invalid_2)
{
    if($porte == 3)
    {
        $req = ConnectBdd()->prepare("INSERT INTO doorgame_1(word_valid, word_invalid_1, word_invalid_2, district) VALUES(:word_valid, :word_invalid_1, :word_invalid_2, :district)");
        $req->execute(array('word_valid' => htmlspecialchars($word_valid), 
                            'word_invalid_1' => htmlspecialchars($word_invalid_1), 
                            'word_invalid_2' => htmlspecialchars($word_invalid_2), 
                            'district' => htmlspecialchars($district)));
        redirectAddWordGood();
    }
    else
    {
        $req = ConnectBdd()->prepare("INSERT INTO doorgame_2(word_valid, word_invalid, district) VALUES(:word_valid, :word_invalid_1, :district)");
        $req->execute(array('word_valid' => htmlspecialchars($word_valid), 
                            'word_invalid_1' => htmlspecialchars($word_invalid_1), 
                            'district' => htmlspecialchars($district)));
        redirectAddWordGood();
    }

}

function addInPlatformer($district, $word_valid, $word_invalid_1, $word_invalid_2, $word_invalid_3, $word_invalid_4)
{
    $req = ConnectBdd()->prepare("INSERT INTO platformer(word_valid, word_invalid_1, word_invalid_2, word_invalid_3, word_invalid_4, district) VALUES(:word_valid, :word_invalid_1, :word_invalid_2, :word_invalid_3, :word_invalid_4, :district)");
    $req->execute(array('word_valid' => htmlspecialchars($word_valid), 
                            'word_invalid_1' => htmlspecialchars($word_invalid_1), 
                            'word_invalid_2' => htmlspecialchars($word_invalid_2), 
                            'word_invalid_3' => htmlspecialchars($word_invalid_3), 
                            'word_invalid_4' => htmlspecialchars($word_invalid_4), 
                            'district' => htmlspecialchars($district)));
    redirectAddWordGood();
}

function addInRearranger($district, $word)
{
    $req = ConnectBdd()->prepare("INSERT INTO rearranger(word, district) VALUES(:word, :district)");
    $req->execute(array('word' => $word, 
                        'district' => $district));
    redirectAddWordGood();
}

function addInGuessGame($word, $validornot)
{
    $req = ConnectBdd()->prepare("INSERT INTO guessgame(word, validornot) VALUES(:word, :validornot)");

    if($validornot == "true") $validornot = 1;
    else  $validornot = 0;

    $req->execute(array('word' => $word,
                        'validornot' => $validornot));

    redirectAddWordGood();
}

function addInStopGame($word_invalid, $term_word_invalid, $word_valid_1, $term_word_valid_1, $word_valid_2, $term_word_valid_2, $word_valid_3, $term_word_valid_3)
{
    $req = connectbdd()->prepare("INSERT INTO stopgame(word_invalid, term_word_invalid, word_valid_1, term_word_valid_1, word_valid_2, term_word_valid_2, word_valid_3, term_word_valid_3) VALUES(:word_invalid, :term_word_invalid, :word_valid_1, :term_word_valid_1, :word_valid_2, :term_word_valid_2, :word_valid_3, :term_word_valid_3)");
    $req->execute(array('word_invalid' => $word_invalid, 
                        'term_word_invalid' => $term_word_invalid, 
                        'word_valid_1' => $word_valid_1, 
                        'term_word_valid_1' => $term_word_valid_1, 
                        'word_valid_2' => $word_valid_2, 
                        'term_word_valid_2' => $term_word_valid_2, 
                        'word_valid_3' => $word_valid_3, 
                        'term_word_valid_3' => $term_word_valid_3));

   redirectAddWordGood();
}

function addInThrowGame($word, $validornot)
{
    $req = ConnectBdd()->prepare("INSERT INTO throwgame(word, validornot) VALUES(:word, :validornot)");

    if($validornot == "true") $validornot = 1;
    else  $validornot = 0;

    $req->execute(array('word' => $word,
                        'validornot' => $validornot));

    redirectAddWordGood();
}

function addInSuperBoss($word)
{
    $req = connectbdd()->prepare("INSERT INTO superboss(word) VALUES(:word)");
    $req->execute(array("word" => $word));

    redirectAddWordGood();
}

function intAllWordValid()
{
    $count = 0;

    $req = ConnectBdd()->query("SELECT count(*) as result FROM doorgame_1 WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM doorgame_2 WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM platformer WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM rearranger WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM superboss WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM throwgame WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM stopgame WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM guessgame WHERE valid=1");
    $req = $req->fetch();

    $count += $req["result"];

    return $count;
}

function intAllWordInvalid()
{
    $count = 0;

    $req = ConnectBdd()->query("SELECT count(*) as result FROM doorgame_1 WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM doorgame_2 WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM platformer WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM rearranger WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM superboss WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM throwgame WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM stopgame WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    $req = ConnectBdd()->query("SELECT count(*) as result FROM guessgame WHERE valid=0");
    $req = $req->fetch();

    $count += $req["result"];

    return $count;
}

function lookWords($name, $valid, $difXmlGame)
{
    echo '<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des mots ';
    if($valid == 1) echo "Valides ";
    else echo "Invalides ";

    echo': '.strtoupper(htmlspecialchars($difXmlGame[$name])).'
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">';
                                    
    switch ($name) 
    {
        case 'doorgame':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM doorgame_1 WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        $req_2 = ConnectBdd()->prepare("SELECT * FROM doorgame_2 WHERE valid = :valid");
        $req_2->execute(array("valid" => $valid));

        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot Valide</th>
                    <th>Mot Invalide 1 </th>
                    <th>Mot Invalide 2</th>
                    <th>Portes</th>
                    <th>Quartier</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td style="color:green">'.$data[1].'</td>
                    <td style="color:red">'.$data[2].'</td>
                    <td style="color:red">'.$data[3].'</td>
                    <td>3</td>
                    <td>'.$data[5].'</td>
                 </tr>';
        }
        while ($data = $req_2->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td style="color:green">'.$data[1].'</td>
                    <td style="color:red">'.$data[2].'</td>
                    <td style="color:red"></td>
                    <td>2</td>
                    <td>'.$data[4].'</td>
                 </tr>';
        }


        echo "</tbody>";

                                   
            break;
        case 'platformer':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM platformer WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot Valide</th>
                    <th>Mot Invalide 1 </th>
                    <th>Mot Invalide 2</th>
                    <th>Mot Invalide 3</th>
                    <th>Mot Invalide 4</th>
                    <th>Quartier</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td style="color:green">'.$data[1].'</td>
                    <td style="color:red">'.$data[2].'</td>
                    <td style="color:red">'.$data[3].'</td>
                    <td style="color:red">'.$data[4].'</td>
                    <td style="color:red">'.$data[5].'</td>
                    <td>'.$data[7].'</td>
                 </tr>';
        }

        echo "</tbody>";
            break;
        case 'rearranger':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM rearranger WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot</th>
                    <th>Quartier</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td>'.$data[1].'</td>
                    <td>'.$data[3].'</td>
                 </tr>';
        }

        echo "</tbody>";
            break;
        case 'guessgame':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM guessgame WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot</th>
                    <th>Valide ou Non</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td>'.$data[1].'</td>
                    ';
            if($data[2] == 1) echo '<td style="color:green"> Oui </td>';
            else echo '<td style="color:red"> Non </td>';

            echo'  </tr>';
        }

        echo "</tbody>";
            break;
        case 'stopgame':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM stopgame WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot Invalide - Terminaison</th>
                    <th>Mot Valide 1 - Terminaison</th>
                    <th>Mot Valide 2 - Terminaison</th>
                    <th>Mot Valide 3 - Terminaison</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td style="color:red">'.$data[1].' - '.$data[2].'</td>
                    <td style="color:green">'.$data[3].' - '.$data[4].'</td>
                    <td style="color:green">'.$data[5].' - '.$data[6].'</td>
                    <td style="color:green">'.$data[7].' - '.$data[8].'</td>
                 </tr>';
        }

        echo "</tbody>";
            break;
        case 'throwgame':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM throwgame WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot</th>
                    <th>Valide ou Non</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td>'.$data[1].'</td>
                    ';
            if($data[2] == 1) echo '<td style="color:green"> Oui </td>';
            else echo '<td style="color:red"> Non </td>';

            echo'  </tr>';
        }

        echo "</tbody>";
            break;
        case 'superboss':
        if(!is_numeric($valid)) return;
        $req = ConnectBdd()->prepare("SELECT * FROM superboss WHERE valid = :valid");
        $req->execute(array("valid" => $valid));
        echo '<thead>
                <tr>
                    <th>ID</th>
                    <th>Mot</th>
                 </tr>
               </thead><tbody>';


        while ($data = $req->fetch()) 
        {
           echo '<tr>
                    <td>'.$data[0].'</td>
                    <td>'.$data[1].'</td>
                </tr>';
        }

        echo "</tbody>";
            break;
        
        default:
            redirectAddWord();
            break;
    }
    echo '
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>';
}