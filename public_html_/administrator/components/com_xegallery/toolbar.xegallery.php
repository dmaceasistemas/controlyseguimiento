<?php

    /*********************************************\
    **   Xe-GalleryV1 Lite
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );
$act = mosGetParam($_REQUEST,'act');
if ($act) $task = $act;

switch ($task) {
  case "new":
    menuxegallery::NEW_MENU();
    break;  
    
    case "newcatg":
    menuxegallery::NEW_CTG_MENU();
    break;

    case "showcatg":
    menuxegallery::CTG_MENU();
    break;

  case "edit":
    menuxegallery::EDIT_MENU();
    break;
  case "editcatg":
    menuxegallery::EDIT_CTG_MENU();
    break;

  case "settings":
    menuxegallery::CONFIG_MENU();
    break;

  case "upload":
  case "uploadhandler":
  case "batchupload":
  case "batchuploadhandler":
    break;

  case "comments":
    menuxegallery::COMMENTS_MENU();
    break;

  default:
    menuxegallery::XEMAIN_MENU();
    break;
}
?>