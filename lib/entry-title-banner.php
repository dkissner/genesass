<?php

require_once 'entry-title-banner-acf.php';

/**
 * Change the entry titles into a full width banner just under the 
 * header.
 * 
 * The title that gets displayed changes depending on the type of "page"
 * being display.  
 * 
 * By default:
 * 
 *   - An archive page for a taxonomy or category will have the category for
 *     the title.
 *
 *   - An author archive will have the authors name.
 *
 *   - Pages and Posts will have the Page or Post title.
 *
 * If you have Advanced Custom Fields with the Entry Title you have much
 * more control over the contents of the entry title.
 * 
 * You can do the following on a Per Post / Page / CPT basis:
 *
 *    - Change the header text to anything you want
 *     
 *    - Add a subheader if you want
 *
 *    - Use an image as the background
 *
 *    - Add a custom CSS wrapper so you can make style changes on a
 *      per post basis, things like changing colors, font size, whatever.
 */
function gs_entry_title( $func ) {
    add_action( 'genesis_after_header', $func );
}

/**
 * This section of code will remove the entry title header from 
 * the entry itself and place it just below the header with a solid
 * background of a different color to give it a stand out effect.
 */
gs_entry_title( 'gs_do_entry_title' );
function gs_do_entry_title()
{
	echo "FOO";
	/*
	 * We do not want to modify the home or front page title, 
	 */
	if ( is_home() || is_front_page() ) {
		return;
	}

	/**
	 * Default use the normal title
	 */
	$title = get_the_title();
	$class = 'entry-title';

	/**
	 * Let's see if there is a custom field type to tell us
	 * what entry title to use..
	 *
	 * TODO: check to see if ACF is loaded before using this
	 */
	$acf_title_entry = new ACF_Entry_title();
	if ( $acf_title_entry->use_acf ) {
		$title = $acf_title_entry->toHtml();
	} else {
		$title = gs_create_entry_title();
	}
	echo $title;
}

function gs_create_entry_title()
{
	/* 
	 * If this is a single post or a page we want to take the 
	 * title of the post / page for our banner.
	 *
	 * If we are viewing a category or archive of some type, we
	 * want to take the title from that archive.
	 *
	 * I really need to create a unique 404 page.
	 */
	$class = 'entry-title';

	if ( is_single() || is_page() ) {

		gs_remove_entry_title();
		$title = get_the_title();

		$class .= ' single';

	} else if ( is_author() ) {

		$title = get_the_author();

		$class .= ' author';

	} else if ( is_category() || is_archive() ) {

		$class .= ' archive';

		$cats = get_the_category();
		$cat = $cats[0];
		$title = $cat->name;

	} else if ( is_404() ) {

		$title = "Ooops! I don't know what your looking for...";
		$class .= ' c404';
	}

	$html = sprintf( "<header class='%s'>\n", $class);
	$html .= "<h1>$title</h1>\n";
	$html .= "</header>";

	return $html;
}
