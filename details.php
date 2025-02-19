<?php
$folder = htmlentities($_GET["folder"]);
$folder_name_cleaned = str_replace('-', ' ', $folder);
$root_folder = "patisseries";

$textFile = "$root_folder/$folder/name.txt";
$altPastryName = $folder_name_cleaned;
if (file_exists($textFile) && ($fp = fopen($textFile, "r")) !== false) {
    $altPastryName = stream_get_contents($fp);
    fclose($fp);
}

$lowercase_folder = strtolower($folder);
$list_imgs_folder = glob("$root_folder/{$lowercase_folder}/*.jpg");

$protocol = 'http://';
if (
    isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
) {
    $protocol = 'https://';
}

$current_url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $altPastryName; ?> - Pâtisseries faites maison</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🍰</text></svg>">

    <meta property="og:title" content="<?php echo $altPastryName; ?> - Pâtisseries faites maison">
    <!-- <meta property="og:site_name" content=""> -->
    <meta property="og:url" content="<?php echo $current_url; ?>">
    <!-- <meta property="og:description" content=""> -->
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/" . $list_imgs_folder[0]; ?>">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:secure_url" content="<?php echo $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/" . $list_imgs_folder[0]; ?>">
    <meta property="og:image:width" content="1200" />

    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <main class="main">
        <header class="nav-header">
            <h1 class="header-title"><?php echo $altPastryName; ?></h1>
            <a href="index.php" class="link-details">Accueil</a>
        </header>

        <ul class="details">
            <?php
            foreach ($list_imgs_folder as $idx => $img) {
                echo "
                <li class='details-item'>
                  <figure>
                    <img src='{$img}' alt='{$folder}-{$idx}' loading='lazy'>
                  </figure>
                </li>";
            }
            ?>
        </ul>

        <?php
        if (empty($list_imgs_folder)) {
            echo "<p class='unknown-pastry'>Il semblerait que ”{$folder}” n'existe pas. A faire un jour peut-être.</p>";
        }
        ?>
    </main>
    <footer class="nav-footer">
        <a href="#top" class="link-details">Remonter</a>
    </footer>
</body>

</html>
