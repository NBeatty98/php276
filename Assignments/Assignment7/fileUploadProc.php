<?php

require_once 'myCrud.php';

class FileUploadProc
{
  private $output = "";
  private $crud;

  public function __construct()
  {
    $this->crud = new Crud();
    $this->output = "";
  }
  function processFile()
  {
    global $output;

    if ($_FILES["file"]["error"] == 4) {
      $this->output = "No file was uploaded. Make sure you choose a file to upload.";
    } elseif ($_FILES["file"]["size"] > 100000 || $_FILES["file"]["error"] == 1) {
      $this->output = "The file is too large";
    } elseif ($_FILES["file"]["type"] != "application/pdf") {
      $this->output = "<p>PDF files only, thanks!</p>";
    } elseif (!move_uploaded_file($_FILES["file"]["tmp_name"], "pdfFolder/" . $_FILES["file"]["name"])) {
      $this->output = "<p>Sorry, there was a problem uploading that file.</p>";
    } else {
      $this->output = "<p>File has been added.</p>";
      // Move the uploaded PDF file to pdfFolder
      move_uploaded_file($_FILES["file"]["tmp_name"], "pdfFolder/" . $_FILES["file"]["name"]);

      $file_name = isset($_POST['fileName']) ? $_POST['fileName'] : '';
      $file_path = "pdfFolder/" . $_FILES["file"]["name"];
      $result = $this->crud->addFile($file_name, $file_path);

      if ($result === 'error') {
        $this->output = 'There was an error adding the file to the database.';
      }
    }
  }

  public function getOutput()
  {
    return $this->output;
  }
}


?>