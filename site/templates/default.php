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
      <?php include 'assets/css/bentobox.css'; ?>
      <?php include 'assets/css/themes/theme-'.$site->theme().'.css'; ?>
      <?php snippet('fontsettings', ['fontsize' => $site->fontsize()]) ?>
    </style>
  </head>
  <body>

    <div class="wrapper">
      <header class="header">
        <div class="top-bar">
          <a href="<?= $site->panelUrl(); ?>">
          <div id="logo-container">
              <svg id="logo" viewBox="0 0 120 20" xmlns="http://www.w3.org/2000/svg"><g id="bentobox"><path d="M52.36 14.54c.3-.96.62-2.74.66-3.62.54.92 1 1.82 1.42 2.78-.56.8-1.18 1.6-1.8 2.32-.64.74-.86.62-.86.88 0 .38.58.66 1.04.66.36 0 .62-.16.9-.6l1.34-1.9c.86 1.82 1.6 2.5 2.8 2.5 1.62 0 2.32-1.8 2.66-3.12.02-.08.02-.12.02-.14 0-.38-.38-.82-.7-.82-.2 0-.4.18-.48.6-.18.88-.52 2.24-1.32 2.24-.74 0-1.28-1-2.04-2.62l2.26-3.22c.06-.08.08-.18.08-.3 0-.46-.44-1.04-.84-1.04-.22 0-.38.18-.56.54-.34.64-.88 1.6-1.56 2.64-.5-1.06-.9-1.84-1.38-2.62-.26-.42-.74-.54-1.06-.54-.84 0-1.18.26-1.18.96 0 1.02-.32 3.12-.52 3.86-.18.68.86 1.4 1.12.56z"/><path d="M51.3 13.7c-.12.78-.58 1.44-1.44 1.44-.14 0-.26 0-.4-.04.2-.68.28-1.42.28-2.16 0-1.94-.76-3.36-1.7-3.36-1.08 0-1.62 1.08-1.62 2.34 0 1.44.5 2.76 1.44 3.56-.26.46-.62.76-1.18.76-.78 0-1.44-.84-1.44-2.52 0-1.98.6-2.72.92-3.2.52-.34.12-1.4-.4-1.4-.44 0-2.04 1.78-2.04 4.72 0 2 .9 3.72 2.92 3.72 1.14 0 1.9-.58 2.4-1.44.3.1.62.14.98.14 1.36 0 2.18-.9 2.42-1.98.26-1.12-1.06-1.04-1.14-.58zm-3.82-1.86c0-.62.12-.94.34-.94.42 0 .48 1 .48 2.36 0 .3-.02.6-.06.92-.46-.6-.76-1.44-.76-2.34z" /><path d="M38.6 11.9c0 1.42.7 2.82 1.84 3.64-.24.42-.58.7-1.08.7-.96 0-1.42-.98-1.42-2.3V4.58c0-.48-.42-.88-1.08-.88-.28 0-.64.08-.64.22s.2.18.2.76v9.54c0 1.96.98 3.34 2.82 3.34 1.16 0 1.94-.58 2.44-1.44.32.1.66.14 1.02.14 1.36 0 2.18-.9 2.42-1.98.26-1.12-1.06-1.04-1.14-.58-.12.78-.58 1.44-1.44 1.44-.14 0-.28 0-.42-.04.2-.7.3-1.5.3-2.28 0-2.24-1.06-3.26-2.12-3.26-.94 0-1.7.72-1.7 2.34zm1.24-.08c0-.56.1-.94.36-.94.36 0 .7.76.7 2.1 0 .38-.02.86-.1 1.32-.58-.62-.96-1.52-.96-2.48z" /><path d="M36.42 13.7c-.12.78-.58 1.44-1.44 1.44-.14 0-.26 0-.4-.04.2-.68.28-1.42.28-2.16 0-1.94-.76-3.36-1.7-3.36-1.08 0-1.62 1.08-1.62 2.34 0 1.44.5 2.76 1.44 3.56-.26.46-.62.76-1.18.76-.78 0-1.44-.84-1.44-2.52 0-1.98.6-2.72.92-3.2.52-.34.12-1.4-.4-1.4-.44 0-2.04 1.78-2.04 4.72 0 2 .9 3.72 2.92 3.72 1.14 0 1.9-.58 2.4-1.44.3.1.62.14.98.14 1.36 0 2.18-.9 2.42-1.98.26-1.12-1.06-1.04-1.14-.58zm-3.82-1.86c0-.62.12-.94.34-.94.42 0 .48 1 .48 2.36 0 .3-.02.6-.06.92-.46-.6-.76-1.44-.76-2.34z" /><path d="M23.68 7.6c-.58 0-.22 1.34.42 1.34 0 0 .5.04 1.38.04v6.36c0 1.58.76 2.22 1.84 2.22 1.72 0 2.52-1.8 2.86-3.12.02-.08.02-.12.02-.14 0-.38-.38-.82-.7-.82-.2 0-.4.18-.48.6-.18.88-.54 2.16-1.34 2.16-.42 0-.68-.28-.68-.92V8.98c1.06 0 2.24 0 3.84-.04.52-.02.7-1.94.14-1.34-1.36.06-2.76.08-3.98.08v-3.5c0-.48-.42-.88-1.08-.88-.28 0-.64.08-.64.22s.2.18.2.76v3.38c-1.08-.02-1.8-.06-1.8-.06z" /><path d="M18.26 16.68c0 .74.56.88.96.88.58 0 .56-.48.56-.86v-2.92c.14-1.58 1.38-3.3 1.96-3.3.38 0 .42.52.42 1.14v4.06c0 1.02.62 1.88 1.68 1.88 1.72 0 2.52-1.8 2.86-3.12.02-.08.02-.12.02-.14 0-.38-.38-.82-.7-.82-.2 0-.4.18-.48.6-.18.88-.54 2.16-1.34 2.16-.52 0-.52-.74-.52-.92v-4.14c0-.92-.32-2.02-1.66-2.02-.98 0-1.7.86-2.24 1.98v-.9c0-.48-.42-.88-1.08-.88-.28 0-.52.14-.52.34 0 .14.08.26.08.64v6.34z" /><path d="M16.92 11.18c0-1.2-.68-2.02-1.8-2.02-1.54 0-3.06 1.9-3.06 4.44 0 2.5 1.72 3.96 3.54 3.96 2.94 0 3.74-2.42 3.88-3.64.08-.7-1.04-1.1-1.22-.2-.24 1.22-.88 2.52-2.44 2.52-1.04 0-1.58-.56-1.86-1.24 1.94-.58 2.96-2.34 2.96-3.82zm-3.22 2.36c-.04-.84.26-3.04 1.24-3.04.26 0 .42.26.42.7 0 1.2-.64 2.24-1.64 2.7 0-.12-.02-.24-.02-.36zM4 13.78c0 2.46.78 4.12 3.4 4.12 1.98 0 3.5-1.46 3.5-3.46 0-1.72-.94-2.72-2.1-3.06 1.46-.78 2.58-2.12 2.58-4.3 0-2.84-1.98-4.54-5-4.54C2.82 2.54.36 4.98.36 8.72c0 2.34 1.14 3.54 1.46 3.84.58.44 1.12-.88 1.12-1.24 0-.2-.08-.34-.3-.28-.04-.06-.76-.68-.76-2.44 0-2.44 1.3-4.56 4.52-4.56 2.46 0 3.44 1.56 3.44 3.08 0 2.9-2.3 3.52-3.24 3.52-.6 0-.26 1.5.1 1.5 1.26 0 2.64.54 2.64 2.34 0 1.16-.84 2.04-1.96 2.04-1.18 0-1.82-.76-1.82-2.68V6.42c0-.48-.46-.88-1.12-.88-.28 0-.52.14-.52.34 0 .14.08.26.08.64v7.26z" /></g></svg>
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




