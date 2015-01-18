Genesass
========

This project is __THE EASIEST__ way to get started building SCSS stylesheets and the Genesis framework.

This is basically Sassified version of the Genesis Sample theme with quite a few of my own added convinience built in.  However, a large goal is to resist the tempation to bloat this thing with every possible thing under the sun.

Typically you would need setup some tools, or use an IDE that has a SaSS / SCSS preprocessor built in to produce CSS files from SCSS files.   While you can certainly do that with _Genesass_ you don't have to.  You can simply add the (_wp-scss_)[todo link to plugin] plugin do a simple two step configuration and you are ready to go.

Sassification
-------------

I start using SASS, specifically __SCSS__ a little while back and really like it.  As matter of fact, I like it so much that now _hate_ working in striaght CSS.

SaSS basically has many of the elements of a _real programming language_. You have a scoped hiearchial structure, variables and re-usable code to name of few things.  If you want to know more about why SaSS is cool read about it here: [Sass](http://sass-lang.com).

Another huge advantage is it's modularity.  You can break up and organize modules of code in seperate files just like a real programming language.  The fact that you run it through a _pre-processor_ will combine all stylesheets that you use (and only the stylesheets you use) into one minified stylesheet.

The important thing to take away is that it is more readable, easier to maintain and it is much simpler to re-use other peoples good work.  If you don't import parts of a _sass library_ it won't be included in the final stylesheet.

## Getting Started and How it Works

You can find all of the style sheets in the 

```
./scss 
./scss/style.scss
./scss/_settings.scss
./genesis/...
./layout/...
./mixins/...
./vendor/...
```

directory.  The main stylesheet _scss/style.scss_ will be used by the preprocessor to import all libraries and mixins, replace variables to produce the themes _style.css_ file.

I highly recommend you edit the .scss files and then generate a new style.css, after all that is the point of going with scss in the first place, right?

### The easy way with wp-scss plugin

The easiest way to get started is to load the 'wp-scss' plugin by Think Connect, and configure it such that you are compiling the /scss/ directory into the / directory (all directories are relative to the theme directory).

### The whole enchilada

Alternatively, you could also use the SASS compiler of your choice, or create a gruntfile.  You are certainly welcome to.  This may be necessary if you use an additional framework such as bourbon.  But setting up such an evironment isn't that hard.

For example, if you are using sass npm module, you could do the following to convert .scss to .css by running the following commands from the child theme directory:

```
sass --watch scss/style.css:style.css
```

About the Genesis style.css
---------------------------

I have basically moved the genesis-sample/style.css into the scss directory and renamed it to _genesis.scss so I can include it into the final stylesheet and get all the genesis goodness that goes along with it.

I have basically kept the original _genesis-sample/style.css_ intact in _scss/genesis/\_genesis.scss_ unmodified.  

I have also created _scss/genesis/\_genesis-modified.scss_ where I have modified certain things in the standard genesis file, for example changing hard coded font-families and colors with the variables that are set in the _settings.scss_ file.

I have also moved a couple things out that I find myself changing frequently, like the headers and navbars.  I have created scss versions of the files that basically override the original standard settings.

>Note: I made NO attempt at translating the original genesis-sample/style.css into a pure SCSS version, I saw no point in doing that.  I only converted a few of the items that I find my self modifing regularly.

I can then overwrite the default stylings for specific selectors with my own custom styles.

The idea is that I can update newer genesis-sample stylesheets with out having to rewrite them everytime.  This is not the most efficient what to handle stylesheets, but it is the easiest and should help future proof this code.

After all, I am far from a pureist. 

Genesis Grid System as Mixins
-----------------------------

I have taken the standard Genesis grid classes and turned them into mixins.
Why is that cool you ask?  Because, you can now add these mixins to any
existing HTML structure you want.

For example, if you have existing html that you can't or don't want to modify just to include the 'one-third first', 'one-half', etc. classes you can just
change (or override) the settings in css, for example:

```html
<!-- Example rows of a user photo, name and twitter handle -->
<div class='row'>
	<div class='photo'>
		<img src='http://example.com/me.jpg' />
	</div>

	<div class='name'>
		Rusty Eddy
	</div>

	<div class='twitter-handle'>
		@rustyeddy
	</div>
</div>
```

```css
/*
 *	Markup that will turn the stacked divs into a single row
 */ 
.row {
	.photo {
		@include one-half;
		@include first;
	}

	.name {
		@include one-fourth;
	}

	.twitter-handle {
		@include one-fourth;
	}
}
```

If you decide you want to change the column widths or go to a single column
with all divs stacked, just modify or remove the mixin accordingly.

No need to re-edit the html.  This is especially cool when you have to futz with html in TinyMCE hell.

Pretty sweet huh?

Convenience Functions
---------------------

### Load up Bootstrap if you like

```
gs_load_bootstrap()
```

This will link to the entire bootstrap .css and js located on MaxCDN.  Pass it a parameter and have it load the
version you passed in.

### Load Font Awesome

Load font awesome from the bootstrap CDN

```
gs_load_fontawesome()
````

### Load Google Fonts

Load Google fonts.  Provide a label and the font family string just as you would when calling enqueue.

``` 
gs_load_google_fonts( $label, $family )
```

### Make the page full width

``` 
gs_full_page_width()
```

### Move primary navbar above header

```
gs_primary_navbar_above_header()
```

### Replace Genesis Loop with a custom loop

This function will remove the standard _genesis_loop()_ and replace it with a custom loop that you have defined.

```
gs_replace_genesis_loop ( $new_loop_function )
```

### Remove the entry title

This function will completely remove the entry title from the post or the page. 

```
gs_remove_entry_title()
```

### Standard Front Page

This is another function that simple calls three other convencience functions. 

```
gs_standard_front_page( $new_loop, $front_page_css = 'front-page' )
```

### Sticky Secondary Menu

You can add a sticky secondary menu by calling the function 

```
gs_do_secondary_sticky_menu();
```

Widget Area Above Header
------------------------

You can easily place a widget are above the header on your website by calling:

```
gs_add_widget_above_header();
```

This comes from the Man himself [Brian Gardner](http://briangardner.com/add-widget-area-site-header/).

Nav Sub Menu Indicators
-----------------------

If you have included font-awesome you can also have your submenu's include _ticks_ that will indicate sub-menus.  

This functionality is on by default.

Super Hero
----------

Hero images have been around for quite a while, you know the big image along side of some form of CTA, button or optin box, etc.

Lately these hero images have become large images spanning the complete background above the fold with the CTA, button or optin box on top of the image. 

I like to call these the _Super Hero_ images.  This package has some php functions and corresponding style sheets to help you create some your own super hero image.

References:
-----------

* Brian Gardner [Code Snippets](http://briangardner.com/code/)
* Sridhar Katakam [Sub menu ticks article](http://sridharkatakam.com/adding-nav-sub-menu-indicators-genesis-using-font-awesome/)
* 

