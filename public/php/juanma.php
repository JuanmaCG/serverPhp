<?php
$filecontent = file("../descargas/curriculum.txt");

for($i = 0; $i < sizeof($filecontent); $i++){
    echo $filecontent[$i];
}
