Genesass
========

This is basically Sassified version of the Genesis Sample theme with quite a few of my own added functionality.

Sassification
-------------

I start using SASS, specifically SCSS a little while back and really like it.  In my head it fits much more closely with a _real programming language_ by supporting things like reusable pieces of code, mixins, variables.  It also allows you to structure your code in a _scoped_ manner making it much easier to read, share and maintian.

You can find all of the style sheets in the 

```
scss 
```

I highly recommend you edit the .scss files and then generate a new style.css, after all that is the point of going with scss in the first place, right?

## Getting Started

### The easy way with wp-scss plugin

The easiest way to get started is to load the 'wp-scss' plugin by Think Connect, and configure it such that you are compiling the /scss/ directory into the / directory (all directories are relative to the theme directory).

### The whole enchilada

Alternatively, you could also use the SASS compiler of your choice.  This may be necessary if you use an additional framework such as bourbon.  But setting up such an evironment isn't that hard.

Convert the .scss to .css by running the following commands from the child theme directory:

```
sass --watch scss/style.css:style.css
```

Or you can just do a one time conversion if you prefer.

About the Genesis style.css
---------------------------

I have basically moved the genesis-sample/style.css into the scss directory and renamed it to _genesis.scss so I can include it into the final stylesheet and get all the goodness that goes along with it.

I can then overwrite the default stylings for specific selectors with my own custom styles.

The idea is that I can update newer genesis-sample stylesheets with out having to rewrite them everytime.  This is not the most efficient what to handle stylesheets, but it should help future proof this code.

Genesis Grid System as Mixins
-----------------------------

I have taken the standard Genesis grid classes and turned them into mixins.
Why is that cool you ask?  Because, you can now add these mixins to any
existing HTML structure you want.

For example, if you have existing html that you can't or don't want to modify just to include the 'one-third first', 'one-half', etc. classes you can just
change (or override) the settings in css, for example:

```
<!-- Example rows of a user photo, name and twitter handle -->
<div class='row'>
	<div class='photo'>
		<img src='' />
	</div>

	<div class='name'>
		Rusty Eddy
	</div>

	<div class='twitter-handle'>
		@rustyeddy
	</div>
</div>

/*
 *	Markup that will allow you to 
 */ 
.row {
	@include first;
	...

	.photo {
		@include one-half;
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

No need to re-edit the html.  This is especially cool when you have to futz with html TinyMCE.

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

See: (This article)[http://sridharkatakam.com/adding-nav-sub-menu-indicators-genesis-using-font-awesome/]

This functionality is on by default.

Super Hero
----------

Hero images have been around for quite a while, you know the big image along side of some form of CTA, button or optin box, etc.

Lately these hero images have become large images spanning the complete background above the fold with the CTA, button or optin box on top of the image. 

I like to call these the _Super Hero_ images.  This package has some php functions and corresponding style sheets to help you create some your own super hero image.

References:
-----------

* Brian Gardner [Code Snippets](http://briangardner.com/code/)
