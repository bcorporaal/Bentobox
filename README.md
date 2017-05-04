
<p align="center"><img src="/assets/readme/logo.png" width=310 height=90 alt="Bentobox logo"></p>

# Bentobox
A simple theme to create a new tab link page using the Kirby CMS.

## About

<p align="center"><img src="/assets/readme/example.png" width=616 height=383 alt="Bentobox example"></p>

Bentobox is a very simple theme for [Kirby](http://getkirby.com) to organize all your favourite links on one page. For an example see [the demo installation](http://reefscape.net/bentobox).

I was looking for a very clean customisable new tab page but none of the existing ones fitted my needs. They either had too much design, too much functionality or could not be customised completely.

For optimal speed I host this page on a local server running on my computer. I sync the contents between computers using Dropbox.


## What is Kirby?
[Kirby](http://getkirby.com) is a lightweight, flexible and file-based CMS made by [Bastian Allgeier](http://bastianallgeier.com).

## Installation
The installation is the same as with any other Kirby theme.

1. First download and install Kirby. You can download the starter kit either from [GetKirby.com](https://getkirby.com/downloads) or [Github](https://github.com/getkirby/starterkit). Alternatively you can install Kirby using the [command line interface](https://getkirby.com/docs/installation/running-with-php).
- Check if the installation is running properly. Don't forget the hidden `.htaccess` file!
- Download this theme.
- Remove the default `/assets`, `/content` folders from the installation and replace them with the downloaded ones. Finally inside the `/site` folder replace the `/blueprints` and `/templates` folders.

View your site in a browser and you should now see a page with demo content. Clicking on the logo brings you to the login and the CMS.

## How to use
Using Bentobox is simple. You can either add or edit links by editing the text files in the `/content` folder or through the Panel (click on the logo or the dots next to the title of a list). The first time you enter the Panel you will be asked to create an account.

### Editing or adding links
In the `/content` folder each folder corresponds to a block of links. The sort order determines the order of the blocks on the page. When using the Panel a page corresponds to a block. See the [Kirby docs](https://getkirby.com/docs) for more instructions on editing content.

The first set of links is always displayed horizontally.


### Using as a new tab page
Bentobox was created to be used as a home or new tab page in your browser. In most browsers you can set this directly in the browser settings. In Chrome this is not possible by default but you can redirect to your own page with the [New Tab Redirect](https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna) extension.

### Hosting locally
To make the page load faster and work without an internet connection you can host it on your own computer. For example using [MAMP](https://www.mamp.info) or similar.

When hosting locally you can edit your `/etc/hosts` file to get a nicer url. If you don't want to edit that file by hand you can use something like [Gas mask](https://github.com/2ndalpha/gasmask) or [VirtualHostX](https://clickontyler.com/virtualhostx/).

Since Kirby is file based you can sync your page between computers by putting the site folder in Dropbox or Google Drive.

### Customise colors
You can select a color theme from the site options in the Kirby Panel. If you want to create your own theme you can create and compile a new scss-based theme file in `assets/scss/themes`. Or directly add a css file in `assets/css/themes`. To be able to select the theme you must also add the name of the file to the list in `site/blueprints/site.php`.

## History

0.1.0 - Initial release.<br>
0.1.1 - Small tweaks and more demo content.<br>
0.1.2 - More small textual changes.<br>
0.2 - Added option to select the theme in the Panel. New themes included.<br>
0.2.1 - Theme tweaks and a few more added.<br>
0.2.2 - Fixed gradient background, Sunset and Pink Party themes added, optimized logo


## To do
- Improve rendering flow on Chrome (if possible)

And perhaps in the future
- Make logo customisable
- Add modules for other content through rss feeds
- Add daily schedule based on calendar
- Make it possible to add notes or actions for the day
- Add or connect to todays to do list
- Option to require login to view the page
- Multiple pages of links

## Contributing

Feedback and pull requests are welcome. Best ways to contribute:
* Star it on GitHub - if you use it and like it please star it
* Open [issues/tickets](https://github.com/bcorporaal/Bentobox/issues)
* Submit fixes and/or improvements with [Pull Requests](https://github.com/bcorporaal/Bentobox/pulls)

## Contact

If you have any questions or comments you contact me via [email](mailto:dev@reefscape.net) or [Twitter](http://twitter.com/bcorporaal).


## Credits

Bentobox includes the following:

**Roboto Condensed web fonts**<br>
Copyright 2011 Google Inc. All Rights Reserved.<br>Licensed under Apache v2.0 license.<br>
https://www.google.com/fonts/specimen/Roboto+Condensed

**Include Media Sass library**<br>
Licensed under the terms of the MIT license.<br>
Authors: Eduardo Boucas (@eduardoboucas) and Hugo Giraudel (@hugogiraudel)<br>
http://include-media.com

**Simurai Duotone themes**<br>
Licensed under the MIT license.<br>
The included color schemes are based on the [Atom Duotone themes](http://simurai.com/projects/2016/01/01/duotone-themes) created by [Simurai](http://simurai.com/).


## License

Copyright (c) 2017 Bob Corporaal<br>
Licensed under the MIT license.
