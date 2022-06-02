<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$pages = require 'app/lib/route.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='../../public/css/style.css'>
    <link rel='stylesheet' href='../../public/css/dropDownMenuInterests.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Gemunu+Libre:wght@700&family=Inter:wght@500;600;700&family=Open+Sans:ital,wght@1,500;1,600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../public/js/Scripts/popup.js"></script>
    <script src="../../public/js/Scripts/myInterestsDropMenu.js"></script>
    <script src="../../public/js/Scripts/clock.js"></script>
    <script src="../../public/js/Scripts/myInterestsDropMenu.js"></script>
    <script src="../../public/js/Scripts/clock.js"></script>
    <title><?php if (isset($pages[$this->route['controller']][$this->route['action']])) {
            echo $pages[$this->route['controller']][$this->route['action']];
        } ?></title>
</head>
<body>
                    <?php include $this->path_content; ?>
                    <footer class="footer fixed-bottom bg-dark">
                        <div class="container-md text-muted gap-4 d-flex justify-content-center my-2 p-0">
                            <a class="footer-contact" href="https://vk.com/alexightgaz" target="_blank"><i class="fab fa-vk"></i></a>
                            <a class="footer-contact" href="/"><i class="fab fa-telegram-plane"></i></a>
                            <span>email: gazukin2002@mail.ru</span>
                            <span>tel1.: +7 (978) 777 77 77</span>
                            <span>tel2.: +7 (978) 888 88 88</span>
                        </div>
                    </footer>
                </div>
                <script src="../../public/js/Scripts/storageAboutMe.js"></script>
                <script src="../../public/js/Scripts/dateOfBirth.js"></script>
                <script src="../../public/js/Scripts/storageContact.js"></script>
                <script src="../../public/js/Scripts/storageEducation.js"</script>
                <script src="../../public/js/Scripts/storageInterests.js"></script>
</body>
</html>