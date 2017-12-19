<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo  $title; ?></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/shared<?php echo $env_suffix?>.css">
    <!--[if lt IE 9]>
    <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= $this->Html->meta('icon') ?>
    <!-- Global site tag (gtag.js) - Google AdWords: 959718445 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-959718445"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

      gtag('config', 'AW-959718445');
    </script>

<?php    

    if($_SERVER['REQUEST_URI']){
?>
        <!-- Event snippet for JSH Conversion conversion page -->
        <script>
        gtag('event', 'conversion', {'send_to': 'AW-959718445/G_s5COTCznoQrcjQyQM'});
        </script>
<?php
    }
?>
</head>

<body>
<?php
    debug($_SERVER['REQUEST_URI']);
    echo $_SERVER['REQUEST_URI'];
?>
<div id="site_wrapper">
    <div id="site_bg_back">
        <div id="site_bg_body">

        </div>
        <div class="<?php echo @$bg_image ?>"></div>

        <div id="site_bg_front">

        </div>
    </div>


    <div id="site_content_wrapper">

        <header id="site_header">
            <h1><img src="/img/shared/site_logo.png" alt="Smart Recruiting"> </h1>
        </header>

        <div id="main_container">
            <div id="main_container_context">
                <div id="main_container_header">
                    <img src="/img/shared/header_content.png" alt="非公開の求人情報をご紹介 お祝い金あり">
                </div>

                <?= $this->fetch('content') ?>

                <div id="main_container_footer">

                </div>
            </div>
        </div>
    </div>
    <footer >
        <div id="footer_info_1">
            <p><?php echo date("Y年m月d日");?>　最新求人更新</p>
        </div>

        <div id="footer_info_2">

            <div id="footer_sitemap">
                <ul>
                    <li><a href="/terms">利用規約</a></li>
                    <li><a href="/privacy">個人情報の取り扱いについて</a></li>
                    <li><a href="/company">運営会社</a></li>
                </ul>
            </div>
            <div id="footer_copyright">
                <p>&copy; <?php echo date('Y'); ?> Smart Recruiting</p>
            </div>

        </div>
    </footer>
</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/shared.js"></script>
<?php echo @$scripts ?>
</body>
</html>
