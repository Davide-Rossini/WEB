<?php
if(isset($_POST["pomeridiano"])){
    echo "Ciao ";
}
else{
    header("Location: elenco2.php");
    exit;
} 

?>