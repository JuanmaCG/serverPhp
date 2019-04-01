
<?php
$filecontent = file_get_contents("../descargas/curriculum.txt");


echo  nl2br($filecontent);

