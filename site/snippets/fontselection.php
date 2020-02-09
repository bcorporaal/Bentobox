<?php
    if ($site->fontfamily() == "system") {
      snippet('systemfont', ['fontsize' => $site->fontsize()]);
    } else {
      snippet('customfont', ['fontsize' => $site->fontsize(),'fontfamily' => $site->fontfamily()]);
    }
?>