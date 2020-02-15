<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $site->title()->html() ?></title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/favicons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/favicons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/favicons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/favicons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/favicons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/favicons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/favicons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/favicons/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="assets/favicons/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="assets/favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="assets/favicons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/favicons/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="assets/favicons/favicon-128.png" sizes="128x128" />
    <style>
      <?php snippet('fontselection'); ?>
      <?php include 'assets/css/bentobox.css'; ?>
      <?php include 'assets/css/themes/theme-'.$site->theme().'.css'; ?>
    </style>
  </head>
  <body>
    <div class="top-stripe"></div>
    <div class="wrapper">
      <header class="header">
        <div class="top-bar">
          <a href="<?= $site->panelUrl(); ?>">
            <div id="logo-container">
              <?php include 'assets/images/bentobox_logo.svg'; ?>
            </div>
          </a>
        </div>
        <div class="top-panel">
          <ul>
          	<?php 
          	$categories = $site->index()->listed()->filterBy('intendedTemplate', 'category');
            $links = $categories->first()->links()->yaml();
           	?>
            <?php foreach($links as $link): ?>
	            <?php if ($link['visible']==='true'): ?>
	            <li><a href="<?= $link['linkurl']; ?>"><?= $link['linklabel']; ?></a></li>
	            <?php endif ?>
            <?php endforeach ?>
          <li><a class="edit-link" href="<?= url('/panel/pages/'.$pages->first()->uri()); ?>">…</a></li>
        </ul>
        </div>
      </header>

    <?php
        foreach ($categories->slice(1) as $category):
            $links = $category->links()->yaml();
            $adminURL = url('/panel/pages/'.$category->uri());
    ?>
    		<div class="panel">
      <h2 
      	<?php e($category->highlighted()=='true','class="is-highlighted"') ?>>
      	<?= $category->title(); ?>
      	<a class="edit-link" href="<?= $adminURL; ?>">…</a>
      </h2>
      <ul>
        <?php foreach($links as $link): ?>
        <?php if ($link['visible']==='true'): ?>
        <li><a href="<?= $link['linkurl']; ?>"><?= $link['linklabel']; ?></a></li>
        <?php endif ?>
        <?php endforeach ?>
      </ul>
    </div>
    <?php endforeach ?>  

    </div>
  </body>
</html>




