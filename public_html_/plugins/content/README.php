<?php
/**
* @copyright	Copyright (C) 2007 Ian MacLennan. All rights reserved.
* @license		GNU/GPL
* Ian MacLennan - ian.maclennan@help.joomla.org
* The slider plugin is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

The slider plugin is a Joomla! plugin designed for the new Joomla! 1.5.  It takes advantage of the included
Mootools library to enable a toggle on/toggle off content area.  This is useful if you want to include
paragraphs in your article that should only appear if a title is clicked.

The elements can be styled using CSS.  There are three CSS classes: slideTitleLink, slideTitle and slideBox.

INSTALLATION:
1. Download the archive.
2. Install using the Joomla! Extension Installer
3. Publish the plugin

USE:
In your article, add the following around the text that you want to hide:
{beginslide id="..." title="..."}
...
{endslide}

The id can be any sequence of letters or numbers (but no spaces), and the title can be any valid XHTML string.

You can load an external stylesheet by specifying it in the plugin parameters.  You must upload the stylesheet to
your Joomla! server and then specify the path based on the main Joomla! directory (i.e. media/sliders.css).
