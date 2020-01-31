	<?php 
	switch ($fontfamily) {
		case "space_mono":
			// Space Mono
			$importurl = "https://fonts.googleapis.com/css?family=Space+Mono";	
			$fontfamilystring = "'Space Mono', monospace";
			break;

		case "fira_mono":
			// Fira Mono
			$importurl = "https://fonts.googleapis.com/css?family=Fira+Mono";
			$fontfamilystring = "'Fira Mono', monospace";
			break;

		case "plex_mono":
			// Plex Mono
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Mono";
			$fontfamilystring = "'IBM Plex Mono', monospace";
			break;

		case "plex_sans":
			// Plex Sans
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Sans";
			$fontfamilystring = "'IBM Plex Sans', sans-serif";
			break;

		case "plex_serif":
			// Plex Serif
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Serif";
			$fontfamilystring = "'IBM Plex Serif', serif";
			break;

		case "roboto_slab":
			// Roboto Slab
			$importurl = "https://fonts.googleapis.com/css?family=Roboto+Slab:300";
			$fontfamilystring = "'Roboto Slab', serif";
			break;

		case "open_sans":
			// Open Sans
			$importurl = "https://fonts.googleapis.com/css?family=Open+Sans";
			$fontfamilystring = "'Open Sans', sans-serif";
			break;

		default:
			// Homemade Apple - used here for debugging purposes
			$importurl = "https://fonts.googleapis.com/css?family=Homemade+Apple";
			$fontfamilystring = "'Homemade Apple', cursive";
			break;
		}

	?>

	@import url('<?= $importurl ?>&display=swap');

	body, .panel h2 {
  		font-size: <?= $fontsize ?>rem;
  		font-family: <?= $fontfamilystring ?>;
  	}
