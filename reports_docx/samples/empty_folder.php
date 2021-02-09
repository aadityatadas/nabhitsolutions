<?php 
// PHP program to delete all 
// file from a folder 
   
// Folder path to be flushed 

if(isset($_POST['f'])){
$folder_path = $_POST['f']; 
   
// List of name of files inside 
// specified folder 
$files = glob('results/'.$folder_path.'/*');  
   
// Deleting all the files in the list 
foreach($files as $file) { 
   
    if(is_file($file))  
    
        // Delete the given file 
        unlink($file);  
} 
}
?> 