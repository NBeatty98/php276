<?php
require_once 'PDO_methods.php';

class Crud extends PdoMethods
{

  public function getFiles($type)
  {

    /* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
    $pdo = new PdoMethods();

    /* CREATE THE SQL */
    $sql = "SELECT * FROM pdf_table";

    //PROCESS THE SQL AND GET THE RESULTS
    $records = $pdo->selectNotBinded($sql);

    /* IF THERE WAS AN ERROR DISPLAY MESSAGE */
    if ($records == 'error') {
      return 'There has been and error processing your request';
    } else {
      if (count($records) != 0) {
        if ($type == 'list') {
          return $this->createList($records);
        }
        if ($type == 'input') {
          return $this->createInput($records);
        }
      } else {
        return 'no names found';
      }
    }
  }

  private function createList($records)
  {
    $list = '<ul>';
    foreach ($records as $row) {
      $list .= "<li><a href={$row['file_path']}>{$row['file_name']}</a></li>";
    }
    $list .= '</ul>';
    return $list;
  }

  public function addFile($file_name, $file_path)
  {

    $pdo = new PdoMethods();

    /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
    $sql = "INSERT INTO pdf_table (file_name, file_path) VALUES (:fname, :fpath)";


    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
    $bindings = [
      [':fname', $file_name, 'str'],
      [':fpath', $file_path, 'str']
    ];

    /* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
    $result = $pdo->otherBinded($sql, $bindings);

    /* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
    if ($result === 'error') {
      return 'There was an error adding the name';
    } else {
      return 'Name has been added';
    }
  }
}
?>