<?php
/**
 * @package		Joomla
 * @subpackage	JoomCoverflow
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableImagen extends JTable
{
	/** @var int */
	var $id					= null;
	/** @var string */
	var $artLocation		= '';
	/** @var string */
	var $artist				= '';
	/** @var string */
	var $albumName			= '';
	/** @var string */
	var $artistLink			= '';
	/** @var string */
	var $albumLink			= '';
	/** @var int */
	var $state				= 0;
	/** @var int */
	var $ordering			= 0;

	function __construct( &$_db ) {
		parent::__construct( '#__coverflow_imagenes', 'id', $_db );
	}
}

?>