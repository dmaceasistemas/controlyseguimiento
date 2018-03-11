CREATE TABLE `#__flippingbook_books` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `alias` text NOT NULL,
  `description` text NOT NULL,
  `preview_image` varchar(255) NOT NULL,
  `background_image` varchar(255) NOT NULL,
  `flash_width` int(4) NOT NULL,
  `flash_height` int(4) NOT NULL,
  `book_width` int(4) NOT NULL,
  `book_height` int(4) NOT NULL,
  `page_background_color` varchar(10) NOT NULL,
  `rotation` varchar(4) NOT NULL,
  `flip_area` int(4) NOT NULL,
  `static_shadows_depth` int(3) NOT NULL,
  `dynamic_shadows_depth` int(3) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(6) NOT NULL,
  `background_color` varchar(10) NOT NULL,
  `always_opened` tinyint(1) NOT NULL,
  `first_page` int(4) NOT NULL,
  `scale_content` tinyint(1) NOT NULL,
  `show_navigation` tinyint(1) NOT NULL,
  `show_description` tinyint(1) NOT NULL,
  `show_book_title` tinyint(1) NOT NULL,
  `show_back_button` tinyint(1) NOT NULL,
  `show_pages_list` tinyint(1) NOT NULL,
  `show_pages_description` tinyint(1) NOT NULL,
  `show_slide_show_button` tinyint(4) NOT NULL,
  `slide_show` tinyint(1) NOT NULL,
  `slide_show_display_duration` int(8) NOT NULL,
  `slide_show_loop` tinyint(1) NOT NULL,
  `page_flip_delay` int(6) NOT NULL,
  `flip_corner_on_load` tinyint(1) NOT NULL,
  `open_book_in` int(4) NOT NULL,
  `new_window_height` int(4) NOT NULL,
  `new_window_width` int(4) NOT NULL,
  `checked_out_time` int(11) NOT NULL default '0',
  `checked_out` int(11) NOT NULL,
  `emailIcon` tinyint(1) NOT NULL,
  `printIcon` tinyint(1) NOT NULL,
  `category_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
);


INSERT INTO `#__flippingbook_books` VALUES (1, 'FlippingBook In Action', 'sample-book', 'It is recommended that you get to know the component  from this sample, which shows the basic component settings and capabilities.<br />   FlippingBook engine works with <strong>JPEG</strong> and <strong>SWF</strong> (Flash) files. The JPEG format is convenient for creating picture albums, SWF -  for presentations with animation, video, links etc.<em> You can modify this text in administration back-end  (Components &gt; FlippingBook &gt; Manage Books &gt; FlippingBook In Action  &gt; Description).</em>', 'book_preview.png', 'background.jpg', 520, 390, 480, 350, 'CCCCCC', '0', 75, 1, 2, 1, 5, 'DDDDDD', 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 5, 1, 5, 0, 1, 600, 640, 0, 0, 1, 1, 1);


CREATE TABLE `#__flippingbook_categories` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `alias` text NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(6) NOT NULL,
  `checked_out_time` int(11) NOT NULL default '0',
  `checked_out` int(11) NOT NULL,
  `emailIcon` tinyint(1) NOT NULL,
  `printIcon` tinyint(1) NOT NULL,
  `columns` int(2) NOT NULL,
  `preview_image` text NOT NULL,
  `show_title` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
);


INSERT INTO `#__flippingbook_categories` VALUES (1, 'Default category', 'Default-category', 'Category description', 1, 2, 0, 0, 1, 1, 1, 'book_preview.png', 1);


CREATE TABLE `#__flippingbook_config` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
);


INSERT INTO `#__flippingbook_config` VALUES (1, 'flipOnClick', '0', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (2, 'moveSpeed', '2', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (3, 'closeSpeed', '2', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (4, 'flipSound', 'components/com_flippingbook/sounds/newspaper.mp3', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (5, 'loadOnDemand', '1', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (6, 'cachePages', '1', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (7, 'cacheSize', '10', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (8, 'preloaderType', 'Progress Bar', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (9, 'category_list_title', 'My books1', 'global');
INSERT INTO `#__flippingbook_config` VALUES (10, 'language', 'english.php', 'global');
INSERT INTO `#__flippingbook_config` VALUES (11, 'style', 'white', 'global');
INSERT INTO `#__flippingbook_config` VALUES (12, 'columns', '2', 'global');
INSERT INTO `#__flippingbook_config` VALUES (13, 'allowPagesUnload', '0', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (14, 'flashCookie', '0', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (15, 'gotoSpeed', '3', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (16, 'showUnderlyingPages', '1', 'xml');
INSERT INTO `#__flippingbook_config` VALUES (17, 'emailIcon', '1', 'global');
INSERT INTO `#__flippingbook_config` VALUES (18, 'printIcon', '1', 'global');
INSERT INTO `#__flippingbook_config` VALUES (19, 'categoryListStyle', '0', 'global');


CREATE TABLE `#__flippingbook_pages` (
  `id` int(11) NOT NULL auto_increment,
  `file` varchar(255) NOT NULL,
  `book_id` int(4) NOT NULL default '0',
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '1',
  `link_url` text NOT NULL,
  `link_url_target` int(1) NOT NULL default '4',
  `link_window_height` int(4) NOT NULL default '480',
  `link_window_width` int(4) NOT NULL default '640',
  `zoom_url` text NOT NULL,
  `zoom_url_target` int(1) NOT NULL default '3',
  `zoom_window_height` int(4) NOT NULL default '480',
  `zoom_window_width` int(4) NOT NULL default '640',
  `checked_out_time` int(11) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
);

INSERT INTO `#__flippingbook_pages` VALUES (1, 'page_01.swf', 1, '<strong>Page 1. This text demonstrates a new feature - Page Description.</strong> You can place an image on the page and a text (html) description below. <strong>Please notice that FlippingBook request each page description on the server. It takes some time to load description on slow servers.</strong> If you don''t need the Page Description - just disable it in book properties. <em>You can modify this text in administration back-end (Components &gt; FlippingBook &gt; Manage Pages &gt; page properties &gt; Description).</em>', 1, 1, '', 3, 480, 640, '', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (2, 'page_02.swf', 1, '<strong>Page 2.</strong> You can place hotspots on the page and use them as links.<br /><strong>Here are some examples of links:</strong><br />- Use <a href="index.php?option=com_flippingbook&view=book&id=1&firstPageNumber=4"><strong>this link</strong></a> for opening the book on specified page. <br /> - <a href="index2.php?option=com_flippingbook&view=book&id=1"><strong>This link</strong></a> will open the book in a new window without template elements.<br /> - Use <a href="#" onclick="javascript: window.open(''index.php?option=com_flippingbook&view=book&id=1&tmpl=component'', '''', ''toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=640,height=600''); return false"><strong>this code</strong></a> for opening the book in a popup window.', 2, 1, '', 1, 480, 640, '', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (3, 'page_03.swf', 1, '<strong>Page 3.</strong> <strong>Zooming feature </strong>can open a JPG or SWF file by clicking on the page. This feature is very useful for books with text on pages. Use an enlarged image to show more readable text. Visitors can print an enlarged image.<br /><strong>New advanced navigation bar</strong> can show/hide the Pages List, Slideshow and Book List buttons. You can download themes for the navigation bar in PSD format on our website and modify buttons for your own project in no time at all.<br /><strong>Page Links. </strong>You can place any link below each page, which can be documentation or an instruction, such as a "Buy Now" link, helpful information etc. Click the "Download" button to get sources of this book.<strong><br /></strong>', 3, 1, 'http://page-flip-tools.com/download/1.5.5_sample.zip', 1, 480, 640, 'page_03_zoom.jpg', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (4, 'page_04.jpg', 1, '<strong>Page 4-5.</strong> If you want to set one description for a whole spread - just leave a blank description field for one page.', 4, 1, '', 1, 480, 640, '', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (5, 'page_05.jpg', 1, '', 5, 1, '', 3, 600, 800, '', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (6, 'page_06.jpg', 1, '<strong>Page 6. Basic features:<br /></strong>- The simplest ever page-adding procedure <br /> - Page Preloader (you may edit it or disable as required)<br /> - 2 page caching modes (full preloading and loading on demand)<br /> - Animation control (page flipping speed, shadow depth and background color)<br /> - First book page number control<br /> - User friendly interface', 6, 1, '', 3, 600, 800, '', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (7, 'page_07.jpg', 1, '<strong>Page 7. What is the maximum size and number of pages? </strong><br /> The size of the book you can create using our product is unlimited. However, in light of the fact that Flash Player works slowly with large images (don''t forget - some users still use a 1024x768 screen resolution), it recomended to use images on pages with the following sizes: width =Book Width / 2 and height = Book Height.', 7, 1, '', 3, 600, 800, '', 4, 600, 800, 0, 0);
INSERT INTO `#__flippingbook_pages` VALUES (8, 'page_08.swf', 1, '<strong>Page 8. If you are experiencing problems with FlippingBook</strong>, feel free to contact us. In your message, please describe your problem (or attach the screenshot), detail your order number, the email address that you used for the order and site URL with FlippingBook installed. You can find contact information in administration back-end (Components &gt; FlippingBook &gt; Support and Contacts).', 8, 1, '', 3, 600, 800, '', 4, 600, 800, 0, 0);
