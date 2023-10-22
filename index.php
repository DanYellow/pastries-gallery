<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pâtisseries faites maison</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🍰</text></svg>">
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="main">
        <header>
            <h1 class="header-title">🍰 Pâtisseries !</h1>
        </header>

        <ul class="gallery">
            <?php
                $list_imgs = glob('patisseries/*.jpg');
                foreach ($list_imgs as $img) {
                    $img_info = pathinfo($img);

                    echo "
                        <li class='gallery-item'>
                            <a class='gallery-item-link' aria-label='{$img_info['filename']}' href='details.php?folder={$img_info['filename']}'>
                                <img src='{$img}' alt='' loading='lazy'>
                            </a>
                        </li>
                    ";
                }
            ?>
        </ul>
    </main>
</body>
</html>