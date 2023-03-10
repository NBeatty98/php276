<?php
class Directories{

    public function addFolder() {

        $output=array();
        if(isset($_POST['submitButton'])) {
            if (!isset($_POST['folderName']) || !isset($_POST['fileContent'])) {
                $output['message'] ='Please enter a directory name and file content.';
                return $output;
            }
    
            $dirName = ($_POST['folderName']);
    
            if (is_dir('directories/' . $dirName)) {
                $output['message'] = 'A directory already exists with that name.';
                return $output;
            }
    
            mkdir("directories/$dirName", 0777);
        
            $fileText = ($_POST['fileContent']);
            touch("directories/$dirName/readme.txt");
            $file = fopen("directories/$dirName/readme.txt", "w+");
            fwrite($file, $fileText);
            fclose($file);
    
            $path = "<p><a href='https://russet-v8.wccnet.edu/~nbeatty/php276/Assignments/Assignment5/directories/$dirName/readme.txt'>Path to file</a></p>";
    
            $output = array(
                'message' => "Directory and file were created.",
                'path' => $path
            );
        }
        else{
            $output = "";
          }

        return $output;
    }
}
?>