<?php if (!$kirby->user() && $site->passwordprotected()) go($site->panel()->url()) ?>
<?php $categories = $site->index()->listed()->filterBy('intendedTemplate', 'category'); ?>
<!doctype html>
<html class="theme-<?= $site->theme() ?>" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $site->title()->html() ?></title>
    <link rel="icon" href="<?= url('assets/favicons/favicon.svg') ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('assets/favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= url('assets/favicons/site.webmanifest') ?>">
    <link rel="mask-icon" href="<?= url('assets/favicons/safari-pinned-tab.svg') ?>" color="#FAB005">
    <link rel="shortcut icon" href="<?= url('favicon.ico') ?>">
    <meta name="msapplication-TileColor" content="#333">
    <meta name="msapplication-config" content="<?= url('assets/favicons/browserconfig.xml') ?>">
    <meta name="theme-color" content="#333">
    <link rel="stylesheet" href="<?= url('assets/css/main.min.css') ?>">
    <style><?php snippet('fontselection'); ?></style>
  </head>
  <body class="min-h-screen bg-bentobox-bg font-sans text-bentobox text-bentobox-link">
    <div class="top-stripe" aria-hidden="true"></div>
    <div class="mx-auto grid max-w-[1600px] grid-cols-2 gap-x-6 gap-y-0 p-8 pt-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 [&>*]:m-0">
      <header class="col-span-full">
        <div class="top-bar flex h-15 items-center mt-4 mb-8">
          <a href="<?= $site->panel()->url() ?>" class="relative inline-block text-bentobox-link transition-all duration-200 ease-in-out hover:text-bentobox-link-hover">
            <div class="h-7 logo-svg-wrap">
              <?php include 'assets/images/logo-'.$site->logo().'.svg'; ?>
            </div>
          </a>
        </div>
        <div class="top-panel h-15 mb-8">
          <ul class="group">
            <?php
            $topLinks = $categories->first() ? $categories->first()->links()->yaml() : [];
            foreach ($topLinks as $link):
              if (($link['visible'] ?? '') === 'true'):
            ?>
              <li><a href="<?= $link['linkurl'] ?>"><?= $link['linklabel'] ?></a></li>
            <?php
              endif;
            endforeach;
            ?>
            <li><a class="edit-link" href="<?= $categories->first() ? url('/panel/pages/'.$categories->first()->uri()) : $site->panel()->url() ?>">…</a></li>
          </ul>
        </div>
      </header>

      <?php foreach ($categories->slice(1) as $category): ?>
      <?php
        $links = $category->links()->yaml();
        $adminURL = url('/panel/pages/'.$category->uri());
        $isHighlighted = $category->highlighted()->value() === 'true';
      ?>
      <div class="panel group pb-10">
        <h2 class="<?= $isHighlighted ? 'panel-title-highlight' : 'panel-title' ?> m-0 p-0 font-normal not-italic leading-[1.875rem]">
          <?= $category->title() ?>
          <a class="edit-link" href="<?= $adminURL ?>">…</a>
        </h2>
        <ul class="m-0 list-none p-0">
          <?php foreach ($links as $link): ?>
          <?php if (($link['visible'] ?? '') === 'true'): ?>
          <li class="m-0 p-0"><a href="<?= $link['linkurl'] ?>" class="no-underline transition-all duration-200 ease-in-out hover:pl-1 hover:text-bentobox-link-hover"><?= $link['linklabel'] ?></a></li>
          <?php endif ?>
          <?php endforeach ?>
        </ul>
      </div>
      <?php endforeach ?>
    </div>
  </body>
</html>
