<?php
    if ($site->fontfamily() == "system") {
      snippet('systemfont', [
      	'fontsize' => $site->fontsize(),
      	'fontfamily' => $site->fontfamily(),
      	'letterspacing' => $site->letterspacing(),
      	'linespacing' => $site->linespacing()
      ]);
    } else {
      snippet('customfont', [
      	'fontsize' => $site->fontsize(),
      	'fontfamily' => $site->fontfamily(),
      	'letterspacing' => $site->letterspacing(),
      	'linespacing' => $site->linespacing()
      ]);
    }
?>