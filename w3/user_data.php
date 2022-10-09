<?php 
echo '<h1>USER DATA PAGE</h1>';
if(!empty($_POST)){
    $fp = fopen('userdata.csv','a');
    fwrite($fp, $_POST['name'].' ');
    fclose($fp);
    echo 'File Added Succesfully<br>';
    print_r($_POST);
}else{
    echo 'No data entered';
}