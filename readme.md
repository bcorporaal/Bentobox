
<p align="center"><img src="/assets/readme/logo.png" width=310 height=90 alt="Bentobox logo"></p>

# Bentobox
A simple theme to create a custom new tab link page using the Kirby CMS.

## About

<p align="center"><img src="/assets/readme/example.png" width=616 height=383 alt="Bentobox example"></p>

Bentobox is a very simple theme for [Kirby](http://getkirby.com) to organize all your favourite links on one page. For an example see [the demo installation](http://reefscape.net/demo/bentobox).

I was looking for a very clean customisable new tab page but none of the existing ones fitted my needs. They either had too much design, too much functionality or could not be customised completely. So I rolled my own version.

The result is a very basic no-frills page that can display lists with your favorite links. Different themes and font options are available to tweak it to your liking. For optimal speed and privacy you can run the page locally and sync the contents across computers.


## What is Kirby?
[Kirby](http://getkirby.com) is a lightweight, flexible and file-based CMS.

## Installation
The installation is the same as with any other Kirby theme.

1. First download and install Kirby. You can download the starter kit either from [GetKirby.com](https://getkirby.com/downloads) or [Github](https://github.com/getkirby/starterkit).
1. Check if the installation is running properly. Don't forget the hidden `.htaccess` file!
1. Download this theme.
1. Remove the default `/assets`, `/content` folders from the installation and replace them with the downloaded ones. 
1. Finally inside the `/site` folder replace the `/blueprints`, `/config` and `/templates` folders.

View your site in a browser and you should now see a page with demo content. Clicking on the logo brings you to the login and the Kirby Panel. When do this for the first time, you will be asked to create an account.

## How to use
Using Bentobox is simple. You can either add or edit links by editing the text files in the `/content` folder or through the Panel (click on the logo or the dots next to the title of a list). The first time you enter the Panel you will be asked to create an account.

### Editing or adding links
In the `/content` folder each folder corresponds to a block of links. The sort order determines the order of the blocks on the page. When using the Panel a page corresponds to a block. See the [Kirby docs](https://getkirby.com/docs) for more instructions on editing content.

The first set of links is always displayed horizontally.

### Using as a new tab page
Bentobox was created to be used as a home or new tab page in your browser. In most browsers you can set this directly in the browser settings. In Chrome and newer versions of Firefox this is not possible by default. You can use [New Tab Redirect](https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna) extension for Chrome or the [New Tab Override](https://addons.mozilla.org/en-US/firefox/addon/new-tab-override/) extension for Firefox to get this functionality.

### Hosting locally
To make the page load faster and work without an internet connection you can host it on your own computer. For example using [VirtualHostX](https://clickontyler.com/virtualhostx/) or [MAMP](https://www.mamp.info).

When hosting locally you can edit your `/etc/hosts` file to get a nicer url. If you don't want to edit that file by hand you can use something like [Gas mask](https://github.com/2ndalpha/gasmask).

Since Kirby is file based you can sync your page between computers by putting the site folder in Dropbox or Google Drive.

### Customise colors
You can select a color theme from the site options in the Kirby Panel. If you want to create your own theme you can create and compile a new scss-based theme file in `assets/scss/themes`. Or directly add a css file in `assets/css/themes`. To be able to select the theme you must also add the name of the file to the list in `site/blueprints/site.yml`.

## History

0.1.0 - Initial release<br>
0.1.1 - Small tweaks and more demo content<br>
0.1.2 - More small textual changes<br>
0.2.0 - Added option to select the theme in the Panel. New themes included<br>
0.2.1 - Theme tweaks and a few more added<br>
0.2.2 - Fixed gradient background, Sunset and Pink Party themes added, optimized logo size<br>
0.2.3 - Improved readme<br>
0.2.4 - Update demo link<br>
0.3.0 - Restructered HTML to use CSS Grid and small fixes<br>
0.3.1 - Quick fixes for a number of themes<br>
0.4.0 - Updated for Kirby 3<br>
0.5.0 - Custom font selection, refined selection of themes<br>
0.5.1 - Small fixes<br>
0.6.0 - New favicon style, custom logo options<br>
0.6.1 - Extended font selection, font spacing and line height options<br>
0.7.0 - Add option to password protect the page<br>
0.7.1 - Small fix to password option


## Ideas (that may or may not get implemented in the future)

- Add modules for other content through rss feeds
- Add daily schedule based on calendar
- Make it possible to add notes or actions for the day
- Add or connect to todays to do list
- Multiple pages of links
- Make theme editable from the Panel
- Improve layout flow for different window sizes
- Pick color per group

## Contributing

Feedback and pull requests are welcome. Best ways to contribute:
* Star it on GitHub - if you use it and like it please star it
* Open [issues/tickets](https://github.com/bcorporaal/Bentobox/issues)
* Submit fixes and/or improvements with [Pull Requests](https://github.com/bcorporaal/Bentobox/pulls)

## Contact

If you have any questions or comments you can contact me via [email](mailto:dev@reefscape.net).


## Credits

Bentobox includes the following:

**Simurai Duotone themes**<br>
Licensed under the MIT license.<br>
Some included color schemes are based on the [Atom Duotone themes](http://simurai.com/projects/2016/01/01/duotone-themes) created by [Simurai](http://simurai.com/).


## License

Copyright (c) 2021 Bob Corporaal<br>
Licensed under the MIT license.
