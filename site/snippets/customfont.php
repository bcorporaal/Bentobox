	<?php 
	switch ($fontfamily) {

		case "inter":
			$importurl = "https://fonts.googleapis.com/css?family=Inter";
			$fontfamilystring = "'Inter', sans-serif";
			break;

		case "fira_mono":
			$importurl = "https://fonts.googleapis.com/css?family=Fira+Mono";
			$fontfamilystring = "'Fira Mono', monospace";
			break;

		case "fira_sans":
			$importurl = "https://fonts.googleapis.com/css?family=Fira+Sans";
			$fontfamilystring = "'Fira Sans', sans-serif";
			break;

		case "offside":
			$importurl = "https://fonts.googleapis.com/css?family=Offside";
			$fontfamilystring = "'Offside', sans-serif";
			break;

		case "plex_mono":
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Mono";
			$fontfamilystring = "'IBM Plex Mono', monospace";
			break;

		case "plex_sans":
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Sans";
			$fontfamilystring = "'IBM Plex Sans', sans-serif";
			break;

		case "plex_serif":
			$importurl = "https://fonts.googleapis.com/css?family=IBM+Plex+Serif";
			$fontfamilystring = "'IBM Plex Serif', serif";
			break;

		case "roboto_condensed":
			$importurl = "https://fonts.googleapis.com/css?family=Roboto+Condensed";
			$fontfamilystring = "'Roboto Condensed', serif";
			break;

		case "roboto_slab":
			$importurl = "https://fonts.googleapis.com/css?family=Roboto+Slab:300";
			$fontfamilystring = "'Roboto Slab', serif";
			break;

		case "space_mono":
			$importurl = "https://fonts.googleapis.com/css?family=Space+Mono";	
			$fontfamilystring = "'Space Mono', monospace";
			break;

		case "turret_road":
			$importurl = "https://fonts.googleapis.com/css?family=Turret+Road:500";
			$fontfamilystring = "'Turret Road', sans-serif";
			break;

		case "ubuntu":
			$importurl = "https://fonts.googleapis.com/css?family=Ubuntu";
			$fontfamilystring = "'Ubuntu', sans-serif";
			break;

		case "work_sans":
			$importurl = "https://fonts.googleapis.com/css?family=Work+Sans";
			$fontfamilystring = "'Work Sans', sans-serif";
			break;

		case "newsreader":
			$importurl = "https://fonts.googleapis.com/css?family=Newsreader:wght@500";
			$fontfamilystring = "'Newsreader', serif";
			break;

		case "newsreader":
			$importurl = "https://fonts.googleapis.com/css?family=Newsreader:wght@500";
			$fontfamilystring = "'Newsreader', serif";
			break;

		case "lora":
			$importurl = "https://fonts.googleapis.com/css?family=Lora";
			$fontfamilystring = "'Lora', serif";
			break;

		case "bitter":
			$importurl = "https://fonts.googleapis.com/css?family=Bitter";
			$fontfamilystring = "'Bitter', serif";
			break;

		case "source_serif_pro":
			$importurl = "https://fonts.googleapis.com/css?family=Source+Serif+Pro";
			$fontfamilystring = "'Source Serif Pro', serif";
			break;

		default:
			// Used here for debugging purposes
			$importurl = "https://fonts.googleapis.com/css?family=Homemade+Apple";
			$fontfamilystring = "'Homemade Apple', cursive";
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
