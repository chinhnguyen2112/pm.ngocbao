<?php 
error_reporting(1); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <?php if (isset($index) && $index == 1) { ?>
    <meta name="robots" content="index,follow">
  <?php } else { ?>
    <meta name="robots" content="noindex,nofollow">
  <?php } ?>
  <title><?= isset($meta_title) ? $meta_title : 'Ngọc Bảo Media' ?></title>
  <meta content="<?= isset($meta_des) ? $meta_des : 'Ngọc Bảo Media' ?>" name="description">
  <meta content="<?= isset($meta_title) ? $meta_title : 'Ngọc Bảo Media' ?>" name="msvalidate.01">
  <meta name="keywords" content="<?= isset($meta_key) ? $meta_key : 'Ngọc Bảo Media' ?>">
  <link rel="canonical" href="<?= (isset($canonical)) ? $canonical : base_url() ?>">
  <meta property="og:locale" content="vi_VN">
  <meta property="og:type" content="article">
  <meta property="og:url" content="<?= (isset($canonical)) ? $canonical : base_url() ?>">
  <meta property="og:title" content="<?= isset($meta_title) ? $meta_title : 'Ngọc Bảo Media' ?>">
  <meta property="og:site_name" content="VnEsport.vn">
  <meta property="og:description" content="<?= isset($meta_des) ? $meta_des : 'Ngọc Bảo Media' ?>">
  <meta property="og:image:secure_url" content="<?= base_url() ?><?= (isset($meta_img) ? $meta_img : 'images/logo.png') ?>">
  <meta property="og:image" content="<?= base_url() ?><?= (isset($meta_img) ? $meta_img : 'images/logo.png') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= base_url() ?>images/favicon.png">
  <link data-n-head="ssr" rel="icon" type="image/x-icon" href="<?= base_url() ?>images/favicon.png">
  <link rel="stylesheet" href="/assets/css/font.css">
  <link rel="stylesheet" href="/assets/css/reset.css">
  <link rel="stylesheet" href="/assets/css/sweetalert.css">
  <link rel="stylesheet" href="/assets/css/select2.min.css">
  <link rel="stylesheet" href="/assets/css/header.css">
  <link rel="stylesheet" href="/assets/css/footer.css">
  <link rel="stylesheet" href="/assets/css/main.css">

  <?php if (isset($list_css)) {
    foreach ($list_css as $css) { ?>
      <link rel="stylesheet" href="/assets/css/<?= $css ?>?v=<?= time() ?>">
  <?php  }
  } ?>
  
  <script src="/assets/js/jquery.min.js"></script>
</head>

<body>
  <?php
  $this->load->view("includes/header");


  if (isset($content)) {
    $this->load->view($content);
  }

  $this->load->view("includes/footer");
  ?>
  <script src="/assets/js/jquery.validate.min.js"></script>
  <script src="/assets/js/sweetalert.min.js"></script>
  <script src="/assets/js/select2.min.js"></script>
  <script src="/assets/js/js.cookie.min.js"></script>
  <?php
  if (isset($list_js)) {
    foreach ($list_js as $js) { ?>
      <script src="/assets/js/<?= $js ?>?v=<?= time() ?>"></script>
  <?php  }
  } ?>
  <script src="/assets/js/header.js"></script>
  <script src="/assets/js/main.js"></script>
</body>

</html>