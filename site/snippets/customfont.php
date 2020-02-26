	<?php 
	switch ($fontfamily) {

		case "fira_mono":
			$importurl = "https://fonts.googleapis.com/css?family=Fira+Mono";
			$fontfamilystring = "'Fira Mono', monospace";
			//$letterspacing = 0;
			break;

		case "fira_sans":
			$importurl = "https://fonts.googleapis.com/css?family=Fira+Sans";
			$fontfamilystring = "'Fira Sans', sans-serif";
			//$letterspacing = 0;
			break;

		case "offside":
			$importurl = "https://fonts.googleapis.com/css?family=Offside";
			$fontfamilystring = "'Offside', sans-serif";
			//$letterspacing = 0;
			break;

		case "plex_mono":
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Mono";
			$fontfamilystring = "'IBM Plex Mono', monospace";
			//$letterspacing = 0;
			break;

		case "plex_sans":
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Sans";
			$fontfamilystring = "'IBM Plex Sans', sans-serif";
			//$letterspacing = 0;
			break;

		case "plex_serif":
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Serif";
			$fontfamilystring = "'IBM Plex Serif', serif";
			//$letterspacing = 0;
			break;

		case "roboto_condensed":
			$importurl = "https://fonts.googleapis.com/css?family=Roboto+Condensed";
			$fontfamilystring = "'Roboto Condensed', serif";
			//$letterspacing = 0;
			break;

		case "roboto_slab":
			$importurl = "https://fonts.googleapis.com/css?family=Roboto+Slab:300";
			$fontfamilystring = "'Roboto Slab', serif";
			//$letterspacing = 0;
			break;

		case "space_mono":
			$importurl = "https://fonts.googleapis.com/css?family=Space+Mono";	
			$fontfamilystring = "'Space Mono', monospace";
			//$letterspacing = 0;
			break;

		case "turret_road":
			$importurl = "https://fonts.googleapis.com/css?family=Turret+Road:500";
			$fontfamilystring = "'Turret Road', sans-serif";
			//$letterspacing = 0.6;
			break;

		case "ubuntu":
			$importurl = "https://fonts.googleapis.com/css?family=Ubuntu";
			$fontfamilystring = "'Ubuntu', sans-serif";
			//$letterspacing = 0;
			break;

		case "work_sans":
			$importurl = "https://fonts.googleapis.com/css?family=Work+Sans";
			$fontfamilystring = "'Work Sans', sans-serif";
			//$letterspacing = 0;
			break;

		default:
			// Used here for debugging purposes
			$importurl = "https://fonts.googleapis.com/css?family=Homemade+Apple";
			$fontfamilystring = "'Homemade Apple', cursive";
			//$letterspacing = 0;
			break;
		}

	?>

	@import url('<?= $importurl ?>&display=swap');

	body, .panel h2 {
  		font-size: <?= $fontsize ?>rem;
  		font-family: <?= $fontfamilystring ?>;
  		letter-spacing: <?= $letterspacing ?>px;
  		line-height: <?= $linespacing ?>rem !important;
  	}
