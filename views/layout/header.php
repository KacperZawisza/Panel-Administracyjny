<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="rights" content="Nazwa właściciela treści strony" />
    <meta name="description" content="strona pokazująca działanie serwera aplikacyjnego" />
    <title>adminPanel - SwooshSpot</title>
    <link type="text/css" rel="stylesheet" href="<?=BASE_URL;?>/assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/components/prism-markup.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/prism.js" type="text/javascript"></script>
    <script src="<?= BASE_URL ?>assets/js/sidebar.js" type="text/javascript"></script>
    
</head>
<body>

  <header>
    <img class="logo" src="<?= BASE_URL ?>assets/images/logo.svg">
    <div class="links" style="max-width: 727px;">
      <div class="search-box"><input aria-label="Search" autocomplete="off" spellcheck="false" value="" class="" placeholder="Search..."></div>
      <nav class="nav-links can-hide"><div class="nav-item"><a href="/docs/latest/" aria-current="page" class="nav-link router-link-exact-active router-link-active">
  Admin
</a></div><div class="nav-item"><a href="../swooshspot" class="nav-link">
  SwooshSpot
</a></div><div class="nav-item"><a href="views/layout/logout.php" class="nav-link">
  Wyloguj
</a></div>
  </header>
  <aside class="sidebar">
    
   <ul class="sidebar-links">
  <li>
    <section class="sidebar-group collapsable depth-0">
      <p class="sidebar-heading" onclick="toggleMenu('tabele-options2')">
        <span>Dashboard</span>
        <span class="arrow right"></span>
      </p>
      <ul id="tabele-options" class="submenu">
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>" class="sidebar-link">Dashboard</a></li>
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>#zapytania" class="sidebar-link">Zapytania bazodanowe</a></li>
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>#raport" class="sidebar-link">Własny raport</a></li>
      </ul>
    </section>
  </li>
  <li>
    <section class="sidebar-group collapsable depth-0">
      <p class="sidebar-heading" onclick="toggleMenu('tabele-options')">
        <span>Tabele</span>
        <span class="arrow right"></span>
      </p>
      <ul id="tabele-options" class="submenu">
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>users" class="sidebar-link">Users</a></li>
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>products" class="sidebar-link">Products</a></li>
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>sizes" class="sidebar-link">Sizes</a></li>
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>product_sizes" class="sidebar-link">Product_Sizes</a></li>
        <li class="sidebar-link2"><a href="<?= BASE_URL ?>cart" class="sidebar-link">Cart</a></li>
      </ul>
    </section>
  </li>
</ul>


  </aside>
  <main class="page">
    <div class="theme-default-content content__default">
