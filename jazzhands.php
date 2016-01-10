<?php
    /**
     * Created by PhpStorm.
     * User: jbrayton
     * Date: 1/10/16
     * Time: 5:12 PM
     */
    $config = ["buildDirectory" => "../..", "outputDirectory" => "/build/php/", "outputFile" => "output.txt"];

    function jazzercise($path = null) {
        echo "Jazzercising...\n";
        $fileStream = fopen($path, "w") or die("Unable to write file: $path!");
        echo fgets($fileStream);
        for ($index = 1; $index <= 100; $index++) {
            $data = $index;

            if ($index % 3 === 0)
                $data = "Jazz";
            if ($index % 5 === 0)
                $data = "Hands";
            if ($index % 15 === 0)
                $data = "JazzHands";

            echo "$data\n";
            fwrite($fileStream, "$data\n");
        }
        fclose($fileStream);
    }

    $directory = $config["buildDirectory"].$config["outputDirectory"];
    $file = $directory.$config["outputFile"];
    echo "Output directory: $directory\n";
    echo "Output file: $file\n";

    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    jazzercise($file);
?>
