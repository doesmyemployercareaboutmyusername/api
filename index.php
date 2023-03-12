<?php
require_once __DIR__ . '/config.php';
class API {
  // Rewrite into dependecy injection
  function Select(){
    $db = new Connect;
    $users = array();
    $data = $db->prepare('SELECT * FROM users ORDER BY id');
    $data->execute();
    while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
      $users[$OutputData['id']] = array(
        'id' => $OutputData['id'],
        'name' => $OutputData['name'],
        'age' => $OutputData['age']
      );
    }
    return json_encode($users);
  }
}

$API = new API;
// The header communicates with the brwoser about the output
header('Content-Type: application/json');
echo $API->Select();
 ?>
