<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];


    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }


    $filename = substr(md5(uniqid()), 0, rand(8, 10));


    $directory = "f/$filename";
    if (!file_exists($directory)) {
        mkdir($directory, 0755, true);
    }


    $content = "<?php header('Location: $url'); ?>";
    file_put_contents("$directory/index.php", $content);


    $domain = $_SERVER['HTTP_HOST'];


    $shortUrl = "http://" . $domain . "/$directory";

    echo "$shortUrl";
}
?>

