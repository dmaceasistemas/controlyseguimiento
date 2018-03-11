<?php

    /*********************************************\
    **   Xe-GalleryV1 Lite
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



class menuxegallery {



  function NEW_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save();

    mosMenuBar::cancel();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }  
  
  function NEW_CTG_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save("savecatg");

    mosMenuBar::cancel("cancelcatg");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function EDIT_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save();

    mosMenuBar::cancel();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }


  function EDIT_CTG_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save("savecatg");

    mosMenuBar::cancel("cancelcatg");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function DEFAULT_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::addNew();

    mosMenuBar::editList();

    mosMenuBar::deleteList();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }

  function CTG_MENU() {
    JToolBarHelper::title( JText::_( 'Xe-Gallery Lite -&rsaquo; Categories' ), 'generic.png' );
    mosMenuBar::startTable();
    
    mosMenuBar::publishList("publishcatg");

    mosMenuBar::unpublishList("unpublishcatg");


    
    mosMenuBar::addNew("newcatg");

    mosMenuBar::editList("editcatg");

    mosMenuBar::deleteList("","removecatg");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }
  
  function XEMAIN_MENU() {
    JToolBarHelper::title( JText::_( 'Xe-Gallery Lite -&rsaquo; Photos' ), 'generic.png' );
    mosMenuBar::startTable();
    
    mosMenuBar::publishList("publish");

    mosMenuBar::unpublishList("unpublish");


    mosMenuBar::divider();
    
    mosMenuBar::custom("approvepic","upload.png","upload_f2.png","Approve");

    mosMenuBar::divider();
        
    mosMenuBar::addNew("new");

    mosMenuBar::editList("edit");

    mosMenuBar::deleteList("","remove");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function CONFIG_MENU() {
    JToolBarHelper::title( JText::_( 'Xe-Gallery Lite -&rsaquo; Settings' ), 'generic.png' );
    mosMenuBar::startTable();

    mosMenuBar::save( 'savesettings', 'Save Settings' );

    mosMenuBar::back();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function COMMENTS_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::publishList( 'publishcmt', 'Publish Comment' );

    mosMenuBar::unpublishList( 'unpublishcmt', 'Unpublish Comment' );

    mosMenuBar::divider();

    mosMenuBar::deleteList( ' ', 'removecmt', 'Remove Comment' );

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



}

?>