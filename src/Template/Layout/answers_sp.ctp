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
</head>
<body>

<body>
<div id="site_wrapper">
    <div id="site_bg_back">
        <div id="site_bg_body" class="<?php echo @$bg_image ?>">
            <div id="site_bg_front">
                <header id="site_header">
                    <h1><img src="/img/shared/header_sp.png" alt="Smart Recruiting 非公開の求人情報をご紹介 お祝い金あり"> </h1>
                </header>

                <div id="main_container">
                    <div id="main_container_context">


                        <?= $this->fetch('content') ?>

                        <div id="main_container_footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
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
