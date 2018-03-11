<?php
/**
 * @package		Joomla
 * @subpackage	JoomCoverflow
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class CoverflowControllerImagen extends JController
{
	/**
	 * Constructor
	 */
	function __construct( $config = array() )
	{
		parent::__construct( $config );
		// Register Extra tasks
		$this->registerTask( 'add',			'edit' );
		$this->registerTask( 'apply',		'save' );
		$this->registerTask( 'unpublish',	'publish' );
	}

	function display()
	{
		global $mainframe;

		$db =& JFactory::getDBO();

		$context			= 'com_joomcoverflow.imagen.list.';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',	'i.albumName',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',			'word' );
		$filter_state		= $mainframe->getUserStateFromRequest( $context.'filter_state',		'filter_state',		'',			'word' );
		$search				= $mainframe->getUserStateFromRequest( $context.'search',			'search',			'',			'string' );

		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart = $mainframe->getUserStateFromRequest( $context.'limitstart', 'limitstart', 0, 'int' );

		$where = array();

		if ( $filter_state )
		{
			if ( $filter_state == 'P' ) {
				$where[] = 'i.state = 1';
			}
			else if ($filter_state == 'U' ) {
				$where[] = 'i.state = 0';
			}
		}

		if ($search) {
			$where[] = 'LOWER(i.albumName) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
		}

		$where		= count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '';
		$orderby	= ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', i.ordering, i.id';

		// get the total number of records
		$query = 'SELECT COUNT(*)'
		. ' FROM #__coverflow_imagenes AS i'
		. $where
		;
		$db->setQuery( $query );
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );

		$query = 'SELECT i.*'
		. ' FROM #__coverflow_imagenes AS i'
		. $where
		. $orderby
		;
		$db->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
		$rows = $db->loadObjectList();

		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		// search filter
		$lists['search']= $search;

		require_once(JPATH_COMPONENT.DS.'views'.DS.'imagen.php');
		CoverflowViewImagen::display( $rows, $pageNav, $lists );
	}

	function edit()
	{
		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

		$cid	= JRequest::getVar('cid', array(0), 'method', 'array');
		JArrayHelper::toInteger($cid, array(0));
		$id		= JRequest::getVar( 'id', $cid[0], '', 'int' );

		$userId	= $user->get ( 'id' );

		$row =& JTable::getInstance('imagen', 'Table');
		$row->load( $id );
		
		// Imagelist
		$javascript			= 'onchange="changeDisplayImage();"';
		$directory			= '/images/coverflow';
		$lists['artLocation']	= JHTML::_('list.images',  'artLocation', $row->artLocation, $javascript, $directory, "bmp|gif|jpg|png|swf"  );
		
		$lists['state'] = JHTML::_('select.booleanlist', 'state', 'class="inputbox"', $row->state);

		require_once(JPATH_COMPONENT.DS.'views'.DS.'imagen.php');
		CoverflowViewImagen::edit( $row, $lists );
	}

	function save()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		// Initialize variables
		$db		=& JFactory::getDBO();
		$table	=& JTable::getInstance('imagen', 'Table');

		if (!$table->bind( JRequest::get( 'post' ) )) {
			return JError::raiseWarning( 500, $table->getError() );
		}
		if (!$table->check()) {
			return JError::raiseWarning( 500, $table->getError() );
		}
		if (!$table->store()) {
			return JError::raiseWarning( 500, $table->getError() );
		}
		$table->checkin();
		
		CoverflowControllerImagen::createXML();

		switch (JRequest::getCmd( 'task' ))
		{
			case 'apply':
				$this->setRedirect( 'index.php?option=com_joomcoverflow&c=imagen&task=edit&cid[]='. $table->id );
				break;
			case 'save':
			default:
				$this->setRedirect( 'index.php?option=com_joomcoverflow&c=imagen' );
		}

		$this->setMessage( JText::_( 'Item Saved' ) );
	}

	function cancel()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_joomcoverflow&c=imagen' );

		// Initialize variables
		$db			=& JFactory::getDBO();
		$table		=& JTable::getInstance('imagen', 'Table');
		$table->cid	= JRequest::getVar( 'cid', 0, 'post', 'int' );
		$table->checkin();
	}

	function publish()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_joomcoverflow&c=imagen' );

		// Initialize variables
		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$task		= JRequest::getCmd( 'task' );
		$publish	= ($task == 'publish');
		$n			= count( $cid );

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__coverflow_imagenes'
		. ' SET state = ' . (int) $publish
		. ' WHERE id IN ( '. $cids.'  )'
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			return JError::raiseWarning( 500, $row->getError() );
		}
		$this->setMessage( JText::sprintf( $publish ? 'Items published' : 'Items unpublished', $n ) );
		
		CoverflowControllerImagen::createXML();
	}

	function remove()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_joomcoverflow&c=imagen' );

		// Initialize variables
		$db		=& JFactory::getDBO();
		$cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$n		= count( $cid );
		JArrayHelper::toInteger( $cid );

		if ($n)
		{
			$query = 'DELETE FROM #__coverflow_imagenes'
			. ' WHERE id = ' . implode( ' OR id = ', $cid )
			;
			$db->setQuery( $query );
			if (!$db->query()) {
				JError::raiseWarning( 500, $row->getError() );
			}
		}

		$this->setMessage( JText::sprintf( 'Items removed', $n ) );
		
		CoverflowControllerImagen::createXML();
	}

	function saveOrder()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_joomcoverflow&c=imagen' );

		// Initialize variables
		$db			=& JFactory::getDBO();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order		= JRequest::getVar( 'order', array(), 'post', 'array' );
		$row		=& JTable::getInstance('imagen', 'Table');
		$total		= count( $cid );
		$conditions	= array();

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		// update ordering values
		for ($i = 0; $i < $total; $i++)
		{
			$row->load( (int) $cid[$i] );
			if ($row->ordering != $order[$i])
			{
				$row->ordering = $order[$i];
				if (!$row->store()) {
					return JError::raiseError( 500, $db->getErrorMsg() );
				}
				// remember to reorder this category
				$condition = 'catid = '.(int) $row->catid;
				$found = false;
				foreach ($conditions as $cond) {
					if ($cond[1] == $condition)
					{
						$found = true;
						break;
					}
				}
				if (!$found) {
					$conditions[] = array ( $row->bid, $condition );
				}
			}
		}

		// execute reorder for each category
		foreach ($conditions as $cond)
		{
			$row->load( $cond[0] );
			$row->reorder( $cond[1] );
		}

		// Clear the component's cache
		$cache =& JFactory::getCache('com_joomcoverflow');
		$cache->clean();

		$this->setMessage( JText::_('New ordering saved') );
		
		CoverflowControllerImagen::createXML();
	}

	function createXML() 
	{
		$db	=& JFactory::getDBO();
		
		$query = "SELECT i.*
			FROM #__coverflow_imagenes AS i
			WHERE i.state=1
			ORDER BY i.ordering ASC, i.id ASC";  
		$db->setQuery( $query );  
		$rows = $db->loadObjectList();
		if ($db->getErrorNum()) {
			echo $db->stderr();
			return false;
		}
	
		$albuminfoXml = "<artworkinfo>";
		foreach ($rows as $imagen) {
			$artistLink = (!empty($imagen->artistLink) && $imagen->artistLink<>'http://') ? $imagen->artistLink : '';
			$albumLink = (!empty($imagen->albumLink) && $imagen->albumLink<>'http://') ? $imagen->albumLink : '';
			$albuminfoXml .= "
			<albuminfo>
				<artLocation>images/coverflow/".$imagen->artLocation."</artLocation>
				<artist>".$imagen->artist."</artist>
				<albumName>".$imagen->albumName."</albumName>
				<artistLink>".$artistLink."</artistLink>
				<albumLink>".$albumLink."</albumLink>
			</albuminfo>
	
			";
		}
		$albuminfoXml .= "</artworkinfo>";
		
		if (!$fichXml = fopen("../components/com_joomcoverflow/albuminfo.xml", "w")) echo "Error! No se puede abrir el archivo ($fichXml)";
		if (!fwrite($fichXml, $albuminfoXml)) echo "Error! No se puede escribir al archivo ($fichXml)";
		fclose($fichXml);
	}
}

?>