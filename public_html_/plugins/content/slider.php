<?php
/**
* @copyright	Copyright (C) 2007 Ian MacLennan. All rights reserved.
* @license		GNU/GPL
* The slider plugin is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport('joomla.event.plugin');

class plgContentSlider extends JPlugin
{
   /**
    * Constructor
    *
    * For php4 compatability we must not use the __constructor as a constructor for
    * plugins because func_get_args ( void ) returns a copy of all passed arguments
    * NOT references.  This causes problems with cross-referencing necessary for the
    * observer design pattern.
    */
    function plgContentSlider( &$subject, $config )
	{
		parent::__construct( $subject, $config );
	}

    /**
    * Plugin method with the same name as the event will be called automatically.
    */
    function onPrepareContent( &$row, &$params )
    {
        global $mainframe;
		$document =& JFactory::getDocument();
		JHTML::_( 'behavior.mootools' );
        // Plugin code goes here.
		//$row->text .= strlen( $row->text );
		$pattern = '/{beginslide\s+id="([^"]+)"\s+title="([^"]+)"}/';
		$matches = array();
		while (preg_match( $pattern, $row->text, $matches )) {
			$tag = $matches[0];
			$id = $matches[1];
			$title = $matches[2];
			$replaceText = '<a id="toggle'.$id.'" name="toggle'.$id.'" class="slideTitleLink"><span class="slideTitle">'.$title.'</span></a>';
			$replaceText .= '<div id="slide'.$id.'" class="slideBox">';
			$row->text = str_replace( $tag, $replaceText, $row->text );
			$script = 'window.addEvent(\'domready\', function(){ ';
			$script .= 'var mySlide'.$id.' = new Fx.Slide(\'slide'.$id.'\'); ';
			$script .= 'mySlide'.$id.'.hide(); ';
			$script .= ' $(\'toggle'.$id.'\').addEvent(\'mousedown\', function(e){ e = new Event(e); mySlide'.$id.'.toggle(); e.stop(); }); }); ';
			$document->addScriptDeclaration( $script );
		}
		if ($csspath = $this->params->get( 'csspath' )) {
			$document->addStyleSheet( JURI::base() . $csspath );
		}
		$row->text = str_replace( '{endslide}', '</div>', $row->text );
		return true;
	}

}
