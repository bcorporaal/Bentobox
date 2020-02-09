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
              <svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 930 270"><g id="bentobox"><path d="M793 199c4-14 9-41 9-54l22 42-27 34c-10 12-13 10-13 14 0 5 9 9 15 9s10-2 14-8l20-29c13 27 24 37 42 37 24 0 35-26 40-46v-2c0-6-6-13-10-13-3 0-6 3-8 9-2 14-7 34-19 34s-20-15-31-39l34-49 1-4c0-7-7-16-13-16-3 0-5 3-8 9l-23 39-21-39c-4-6-11-8-16-8-12 0-17 4-17 14 0 15-5 47-8 58-3 10 13 21 17 8z"/><path d="M777 187c-2 11-9 21-22 21h-6c3-10 4-21 4-33 0-28-11-50-25-50-16 0-24 16-24 35 0 22 7 41 21 53-3 7-9 12-17 12-12 0-22-13-22-38 0-29 9-40 14-48 8-5 2-21-6-21-7 0-30 27-30 71 0 30 13 55 43 55 17 0 29-8 36-21l15 2c20 0 32-13 36-29 4-17-16-16-17-9zm-57-28c0-9 2-14 5-14 6 0 7 15 7 35l-1 14c-7-9-11-22-11-35z"/><path d="M587 160c0 21 10 42 27 54-4 7-9 11-16 11-14 0-21-15-21-35V50c0-7-7-13-16-13-5 0-10 1-10 3s3 3 3 12v142c0 30 15 50 42 50 17 0 29-8 37-21l15 2c20 0 32-13 36-30 4-16-16-15-17-8-2 11-9 21-22 21h-6c3-11 5-23 5-35 0-33-16-48-32-48-14 0-25 10-25 35zm18-1c0-9 2-15 5-15 6 0 11 12 11 32 0 6 0 13-2 20-8-10-14-23-14-37z"/><path d="M554 187c-1 11-8 21-21 21h-6c3-10 4-21 4-33 0-28-11-50-25-50-17 0-25 16-25 35 0 22 8 41 22 53-4 7-9 12-18 12-11 0-21-13-21-38 0-29 9-40 14-48 7-5 1-21-6-21s-31 27-31 71c0 30 14 55 44 55 17 0 28-8 36-21l14 2c21 0 33-13 36-29 4-17-15-16-17-9zm-57-28c0-9 2-14 5-14 7 0 7 15 7 35v14c-7-9-12-22-12-35z"/><path d="M364 96c-9 0-3 20 6 20h21v95c0 24 11 33 27 33 26 0 38-26 43-46v-2c0-6-5-12-10-12-3 0-6 2-7 9-3 13-8 32-20 32-7 0-11-4-11-14v-95h58c8-1 10-29 2-20l-60 1V45c0-8-6-14-16-14-4 0-9 2-9 4s3 2 3 11v51l-27-1z"/><path d="M282 231c0 11 9 13 15 13 8 0 8-7 8-12v-44c2-24 21-49 29-49 6 0 7 8 7 17v60c0 16 9 28 25 28 25 0 37-26 42-46l1-2c0-6-6-12-11-12-3 0-6 2-7 9-3 13-8 32-20 32-8 0-8-11-8-14v-62c0-13-4-30-24-30-15 0-26 13-34 30v-14c0-7-6-13-16-13-4 0-8 2-8 5l1 10z"/><path d="M263 149c0-18-11-30-27-30-23 0-46 29-46 67 0 37 26 59 53 59 44 0 56-36 58-55 1-10-16-16-18-3-4 19-14 38-37 38-15 0-24-8-28-19 29-8 45-35 45-57zm-49 36c0-13 4-46 19-46 4 0 6 4 6 11 0 18-9 33-24 40l-1-5zm-130 2c0 35 11 59 48 59 29 0 50-21 50-50 0-24-13-39-30-43 21-12 37-31 37-62 0-41-28-65-71-65-51 0-86 35-86 88 0 34 16 51 20 55 9 7 16-12 16-17 0-3-1-5-4-4 0-1-11-10-11-35 0-35 19-66 65-66 35 0 49 23 49 44 0 42-33 51-46 51-9 0-4 21 1 21 18 0 38 8 38 34 0 17-12 29-28 29-17 0-26-11-26-38V81c0-6-7-12-16-12-4 0-8 2-8 5 0 2 2 3 2 9z"/></g></svg>
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




