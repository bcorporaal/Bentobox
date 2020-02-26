@font-face {
	font-family: system;
	font-style: normal;
	font-weight: 400;
	src: local(".SFNSText-Regular"), local(".HelveticaNeueDeskInterface-Regular"), local(".LucidaGrandeUI"), local("Segoe UI"), local("Ubuntu"), local("Roboto-Regular"), local("DroidSans"), local("Tahoma");
}

body, .panel h2 {
	font-size: <?= $fontsize ?>rem;
	font-family: system;
	letter-spacing: <?= $letterspacing ?>px;
	line-height: <?= $linespacing ?>rem !important;
}