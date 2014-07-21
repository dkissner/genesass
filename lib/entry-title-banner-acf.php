<?php

class ACF_Entry_Title
{
	public $type;
	public $header;
	public $subheader;
	public $image;
	public $css_class;
	public $background_color;

	public $use_acf = false;

	public function __construct()
	{
		$this->get_values();
	}

	public function get_values()
	{
		$fld = get_field( 'type_of_header' );
		switch ( $fld ) {
			case '':
			return null;
			break;

			case 'text': 
			$this->get_headers();
			break;

			case 'image':
			$this->get_image();
			break;

			default:		// Don't know what is going on.
			return null;
			brea;
		}

		$this->get_css_class();
		$this->get_background_color();

		$this->type = $fld;
		$this->use_acf = true;
	}

	public function get_headers() 
	{
		$this->header = get_field( 'header' );
		if ( $this->header === '' ) {
			$this->header = null;
		}

		$this->subheader = get_field( 'subheader' );
		if ( $this->subheader === '' ) {
			$this->subheader = null;
		}
	}

	public function get_image()
	{
		$this->image = get_field('image');
	}

	public function get_css_class() 
	{
		$this->css_class = get_field( 'css_class' );
	}

	public function get_background_color()
	{
		if ( get_field( 'color_picker' ) ) {
			$this->background_color = get_field( 'background_color' );
		}
	}

	public function toHtml()
	{
		gs_remove_entry_title();

		$class = 'entry-title';
		if ( $this->css_class ) {
			$class .= ' ' . $this->css_class;
		}

		$title = '';
		if ( $this->type == 'image' ) {

			$class .= ' entry-title-image';
			$title = "<img class='entry-title-image' src='" . $this->image . "' />";

		} else if ( $this->type == 'text' ) {

			// This is the header
			if ( $this->header !== null ) {
				$title = "<h1>" . $this->header . "</h1>";
			}

			if ( $this->subheader ) {
				$title .= "<h2>" . $this->subheader . "</h2>";
			}
		} else {

			$title = '<h1>' . get_the_title() . '</h1>';			

		}

		$html = sprintf( "<header class='%s'>\n", $class);
		$html .= $title . "\n";
		$html .= "</header>";

		return $html;
	}
}