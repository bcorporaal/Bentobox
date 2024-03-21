<?php
    if ($site->fontfamily() == "system") {
      snippet('systemfont', [
      	'fontsize' => $site->fontsize(),
      	'fontfamily' => $site->fontfamily(),
      	'letterspacing' => $site->letterspacing(),
      	'linespacing' => $site->linespacing()
      ]);
    } else if ($site->fontfamily() == "udon_mono") {
			snippet('udonfont', [
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