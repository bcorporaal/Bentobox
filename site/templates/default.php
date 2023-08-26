<?php if (!$kirby->user() && $site->passwordprotected()) go($site->panel()->url()) ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $site->title()->html() ?></title>
    <link rel="icon" href="assets/favicons/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/favicons/site.webmanifest">
    <link rel="mask-icon" href="assets/favicons/safari-pinned-tab.svg" color="#FAB005">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="msapplication-TileColor" content="#333">
    <meta name="msapplication-config" content="assets/favicons/browserconfig.xml">
    <meta name="theme-color" content="#333">
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
          <a href="<?= $site->panel()->url(); ?>">
            <div id="logo-container">
              <?php include 'assets/images/logo-'.$site->logo().'.svg'; ?>
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




