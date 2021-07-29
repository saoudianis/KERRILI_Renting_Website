<?php
    require 'vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/kerrili-firebase-adminsdk-h2y2z-d8a2a21d61.json');
    $firebase=(new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://kerrili-default-rtdb.firebaseio.com/')
        ->Create();
    
    $database = $firebase->getDatabase();
?>
<!-- The core Firebase JS SDK is always required and must be listed first -->
