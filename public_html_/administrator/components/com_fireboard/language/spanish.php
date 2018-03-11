<?php
/**
* @version $Id: spanish.php 311 2007-09-03 13:30:42Z danialt $
* Fireboard Component
* @package Fireboard
* @Copyright (C) 2006 - 2007 Best Of Joomla All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.bestofjoomla.com
*
* Based on Joomlaboard Component
* @copyright (C) 2000 - 2004 TSMF / Jan de Graaff / All Rights Reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @author TSMF & Jan de Graaff
*
*              Language: Spanish
* For Fireboard version: 1.0.3
*              Encoding: UTF-8
*            Translator: Gonzalo R Meneses A.
*               Website: http://www.oshavenezolana.com
*                E-mail: alakentu2003@gmail.com
*   Translation version: 1.0
**/

// Dont allow direct linking
defined ('_VALID_MOS') or die('Direct Access to this location is not allowed.');

// 1.0.4
DEFINE('_FB_COPY_FILE', 'Copiando "%src%" a "%dst%"...');
DEFINE('_FB_COPY_OK', 'OK');
DEFINE('_FB_CSS_SAVE', 'Guardado del archivo css puede ser aquí...archivo="%file%"');
DEFINE('_FB_UP_ATT_10', 'Estructura de tabla para archivos adjuntos, se ha actualizado a la última serie 1.0.x!');
DEFINE('_FB_UP_ATT_10_MSG', 'Estructura de tabla para archivos adjuntos en mensajes, se ha actualizado a la última serie 1.0.x!');
DEFINE('_FB_TOPIC_MOVED', '---');
DEFINE('_FB_TOPIC_MOVED_LONG', '------------');
DEFINE('_FB_POST_DEL_ERR_CHILD', 'Imposible promover jerarquías en Sub-Foros. Nada ha sido eliminado.');
DEFINE('_FB_POST_DEL_ERR_MSG', 'No se ha podido eliminar el mensaje(s). Nada ha sido eliminado');
DEFINE('_FB_POST_DEL_ERR_TXT', 'Imposible eliminar el texto del mensaje(s). Actualice su base de datos manualmente (mesid=%id%).');
DEFINE('_FB_POST_DEL_ERR_USR', 'Todo ha sido eliminado, pero hubo error al actualizar las estadísticas de usuarios!');
DEFINE('_FB_POST_MOV_ERR_DB', "Grave error en la base de datos. Actualice la base de datos manualmente a fin de garantizar coincidencias en las respuestas a los tema dentro del nuevo foro");
DEFINE('_FB_UNIST_SUCCESS', "Componente Fireboard se ha desinstalado correctamente!");
DEFINE('_FB_PDF_VERSION', 'Versión del Componente FireBoard Forum: %version%');
DEFINE('_FB_PDF_DATE', 'Generado: %date%');
DEFINE('_FB_SEARCH_NOFORUM', 'No hay foros para buscar en.');

DEFINE('_FB_ERRORADDUSERS', 'Error al agregar el usuario:');
DEFINE('_FB_USERSSYNCDELETED', 'Usuarios sincronizados; Eliminados:');
DEFINE('_FB_USERSSYNCADD', ', agregar:');
DEFINE('_FB_SYNCUSERPROFILES', 'perfiles de usuarios.');
DEFINE('_FB_NOPROFILESFORSYNC', 'No se han encontrado perfiles eligibles para sincronización.');
DEFINE('_FB_SYNC_USERS', 'Sincronizar usuarios');
DEFINE('_FB_SYNC_USERS_DESC', 'Sincroniza la tabla de usuarios del foro con la de Joomla en la base de datos');
DEFINE('_FB_A_MAIL_ADMIN', 'Email de Administradoress');
DEFINE('_FB_A_MAIL_ADMIN_DESC',
    'Seleccionado a &quot;Si&quot; si desea enviar notificaciones de nuevos temas al adminitrador del sistema.');
DEFINE('_FB_RANKS_EDIT', 'Editar Rango');
DEFINE('_FB_USER_HIDEEMAIL', 'Esconder Email');
DEFINE('_FB_DT_DATE_FMT','%m/%d/%Y');
DEFINE('_FB_DT_TIME_FMT','%H:%M');
DEFINE('_FB_DT_DATETIME_FMT','%m/%d/%Y %H:%M');
DEFINE('_FB_DT_LDAY_SUN', 'Domingo');
DEFINE('_FB_DT_LDAY_MON', 'Lunes');
DEFINE('_FB_DT_LDAY_TUE', 'Martes');
DEFINE('_FB_DT_LDAY_WED', 'Miercoles');
DEFINE('_FB_DT_LDAY_THU', 'Jueves');
DEFINE('_FB_DT_LDAY_FRI', 'Viernes');
DEFINE('_FB_DT_LDAY_SAT', 'Sabado');
DEFINE('_FB_DT_DAY_SUN', 'Dom');
DEFINE('_FB_DT_DAY_MON', 'Lun');
DEFINE('_FB_DT_DAY_TUE', 'Mar');
DEFINE('_FB_DT_DAY_WED', 'Mie');
DEFINE('_FB_DT_DAY_THU', 'Jue');
DEFINE('_FB_DT_DAY_FRI', 'Vie');
DEFINE('_FB_DT_DAY_SAT', 'Sab');
DEFINE('_FB_DT_LMON_JAN', 'Enero');
DEFINE('_FB_DT_LMON_FEB', 'Febrero');
DEFINE('_FB_DT_LMON_MAR', 'Marzo');
DEFINE('_FB_DT_LMON_APR', 'Abril');
DEFINE('_FB_DT_LMON_MAY', 'Mayo');
DEFINE('_FB_DT_LMON_JUN', 'Junio');
DEFINE('_FB_DT_LMON_JUL', 'Julio');
DEFINE('_FB_DT_LMON_AUG', 'Agosto');
DEFINE('_FB_DT_LMON_SEP', 'Septiembre');
DEFINE('_FB_DT_LMON_OCT', 'Octubre');
DEFINE('_FB_DT_LMON_NOV', 'Noviembre');
DEFINE('_FB_DT_LMON_DEV', 'Diciembre');
DEFINE('_FB_DT_MON_JAN', 'Ene');
DEFINE('_FB_DT_MON_FEB', 'Feb');
DEFINE('_FB_DT_MON_MAR', 'Mar');
DEFINE('_FB_DT_MON_APR', 'Abr');
DEFINE('_FB_DT_MON_MAY', 'May');
DEFINE('_FB_DT_MON_JUN', 'Jun');
DEFINE('_FB_DT_MON_JUL', 'Jul');
DEFINE('_FB_DT_MON_AUG', 'Ago');
DEFINE('_FB_DT_MON_SEP', 'Sep');
DEFINE('_FB_DT_MON_OCT', 'Oct');
DEFINE('_FB_DT_MON_NOV', 'Nov');
DEFINE('_FB_DT_MON_DEV', 'Dic');
DEFINE('_FB_CHILD_BOARD', 'Sub-Foro');
DEFINE('_WHO_ONLINE_GUEST', 'Invitado');
DEFINE('_WHO_ONLINE_MEMBER', 'Miembro');
DEFINE('_FB_IMAGE_PROCESSOR_NONE', 'ninguno');
DEFINE('_FB_IMAGE_PROCESSOR', 'Procesador de Imagen:');
DEFINE('_FB_INSTALL_CLICK_TO_CONTINUE', 'Click aquí para continuar...');
DEFINE('_FB_INSTALL_APPLY', 'Aplicar!');
DEFINE('_FB_NO_ACCESS', 'Usted no puede acceder a este foro!');
DEFINE('_FB_TIME_SINCE', '%time% antes');
DEFINE('_FB_DATE_YEARS', 'Años');
DEFINE('_FB_DATE_MONTHS', 'Meses');
DEFINE('_FB_DATE_WEEKS','Semanas');
DEFINE('_FB_DATE_DAYS', 'Dias');
DEFINE('_FB_DATE_HOURS', 'Horas');
DEFINE('_FB_DATE_MINUTES', 'Minutos');
// 1.0.3
DEFINE('_FB_CONFIRM_REMOVESAMPLEDATA', 'Estas seguro de eliminar los datos de ejemplo? No se pueden recuperar los datos una vez borrados.');
// 1.0.2
DEFINE('_FB_HEADERADD', 'Tópico del Foro:');
DEFINE('_FB_ADVANCEDDISPINFO', "Vista del foro");
DEFINE('_FB_CLASS_SFX', "Sufijo CSS del foro");
DEFINE('_FB_CLASS_SFXDESC', "Sufijo CSS aplicado al index, showcat, vista y permite diferentes diseños por foro.");
DEFINE('_COM_A_USER_EDIT_TIME', 'Tiempo de edición de usuario');
DEFINE('_COM_A_USER_EDIT_TIME_DESC', 'Asignado a 0 significa tiempo ilimitado, si no cuenta
segundos antes que el enlace para editar desaparezca');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE', 'Tiempo máximo de edición de mensajes');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE_DESC', 'Por defecto 600 [segundos], permite guardar una modificación hasta 600
segundos antes que el enlace para editar desaparece');
DEFINE('_FB_HELPPAGE','Activar página de ayuda');
DEFINE('_FB_HELPPAGE_DESC','Asignado a &quot;Si&quot muestra un enlace en el top menu para la página de la ayuda.');
DEFINE('_FB_HELPPAGE_IN_FB','Mostrar ayuda en fireboard');
DEFINE('_FB_HELPPAGE_IN_FB_DESC','Asignado a &quot;Si&quot la ayuda esta incluido en el Fireboard y desactiva la página de la ayuda externo. Atención: Deberias añadir "Ayuda ID del contenido" .');
DEFINE('_FB_HELPPAGE_CID','Ayuda ID del contenido');
DEFINE('_FB_HELPPAGE_CID_DESC','Deberias asignar "Si" "Mostrar ayuda en Fireboard" configuración.');
DEFINE('_FB_HELPPAGE_LINK',' Enlace para la ayuda externo');
DEFINE('_FB_HELPPAGE_LINK_DESC','Cuando el enlace para la ayuda externo esta activado, debes asignar "NO" "Mostrar ayuda en Fireboard" configuración.');
DEFINE('_FB_RULESPAGE','Activar página de reglas');
DEFINE('_FB_RULESPAGE_DESC','Asignado a &quot;Si&quot muestra un enlace en el top menu para la página de la reglas.');
DEFINE('_FB_RULESPAGE_IN_FB','Mostrar reglas en el Fireboard');
DEFINE('_FB_RULESPAGE_IN_FB_DESC','Asignado a &quot;Si&quot el contenido de la reglas esta incluido en el Fireboard y la página externa de las reglas esta desactivado. Atencion: Deberias añadir: "Reglas ID del contenido" .');
DEFINE('_FB_RULESPAGE_CID','Reglas ID del contenido');
DEFINE('_FB_RULESPAGE_CID_DESC','Deberias asignar &quot;Si&quot "Mostrar reglas en el Fireboard" configuración.');
DEFINE('_FB_RULESPAGE_LINK',' Enlace externo para la página de la reglas');
DEFINE('_FB_RULESPAGE_LINK_DESC','Cuando el enlace para las reglas externo esta activado, deberias asignar "NO" "Mostrar reglas en Fireboard" configuración.');
DEFINE('_FB_AVATAR_GDIMAGE_NOT','No se puede encontrar la biblioteca GD');
DEFINE('_FB_AVATAR_GD2IMAGE_NOT','No se puede encontrar la biblioteca GD2');
DEFINE('_FB_GD_INSTALLED','GD esta disponible ');
DEFINE('_FB_GD_NO_VERSION','No puede detectar la version de la GD');
DEFINE('_FB_GD_NOT_INSTALLED','GD no esta intallado, puedes obtener más informacion ');
DEFINE('_FB_AVATAR_SMALL_HEIGHT','Altura de imagen pequeña :');
DEFINE('_FB_AVATAR_SMALL_WIDTH','Anchura de imagen pequeña :');
DEFINE('_FB_AVATAR_MEDIUM_HEIGHT','Altura de imagen mediana :');
DEFINE('_FB_AVATAR_MEDIUM_WIDTH','Anchura de imagen mediana :');
DEFINE('_FB_AVATAR_LARGE_HEIGHT','Altura de imagen grande :');
DEFINE('_FB_AVATAR_LARGE_WIDTH','Anchura de imagen grande :');
DEFINE('_FB_AVATAR_QUALITY','Calidad del Avatar');
DEFINE('_FB_WELCOME','Bienvenido al Fireboard');
DEFINE('_FB_WELCOME_DESC','Gracias para elegir Fireboard para tu página. Esta página te da una vista general de todos los diferentes estatisticas del foro. Los enlaces a la izquierda permiten un control de todos los funciones del Fireboard. Cada página tiene sus instruciones para el uso de la herramientas.');
DEFINE('_FB_STATISTIC','Estatisticas');
DEFINE('_FB_VALUE','Valor');
DEFINE('_GEN_CATEGORY','Categoría');
DEFINE('_GEN_STARTEDBY','Iniciado por: ');
DEFINE('_GEN_STATS','Estadísticas');
DEFINE('_STATS_TITLE','Estadísticas del foro');
DEFINE('_STATS_GEN_STATS','Estadísticas general');
DEFINE('_STATS_TOTAL_MEMBERS','Miembros:');
DEFINE('_STATS_TOTAL_REPLIES','Respuestas:');
DEFINE('_STATS_TOTAL_TOPICS','Temas:');
DEFINE('_STATS_TODAY_TOPICS','Temas de hoy:');
DEFINE('_STATS_TODAY_REPLIES','Respuestas de hoy:');
DEFINE('_STATS_TOTAL_CATEGORIES','Categorías:');
DEFINE('_STATS_TOTAL_SECTIONS','Secciones:');
DEFINE('_STATS_LATEST_MEMBER','Ultimo miembro:');
DEFINE('_STATS_YESTERDAY_TOPICS','Tema de ayer:');
DEFINE('_STATS_YESTERDAY_REPLIES','Respuestas de ayer:');
DEFINE('_STATS_POPULAR_PROFILE','Los 10 miembros más popular ( del perfil)');
DEFINE('_STATS_TOP_POSTERS','Miembros más activos');
DEFINE('_STATS_POPULAR_TOPICS','Temas más pupular');
DEFINE('_COM_A_STATSPAGE','Activar página de estatisticas');
DEFINE('_COM_A_STATSPAGE_DESC','Asignado a &quot;Si&quot muestra un enlace publico en el top menu para la página de las estadísticas. Esa página muestra diferentes estadísticas del foro. Esa página de estadísticas siempre esta activado por el administrador a pesar de la confirugarión!');
DEFINE('_COM_C_JBSTATS','Estadísticas del foro');
DEFINE('_COM_C_JBSTATS_DESC','Estadísticas del foro');
DEFINE('_GEN_GENERAL','General');
DEFINE('_PERM_NO_READ','No tienes suficiente derechos para acceder al foro.');
DEFINE('_FB_SMILEY_SAVED','Smiley grabado');
DEFINE('_FB_SMILEY_DELETED','Smiley borrado');
DEFINE('_FB_CODE_ALLREADY_EXITS','Ya hay ese codigo en uso');
DEFINE('_FB_MISSING_PARAMETER','Parametro ausente');
DEFINE('_FB_RANK_ALLREADY_EXITS','Ya hay un rango de esa forma');
DEFINE('_FB_RANK_DELETED','Rango borrado');
DEFINE('_FB_RANK_SAVED','Rango grabado');
DEFINE('_FB_DELETE_SELECTED','Borrar elegido');
DEFINE('_FB_MOVE_SELECTED','Mover elegido');
DEFINE('_FB_REPORT_LOGGED','Reporte guardado');
DEFINE('_FB_GO','Ir');
DEFINE('_FB_MAILFULL','Incluir el contenido total del post en el email que se envía a los suscriptores');
DEFINE('_FB_MAILFULL_DESC','Asignado a NO, abonados solo recibiran los titulos de nuevos mensajes');
DEFINE('_FB_HIDETEXT','Debes logearte para ver este contenido!');
DEFINE('_BBCODE_HIDE','Text oculto: cualquier texto oculto - para esconder partes del mensaje de visitantes');
DEFINE('_FB_FILEATTACH','Adjuntar fichero: ');
DEFINE('_FB_FILENAME','Nombre del fichero: ');
DEFINE('_FB_FILESIZE','Tamaño del fichero: ');
DEFINE('_FB_MSG_CODE','Código: ');
DEFINE('_FB_CAPTCHA_ON','Spam protect system');
DEFINE('_FB_CAPTCHA_DESC','Sistema CAPTCHA Antispam y antibot Encendido/Apagado');
DEFINE('_FB_CAPDESC','Anotar código aqui');
DEFINE('_FB_CAPERR','Código no esta correcto!');
DEFINE('_FB_COM_A_REPORT', 'Información de mensajes');
DEFINE('_FB_COM_A_REPORT_DESC', 'Si quieres que usuarios pueden informar/reportar/quejarse de mensajes, eliges SI.');
DEFINE('_FB_REPORT_MSG', 'Mensaje reportado');
DEFINE('_FB_REPORT_REASON', 'Razón');
DEFINE('_FB_REPORT_MESSAGE', 'Mensaje de reporte');
DEFINE('_FB_REPORT_SEND', 'Enviar reporte');
DEFINE('_FB_REPORT', 'Reportar al moderador');
DEFINE('_FB_REPORT_RSENDER', 'Reportar remitiente: ');
DEFINE('_FB_REPORT_RREASON', 'Razon de reporte: ');
DEFINE('_FB_REPORT_RMESSAGE', 'Mensaje reportado: ');
DEFINE('_FB_REPORT_POST_POSTER', 'Posteador del mensaje: ');
DEFINE('_FB_REPORT_POST_SUBJECT', 'Tema del mensaje: ');
DEFINE('_FB_REPORT_POST_MESSAGE', 'Mensaje: ');
DEFINE('_FB_REPORT_POST_LINK', 'Enlace al mensaje: ');
DEFINE('_FB_REPORT_INTRO', 'ha sido enviado un mensaje porque');
DEFINE('_FB_REPORT_SUCCESS', 'Reporte enviado con exito!');
DEFINE('_FB_EMOTICONS', 'Emoticones');
DEFINE('_FB_EMOTICONS_SMILEY', 'Smiley');
DEFINE('_FB_EMOTICONS_CODE', 'Código');
DEFINE('_FB_EMOTICONS_URL', 'URL');
DEFINE('_FB_EMOTICONS_EDIT_SMILEY', 'Editar Smiley');
DEFINE('_FB_EMOTICONS_EDIT_SMILIES', 'Editar Smilies');
DEFINE('_FB_EMOTICONS_EMOTICONBAR', 'EmoticonBar');
DEFINE('_FB_EMOTICONS_NEW_SMILEY', 'Nuevo Smiley');
DEFINE('_FB_EMOTICONS_MORE_SMILIES', 'Más Smilies');
DEFINE('_FB_EMOTICONS_CLOSE_WINDOW', 'Cerrar ventana');
DEFINE('_FB_EMOTICONS_ADDITIONAL_EMOTICONS', 'Emoticones addicionales');
DEFINE('_FB_EMOTICONS_PICK_A_SMILEY', 'Elegir un smiley');
DEFINE('_FB_MAMBOT_SUPPORT', 'Soporte para Joomla Mambot');
DEFINE('_FB_MAMBOT_SUPPORT_DESC', 'Activar Soporte para Joomla Mambot');
DEFINE('_FB_MYPROFILE_PLUGIN_SETTINGS', 'La configuración del plugin para mi perfil');
DEFINE('_FB_USERNAMECANCHANGE', 'Permitir que usuarios puedan cambiar su nombre');
DEFINE('_FB_USERNAMECANCHANGE_DESC', 'Permitir que usuarios pueden cambiar el nombre en la pagina del perfil');
DEFINE('_FB_RECOUNTFORUMS','Recuento de las estatisticas de la categorias');
DEFINE('_FB_RECOUNTFORUMS_DONE','Todas las estatisticas han sido contado de nuevo.');
DEFINE('_FB_EDITING_REASON','Razon de editar');
DEFINE('_FB_EDITING_LASTEDIT','Última modificación');
DEFINE('_FB_BY','Por');
DEFINE('_FB_REASON','Razón');
DEFINE('_GEN_GOTOBOTTOM', 'Ir al fondo');
DEFINE('_GEN_GOTOTOP', 'Ir al inicio');
DEFINE('_STAT_USER_INFO', 'Información del usuario');
DEFINE('_USER_SHOWEMAIL', 'Mostrar Email');
DEFINE('_USER_SHOWONLINE', 'Mostrar Online');
DEFINE('_FB_HIDDEN_USERS', 'Usuario oculto');
DEFINE('_FB_SAVE', 'Grabar');
DEFINE('_FB_RESET', 'Actualizar');
DEFINE('_FB_DEFAULT_GALLERY', 'Galería predeterminada');
DEFINE('_FB_MYPROFILE_PERSONAL_INFO', 'Información personal');
DEFINE('_FB_MYPROFILE_SUMMARY', 'Resumen');
DEFINE('_FB_MYPROFILE_MYAVATAR', 'Mi Avatar');
DEFINE('_FB_MYPROFILE_FORUM_SETTINGS', 'Configuración del foro');
DEFINE('_FB_MYPROFILE_LOOK_AND_LAYOUT', 'Diseño');
DEFINE('_FB_MYPROFILE_MY_PROFILE_INFO', 'Información de mi perfil');
DEFINE('_FB_MYPROFILE_MY_POSTS', 'Mis mensajes');
DEFINE('_FB_MYPROFILE_MY_SUBSCRIBES', 'Mis mensajes suscriptos');
DEFINE('_FB_MYPROFILE_MY_FAVORITES', 'Mis favoritos');
DEFINE('_FB_MYPROFILE_PRIVATE_MESSAGING', 'Mensaje privado');
DEFINE('_FB_MYPROFILE_INBOX', 'Entrada');
DEFINE('_FB_MYPROFILE_NEW_MESSAGE', 'Nuevo mensaje');
DEFINE('_FB_MYPROFILE_OUTBOX', 'Salida');
DEFINE('_FB_MYPROFILE_TRASH', 'Basura');
DEFINE('_FB_MYPROFILE_SETTINGS', 'Configuración');
DEFINE('_FB_MYPROFILE_CONTACTS', 'Contactos');
DEFINE('_FB_MYPROFILE_BLOCKEDLIST', 'Lista de bloqueados');
DEFINE('_FB_MYPROFILE_ADDITIONAL_INFO', 'Información addicional');
DEFINE('_FB_MYPROFILE_NAME', 'Nombre');
DEFINE('_FB_MYPROFILE_USERNAME', 'Usuario');
DEFINE('_FB_MYPROFILE_EMAIL', 'Email');
DEFINE('_FB_MYPROFILE_USERTYPE', 'Tipo de usuario');
DEFINE('_FB_MYPROFILE_REGISTERDATE', 'Fecha de registro');
DEFINE('_FB_MYPROFILE_LASTVISITDATE', 'Última visita');
DEFINE('_FB_MYPROFILE_POSTS', 'Mensajes');
DEFINE('_FB_MYPROFILE_PROFILEVIEW', 'Vista del perfil');
DEFINE('_FB_MYPROFILE_PERSONALTEXT', 'Texto personal');
DEFINE('_FB_MYPROFILE_GENDER', 'Género');
DEFINE('_FB_MYPROFILE_BIRTHDATE', 'Fecha de nacimiento');
DEFINE('_FB_MYPROFILE_BIRTHDATE_DESC', 'Año (YYYY) - Mes (MM) - Día (DD)');
DEFINE('_FB_MYPROFILE_LOCATION', 'Localidad');
DEFINE('_FB_MYPROFILE_ICQ', 'ICQ');
DEFINE('_FB_MYPROFILE_ICQ_DESC', 'Eso es tu número ICQ.');
DEFINE('_FB_MYPROFILE_AIM', 'AIM');
DEFINE('_FB_MYPROFILE_AIM_DESC', 'Eso es tu AOL Instant Messenger nickname.');
DEFINE('_FB_MYPROFILE_YIM', 'YIM');
DEFINE('_FB_MYPROFILE_YIM_DESC', 'Eso es tu Yahoo! Instant Messenger nickname.');
DEFINE('_FB_MYPROFILE_SKYPE', 'SKYPE');
DEFINE('_FB_MYPROFILE_SKYPE_DESC', 'Eso es tu nombre en el Skype.');
DEFINE('_FB_MYPROFILE_GTALK', 'GTALK');
DEFINE('_FB_MYPROFILE_GTALK_DESC', 'Eso es tu Gtalk nickname.');
DEFINE('_FB_MYPROFILE_WEBSITE', 'Website');
DEFINE('_FB_MYPROFILE_WEBSITE_NAME', 'Nombre de la página');
DEFINE('_FB_MYPROFILE_WEBSITE_NAME_DESC', 'Ejemplo: Best of Joomla!');
DEFINE('_FB_MYPROFILE_WEBSITE_URL', 'Website URL');
DEFINE('_FB_MYPROFILE_WEBSITE_URL_DESC', 'Ejemplo: www.bestofjoomla.com');
DEFINE('_FB_MYPROFILE_MSN', 'MSN');
DEFINE('_FB_MYPROFILE_MSN_DESC', 'Eso es tu dirección del MSN messenger.');
DEFINE('_FB_MYPROFILE_SIGNATURE', 'Firma');
DEFINE('_FB_MYPROFILE_MALE', 'Hombre');
DEFINE('_FB_MYPROFILE_FEMALE', 'Mujer');
DEFINE('_FB_BULKMSG_DELETED', 'Los mensajes han sido borrados con exito');
DEFINE('_FB_DATE_YEAR', 'Año');
DEFINE('_FB_DATE_MONTH', 'Mes');
DEFINE('_FB_DATE_WEEK','Semana');
DEFINE('_FB_DATE_DAY', 'Día');
DEFINE('_FB_DATE_HOUR', 'Hora');
DEFINE('_FB_DATE_MINUTE', 'Minuto');
DEFINE('_FB_IN_FORUM', ' en el Foro: ');
DEFINE('_FB_FORUM_AT', ' Foro: ');
DEFINE('_FB_QMESSAGE_NOTE', 'Attencion, aun que no se ve el boardcode y los smileys lo puedes usar todavía');

// 1.0.1
DEFINE ('_FB_FORUMTOOLS','Herramientas del foro');

//userlist
DEFINE ('_FB_USRL_USERLIST','Lista de usuarios');
DEFINE ('_FB_USRL_REGISTERED_USERS','%s tiene <b>%d</b> usuarios registrados');
DEFINE ('_FB_USRL_SEARCH_ALERT','Por favor ingrese un valor a buscar!');
DEFINE ('_FB_USRL_SEARCH','Encontrar usuario');
DEFINE ('_FB_USRL_SEARCH_BUTTON','Buscar');
DEFINE ('_FB_USRL_LIST_ALL','Listar todo');
DEFINE ('_FB_USRL_NAME','Nombre');
DEFINE ('_FB_USRL_USERNAME','Nombre de usuario');
DEFINE ('_FB_USRL_GROUP','Grupo');
DEFINE ('_FB_USRL_POSTS','Publicaciones');
DEFINE ('_FB_USRL_KARMA','Karma');
DEFINE ('_FB_USRL_HITS','Vistas');
DEFINE ('_FB_USRL_EMAIL','Correo-e');
DEFINE ('_FB_USRL_USERTYPE','Tipo de Usuario');
DEFINE ('_FB_USRL_JOIN_DATE','Fecha de suscripci&oacuten');
DEFINE ('_FB_USRL_LAST_LOGIN','Ultimo ingreso');
DEFINE ('_FB_USRL_NEVER','Nunca');
DEFINE ('_FB_USRL_ONLINE','Estado');
DEFINE ('_FB_USRL_AVATAR','Foto');
DEFINE ('_FB_USRL_ASC','Ascendente');
DEFINE ('_FB_USRL_DESC','Descendente');
DEFINE ('_FB_USRL_DISPLAY_NR','Mostrar');
DEFINE ('_FB_USRL_DATE_FORMAT','%d.%m.%Y');

DEFINE('_FB_ADMIN_CONFIG_PLUGINS','Plug-ins');
DEFINE('_FB_ADMIN_CONFIG_USERLIST','Lista de usuarios');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_ROWS_DESC','Número de filas de usuarios');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_ROWS','Número de filas de usuarios');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERONLINE','Usuarios Conectados');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERONLINE_DESC','Mostrar usuarios conectados');

DEFINE('_FB_ADMIN_CONFIG_USERLIST_AVATAR','Mostrar avatar');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERLIST_AVATAR_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_NAME','Mostrar nombre real');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_name_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERNAME','Mostrar nombre de usuario');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERNAME_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_GROUP','Mostrar grupo de usuarios');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_GROUP_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_POSTS','Mostrar el Número de Temas');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_POSTS_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_KARMA','Mostrar Karma');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_KARMA_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_EMAIL','Mostrar Correo-e');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_EMAIL_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERTYPE','Mostrar tipo de usuario');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_USERTYPE_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_JOINDATE','Mostrar Fecha de suscripción');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_JOINDATE_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_LASTVISITDATE','Mostrar Fecha de Última Visita');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_LASTVISITDATE_DESC','');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_HITS','Mostar perfíl de vistas');
DEFINE('_FB_ADMIN_CONFIG_USERLIST_HITS_DESC','');
DEFINE('_FB_DBWIZ','Asistente de la base de datos');
DEFINE('_FB_DBMETHOD', 'Por favor, elija el método que desea para completar su instalación:');
DEFINE('_FB_DBCLEAN', 'Instalación Limpia');
DEFINE('_FB_DBUPGRADE','Actualizar desde Joomlaboard');
DEFINE('_FB_TOPLEVEL', 'Categoría de nivel superior');
DEFINE('_FB_REGISTERED','Registrado');
DEFINE('_FB_PUBLICBACKEND', 'Público Backend');
DEFINE('_FB_SELECTANITEMTO','Selecciona un elemento para');
DEFINE('_FB_ERRORSUBS', 'Algo falló al suprimir los mensajes y suscripciones');
DEFINE('_FB_WARNING','Advertencia...');
DEFINE('_FB_CHMOD1','Necesitas cambiar los permisos a 755 para poder actualizar el documento.');
DEFINE('_FB_YOURCONFIGFILEIS', 'Su archivo config es');
DEFINE('_FB_FIREBOARD','Fireboard');
DEFINE('_FB_CLEXUS', 'Clexus PM');
DEFINE('_FB_CB', 'Community Builder');
DEFINE('_FB_MYPMS', 'myPMS II Open Source');
DEFINE('_FB_UDDEIM', 'Uddeim');
DEFINE('_FB_JIM', 'JIM');
DEFINE('_FB_MISSUS', 'Missus');
DEFINE('_FB_SELECTTEMPLATE','Seleccionar plantilla');
DEFINE('_FB_CFNW', 'ERROR FATAL: Archivo Config NO Escribible');
DEFINE('_FB_CFS', 'Archivo de Configuración Guardado');
DEFINE('_FB_CFCNBO','ERROR: El documento no se pudo abrir.');
DEFINE('_FB_TFINW','El documento no es escribible.');
DEFINE('_FB_FBCFS','Documento CSS guardado.');
DEFINE('_FB_SELECTMODTO','Selecciona un moderador para');
DEFINE('_FB_CHOOSEFORUMTOPRUNE','Debes elegir un foro a purgar');
DEFINE('_FB_DELMSGERROR', 'Borrado de mensajes fallido:');
DEFINE('_FB_DELMSGERROR1', 'Borrado de mensajes de textos fallido:');
DEFINE('_FB_CLEARSUBSFAIL', 'Limpieza de suscripciones fallidas:');
DEFINE('_FB_FORUMPRUNEDFOR','Foro purgado por');
DEFINE('_FB_PRUNEDAYS', 'días');
DEFINE('_FB_PRUNEDELETED','Eliminado: ');
DEFINE('_FB_PRUNETHREADS','hilos');
DEFINE('_FB_ERRORPRUNEUSERS','Error purgando usuarios: ');
DEFINE('_FB_USERSPRUNEDDELETED','Usuarios purgados. Eliminado: ');
DEFINE('_FB_PRUNEUSERPROFILES','perfiles de usuario');
DEFINE('_FB_NOPROFILESFORPRUNNING','No se encontraron perfiles elegibles para purgado.');
DEFINE('_FB_TABLESUPGRADED', 'Tablas de Fireboard son actualizados a la versión');
DEFINE('_FB_FORUMCATEGORY', 'Categoría de Foro');
DEFINE('_FB_SAMPLWARN1', '-- Asegúrese de que se carga sobre los datos de ejemplo completamente en tablas vacias de fireboard. Si hay algo es en ellas, no funcionará!');
DEFINE('_FB_FORUM1','Foro 1');
DEFINE('_FB_SAMPLEPOST1', 'Tema de ejemplo 1');
DEFINE('_FB_SAMPLEFORUM11','Foro de ejemplo 1');
DEFINE('_FB_SAMPLEPOST11', '[b][size=4][color=#FF6600]Tema de ejemplo[/color][/size][/b]\nFelicidades con su nuevo Foro!\n\n[url=http://bestofjoomla.com]- Best of Joomla[/url]');
DEFINE('_FB_SAMPLESUCCESS', 'Datos de ejemplo, cargados');
DEFINE('_FB_SAMPLEREMOVED', 'Datos de ejemplo, removídos');
DEFINE('_FB_CBADDED', 'Perfil de Community Builder, agregado');
DEFINE('_FB_IMGDELETED','Imagen eliminada');
DEFINE('_FB_FILEDELETED','Documento eliminado');
DEFINE('_FB_NOPARENT','Sin principal');
DEFINE('_FB_DIRCOPERR','Error: El documento');
DEFINE('_FB_DIRCOPERR1','no se pudo copiar\n');
DEFINE('_FB_INSTALL1','<em>Componente</em> <strong>Foro</strong>');
DEFINE('_FB_INSTALL2', 'Transferencia/Instalación :</code></strong><br /><br /><font color="red"><b>satisfactoria');
// added by aliyar
DEFINE('_FB_FORUMPRF_TITLE', 'Configuración de Perfil');
DEFINE('_FB_FORUMPRF', 'Perfil');
DEFINE('_FB_FORUMPRRDESC', 'Si tiene el componente Clexus PM o Community Builder instalados, puede configurar fireboard para utilizar el perfil de usuario de la página.');
DEFINE('_FB_USERPROFILE_PROFILE', 'Perfil');
DEFINE('_FB_USERPROFILE_PROFILEHITS', '<b>Vista del Perfil</b>');
DEFINE('_FB_USERPROFILE_MESSAGES','Todos los mensajes del foro');
DEFINE('_FB_USERPROFILE_TOPICS','Temas');
DEFINE('_FB_USERPROFILE_STARTBY','Iniciado por');
DEFINE('_FB_USERPROFILE_CATEGORIES', 'Categorías');
DEFINE('_FB_USERPROFILE_DATE','Fecha');
DEFINE('_FB_USERPROFILE_HITS','Vistas');
DEFINE('_FB_USERPROFILE_NOFORUMPOSTS', 'No hay temas en este foro');
DEFINE('_FB_TOTALFAVORITE','Favorito: ');
DEFINE('_FB_SHOW_CHILD_CATEGORY_COLON', 'Número de columnas de sub-foros ');
DEFINE('_FB_SHOW_CHILD_CATEGORY_COLONDESC', 'Formato de número de columnas de sub-foros en virtud de la categoría principal ');
DEFINE('_FB_SUBSCRIPTIONSCHECKED', 'Post-suscripción activada por defecto?');
DEFINE('_FB_SUBSCRIPTIONSCHECKED_DESC', 'Seleccione "Sí", si quiere enviar cuadro de suscripción siempre chequeado');
// Errors (Re-integration from Joomlaboard 1.2)
DEFINE('_FB_ERROR1', 'Categoría / Foro debe tener un nombre');
// Forum Configuration (New in Fireboard)para Avatares : Opciones en CB y Clexus PM<br /></li></ul><br />Tenga en cuenta que este lanzamiento no significa que pueda ser
DEFINE('_FB_SHOWSTATS', 'Mostrar Estadíticas');
DEFINE('_FB_SHOWSTATSDESC', 'Si desea mostrar las estadíticas, seleccione Si');
DEFINE('_FB_SHOWWHOIS', 'Mostrar conectados');
DEFINE('_FB_SHOWWHOISDESC', 'Si desea mostrar quien está conectado, seleccione Si');
DEFINE('_FB_STATSGENERAL', 'Mostrar Estadíticas Generales');
DEFINE('_FB_STATSGENERALDESC', 'Si desea mostrar las estadíticas generales, seleccione Si');
DEFINE('_FB_USERSTATS', 'Mostrar Estadísticas de Usuarios Populares');
DEFINE('_FB_USERSTATSDESC', 'Si desea Mostrar las estadísticas de usuarios populares, seleccione Si');
DEFINE('_FB_USERNUM', 'Número de Usuarios Populares');
DEFINE('_FB_USERPOPULAR', 'Mostrar Estadíticas de Temas Populares');
DEFINE('_FB_USERPOPULARDESC', 'Si desea mostrar los temas populares, seleccione Si');
DEFINE('_FB_NUMPOP', 'Número de Temas Populares');
DEFINE('_FB_INFORMATION',
    'Best of Joomla team se enorgullece de anunciar el lanzamiento de Fireboard 1.0.0. Se trata de un foro de gran alcance y con estilo componente de un bien merecido sistema de gestión de contenidos, Joomla! . En un principio se basa en la ardua labor del equipo Joomlaboard y la mayoría de nuestras alabanzas va a su equipo. Algunas de las principales características de Fireboard que pueden enumerarse son las siguientes: (Además de las características actuales):<br /><br /><ul><li>Un diseño mucho más amigable para este sistema de foros. Está más cerca del sistema de plantillas SMF con una sencilla structura. Con muy pocos pasos puede modificar totalmente la vista del foro. Gracias a los grandes diseñadores de nuestro equipo.</li><li>Sistema ilimitado de subcategoría con una mejor administración en segundo plano (backend).</li><li>Más rápido y mejor sistema de codificación de la experiencia para el 3rd parties.</li><li>El mismo<br /></li><li>Profilebox en la parte superior del foro</li><li>SoportñññóóóóóóááááÚééííííííááááóóóóe para sistemas populares de PM, como son ClexusPM y Uddeim</li><li>Sistema bÃ¡scio de Plugin (PrÃ¡cticos mÃ¡s que perfectos)</li><li>Lenguaje-Definido por icono de sistema.<br /></li><li>Compartir imÃ¡genes de otro sistema de plantillas. Por lo tanto, elegir entre las plantillas e imÃ¡genes de otra serie es posible</li><li>Puede aÃ±adir mÃ³dulos joomla en el interior de la propia plantilla del foro. QuerÃ­a tener banners, dentro de su foro?</li><li>GestiÃ³n y selecciÃ³n de hilos favoritos</li><li>Foro adheridos y destacados</li><li>Foro de anuncios y su grupo</li><li>Ãšltimos mensajes (con pestaÃ±as)</li><li>EstadÃ­stica en la parte inferior del foro</li><li>QuiÃ©n estÃ¡ conectado, en la pagina?</li><li>Sistema de imÃ¡genes especÃ­fica para cada categorÃ­a</li><li>Ruta (pathway) aumentada</li><li><strong>ImportaciÃ³n desde Joomlaboard, SMF en planificaciÃ³n puede ser liberado muy pronto </strong></li><li>Salida RSS, PDF</li><li>Busqueda avanzada (Bajo desarrollo)</li><li>Opciones de perfil para Community buildery Clexus PM</li><li>Gerencia para avatares : Opciones para CB y Clexus PM<br /></li></ul><br />Por favor, tenga en cuenta que esta versiÃ³n no estÃ¡ pensada para ser utilizado ensitios de producciÃ³n, aunque hemos testeado a travÃ©s de ellos. Tenemos previsto seguir trabajando en este proyecto, tal como se utiliza en varios proyectos, y nos alegrarÃ­a que usted pueda unirse a nosotros para llevar un puente libre de soluciÃ³n a Joomla! Foros.<br /><br />Este es un trabajo de colaboraciÃ³n de varios desarrolladores y diseÃ±adores que han participado y gracias a su amabilidad esta versiÃ³n se hizo realidad. AquÃ­ damos las gracias a todos ellos y deseamos que usted disfrute de este lanzamiento!<br /><br />Equipo Best of Joomla!<br /></td></tr></table>');
DEFINE('_FB_INSTRUCTIONS', 'Instrucciones');
DEFINE('_FB_FINFO', 'Información del Foro Fireboard');
DEFINE('_FB_CSSEDITOR','Editor de plantillas CSS');
DEFINE('_FB_PATH','Ruta: ');
DEFINE('_FB_CSSERROR','Nota: La plantilla CSS debe ser escribible para guardar los cambios.');
// User Management
DEFINE('_FB_FUM','Administrador de perfiles de usuario');
DEFINE('_FB_SORTID','Ordenar por id del usuario');
DEFINE('_FB_SORTMOD','ordenar por moderadores');
DEFINE('_FB_SORTNAME','Ordenar por nombres');
DEFINE('_FB_VIEW','Vista');
DEFINE('_FB_NOUSERSFOUND','No se encontraron perfiles de usuario.');
DEFINE('_FB_ADDMOD','Agregar como moderador a');
DEFINE('_FB_NOMODSAV','No se encontraron posibles moderadores. Lee la "nota" abajo.');
DEFINE('_FB_NOTEUS',
    'NOTE: Aquí se muestra el perfil fireboard sólo de los usuarios que tienen la opción de moderador. Con el fin de estar en condiciones de agregar a un moderador, o añadir a un usuario una banderilla para moderar, ir a <a href="index2.php?option=com_fireboard&task=profiles">Administración de Usuarios</a> y búsque el usuario que desea convertir en moderador. A continuación, seleccione su perfil y actualicelo. El moderador sólo puede ser establecido por un administrador del sistema. ');
DEFINE('_FB_PROFFOR', 'Perfil por');
DEFINE('_FB_GENPROF', 'Opciones Generales de Perfiles');
DEFINE('_FB_PREFVIEW','Tipo de vista preferida: ');
DEFINE('_FB_PREFOR','Orden preferido de mensajes: ');
DEFINE('_FB_ISMOD','Es moderador: ');
DEFINE('_FB_ISADM', '<strong>Si</strong> (No cambiable, este usuario es un súper administrador del sitio ');
DEFINE('_FB_COLOR','Color');
DEFINE('_FB_UAVATAR','Avatar de usuario: ');
DEFINE('_FB_NS','Ninguno seleccionado');
DEFINE('_FB_DELSIG',' selecciona esta casilla para eliminar esta firma');
DEFINE('_FB_DELAV',' selecciona esta casilla para eliminar este avatar');
DEFINE('_FB_SUBFOR','Suscripciones de');
DEFINE('_FB_NOSUBS','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No se encontraron suscripciones para este usuario.');
// Forum Administration (Re-integration from Joomlaboard 1.2)
DEFINE('_FB_BASICS', 'Básicos');
DEFINE('_FB_BASICSFORUM', 'Información Básica del Foro');
DEFINE('_FB_PARENT','Principal:');
DEFINE('_FB_PARENTDESC',
    'Por favor tome nota: Para crear una categoría, elija \'Categoría de nivel superior\' como principal. La categoría sirve como contenedor de Foros.<br />Un Foro puede<strong>solo</strong> se creará dentro de la categoría seleccionanda, una categoría previamente creada como la principal para el Foro.<br /> Los mensajes pueden <strong>NO</strong> ser creados en una categoría; Sólo en los Foros.');
DEFINE('_FB_BASICSFORUMINFO', 'Nombre del Foro y descripción');
DEFINE('_FB_NAMEADD','Nombre:');
DEFINE('_FB_DESCRIPTIONADD', 'Descripción:');
DEFINE('_FB_ADVANCEDDESC', 'Configuración avanzada del foro');
DEFINE('_FB_ADVANCEDDESCINFO','Seguridad y acceso del foro');
DEFINE('_FB_LOCKEDDESC', 'Seleccione &quot;Si&quot; Si desea bloquear este foro. Nadie, salvo Moderadores y Administradores pueden crear nuevos temas o respuestas en un foro bloqueado (o mover temas a la misma).');
DEFINE('_FB_LOCKED1','Bloqueado: ');
DEFINE('_FB_PUBACC', 'Nivel de acceso público:');
DEFINE('_FB_PUBACCDESC',
    'Para crear un foro No-Público puede especificar el nivel mínimo de usuarios que puedan ver/entrar en el foro acá. Predeterminadamente el nivel mínimo está configurado para &quot;Todos&quot;.<br /><b>Por favor anote esto</b>: Si restringe el acceso a toda una categoría a uno o más grupos, se esconderán todos los Foros que este contenga a todo aquel que no tenga privilegios sobre la adecuada Categoría, <B>incluso</b> si uno o más de estos Foros tienen un nivel menor de acceso conjunto! Esto es demasiado para los moderadores; Usted tendrá que añadir un moderador a la lista de la categoría si lo(s) no tiene el nivel apropiado de grupo para ver la categoría.<br /> Esto es independiente del hecho de que las categorías no pueden ser moderadas; más moderadores pueden añadirse a la lista de moderadores.');
DEFINE('_FB_CGROUPS', 'Incluir Grupos de Sub-Foros:');
DEFINE('_FB_CGROUPSDESC', 'En caso de que los sub-grupos se les permita el acceso también? Si se pone a &quot;No&quot; el acceso a este foro, se limita al grupo seleccionado <b>solo</b>');
DEFINE('_FB_ADMINLEVEL','Nivel de acceso Administrativo: ');
DEFINE('_FB_ADMINLEVELDESC',
    'Si se crea un foro con restricciones acceso público, puede especificar aquí una nueva Administración de Nivel de acceso.<br /> Si restrige el acceso al foro para el público a un grupo especial de usuarios publicos y no\ especifica un Grupo de Usuarios aquí, los administradores no podrán ser capaces de entrar/ver el foro.');
DEFINE('_FB_ADVANCED','Avanzado');
DEFINE('_FB_CGROUPS1', 'Incluir Grupos de Sub-Foros:');
DEFINE('_FB_CGROUPS1DESC', 'En caso de que los grupos de sub-foros se les permita el acceso? Si selecciona &quot;No &quot; El acceso a este foro, se limita al grupo seleccionado <b>solo</b>');
DEFINE('_FB_REV','Revisar publicaciones: ');
DEFINE('_FB_REVDESC',
    'Seleccione &quot;Si&quot; Si desea que los mensajes sean revisados por los moderadores antes de publicarlos en este foro. Esto es útilsolo en un  foro moderado!<br />Si lo establece sin ningún tipo de Moderador especificado, el administrador del sitio es el único responsable de aprobar/suprmir mensajes presentado ya que estos se mantendrán \'en suspenso\'!');
DEFINE('_FB_MOD_NEW', 'Moderación');
DEFINE('_FB_MODNEWDESC', 'Moderación del foro y foro de moderadores');
DEFINE('_FB_MOD','Ordenar por moderados: ');
DEFINE('_FB_MODDESC',
    'Selecciona &quot;Si&quot; Si está en condiciones de asignar moderadores a este foro.<br /><strong>Nota:</strong> Esto no significa que los nuevos mensajes deban ser revisados antes de publicarlos en el foro!<br /> Habrá que configurar la opción de &quot;Comentario&quot; en la pestaña ed avanzados.<br /><br /> <strong>Por favor anote:</strong> Después de ajustarla Moderación a &quot;Si&quot; Debe guardar la configuración del foro primero antes de que usted sea capaz de agregar moderadores utilizando el nuevo botón.');
DEFINE('_FB_MODHEADER', 'Configuración de Moderación de este foro');
DEFINE('_FB_MODSASSIGNED','Moderadores asignados a este foro: ');
DEFINE('_FB_NOMODS','No hay moderadores asignados a este foro');
// Some General Strings (Improvement in Fireboard)
DEFINE('_FB_EDIT','Editar');
DEFINE('_FB_ADD','Agregar');
// Reorder (Re-integration from Joomlaboard 1.2)
DEFINE('_FB_MOVEUP','Mover hacia arriba');
DEFINE('_FB_MOVEDOWN','Mover hacia abajo');
// Groups - Integration in Fireboard
DEFINE('_FB_ALLREGISTERED','Todos los usuarios registrados');
DEFINE('_FB_EVERYBODY','Todos los usuarios');
// Removal of hardcoded strings in admin panel (Re-integration from Joomlaboard 1.2)
DEFINE('_FB_REORDER','Reordenar');
DEFINE('_FB_CHECKEDOUT','Confirmado');
DEFINE('_FB_ADMINACCESS','Acceso administrativo');
DEFINE('_FB_PUBLICACCESS', 'Acceso público');
DEFINE('_FB_PUBLISHED','Publicado');
DEFINE('_FB_REVIEW', 'Revisado');
DEFINE('_FB_MODERATED','Supervisado');
DEFINE('_FB_LOCKED','Bloqueado');
DEFINE('_FB_CATFOR', 'Categoría / Foro');
DEFINE('_FB_ADMIN', ' Administración de Fireboard');
DEFINE('_FB_CP', 'Panel de Control Fireboard');
// Configuration page - Headings (Re-integrated from Joomlaboard 1.2)
DEFINE('_COM_A_AVATAR_INTEGRATION', 'Integración con Avatar');
DEFINE('_COM_A_RANKS_SETTINGS', 'Rangos');
DEFINE('_COM_A_RANKING_SETTINGS', 'Opciones de ranking');
DEFINE('_COM_A_AVATAR_SETTINGS', 'Opciones de avatares');
DEFINE('_COM_A_SECURITY_SETTINGS', 'Opciones de seguridad');
DEFINE('_COM_A_BASIC_SETTINGS', 'Opciones básicas');
// FIREBOARD 1.0.0
//
DEFINE('_COM_A_FAVORITES','Permitir favoritos');
DEFINE('_COM_A_FAVORITES_DESC', 'Seleccione &quot;Si&quot; Si quiere permitir a los usuarios registrados agregar a sus favoritos un tema ');
DEFINE('_USER_UNFAVORITE_ALL', 'Chequee esta caja para <b><u>quitar favoritos</u></b> de todos los tópicos (incluyendo aquellos con propositos de ayuda)');
DEFINE('_VIEW_FAVORITETXT','Agregar este tema como favorito');
DEFINE('_USER_UNFAVORITE_YES','Has quitado este tema de los favoritos');
DEFINE('_POST_FAVORITED_TOPIC','Tu favorito ha sido procesado.');
DEFINE('_VIEW_UNFAVORITETXT','Quitar Favorito');
DEFINE('_VIEW_UNSUBSCRIBETXT', 'Desuscribirse');
DEFINE('_USER_NOFAVORITES','Sin favoritos');
DEFINE('_POST_SUCCESS_FAVORITE', 'Sus favoritos fueron procesados.');
DEFINE('_COM_A_MESSAGES_SEARCH', 'Resultados por Búsqueda');
DEFINE('_COM_A_MESSAGES_DESC_SEARCH', 'Mensajes por página sobre Resultados por Búsqueda');
DEFINE('_FB_USE_JOOMLA_STYLE', 'Usar Estilo Joomla?');
DEFINE('_FB_USE_JOOMLA_STYLE_DESC', 'Si desea utilizar el estilo Joomla en SI. (class: like sectionheader, sectionentry1 ...) ');
DEFINE('_FB_SHOW_CHILD_CATEGORY_ON_LIST', 'Mostrar imagen de categoria de sub-foro');
DEFINE('_FB_SHOW_CHILD_CATEGORY_ON_LIST_DESC', 'Si desea mostrar el icono de categoría en el listado de sub-foros, seleccione SI. ');
DEFINE('_FB_SHOW_ANNOUNCEMENT','Mostar anuncio');
DEFINE('_FB_SHOW_ANNOUNCEMENT_DESC', 'Seleccione &quot;Si&quot , si desea mostrar anuncios en la página de inicio del foro.');
DEFINE('_FB_SHOW_AVATAR_ON_CAT', 'Mostrar avatares en la lista de categorías?');
DEFINE('_FB_SHOW_AVATAR_ON_CAT_DESC', 'Seleccione &quot;Si&quot , si desea mostrar avatares de usuarios en la lista de categorías del foro.');
DEFINE('_FB_RECENT_POSTS', 'Opciones de mensajes recientes');
DEFINE('_FB_SHOW_LATEST_MESSAGES','Mostrar publicaciones recientes');
DEFINE('_FB_SHOW_LATEST_MESSAGES_DESC', 'Configure en &quot;Si&quot si desea mostrar el plugin de mensajes recientes en el foro');
DEFINE('_FB_NUMBER_OF_LATEST_MESSAGES', 'Mensajes recientes');
DEFINE('_FB_NUMBER_OF_LATEST_MESSAGES_DESC', 'Número de mensajes recientes');
DEFINE('_FB_COUNT_PER_PAGE_LATEST_MESSAGES', 'Cantidad por pestaña ');
DEFINE('_FB_COUNT_PER_PAGE_LATEST_MESSAGES_DESC', 'Número de mensajes por cada pestaña');
DEFINE('_FB_LATEST_CATEGORY', 'Mostrar Categoría');
DEFINE('_FB_LATEST_CATEGORY_DESC', 'Especifique la categoría que desea mostrar en los mensajes recientes. Por ejemplo:2,3,7 ');
DEFINE('_FB_SHOW_LATEST_SINGLE_SUBJECT', 'Mostrar Asunto Simple');
DEFINE('_FB_SHOW_LATEST_SINGLE_SUBJECT_DESC', 'Muestra un Asunto Simple de un Mensaje');
DEFINE('_FB_SHOW_LATEST_REPLY_SUBJECT','Mostar respuesta del asunto');
DEFINE('_FB_SHOW_LATEST_REPLY_SUBJECT_DESC','Mostrar respuesta del asunto. (Re: )');
DEFINE('_FB_LATEST_SUBJECT_LENGTH','Longitud del asunto');
DEFINE('_FB_LATEST_SUBJECT_LENGTH_DESC','La longitud del asunto.');
DEFINE('_FB_SHOW_LATEST_DATE','Mostar fecha');
DEFINE('_FB_SHOW_LATEST_DATE_DESC','Muestra la fecha.');
DEFINE('_FB_SHOW_LATEST_HITS', 'Mostrar Visitas');
DEFINE('_FB_SHOW_LATEST_HITS_DESC', 'Mostrar Visitas');
DEFINE('_FB_SHOW_AUTHOR','Mostar autor');
DEFINE('_FB_SHOW_AUTHOR_DESC','1 = nombre de usuario, 2 = nombre real, 0 = ninguno.');
DEFINE('_FB_STATS', 'Ajustes de Plugin de Estadísticas ');
DEFINE('_FB_CATIMAGEPATH', 'Ruta de Imagen de Categoría ');
DEFINE('_FB_CATIMAGEPATH_DESC', 'Ruta de Imagen de Categoría. Si usted selecciona la ruta "category_images/" puede ser "your_html_rootfolder/images/fbfiles/category_images/');
DEFINE('_FB_ANN_MODID','IDs de moderadores de anuncios');
DEFINE('_FB_ANN_MODID_DESC', 'Agregar Ids de usuarios para moderación de anuncios. ejemp. 62,63,73 . Pueden agregarse moderadores para editar o eliminar anuncios.');
//
DEFINE('_FB_FORUM_TOP', 'Navegador de Categorías ');
DEFINE('_FB_CHILD_BOARDS','Subforos');
DEFINE('_FB_QUICKMSG', 'Respuesta Rápida ');
DEFINE('_FB_THREADS_IN_FORUM','Tratados en el foro');
DEFINE('_FB_FORUM','Foro');
DEFINE('_FB_SPOTS','Destacados');
DEFINE('_FB_CANCEL','cancelar');
DEFINE('_FB_TOPIC','Tema: ');
DEFINE('_FB_POWEREDBY','Potenciado por ');
// Time Format
DEFINE('_TIME_TODAY','<b>Hoy</b> ');
DEFINE('_TIME_YESTERDAY','<b>Ayer</b> ');
//  STARTS HERE!
DEFINE('_FB_WHO_LATEST_POSTS','Ultimas publicaciones');
DEFINE('_FB_WHO_WHOISONLINE', 'Quién está Conectado');
DEFINE('_FB_WHO_MAINPAGE','Inicio del foro');
DEFINE('_FB_GUEST','Invitado(a)');
DEFINE('_FB_PATHWAY_VIEWING','viendo');
DEFINE('_FB_ATTACH','Adjunto');
// Favorite
DEFINE('_FB_FAVORITE','Favorito');
DEFINE('_USER_FAVORITES','Tus favoritos');
DEFINE('_THREAD_UNFAVORITE','Eliminar de favoritos');
// profilebox
DEFINE('_PROFILEBOX_WELCOME','Bienvenido(a)');
DEFINE('_PROFILEBOX_SHOW_LATEST_POSTS','Ultimas Publicaciones');
DEFINE('_PROFILEBOX_SET_MYAVATAR','Mi Avatar');
DEFINE('_PROFILEBOX_MYPROFILE', 'Mi Perfil');
DEFINE('_PROFILEBOX_SHOW_MYPOSTS','Mostrar mis publicaciones');
DEFINE('_PROFILEBOX_GUEST','Invitado(a)');
DEFINE('_PROFILEBOX_LOGIN','Ingresa');
DEFINE('_PROFILEBOX_REGISTER', 'Registrar');
DEFINE('_PROFILEBOX_LOGOUT','Salir');
DEFINE('_PROFILEBOX_LOST_PASSWORD', 'Contraseña Perdida?');
DEFINE('_PROFILEBOX_PLEASE','Por favor');
DEFINE('_PROFILEBOX_OR','o');
// recentposts
DEFINE('_RECENT_RECENT_POSTS','Publicaciones recientes');
DEFINE('_RECENT_TOPICS','Tema');
DEFINE('_RECENT_AUTHOR','Autor');
DEFINE('_RECENT_CATEGORIES', 'Categorías');
DEFINE('_RECENT_DATE','Fecha');
DEFINE('_RECENT_HITS','Vistas');
// announcement

DEFINE('_ANN_ANNOUNCEMENTS', 'Avisos');
DEFINE('_ANN_ID','ID');
DEFINE('_ANN_DATE','Fecha');
DEFINE('_ANN_TITLE', 'Título');
DEFINE('_ANN_SORTTEXT','Texto corto');
DEFINE('_ANN_LONGTEXT','Texto largo');
DEFINE('_ANN_ORDER','Orden');
DEFINE('_ANN_PUBLISH','Publicar');
DEFINE('_ANN_PUBLISHED','Publicado');
DEFINE('_ANN_UNPUBLISHED','Sin publicar');
DEFINE('_ANN_EDIT','Editar');
DEFINE('_ANN_DELETE','Eliminar');
DEFINE('_ANN_SUCCESS','Correcto');
DEFINE('_ANN_SAVE','Guardar');
DEFINE('_ANN_YES', 'Sí');
DEFINE('_ANN_NO','No');
DEFINE('_ANN_ADD','Agregar nuevo');
DEFINE('_ANN_SUCCESS_EDIT', 'Edición exitosa');
DEFINE('_ANN_SUCCESS_ADD', 'Creación exitosa');
DEFINE('_ANN_DELETED', 'Eliminación exitosa');
DEFINE('_ANN_ERROR','ERROR');
DEFINE('_ANN_READMORE', 'Leer Más...');
DEFINE('_ANN_CPANEL', 'Panel de Control de Anuncios');
DEFINE('_ANN_SHOWDATE','Mostrar fecha');
// Stats
DEFINE('_STAT_FORUMSTATS', 'Estadísticas del Foro');
DEFINE('_STAT_GENERAL_STATS', 'Estadísticas Generales');
DEFINE('_STAT_TOTAL_USERS','Total de usuarios');
DEFINE('_STAT_LATEST_MEMBERS','Ultimo suscriptor');
DEFINE('_STAT_PROFILE_INFO', 'Mostrar Info del Perfil');
DEFINE('_STAT_TOTAL_MESSAGES','Total de mensajes');
DEFINE('_STAT_TOTAL_SUBJECTS','Total de asuntos');
DEFINE('_STAT_TOTAL_CATEGORIES', 'Total de categorías');
DEFINE('_STAT_TOTAL_SECTIONS','Total de secciones');
DEFINE('_STAT_TODAY_OPEN_THREAD','Abiertos hoy');
DEFINE('_STAT_YESTERDAY_OPEN_THREAD','Abiertos ayer');
DEFINE('_STAT_TODAY_TOTAL_ANSWER','Total de respuestas hoy');
DEFINE('_STAT_YESTERDAY_TOTAL_ANSWER','Total de respuestas ayer');
DEFINE('_STAT_VIEW_RECENT_POSTS_ON_FORUM','Ver publicaciones recientes');
DEFINE('_STAT_MORE_ABOUT_STATS', 'Más acerca de estadísticas');
DEFINE('_STAT_USERLIST','Lista de usuarios');
DEFINE('_STAT_TEAMLIST','Equipo del foro');
DEFINE('_STATS_FORUM_STATS', 'Estadísticas del Foro');
DEFINE('_STAT_POPULAR','Popular');
DEFINE('_STAT_POPULAR_USER_TMSG','Usuarios (Total de mensajes)');
DEFINE('_STAT_POPULAR_USER_KGSG','Tratados ');
DEFINE('_STAT_POPULAR_USER_GSG', 'Usuarios ( Total de vista de perfiles) ');
//Team List
DEFINE('_MODLIST_ONLINE', 'Usuario Conectado Ahora');
DEFINE('_MODLIST_OFFLINE', 'Usuario Desconectado');
// Whoisonline
DEFINE('_WHO_WHOIS_ONLINE', 'Quién está Conectado');
DEFINE('_WHO_ONLINE_NOW', 'Conectado');
DEFINE('_WHO_ONLINE_MEMBERS','Suscriptor(es)');
DEFINE('_WHO_AND','y');
DEFINE('_WHO_ONLINE_GUESTS','Invitado(s)');
DEFINE('_WHO_ONLINE_USER','Usuario');
DEFINE('_WHO_ONLINE_TIME','Hora');
DEFINE('_WHO_ONLINE_FUNC', 'Acción');
// Userlist
DEFINE('_USRL_USERLIST','Lista de usuarios');
DEFINE('_USRL_REGISTERED_USERS','%s tiene <b>%d</b> usuarios registrados');
DEFINE('_USRL_SEARCH_ALERT', 'Por favor ingrese un valor para ser buscado!');
DEFINE('_USRL_SEARCH','Encontrar usuario');
DEFINE('_USRL_SEARCH_BUTTON','Buscar');
DEFINE('_USRL_LIST_ALL','Listar todo');
DEFINE('_USRL_NAME','Nombre');
DEFINE('_USRL_USERNAME','Nombre de usuario');
DEFINE('_USRL_EMAIL','Correo-e');
DEFINE('_USRL_USERTYPE','Tipo de usuario');
DEFINE('_USRL_JOIN_DATE', 'Fecha de Ingreso');
DEFINE('_USRL_LAST_LOGIN','Ultimo ingreso');
DEFINE('_USRL_NEVER','Nunca');
DEFINE('_USRL_BLOCK','Estado');
DEFINE('_USRL_MYPMS2','Mi SMP');
DEFINE('_USRL_ASC','Ascendente');
DEFINE('_USRL_DESC','Descendente');
DEFINE('_USRL_DATE_FORMAT','%d.%m.%Y');
DEFINE('_USRL_TIME_FORMAT','%H:%M');
DEFINE('_USRL_USEREXTENDED', 'Detalles');
DEFINE('_USRL_COMPROFILER', 'Perfil');
DEFINE('_USRL_THUMBNAIL','Miniatura');
DEFINE('_USRL_READON','mostrar');
DEFINE('_USRL_MYPMSPRO', 'Clexus MP');
DEFINE('_USRL_MYPMSPRO_SENDPM', 'Enviar MP');
DEFINE('_USRL_JIM', 'MP');
DEFINE('_USRL_UDDEIM', 'MP');
DEFINE('_USRL_SEARCHRESULT', 'Resultado de búsqueda de');
DEFINE('_USRL_STATUS','Estado');
DEFINE('_USRL_LISTSETTINGS', 'Opciones de Lista de usuarios');
DEFINE('_USRL_ERROR','Error');

//changed in 1.1.4 stable
DEFINE('_COM_A_PMS_TITLE', 'Componente Mensaje Privado');
DEFINE('_COM_A_COMBUILDER_TITLE', 'Community Builder');
DEFINE('_FORUM_SEARCH', 'Buscando: %s');
DEFINE('_MODERATION_DELETE_MESSAGE', 'Está segur de querer eliminar este mensaje? \n\n NOTA: No hay forma de recuperar los mensajes borrados!');
DEFINE('_MODERATION_DELETE_SUCCESS', 'El mensaje(s) ha sido eliminado');
DEFINE('_COM_A_RANKING', 'Rangos');
DEFINE('_COM_A_BOT_REFERENCE','Mostrar referencia del bot');
DEFINE('_COM_A_MOSBOT', 'Habilitar Bot de Debate (Discuss Bot)');
DEFINE('_PREVIEW','Previsualizar');
DEFINE('_COM_A_MOSBOT_TITLE', 'Bot de Debate');
DEFINE('_COM_A_MOSBOT_DESC', 'El Bot Debate permite a los usuarios discutir elementos de contenido en los foros. El Título del Contenido se utilizará como tema del debate.'
           . '<br />Si el tema no existe todavía, uno nuevo se creará. Si el tema ya existe, al usuario se le muestra el hilo y puede contestarlo .' . '<br /><strong>Usted podrá descargar e instalar el Bot por separado.</strong>'
           . '<br />visite el <a href="http://www.bestofjoomla.com">Sitio de Best of Joomla</a> para más información.' . '<br />Cuando ya haya sido instalado habrá que agregar las siguientes lineas a su contenido' . '<br />{mos_fb_discuss:<em>catid</em>}'
           . '<br />El <em>catid</em> es la categoría en la que el elemento de contenido puede ser discutido. Para encontrar el correcto catid, con tan sólo mirar en los foros ' . 'Y marque el Id de la categoría desde la URL en la barra de estado de su navegador.'
           . '<br />Ejemplo: Si desea que un artículo seadiscutido en el Foro con catid 26, El Bot debe tener la estructura: {mos_fb_discuss:26}'
           . '<br />Esto parece un poco difícil, sí le permiten tener a cada foro un elemento de debate contenido.');
//new in 1.1.4 stable
// search.class.php
DEFINE('_FORUM_SEARCHTITLE', 'Buscar');
DEFINE('_FORUM_SEARCHRESULTS', 'mostrando %s de %s resultados.');
// Help, FAQ
DEFINE('_COM_FORUM_HELP', 'FAQ');
// rules.php
DEFINE('_COM_FORUM_RULES', 'Reglas');
DEFINE('_COM_FORUM_RULES_DESC', '<ul><li>Corregir este archivo para insertar tus reglas en joomlaroot/administrator/components/com_fireboard/language/english.php o spanish.php</li><li>Regla 2</li><li>Regla 3</li><li>Regla 4</li><li>...</li></ul>');
//smile.class.php
DEFINE('_COM_BOARDCODE', 'Código BBCode');
// moderate_messages.php
DEFINE('_MODERATION_APPROVE_SUCCESS', 'El Mensaje(s) ha sido aprobado');
DEFINE('_MODERATION_DELETE_ERROR', 'ERROR: El Mensaje(s) no puede ser eliminado');
DEFINE('_MODERATION_APPROVE_ERROR', 'ERROR: El Mensaje(s) no puede ser aprobado');
// listcat.php
DEFINE('_GEN_NOFORUMS', 'No hay foros en esta categoría!');
//new in 1.1.3 stable
DEFINE('_POST_GHOST_FAILED','No se pudo crear tema fantasma en el antiguo foro');
DEFINE('_POST_MOVE_GHOST','Dejar mensaje fantasma en el antiguo foro');
//new in 1.1 Stable
DEFINE('_GEN_FORUM_JUMP','Saltar al foro');
DEFINE('_COM_A_FORUM_JUMP','Habilitar salto de foro');
DEFINE('_COM_A_FORUM_JUMP_DESC', 'Si selecciona &quot;Si&quot; Un selector se mostrará en las páginas de el foro permitiendo un salto rápido a otro foro o categoría.');
//new in 1.1 RC1
DEFINE('_GEN_RULES','Reglas');
DEFINE('_COM_A_RULESPAGE', 'Habilitar Página de Reglas');
DEFINE('_COM_A_RULESPAGE_DESC',
    'Si selecciona &quot;Si&quot; Un vínculo en la cabecera del foro se mostrará para la Página de Reglas. Esta página puede ser usado para cualquier cosa como normas, etcétera. Puede modificar el contenido de este fichero a su gusto ubique el archivo rules.php en /joomla_root/components/com_fireboard. <em>Asegúrese de que siempre dispone de una copia de seguridad de este archivo, ya que se sobreescribirá cuando actualice!</em>');
DEFINE('_MOVED_TOPIC','Movido:');
DEFINE('_COM_A_PDF', 'Habilitar creación PDF');
DEFINE('_COM_A_PDF_DESC',
    'Seleccione &quot;Si&quot; Si desea que le permiten a los usuarios descargar un simple documento PDF con el contenido de un hilo.<br />Esto es un <u>simple</u> documento PDF; Ninguna marca, ninguna disposición extrema, solo contiene la secuencia del texto.');
DEFINE('_GEN_PDFA', 'Haga clic en este botón para crear un documento PDF a partir de este hilo (se abre en una nueva ventana).');
DEFINE('_GEN_PDF', 'Pdf');
//new in 1.0.4 stable
DEFINE('_VIEW_PROFILE', 'Haga clic aquí para ver el perfil de este usuario');
DEFINE('_VIEW_ADDBUDDY', 'Haz click aquí para añadir este usuario a su lista de amigos');
DEFINE('_POST_SUCCESS_POSTED','Tu mensaje se ha publicado correctamente');
DEFINE('_POST_SUCCESS_VIEW', '[Volver al mensaje]');
DEFINE('_POST_SUCCESS_FORUM','[ Regresar al foro ]');
DEFINE('_RANK_ADMINISTRATOR','Administrador');
DEFINE('_RANK_MODERATOR','Moderador');
DEFINE('_SHOW_LASTVISIT', 'Desde la última visita');
DEFINE('_COM_A_BADWORDS_TITLE','Filtrado de palabras altisonantes');
DEFINE('_COM_A_BADWORDS','Utilizar el filtrado de palabras altisonantes');
DEFINE('_COM_A_BADWORDS_DESC', 'Seleccione a &quot;Si&quot; si quiere filtrar mensajes que contengan palabras inadecuadas utilizando la configuración del Componente Badword. Para utilizar esta función, usted debe tener instalado el Componente Badword!');
DEFINE('_COM_A_BADWORDS_NOTICE', '* Este mensaje ha sido censurado porque contiene una o más palabras establecidas por el administrador *');
DEFINE('_COM_A_COMBUILDER_PROFILE', 'Crear perfil de foros para Community Builder');
DEFINE('_COM_A_COMBUILDER_PROFILE_DESC',
    'Haga clic en el vínculo necesario para crear campos de perfil de usuario del Foro para Community Builder. Después de que se crean on libres de moverse cada vez que desee utilizar el administrador de Community Builder, simplemente no cambie el nombre o nombres en sus opciones. Si elimina del administrador el Community Builder, puede crearse de nuevo a través de este vínculo, de lo contrario no haga clic en el enlace ');
DEFINE('_COM_A_COMBUILDER_PROFILE_CLICK', '> Click aquí <');
DEFINE('_COM_A_COMBUILDER','Perfiles de usuario de Community Builder');
DEFINE('_COM_A_COMBUILDER_DESC',
    'Configurelo a &quot;Si&quot; si desea activar la integración con el Componente Community Builder www.joomlapolis.com). Todos los perfiles de usuarios de Fireboard usarán las funciones de Community Builder y el vínculo a los perfiles llevara directamente a los perfiles de usuarios de Community Builder. Este ajuste no tendrá en cuenta la configuración de perfil en Clexus PM, tanto si se exponen a &quot;Si&quot;. También, asegúrese de aplicar los cambios necesarios en la base de datos de Community Builder mediante el uso de la opción a continuación.');
DEFINE('_COM_A_AVATAR_SRC', 'Usar imagen de avatar desde');
DEFINE('_COM_A_AVATAR_SRC_DESC',
    'Si posee el Componente Clexus PM o Community Builder instalado, Puede configurar Fireboard para utilizar la imagen de avatar del usuario utilizandi el perfil de usuario de Clexus PM o Community Builder. NOTA: Para Community Builder necesitará habilitar la opción imágenes miniaturas para poder hacer uso de las imágenes pequeñas en los foros, y no las originales.');
DEFINE('_COM_A_KARMA','Mostrar el indicador de Karma');
DEFINE('_COM_A_KARMA_DESC', 'Asignado a &quot;Si&quot; para mostrar el Karma y botones relativos a (incrementar / decrementar) si se activan las estadísticas de usuario.');
DEFINE('_COM_A_DISEMOTICONS', 'Inhabilitar emoticones');
DEFINE('_COM_A_DISEMOTICONS_DESC', 'Asignado a &quot;Si&quot; para desactivar completamente los emoticonos (smileys).');
DEFINE('_COM_C_FBCONFIG', 'Configuración Fireboard');
DEFINE('_COM_C_FBCONFIGDESC','Configura la funcionalidad del foro');
DEFINE('_COM_C_FORUM', 'Administración del Foro');
DEFINE('_COM_C_FORUMDESC', 'Agregar categorías/foros y configurar los mismos');
DEFINE('_COM_C_USER', 'Administración de Usuarios');
DEFINE('_COM_C_USERDESC', 'Administración básica de usuarios y de perfiles');
DEFINE('_COM_C_FILES','Explorador de documentos cargados');
DEFINE('_COM_C_FILESDESC','Explora y administra los documentos guardados');
DEFINE('_COM_C_IMAGES', 'Cargar imágenes por navegador');
DEFINE('_COM_C_IMAGESDESC', 'Navegue y administrar imágenes cargadas');
DEFINE('_COM_C_CSS', 'Editar archivo CSS');
DEFINE('_COM_C_CSSDESC','Ajusta la apariencia del foro');
DEFINE('_COM_C_SUPPORT','Sitio de soporte');
DEFINE('_COM_C_SUPPORTDESC','Enlaza al sitio the Best of Joomla (abre una nueva ventana)');
DEFINE('_COM_C_PRUNETAB','Purgar foros');
DEFINE('_COM_C_PRUNETABDESC','Elimina tratados antiguos (configurable)');
DEFINE('_COM_C_PRUNEUSERS','Purgar usuarios');
DEFINE('_COM_C_PRUNEUSERSDESC','Sincroniza la tabla de usuarios del foro con la de Joomla en la base de datos');
DEFINE('_COM_C_LOADSAMPLE', 'Cargar Datos de Ejemplo');
DEFINE('_COM_C_LOADSAMPLEDESC', 'Para un fácil inicio: Cargue los datos de ejemplo en una instalación vacia de fireboard');
DEFINE('_COM_C_REMOVESAMPLE', 'Remover Datos de Ejemplos');
DEFINE('_COM_C_REMOVESAMPLEDESC', 'Remover datos de ejemplos de su base de datos');
DEFINE('_COM_C_LOADMODPOS', 'Cargar Posición de Modulos');
DEFINE('_COM_C_LOADMODPOSDESC', 'Cargar Posición de Modulos desde la Plantilla FireBoard');
DEFINE('_COM_C_UPGRADEDESC', 'Obtenga su base de datos hasta la última versión después de una actualización');
DEFINE('_COM_C_BACK', 'Volver al Panel de Control de Fireboard');
DEFINE('_SHOW_LAST_SINCE', 'Active temas desde la última visita en:');
DEFINE('_POST_SUCCESS_REQUEST2','Tu solicitud ha sido procesada');
DEFINE('_POST_NO_PUBACCESS3', 'Click aquí para registrarse.');
//==================================================================================================
//Changed in 1.0.4
//please update your local language file with these changes as well
DEFINE('_POST_SUCCESS_DELETE','El mensaje ha sido correctamente eliminado.');
DEFINE('_POST_SUCCESS_EDIT','El mensaje ha sido correctamente editado.');
DEFINE('_POST_SUCCESS_MOVE','El tema ha sido correctamente movido.');
DEFINE('_POST_SUCCESS_POST','Tu mensaje ha sido correctamente publicado.');
DEFINE('_POST_SUCCESS_SUBSCRIBE', 'Su suscripción ha sido procesada.');
//==================================================================================================
//new in 1.0.3 stable
//Karma
DEFINE('_KARMA','Karma');
DEFINE('_KARMA_SMITE','Abucheo');
DEFINE('_KARMA_APPLAUD','Aplauso');
DEFINE('_KARMA_BACK','Para regresar al tema,');
DEFINE('_KARMA_WAIT','Puedes modificar el karma de cualquier persona cada 6 horas. <br/>Por favor espera hasta que este periodo haya pasado antes de modificar de nuevo el karma de cualquier persona.');
DEFINE('_KARMA_SELF_DECREASE','Por favor no intentes modificar tu propio karma.');
DEFINE('_KARMA_SELF_INCREASE','Tu karma ha sido disminuido por intentar incrementarlo tu mismo.');
DEFINE('_KARMA_DECREASED','Karma del usuario disminuido. Si no eres llevado de vuelta al tema en unos momentos,');
DEFINE('_KARMA_INCREASED','Karma del usuario incrementado. Si no eres llevado de vuelta al tema en unos momentos,');
DEFINE('_COM_A_TEMPLATE','Plantilla del foro');
DEFINE('_COM_A_TEMPLATE_DESC','Elige la plantilla a emplear.');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH', 'Imagen Fija');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH_DESC', 'Selecciona la plantilla a utilizar para la serie de imágenes.');
DEFINE('_PREVIEW_CLOSE','Cerrar esta ventana');
//==========================================
//new in 1.0 Stable
DEFINE('_COM_A_POSTSTATSBAR', 'Usar barra para estadíticas de temas');
DEFINE('_COM_A_POSTSTATSBAR_DESC', 'Seleccione &quot;Si&quot; Si desea que el número de temas que un usuario haya realizado sea representado gráficamente por una barra de estadísticas.');
DEFINE('_COM_A_POSTSTATSCOLOR', 'Número de colores de la barra de estadísticas');
DEFINE('_COM_A_POSTSTATSCOLOR_DESC', 'Se cita el número del color que desea utilizar para la barra de estadísticas de temas');
DEFINE('_LATEST_REDIRECT',
    'Fireboard necesita reestablecer sus privilegios de acceso antes de que pueda crear una lista de los últimos temas posteados.\nNo se preocupes, esto es normal después de más de 30 minutos de inactividad o después de volver.\nPor favor, envíe su solicitud de búsqueda de nuevo.');
DEFINE('_SMILE_COLOUR','Color');
DEFINE('_SMILE_SIZE', 'Tamaño');
DEFINE('_COLOUR_DEFAULT', 'Standard');
DEFINE('_COLOUR_RED','Rojo');
DEFINE('_COLOUR_PURPLE', 'Purpura');
DEFINE('_COLOUR_BLUE', 'Azul');
DEFINE('_COLOUR_GREEN','Verde');
DEFINE('_COLOUR_YELLOW','Amarillo');
DEFINE('_COLOUR_ORANGE','Naranja');
DEFINE('_COLOUR_DARKBLUE', 'Azul Oscuro');
DEFINE('_COLOUR_BROWN', 'Marrón');
DEFINE('_COLOUR_GOLD','Dorado');
DEFINE('_COLOUR_SILVER','Plateado');
DEFINE('_SIZE_NORMAL','Normal');
DEFINE('_SIZE_SMALL', 'Pequeña');
DEFINE('_SIZE_VSMALL', 'Muy Pequeña');
DEFINE('_SIZE_BIG','Grande');
DEFINE('_SIZE_VBIG','Muy grande');
DEFINE('_IMAGE_SELECT_FILE','Selecciona la imagen a adjuntar');
DEFINE('_FILE_SELECT_FILE','Selecciona el documento a adjuntar');
DEFINE('_FILE_NOT_UPLOADED', 'El archivo no se ha cargado. Intente publicar o editar de nuevo el tema');
DEFINE('_IMAGE_NOT_UPLOADED', 'Su imagen no se ha cargado. Intente publicar o editar de nuevo el tema');
DEFINE('_BBCODE_IMGPH', 'Inserte [img] en el marcador para adjuntar una imagen al tema');
DEFINE('_BBCODE_FILEPH', 'Inserte [file] en el marcador para adjuntar un archivo al tema');
DEFINE('_POST_ATTACH_IMAGE','[img]');
DEFINE('_POST_ATTACH_FILE','[file]');
DEFINE('_USER_UNSUBSCRIBE_ALL', 'Chequee esta caja para <b><u>desuscribirse</u></b> de todos los tópicos (incluyendo aquellos para propositos de ayuda)');
DEFINE('_LINK_JS_REMOVED', '<em>Vínculo de contenido JavaScript ha sido removido automáticamente</em>');
//==========================================
//new in 1.0 RC4
DEFINE('_COM_A_LOOKS','Apariencia');
DEFINE('_COM_A_USERS','Relacionado al usuario');
DEFINE('_COM_A_LENGTHS','Varias configuraciones de longitud');
DEFINE('_COM_A_SUBJECTLENGTH', 'Longitud máxima del asunto');
DEFINE('_COM_A_SUBJECTLENGTH_DESC',
    'Longitus máxima de linea en el asunto del tema. el máximo soportado por la base de datos es de 255 caracteres. Si su sitio está configurado para usar caracteres multi-byte character establescalo como Unicode, UTF-8 o non-ISO-8599-x Hacer el máximo más pequeño usando esta formula:<br/><tt>round_down(255/(máximo total del tamaño de conjunto de caracteres en bytes por caracter))</tt><br/> Ejemplo para UTF-8, para que el tamaño max. de caracteres en bite por caracter sea de 4 bytes: 255/4=63.');
DEFINE('_LATEST_THREADFORUM','Tema o foro');
DEFINE('_LATEST_NUMBER','Publicaciones nuevas');
DEFINE('_COM_A_SHOWNEW','Mostrar publicaciones nuevas');
DEFINE('_COM_A_SHOWNEW_DESC', 'Si selecciona &quot;Si&quot; Fireboard mostrará al usuario un indicador de los foros que contienen nuevos temas y los temas nuevos desde su última visita.');
DEFINE('_COM_A_NEWCHAR','Indicador &quot;Nuevo&quot;');
DEFINE('_COM_A_NEWCHAR_DESC', 'Definir aquí lo que debe utilizarse para indicar nuevos temas (como una &quot;!&quot; o &quot;Nuevo!&quot;)');
DEFINE('_LATEST_AUTHOR', 'Autor del último mensaje');
DEFINE('_GEN_FORUM_NEWPOST','Publicaciones nuevas');
DEFINE('_GEN_FORUM_NOTNEW','Sin publicaciones nuevas');
DEFINE('_GEN_UNREAD','Tema sin leer');
DEFINE('_GEN_NOUNREAD', 'Leer Tema');
DEFINE('_GEN_MARK_ALL_FORUMS_READ', 'Marcar todos los foros como leidos');
DEFINE('_GEN_MARK_THIS_FORUM_READ', 'Marcar este foros como leido');
DEFINE('_GEN_FORUM_MARKED', 'Todos los mensajes en este foro han sido marcados como leídos');
DEFINE('_GEN_ALL_MARKED', 'Todos los mensajes se han marcado como leído');
DEFINE('_IMAGE_UPLOAD', 'Cargar imagen');
DEFINE('_IMAGE_DIMENSIONS', 'Su archivo de la imagen puede ser máximo (ancho x alto - tamaño)');
DEFINE('_IMAGE_ERROR_TYPE', 'Solo use imágenes jpeg, gif o png');
DEFINE('_IMAGE_ERROR_EMPTY','Por favor selecciona un documento antes de cargar');
DEFINE('_IMAGE_ERROR_SIZE', 'El tamaño de la imagen supera el máximo fijado por el Administrador.');
DEFINE('_IMAGE_ERROR_WIDTH', 'El ancho de la imagen supera el máximo fijado por el Administrador.');
DEFINE('_IMAGE_ERROR_HEIGHT', 'El alto de la imagen supera el máximo fijado por el Administrador.');
DEFINE('_IMAGE_UPLOADED','Tu imagen ha sido cargada.');
DEFINE('_COM_A_IMAGE', 'Imágenes');
DEFINE('_COM_A_IMGHEIGHT', 'Atura Max. de la Imagen');
DEFINE('_COM_A_IMGWIDTH', 'Ancho Max. de la Imagen');
DEFINE('_COM_A_IMGSIZE', 'Tamaño Max. de la Imagen <br/><em>en Kilobytes</em>');
DEFINE('_COM_A_IMAGEUPLOAD', 'Permitira carga de imagenes del público');
DEFINE('_COM_A_IMAGEUPLOAD_DESC', 'Seleccionado a &quot;Si&quot; Si desea que todo el mundo (público) pueda cargar una imagen.');
DEFINE('_COM_A_IMAGEREGUPLOAD', 'Permitira carga de imagenes solo a Registrados');
DEFINE('_COM_A_IMAGEREGUPLOAD_DESC', 'Seleccionado a &quot;Si&quot; Si quieres que solo usuarios registrados y conectados puedan subir imágenes.<br/> Note: (Super)Administradores y moderadores siempre están en condiciones de subir imágenes.');
//New since preRC4-II:
DEFINE('_COM_A_UPLOADS','Cargas');
DEFINE('_FILE_TYPES', 'El archivo puede ser de tipo - Tamaño máx.');
DEFINE('_FILE_ERROR_TYPE','Solamente tienes permitido cargar documentos de tipo: ');
DEFINE('_FILE_ERROR_EMPTY','Por favor selecciona un documento antes de cargar');
DEFINE('_FILE_ERROR_SIZE', 'El tamaño del archivo supera el máximo fijado por el Administrador.');
DEFINE('_COM_A_FILE','Documentos');
DEFINE('_COM_A_FILEALLOWEDTYPES','Tipos de documento permitidos');
DEFINE('_COM_A_FILEALLOWEDTYPES_DESC', 'Especificar los tipos de archivo que aquí se permiten cargar. Use una lista separadas por comas <strong>minúsculas</strong> y sin espacios.<br />Ejemplo: zip,txt,exe,htm,html');
DEFINE('_COM_A_FILESIZE', 'Tamaño Max. de Archivo<br/><em>en Kilobytes</em>');
DEFINE('_COM_A_FILEUPLOAD', 'Permitir carga de archivos al público');
DEFINE('_COM_A_FILEUPLOAD_DESC', 'Seleccionado a &quot;Si&quot; Si desea que todo el mundo (público) pueda subir archivos.');
DEFINE('_COM_A_FILEREGUPLOAD','Permitir carga de documentos a usuarios registrados');
DEFINE('_COM_A_FILEREGUPLOAD_DESC', 'Seleccionado a &quot;Si&quot; Si quieres que solo usuarios registrados y conectados puedan subir archivos.<br/> Nota: (Super)Administradores y moderadores siempre están en condiciones de subir archivos.');
DEFINE('_SUBMIT_CANCEL', 'La presentación de su entrada se ha cancelado');
DEFINE('_HELP_SUBMIT', 'Pulse aquí para enviar su mensaje');
DEFINE('_HELP_PREVIEW', 'Haga clic aquí para ver que su mensaje será similar al presentado');
DEFINE('_HELP_CANCEL', 'Pulse aquí para cancelar su mensaje');
DEFINE('_POST_DELETE_ATT', 'Si esta opción está seleccionada, todos los archivos adjuntos e imágenes en los temas que se van a suprimir serán borrados (recomendado).');
//new since preRC4-III
DEFINE('_COM_A_USER_MARKUP', 'Mostar marcador de edición arriba');
DEFINE('_COM_A_USER_MARKUP_DESC', 'Seleccionado a &quot;Si&quot; Si quieres que un tema editado sea marcado con texto que muestre que el tema es una edición de un usuario y el momento en que fue editada.');
DEFINE('_EDIT_BY', 'Tema editado por:');
DEFINE('_EDIT_AT','el: ');
DEFINE('_UPLOAD_ERROR_GENERAL', 'A ocurrido un error al cargar el avatar. Por favor, inténtelo de nuevo o consulte al administrador del sistema');
DEFINE('_COM_A_IMGB_IMG_BROWSE', 'Navegador de carga de imágenes');
DEFINE('_COM_A_IMGB_FILE_BROWSE', 'Explorador de documentos cargados');
DEFINE('_COM_A_IMGB_TOTAL_IMG', 'Número de imágenes cargadas');
DEFINE('_COM_A_IMGB_TOTAL_FILES', 'Número de archivos subidos');
DEFINE('_COM_A_IMGB_ENLARGE', 'Haga clic en la imagen para ver su tamaño completo');
DEFINE('_COM_A_IMGB_DOWNLOAD','Haz click en la imagen para descargarlo.');
DEFINE('_COM_A_IMGB_DUMMY_DESC',
    'La opción &quot;Reemplazar con una maqueta&quot; sustituirá a la imagen seleccionada con una maqueta de la imagen.<br /> Esto le permite eliminar el archivo sin quebrar el tema<br /><small><em>Por favor, recuerde que a veces de forma explícita se necesita refrescar el navegador para ver la maqueta de sustitución.</em></small>');
DEFINE('_COM_A_IMGB_DUMMY','Imagen actual simulada');
DEFINE('_COM_A_IMGB_REPLACE','Reemplazar');
DEFINE('_COM_A_IMGB_REMOVE','Eliminar');
DEFINE('_COM_A_IMGB_NAME','Nombre');
DEFINE('_COM_A_IMGB_SIZE', 'Tamaño');
DEFINE('_COM_A_IMGB_DIMS','Dimensiones');
DEFINE('_COM_A_IMGB_CONFIRM', 'Estás absolutamente seguro de que desea eliminar este archivo? \n Eliminación de un archivo, le dará un tema de referencia paralizado...');
DEFINE('_COM_A_IMGB_VIEW', 'Abrir tema (a editar)');
DEFINE('_COM_A_IMGB_NO_POST', 'No hay referencias posteriores!');
DEFINE('_USER_CHANGE_VIEW', 'Los cambios en estos ajustes se harán efectivos la próxima vez que visite los foros.<br /> Si desea cambiar el tipo de vista &quot;Medio-Vuelo&quot; puede utilizar las opciones de la barra de menús foro.');
DEFINE('_MOSBOT_DISCUSS_A', 'Debata sobre este artículo en los foros.(');
DEFINE('_MOSBOT_DISCUSS_B',' publicaciones)');
DEFINE('_POST_DISCUSS', 'Este hilo discute el contenido del artículo');
DEFINE('_COM_A_RSS','Habilitar RSS');
DEFINE('_COM_A_RSS_DESC', 'El canal RSS permite a los usuarios descargar los últimos temas a su escritorio / Solicitar Lector RSS Reader véase <a href="http://www.rssreader.com" target="_blank">rssreader.com</a>rssreader.com</ a> para un ejemplo.');
DEFINE('_LISTCAT_RSS', 'Obtener las últimas entradas directamente a su escritorio');
DEFINE('_SEARCH_REDIRECT', 'Fireboard necesita reestablecer los privilegios de acceso antes de poder realizar la solicitud de búsqueda.\nNo te preocupes, esto es normal después de más de 30 minutos de inactividad.\nPor favor, envíe su consulta de nuevo. ');//====================
//====================
//admin.forum.html.php
DEFINE('_COM_A_CONFIG', 'Configuración de Fireboard');
DEFINE('_COM_A_DISPLAY','Mostrar #');
DEFINE('_COM_A_CURRENT_SETTINGS', 'Configuración Actual');
DEFINE('_COM_A_EXPLANATION', 'Explicación');
DEFINE('_COM_A_BOARD_TITLE', 'Título del Foro');
DEFINE('_COM_A_BOARD_TITLE_DESC','Es el nombre de tu foro.');
DEFINE('_COM_A_VIEW_TYPE','Tipo de vista predeterminada');
DEFINE('_COM_A_VIEW_TYPE_DESC','Elegir entre vista hilada o plana como predeterminada.');
DEFINE('_COM_A_THREADS', 'Temas por página');
DEFINE('_COM_A_THREADS_DESC', 'Número de temas a mostrar por página');
DEFINE('_COM_A_REGISTERED_ONLY', 'Solo usuarios registrados');
DEFINE('_COM_A_REG_ONLY_DESC', 'Seleccionado a &quot;Si&quot; para permitir que sólo los usuarios registrados utilicen el Foro (vista y posteo), Seleccionado a &quot;No&quot; Para permitir que cualquier usuario pueda utilizar el Foro');
DEFINE('_COM_A_PUBWRITE', 'Lectura/Escritura Pública');
DEFINE('_COM_A_PUBWRITE_DESC', 'Seleccionado a &quot;Si&quot; para permitir la escritura pública, se puede establecer en &quot;No&quot; para permitir que cualquier visitante pueda ver los temas, pero sólo a los usuarios registrados se le permitirá escribir mensajes');
DEFINE('_COM_A_USER_EDIT', 'Editar Usuario');
DEFINE('_COM_A_USER_EDIT_DESC', 'Seleccionado a &quot;Si&quot; para permitir a los usuarios registrados editar sus propios mensajes.');
DEFINE('_COM_A_MESSAGE', 'Con el fin de guardar los cambios de los valores más arriba, presione el botón "Guardar" en la parte superior.');
DEFINE('_COM_A_HISTORY','Mostrar historial');
DEFINE('_COM_A_HISTORY_DESC', 'Seleccionado a &quot;Si&quot;, si se quiere que el tema de la historia aparezca cuando una respuesta/cita se hace');
DEFINE('_COM_A_SUBSCRIPTIONS','Permitir suscripciones');
DEFINE('_COM_A_SUBSCRIPTIONS_DESC', 'Seleccionado a &quot;Si&quot;, si se quiere permitir a los usuarios registrados suscribirse a un tema y recibir notificaciones por correo electrónico sobre nuevas respuestas');
DEFINE('_COM_A_HISTLIM', 'Limite del Historial');
DEFINE('_COM_A_HISTLIM_DESC', 'Número de temas mostrados en el historial');
DEFINE('_COM_A_FLOOD', 'Protección contra Inundación');
DEFINE('_COM_A_FLOOD_DESC', 'La cantidad de segundos que un usuario tiene que esperar entre dos temas o respuestas consecutivas. Establecido en 0 (cero), inhabilitará la Protección contra Inundaciones. NOTA: Utilizando la Protección contra Inundaciones <em>puede</em> causar una degradación del rendimiento en el foro..');
DEFINE('_COM_A_MODERATION','Enviar correo-e a moderadores');
DEFINE('_COM_A_MODERATION_DESC',
    'Seleccionado a &quot;Si&quot;, si se quiere notificaciones por correo electrónico sobre nuevos temas enviandolas a un moderador(es) del foro. Nota: si bien cada administrador (superusuario) tiene automáticamente todos los privilegios como Moderador asignar explícitamente como moderadores en
 el foro para recibir mensajes de correo electrónico también! ');
DEFINE('_COM_A_SHOWMAIL','Mostrar correo-e');
DEFINE('_COM_A_SHOWMAIL_DESC', 'Seleccionado a &quot;No&quot; si nunca desea mostrar a los usuarios la dirección de correo electrónico; Ni siquiera para los usuarios registrados.');
DEFINE('_COM_A_AVATAR','Permitir avatares');
DEFINE('_COM_A_AVATAR_DESC', 'Seleccionado a &quot;Si&quot; Si desea que los usuarios registrados puedan tener avatares (manejables a través de su perfil)');
DEFINE('_COM_A_AVHEIGHT', 'Altura Max. del Avatar');
DEFINE('_COM_A_AVWIDTH', 'Ancho Max. del Avatar');
DEFINE('_COM_A_AVSIZE', 'Tamaño Max. del Avatar<br/><em>en Kilobytes</em>');
DEFINE('_COM_A_USERSTATS', 'Mostrar Estadísticas de Usuarios');
DEFINE('_COM_A_USERSTATS_DESC', 'Seleccionado a &quot;Si&quot; para mostrar estadísticas de usuario así como el número de temas de usuario, tipo de usuario (administrador, moderador, usuario, etc ).');
DEFINE('_COM_A_AVATARUPLOAD','Permitir carga de avatar');
DEFINE('_COM_A_AVATARUPLOAD_DESC', 'Seleccionado a &quot;Si&quot; si desea que los usuarios registrados puedan subir avatares.');
DEFINE('_COM_A_AVATARGALLERY', 'Usar la galería de Avatares');
DEFINE('_COM_A_AVATARGALLERY_DESC', 'Seleccionado a &quot;Si&quot;, si se quiere que los usuarios registrados puedan elegir avatares desde una galería que usted proporcione (components/com_fireboard/avatars/gallery).');
DEFINE('_COM_A_RANKING_DESC', 'Seleccionado a &quot;Si&quot;, si se quiere mostrar el rango de usuarios registrados basado en el número de temas que ha hecho.<br/><strong>Nota: esto debe permitirse a los usuario utilizando la ficha de opciones avanzadas.</ Strong>');
DEFINE('_COM_A_RANKINGIMAGES', 'Usar las imágenes de rangos');
DEFINE('_COM_A_RANKINGIMAGES_DESC',
     'Seleccionado a &quot;Si&quot;, si se quiere mostrar el rango de usuarios registrados con una imagen (componentes/com_fireboard/ranks). Habilitando esto mostrará el texto de ese rango. Consulte la documentación sobre esto en www.bestofjoomla.com para más información sobre la clasificación de imágenes');

//email and stuff
$_COM_A_NOTIFICATION = "Notificación de Nuevo Tema";
$_COM_A_NOTIFICATION1 = "Una nueva respuesta se ha creado en un tema al cual usted se ha suscrito";
$_COM_A_NOTIFICATION2 = "Usted puede administrar sus suscripciones por el siguiente enlace a 'Mi Perfil' en la página principal del foro después de que haya iniciado sesión en el sitio. Desde su perfil también puede darse de baja de este tema.";
$_COM_A_NOTIFICATION3 = "No responda a esta notificación por correo electrónico, ya que es un mensaje de correo electrónico generado automáticamente.";
$_COM_A_NOT_MOD1 = "Un nuevo tema se ha creado en el foro al que se le ha asignado como moderador";
$_COM_A_NOT_MOD2 = "Por favor, eche un vistazo en él después de que haya entrado en el sitio.";
DEFINE('_COM_A_NO','No');
DEFINE('_COM_A_YES', 'Si');
DEFINE('_COM_A_FLAT','Plano');
DEFINE('_COM_A_THREADED','Hilado');
DEFINE('_COM_A_MESSAGES', 'Mensajes por Página');
DEFINE('_COM_A_MESSAGES_DESC', 'Número de mensajes a mostrar por página');
//admin; changes from 0.9 to 0.9.1
DEFINE('_COM_A_USERNAME','Nombre de usuario');
DEFINE('_COM_A_USERNAME_DESC', 'Seleccionado a &quot;Si&quot;, si desea que el nombre de usuario (como en el inicio de sesión) sea utilizado en lugar del nombre real de los usuarios');
DEFINE('_COM_A_CHANGENAME','Permitir cambio de nombre');
DEFINE('_COM_A_CHANGENAME_DESC', 'Seleccionado a &quot;Si&quot;, si se quiere que los usuarios registrados puedan cambiar su nombre cuando creen una publicación. Si es &quot;No&quot; entonces los usuarios  registrados no serán capaces de editar su nombre.');
//admin; changes 0.9.1 to 0.9.2
DEFINE('_COM_A_BOARD_OFFLINE', 'Foro Fuera de Linea');
DEFINE('_COM_A_BOARD_OFFLINE_DESC', 'Seleccionado a &quot;Si&quot; si usted desea tomar la sección de el Foro fuera de línea. El foro permanecerá visible por el sitio solo para (súper)administradores. ');
DEFINE('_COM_A_BOARD_OFFLINE_MES', 'Mensaje de Foro Fuera de Linea');
DEFINE('_COM_A_PRUNE','Purgar foros');
DEFINE('_COM_A_PRUNE_NAME','Foro a purgar: ');
DEFINE('_COM_A_PRUNE_DESC',
     'La función de Purgar Foros le permite "limpiar" los hilos a los temas a los cuales que no se le han encontrado nuevos temas durante un número determinado de días. Esto no elimina temas tomados como permanentes o explícitamente bloqueados; Estos deben ser eliminadas manualmente. Temas bloqueados en los foros no pueden ser purgados. ');
DEFINE('_COM_A_PRUNE_NOPOSTS','Purgar tratados sin publicaciones en los pasados ');
DEFINE('_COM_A_PRUNE_DAYS', 'días');
DEFINE('_COM_A_PRUNE_USERS','Purgar usuarios');
DEFINE('_COM_A_PRUNE_USERS_DESC',
     'Esta función le permite "limpiar" de su Fireboard la lista de usuarios en contra de la Joomla!. Se borrar todos los perfiles de usuarios del Fireboard y que se hayan eliminado de su Joomla!.<br/>Cuando esté seguro de que desea continuar, haga clic en &quot;Inicio-Purgar&quot; en la barra del menú superior.');
//general
DEFINE('_GEN_ACTION', 'Acción');
DEFINE('_GEN_AUTHOR','Autor');
DEFINE('_GEN_BY','por');
DEFINE('_GEN_CANCEL','Cancelar');
DEFINE('_GEN_CONTINUE','Enviar');
DEFINE('_GEN_DATE','Fecha');
DEFINE('_GEN_DELETE','Eliminar');
DEFINE('_GEN_EDIT','Editar');
DEFINE('_GEN_EMAIL','Correo-e');
DEFINE('_GEN_EMOTICONS', 'Emoticones');
DEFINE('_GEN_FLAT','Plano');
DEFINE('_GEN_FLAT_VIEW','Vista plana');
DEFINE('_GEN_FORUMLIST','Lista de foros');
DEFINE('_GEN_FORUM','Foro');
DEFINE('_GEN_HELP', 'Ayuda');
DEFINE('_GEN_HITS','Vistas');
DEFINE('_GEN_LAST_POST', 'Últimos Temas');
DEFINE('_GEN_LATEST_POSTS','Ultimas Publicaciones');
DEFINE('_GEN_LOCK','Bloquear');
DEFINE('_GEN_UNLOCK','Desbloquear');
DEFINE('_GEN_LOCKED_FORUM','El foro está bloqueado');
DEFINE('_GEN_LOCKED_TOPIC','El tema esta bloqueado');
DEFINE('_GEN_MESSAGE','Mensaje');
DEFINE('_GEN_MODERATED','El foro es supervisado y revisado antes de ser publicado.');
DEFINE('_GEN_MODERATORS','Moderadores');
DEFINE('_GEN_MOVE','Mover');
DEFINE('_GEN_NAME','Nombre');
DEFINE('_GEN_POST_NEW_TOPIC','Nuevo tema');
DEFINE('_GEN_POST_REPLY','Publicar respuesta');
DEFINE('_GEN_MYPROFILE', 'Mi perfil');
DEFINE('_GEN_QUOTE','Cita');
DEFINE('_GEN_REPLY','Respuesta');
DEFINE('_GEN_REPLIES','Respuestas');
DEFINE('_GEN_THREADED','Hilado');
DEFINE('_GEN_THREADED_VIEW','Vista hilada');
DEFINE('_GEN_SIGNATURE','Firma');
DEFINE('_GEN_ISSTICKY','El tema es permanente.');
DEFINE('_GEN_STICKY','Permanente');
DEFINE('_GEN_UNSTICKY', 'No Permanente');
DEFINE('_GEN_SUBJECT','Asunto');
DEFINE('_GEN_SUBMIT','Enviar');
DEFINE('_GEN_TOPIC','Tema');
DEFINE('_GEN_TOPICS','Temas');
DEFINE('_GEN_TOPIC_ICON', 'Icono del mensaje');
DEFINE('_GEN_SEARCH_BOX','Busca en los foros');
$_GEN_THREADED_VIEW = "Vista hilada";
$_GEN_FLAT_VIEW = "Vista plana";
//avatar_upload.php
DEFINE('_UPLOAD_UPLOAD','Cargar');
DEFINE('_UPLOAD_DIMENSIONS', 'Su imagen puede tener un máximo (ancho x alto - tamaño)');
DEFINE('_UPLOAD_SUBMIT','Cargar un nuevo avatar');
DEFINE('_UPLOAD_SELECT_FILE','Seleccionar documento');
DEFINE('_UPLOAD_ERROR_TYPE','Por favor, utilice sólo imágenes JPEG, GIF o PNG');
DEFINE('_UPLOAD_ERROR_EMPTY','Por favor seleccione un documento antes de cargarlo');
DEFINE('_UPLOAD_ERROR_NAME','El archivo de imagen debe contener solo caracteres alfanuméricos y sin espacios, por favor.');
DEFINE('_UPLOAD_ERROR_SIZE','El tamaño del archivo de imagen supera el máximo fijado por el Administrador.');
DEFINE('_UPLOAD_ERROR_WIDTH','El ancho del archivo de imagen supera el máximo fijado por el Administrador.');
DEFINE('_UPLOAD_ERROR_HEIGHT','El alto del archivo de la imagen supera el máximo fijado por el Administrador.');
DEFINE('_UPLOAD_ERROR_CHOOSE','Usted no ha elegído un Avatar de la galería...');
DEFINE('_UPLOAD_UPLOADED','Tu avatar ha sido cargado.');
DEFINE('_UPLOAD_GALLERY','Elija un avatar de la galería:');
DEFINE('_UPLOAD_CHOOSE','Confirmar Elección.');
// listcat.php
DEFINE('_LISTCAT_ADMIN','Un administrador debe crearlas primero desde');
DEFINE('_LISTCAT_DO','Otros usuarios sabrán qué hacer');
DEFINE('_LISTCAT_INFORM','Informar a ellos y decirles que deben darse prisa!');
DEFINE('_LISTCAT_NO_CATS','No hay categorías en el foro aún por definir.');
DEFINE('_LISTCAT_PANEL','Panel de Administración de la Joomla! OS CMS.');
DEFINE('_LISTCAT_PENDING','mensaje(s) pendiente(s)');
// moderation.php
DEFINE('_MODERATION_MESSAGES','No hay mensajes pendientes en este foro.');
// post.php
DEFINE('_POST_ABOUT_TO_DELETE','Estas a punto de eliminar este mensaje.');
DEFINE('_POST_ABOUT_DELETE','<strong>NOTAS: </strong><br/>
-si usted elimina untema de un foro (el primer mensaje de tema) todos los sub-foros o temas será eliminados también!
..Considere blanqueado el tema y nombre de temas si sólo si el contenido debe ser eliminado..
<br/>
- Todos los sub-foros y temas de un tema suprimido normal se trasladará hasta el primer rango en la jerarquía del hilo.');
DEFINE('_POST_CLICK', 'click aquí');
DEFINE('_POST_ERROR','No se pudo encontrar al usuario o correo-e. Error severo en la base de datos no listado');
DEFINE('_POST_ERROR_MESSAGE', 'No se conoce el Error SQL producido y su mensaje no fue publicado. Si el problema persiste, póngase en contacto con el administrador.');
DEFINE('_POST_ERROR_MESSAGE_OCCURED', 'Se ha producido un error y el mensaje no se ha actualizado. Por favor, inténtalo de nuevo. Si el problema persiste, por favor póngase en contacto con el administrador.');
DEFINE('_POST_ERROR_TOPIC', 'Se ha producido un error durante el borrado(s). Por favor, compruebe el error a continuación:');
DEFINE('_POST_FORGOT_NAME', 'Si te olvidaste de incluir tu nombre. Haga clic con el botón Atrás del navegador para regresar y volver a intentarlo.');
DEFINE('_POST_FORGOT_SUBJECT', 'Si te olvidaste de incluir un tema. Haga clic con el botón Atrás del navegador para regresar y volver a intentarlo.');
DEFINE('_POST_FORGOT_MESSAGE', 'Si te olvidaste de incluir un mensaje. Haga clic con el botón Atrás del navegador para regresar y volver a intentarlo.');
DEFINE('_POST_INVALID', 'ID de tema inválida, se ha identificado.');
DEFINE('_POST_LOCK_SET','Se ha bloqueado el tema.');
DEFINE('_POST_LOCK_NOT_SET','No se pudo bloquear el tema.');
DEFINE('_POST_LOCK_UNSET','Se ha desbloqueado el tema.');
DEFINE('_POST_LOCK_NOT_UNSET','No se pudo desbloquear el tema.');
DEFINE('_POST_MESSAGE','Publicar un nuevo mensaje en ');
DEFINE('_POST_MOVE_TOPIC','Mover este tema al foro ');
DEFINE('_POST_NEW','Publicar un nuevo mensaje en: ');
DEFINE('_POST_NO_SUBSCRIBED_TOPIC', 'No es posible procesar su suscripción a este tema.');
DEFINE('_POST_NOTIFIED','Selecciona esta casilla para que seas notificado sobre las respuestas en este tema.');
DEFINE('_POST_STICKY_SET','La etiqueta permanente ha sido puesta para este tema.');
DEFINE('_POST_STICKY_NOT_SET','La etiqueta permanente no pudo ser puesta en este tema.');
DEFINE('_POST_STICKY_UNSET','La etiqueta permanente ha sido quitada de este tema.');
DEFINE('_POST_STICKY_NOT_UNSET','La etiqueta permanente no pudo ser quitada de este tema.');
DEFINE('_POST_SUBSCRIBE','suscribir');
DEFINE('_POST_SUBSCRIBED_TOPIC','Te has suscrito a este tema.');
DEFINE('_POST_SUCCESS','Tu mensaje ha sido correctamente');
DEFINE('_POST_SUCCES_REVIEW', 'Su mensaje se ha creado satisfactoriamente. Será revisado por un moderador antes de que sea publicado en el foro.');
DEFINE('_POST_SUCCESS_REQUEST','Tu solicitud ha sido procesada. Si no eres regresado al tema en unos momentos,');
DEFINE('_POST_TOPIC_HISTORY','Historial de temas de');
DEFINE('_POST_TOPIC_HISTORY_MAX', 'Max. mostrando los últimos');
DEFINE('_POST_TOPIC_HISTORY_LAST', 'temas  -  <i>(Ultimos temas primero)</i>');
DEFINE('_POST_TOPIC_NOT_MOVED','Tu tema no se pudo mover. Para regresar al tema: ');
DEFINE('_POST_TOPIC_FLOOD1','El administrador de este foro ha permitido Protection contra Inundaciones, y ha decidido que usted debe esperar');
DEFINE('_POST_TOPIC_FLOOD2','segundos antes de que usted pueda crear otro tema. ');
DEFINE('_POST_TOPIC_FLOOD3','Por favor, haga clic en su navegador en el botón "atras" para volver al foro.');
DEFINE('_POST_EMAIL_NEVER','tu dirección de correo electrónico nunca será mostrada en el sitio. ');
DEFINE('_POST_EMAIL_REGISTERED', 'tu dirección de correo electrónico sólo estará disponible para usuarios registrados.');
DEFINE('_POST_LOCKED','bloqueado por el administrador.');
DEFINE('_POST_NO_NEW','Nuevas respuestas no estan permitidas.');
DEFINE('_POST_NO_PUBACCESS1', 'El Administrador ha deshabilitado la escritura pública.');
DEFINE('_POST_NO_PUBACCESS2', 'Solo usuarios conectados / registrados<br /> han sido permitidos para contribuir en el foro.');
// showcat.php
DEFINE('_SHOWCAT_NO_TOPICS', '>> No hay temas en este foro todavía <<');
DEFINE('_SHOWCAT_PENDING','mensaje(s) pendiente(s)');
// userprofile.php
DEFINE('_USER_DELETE',' selecciona esta casilla para eliminar tu firma');
DEFINE('_USER_ERROR_A','Usted llegó a esta página por error. Por favor, informe al administrador en los enlaces');
DEFINE('_USER_ERROR_B','y haga click desde aquí. Usted popdrá entonces enviar un informe de fallos.');
DEFINE('_USER_ERROR_C', 'Gracias!');
DEFINE('_USER_ERROR_D', 'Número de errores incluidos en su reporte: ');
DEFINE('_USER_GENERAL', 'Opciones Generales de Perfiles');
DEFINE('_USER_MODERATOR','Estas asignado como moderador de foros');
DEFINE('_USER_MODERATOR_NONE','No se encontraron foros asignados a ti');
DEFINE('_USER_MODERATOR_ADMIN','Los administradores son moderadores en todos los foros.');
DEFINE('_USER_NOSUBSCRIPTIONS','No se encontraron suscripciones para ti');
DEFINE('_USER_PREFERED','Tipo de vista preferido');
DEFINE('_USER_PROFILE', 'Perfil para ');
DEFINE('_USER_PROFILE_NOT_A', 'Su perfil podría ');
DEFINE('_USER_PROFILE_NOT_B','pudo');
DEFINE('_USER_PROFILE_NOT_C',' ser actualizado.');
DEFINE('_USER_PROFILE_UPDATED', 'Su perfil se ha actualizado.');
DEFINE('_USER_RETURN_A', 'Si no se regresa de nuevo a su perfil en unos instantes ');
DEFINE('_USER_RETURN_B', 'click aquí');
DEFINE('_USER_SUBSCRIPTIONS','Tus suscripciones');
DEFINE('_USER_UNSUBSCRIBE', 'Desuscribir');
DEFINE('_USER_UNSUBSCRIBE_A','No pudiste ');
DEFINE('_USER_UNSUBSCRIBE_B','no');
DEFINE('_USER_UNSUBSCRIBE_C', ' desuscribirse de este tema.');
DEFINE('_USER_UNSUBSCRIBE_YES', 'Usted ha sido desuscripto de este tema.');
DEFINE('_USER_DELETEAV',' selecciona esta casilla para eliminar tu avatar');
//New 0.9 to 1.0
DEFINE('_USER_ORDER','Orden preferido de los mensajes');
DEFINE('_USER_ORDER_DESC', 'Ultimos temas primero');
DEFINE('_USER_ORDER_ASC', 'Nuevos temas priemro');
// view.php
DEFINE('_VIEW_DISABLED', 'El administrador ha desactivado el acceso a escritura pública.');
DEFINE('_VIEW_POSTED','Publicado por');
DEFINE('_VIEW_SUBSCRIBE',':: Suscribirse a este tema ::');
DEFINE('_MODERATION_INVALID_ID', 'Una Id invalida de tema ha sido pedida.');
DEFINE('_VIEW_NO_POSTS','No hay publicaciones en este foro.');
DEFINE('_VIEW_VISITOR','Visitante');
DEFINE('_VIEW_ADMIN','Administrador');
DEFINE('_VIEW_USER','Usuario');
DEFINE('_VIEW_MODERATOR','Moderador');
DEFINE('_VIEW_REPLY','Responder este mensaje');
DEFINE('_VIEW_EDIT','Editar este mensaje');
DEFINE('_VIEW_QUOTE', 'Cita este mensaje en un nuevo tema');
DEFINE('_VIEW_DELETE','Eliminar este mensaje');
DEFINE('_VIEW_STICKY','Poner una etiqueta a este tema');
DEFINE('_VIEW_UNSTICKY','Quitar la etiqueta de este tema');
DEFINE('_VIEW_LOCK','Bloquear este tema');
DEFINE('_VIEW_UNLOCK','Desbloquear este tema');
DEFINE('_VIEW_MOVE','Mover este tema a otro foro');
DEFINE('_VIEW_SUBSCRIBETXT', 'Suscribirse a este tema y obtener notificados por correo acerca de los nuevos mensajes');
//NEW-STRINGS-FOR-TRANSLATING-READY-FOR-SIMPLEBOARD 9.2
DEFINE('_HOME','Foros');
DEFINE('_POSTS','Publicaciones: ');
DEFINE('_TOPIC_NOT_ALLOWED', 'Tema');
DEFINE('_FORUM_NOT_ALLOWED','Foro');
DEFINE('_FORUM_IS_OFFLINE', 'Forum is OFFLINE!');
DEFINE('_PAGE', 'Página: ');
DEFINE('_NO_POSTS','No hay publicaciones');
DEFINE('_CHARS', 'max. de caracteres');
DEFINE('_HTML_YES','HTML esta deshabilitado.');
DEFINE('_YOUR_AVATAR','<b>Tu avatar</b>');
DEFINE('_NON_SELECTED', '  Aún no se ha seleccionado <br>');
DEFINE('_SET_NEW_AVATAR','Seleccionar un nuevo avatar');
DEFINE('_THREAD_UNSUBSCRIBE', 'Desuscribir');
DEFINE('_SHOW_LAST_POSTS','Temas activos en');
DEFINE('_SHOW_HOURS','horas');
DEFINE('_SHOW_POSTS','Total: ');
DEFINE('_DESCRIPTION_POSTS','Se muestran las nuevas publicaciones para los temas activos');
DEFINE('_SHOW_4_HOURS','4 Horas');
DEFINE('_SHOW_8_HOURS','8 Horas');
DEFINE('_SHOW_12_HOURS','12 Horas');
DEFINE('_SHOW_24_HOURS','24 Horas');
DEFINE('_SHOW_48_HOURS','48 Horas');
DEFINE('_SHOW_WEEK','Semana');
DEFINE('_POSTED_AT','Publicado el');
DEFINE('_DATETIME','d-m-Y H:i:s');
DEFINE('_NO_TIMEFRAME_POSTS','No hay nuevas publicaciones en el marco de tiempo que seleccionaste.');
DEFINE('_MESSAGE','Mensaje');
DEFINE('_NO_SMILIE','no');
DEFINE('_FORUM_UNAUTHORIZIED','Este foro esta abierto solamente a usuarios registrados y que han ingresado.');
DEFINE('_FORUM_UNAUTHORIZIED2','Si tu ya te registraste, por favor ingresa primero.');
DEFINE('_FORUM_UNAUTHORIZIED2', 'If you are already registered, please log in first.');
DEFINE('_MOD_APPROVE','Aprobar');
DEFINE('_MOD_DELETE','Eliminar');
//NEW in RC1
DEFINE('_SHOW_LAST', 'Mostrar mensaje más reciente');
DEFINE('_POST_WROTE', 'escribió');
DEFINE('_COM_A_EMAIL', 'Tabla de dirección de correo electrónico');
DEFINE('_COM_A_EMAIL_DESC', 'Esta es la tabla de dirección de correo electrónico. Ingrase una dirección de correo electrónico valida');
DEFINE('_COM_A_WRAP','Cortar palabras');
DEFINE('_COM_A_WRAP_DESC',
     'Introduzca el número máximo de caracteres que una sola palabra puede tener. Esta función le permite ajustar la salida de Temas en la plantilla del Fireboard.<br/> 70 caracteres es probablemente el ancho máximo fijo de las plantillas, usted puede experimentar un poco.<br/> URLs, no importa cuánto tiempo, No se verán afectadas por la wordwrap ');
DEFINE('_COM_A_SIGNATURE','Ancho Max. de Firma');
DEFINE('_COM_A_SIGNATURE_DESC','Número máximo de caracteres permitidos para la firma del usuario. ');
DEFINE('_SHOWCAT_NOPENDING', 'No hay mensaje(s) pendientes');
DEFINE('_COM_A_BOARD_OFSET','Diferencia de horarios del foro');
DEFINE('_COM_A_BOARD_OFSET_DESC', 'Algunos servidores se encuentran localizados en diferentes zonas horarias a las utilizadas por los usuarios del foro. Seleccione el formato de tiempo adecuado editando la misma el area de horas. Puden ser utilizados números positivos y negativos para la misma. ');
//New in RC2
DEFINE('_COM_A_BASICS','Basicos');
DEFINE('_COM_A_FRONTEND','Frente');
DEFINE('_COM_A_SECURITY','Seguridad');
DEFINE('_COM_A_AVATARS','Avatares');
DEFINE('_COM_A_INTEGRATION', 'Integración');
DEFINE('_COM_A_PMS', 'Habilitar mensajería privada');
DEFINE('_COM_A_PMS_DESC',
     'Elija un componente de mensajería privada si tiene instalado alguno. Seleccionando Clexus PM también permitirá el perfil de usuario ClexusPM relacionados con las opciones (como ICQ, AIM, Yahoo, MSN y vículos al perfil si es aceptado por la plantilla utilizada por Fireboard ');
DEFINE('_VIEW_PMS','Haz click aquí para enviar un mensaje privado a este usuario');
//new in RC3
DEFINE('_POST_RE','Re: ');
DEFINE('_BBCODE_BOLD','Texto en negritas: [b]negritas[/b] ');
DEFINE('_BBCODE_ITALIC', 'Texto en cursiva: [i]cursiva[/i]');
DEFINE('_BBCODE_UNDERL','Texto subrayado: [u]subrayado[/u]');
DEFINE('_BBCODE_QUOTE','Texto citado: [quote]citado[/quote]');
DEFINE('_BBCODE_CODE', 'Mostrar código: [code]código[/code]');
DEFINE('_BBCODE_ULIST','Lista desordenada: [ul] [li]Lista desordenada[/li] [/ul]');
DEFINE('_BBCODE_OLIST','Lista ordenada: [ol] [li]Lista ordenada[/li] [/ol]');
DEFINE('_BBCODE_IMAGE','Imagen: [img size=(01-400)]http://www.ann.com.mx/images/ann.jpg[/img]');
DEFINE('_BBCODE_LINK', 'Link: [url=http://www.zzz.com/]This is a link[/url]');
DEFINE('_BBCODE_CLOSA','Cerrar todas las etiquetas');
DEFINE('_BBCODE_CLOSE', 'Cerrar todas las etiquetas bbCode');
DEFINE('_BBCODE_COLOR','Color: [color=#FF6600]color del texto[/color]');
DEFINE('_BBCODE_SIZE', 'Tamaño: [size=1]tamaño del texto[/size] - Pista: los tamaños van desde 1 a 5');
DEFINE('_BBCODE_LITEM','Elemento de lista: [li] elemento de lista [/li]');
DEFINE('_BBCODE_HINT', 'Ayuda bbCode - Sugerencia: bbCode puede ser utilizado en el texto seleccionado');
DEFINE('_COM_A_TAWIDTH', 'Ancho del area de texto');
DEFINE('_COM_A_TAWIDTH_DESC', 'Ajuste el ancho de respuesta/tema del área  de introducción de texto para adaptarlo a su plantilla. <br/>La barra de emoticones del tema será dividida en dos lienas si el ancho <= 420 pixeles');
DEFINE('_COM_A_TAHEIGHT', 'Alto del area de texto');
DEFINE('_COM_A_TAHEIGHT_DESC', 'Ajuste el ancho de respuesta/tema del área  de introducción de texto para adaptarlo a su plantilla');
DEFINE('_COM_A_ASK_EMAIL','Requerir Correo-e');
DEFINE('_COM_A_ASK_EMAIL_DESC', 'Exigir una dirección de correo electrónico cuando los usuarios o los visitantes creen temas. Seleccioando a &quot;No&quot; si desea que esta función sea omitida en el Frontend. A los posteadores no se les pregunta su dirección de correo electrónico.');

//Rank Administration - Dan Syme/IGD
DEFINE('_FB_RANKS_MANAGE', 'Administración de Rangos');
DEFINE('_FB_SORTRANKS', 'Clases por Rangos');

DEFINE('_FB_RANKSIMAGE', 'Imagen de Rango');
DEFINE('_FB_RANKS', 'Título del Rango');
DEFINE('_FB_RANKS_SPECIAL', 'Especial');
DEFINE('_FB_RANKSMIN', 'Cuenta mínima por tema');
DEFINE('_FB_RANKS_ACTION', 'Acciones');
DEFINE('_FB_NEW_RANK', 'Nuevo Rango');

//Justificación del Texto
DEFINE('_BBCODE_JUSTIFY_LEFT', 'Texto a la izquierda: [izq]texto[/izq]');
DEFINE('_BBCODE_JUSTIFY_RIGHT', 'Texto a la derecha: [der]texto[/der]');
DEFINE('_BBCODE_JUSTIFY_CENTER', 'Texto al centro: [centro]texto[/centro]');
DEFINE('_BBCODE_JUSTIFY_FULL', 'Justificar: [full]texto[/full]');

// Video Youtube
DEFINE('_BBCODE_YOUTUBE','Video Youtube (Unicamente): [video]Video-ID[/video] ');

// For template numinu
DEFINE('_FB_AGO','Antes');
DEFINE('_VIEW_SUBSCRIBETXT2','Suscribirse');
DEFINE('_VIEW_FAVORITETXT2','Favorito ');
DEFINE('_SHOW_ALLTIME','Todo el Tiempo');
DEFINE('_SHOW_MONTH','Mes');
DEFINE('_SHOW_DISCUSSIONS','Discusiones');
DEFINE('_SHOW_ALLDISCUSSIONS','Todas las Discusiones');
DEFINE('_SHOW_TOTALTHREAD','Total de Mensajes');
DEFINE('_GEN_POSTED','Posteado hace');
DEFINE('_GEN_LASTPOST','Ultimo Tema');
DEFINE('_SHOW_CATEGORIES','Categorías');
DEFINE('_FB_CHILD_BOARD','Subforos');
DEFINE('_FB_SUBMITED','Enviado');
DEFINE('_FB_SOURCE','Fuente');
DEFINE('_FB_ADD_DATE','Agregar Fecha');
DEFINE('_FB_MODIFYDATE','Modificar Fecha');
DEFINE('_FB_DETAIL','Detalle');
DEFINE('_FB_DEMO','Demostración');
DEFINE('_FB_DOWNLOAD','Descarga');
DEFINE('_FB_LICENSE','Licencia');
DEFINE('_FB_FAVOURED','Favorecido');
DEFINE('_FB_NUMBER','Nº');
?>
