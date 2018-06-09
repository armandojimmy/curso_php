<?php


    $urlLang= $_GET["lang"];
    $urlText= $_GET["text"];
    $title="Traductor";
   

    function traslate(string $text, string $urlLang = "es"): string
    {
     $result = ""; 
        if( file_exists(".\\" . $urlLang . "\\translate.txt"))
        {
            $archivo = fopen(".\\" . $urlLang . "\\translate.txt","r");
            while ( !feof( $archivo))
            {
                $splitArray = explode ( "|" , fgets($archivo)); 
                $dictionary[trim ($splitArray[0])]  = trim ($splitArray[1]);
            }
            var_dump ( $dictionary);
            echo "texto:" . $text;
            echo "val:" . $dictionary[$text];
            array_key_exists($text, $dictionary) ? $result =  $dictionary[$text] : $result =  "no existe";
       }
       else
       {
            $result = $text;
       }
       return $result;
    }
?>
<!doctype html>

<html lang=<?php echo $lang ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<h1>
<?php
    echo traslate($urlText,$urlLang);
?>
</h1>
</body>
</html>

