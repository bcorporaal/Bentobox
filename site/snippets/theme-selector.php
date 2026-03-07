<?php
/** Theme dropdown: plus icon, outline button (link colors), POST to switch-theme then refresh. */
$themesPage = $site->find('themes');
if (!$themesPage) {
    return;
}
$themes = $themesPage->children()->filterBy('intendedTemplate', 'in', ['theme', 'theme-locked']);
if ($themes->count() === 0) {
    return;
}

$current   = $site->activetheme()->value() ?? '';
$switchUrl  = url('switch-theme');
?>
<details class="relative inline-block" aria-label="Select color theme">
  <summary class="list-none [&::-webkit-details-marker]:hidden cursor-pointer  border-bentobox-link text-bentobox-link transition-all duration-200 ease-in-out hover:border-bentobox-link-hover hover:text-bentobox-link-hover p-1.5 inline-flex items-center justify-center focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-visible:ring-bentobox-link" aria-haspopup="listbox" role="button">
    <span class="sr-only">Theme</span>
    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
  <path fill-rule="evenodd" d="M2 2.75A.75.75 0 0 1 2.75 2h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 2.75Zm0 10.5a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75ZM2 6.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 6.25Zm0 3.5A.75.75 0 0 1 2.75 9h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 9.75Z" clip-rule="evenodd" />
</svg>



  </summary>
  <div class="absolute right-0 top-full mt-1 z-10 min-w-[10rem] border border-bentobox-link/30 bg-bentobox-bg shadow-lg py-1" role="listbox">
    <?php foreach ($themes as $theme): ?>
    <?php $slug = $theme->slug(); $isActive = $slug === $current; ?>
    <div class="<?= $isActive ? 'bg-bentobox-link/10' : '' ?>" role="option" <?= $isActive ? ' aria-current="true"' : '' ?>>
      <form method="post" action="<?= $switchUrl ?>" class="m-0">
        <input type="hidden" name="theme" value="<?= esc($slug) ?>">
        <button type="submit" class="w-full text-left px-3 py-2 text-bentobox text-bentobox-link no-underline transition-all duration-200 ease-in-out hover:bg-bentobox-link/10 hover:text-bentobox-link-hover flex items-center gap-2 rounded-none border-0 cursor-pointer bg-transparent font-sans font-normal">
          <?php if ($isActive): ?>
          <svg class="w-4 h-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
          </svg>
          <?php else: ?>
          <span class="w-4 shrink-0" aria-hidden="true"></span>
          <?php endif ?>
          <?= esc($theme->title()) ?>
        </button>
      </form>
    </div>
    <?php endforeach ?>
  </div>
</details>
