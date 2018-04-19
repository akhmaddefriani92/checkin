<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = '172.16.20.204:3307';
$db['default']['username'] = 'root';
$db['default']['password'] = 'mcojaya';
$db['default']['database'] = 'kios';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['konter']['hostname'] = '172.16.20.204:3307';
$db['konter']['username'] = 'root';
$db['konter']['password'] = 'mcojaya';
$db['konter']['database'] = 'konter';
$db['konter']['dbdriver'] = 'mysqli';
$db['konter']['dbprefix'] = '';
$db['konter']['pconnect'] = TRUE;
$db['konter']['db_debug'] = TRUE;
$db['konter']['cache_on'] = FALSE;
$db['konter']['cachedir'] = '';
$db['konter']['char_set'] = 'utf8';
$db['konter']['dbcollat'] = 'utf8_general_ci';
$db['konter']['swap_pre'] = '';
$db['konter']['autoinit'] = TRUE;
$db['konter']['stricton'] = FALSE;

$db['CT1_201']['hostname'] = '172.16.20.201';
$db['CT1_201']['username'] = 'sa';
$db['CT1_201']['password'] = 'hello';
$db['CT1_201']['database'] = 'fpct1';
$db['CT1_201']['dbdriver'] = 'mssql';
$db['CT1_201']['dbprefix'] = '';
$db['CT1_201']['pconnect'] = TRUE;
$db['CT1_201']['db_debug'] = TRUE;
$db['CT1_201']['cache_on'] = FALSE;
$db['CT1_201']['cachedir'] = '';
$db['CT1_201']['char_set'] = 'utf8';
$db['CT1_201']['dbcollat'] = 'utf8_general_ci';
$db['CT1_201']['swap_pre'] = '';
$db['CT1_201']['autoinit'] = TRUE;
$db['CT1_201']['stricton'] = FALSE;


$db['DJB_201']['hostname'] = '172.16.20.201';
$db['DJB_201']['username'] = 'sa';
$db['DJB_201']['password'] = 'hello';
$db['DJB_201']['database'] = 'fpdjb';
$db['DJB_201']['dbdriver'] = 'mssql';
$db['DJB_201']['dbprefix'] = '';
$db['DJB_201']['pconnect'] = TRUE;
$db['DJB_201']['db_debug'] = TRUE;
$db['DJB_201']['cache_on'] = FALSE;
$db['DJB_201']['cachedir'] = '';
$db['DJB_201']['char_set'] = 'utf8';
$db['DJB_201']['dbcollat'] = 'utf8_general_ci';
$db['DJB_201']['swap_pre'] = '';
$db['DJB_201']['autoinit'] = TRUE;
$db['DJB_201']['stricton'] = FALSE;

$db['HLP_201']['hostname'] = '172.16.20.201';
$db['HLP_201']['username'] = 'sa';
$db['HLP_201']['password'] = 'hello';
$db['HLP_201']['database'] = 'fphlp';
$db['HLP_201']['dbdriver'] = 'mssql';
$db['HLP_201']['dbprefix'] = '';
$db['HLP_201']['pconnect'] = TRUE;
$db['HLP_201']['db_debug'] = TRUE;
$db['HLP_201']['cache_on'] = FALSE;
$db['HLP_201']['cachedir'] = '';
$db['HLP_201']['char_set'] = 'utf8';
$db['HLP_201']['dbcollat'] = 'utf8_general_ci';
$db['HLP_201']['swap_pre'] = '';
$db['HLP_201']['autoinit'] = TRUE;
$db['HLP_201']['stricton'] = FALSE;

$db['CT3_201']['hostname'] = '172.16.20.201';
$db['CT3_201']['username'] = 'sa';
$db['CT3_201']['password'] = 'hello';
$db['CT3_201']['database'] = 'fpct3';
$db['CT3_201']['dbdriver'] = 'mssql';
$db['CT3_201']['dbprefix'] = '';
$db['CT3_201']['pconnect'] = TRUE;
$db['CT3_201']['db_debug'] = TRUE;
$db['CT3_201']['cache_on'] = FALSE;
$db['CT3_201']['cachedir'] = '';
$db['CT3_201']['char_set'] = 'utf8';
$db['CT3_201']['dbcollat'] = 'utf8_general_ci';
$db['CT3_201']['swap_pre'] = '';
$db['CT3_201']['autoinit'] = TRUE;
$db['CT3_201']['stricton'] = FALSE;

$db['PLM_201']['hostname'] = '172.16.20.201';
$db['PLM_201']['username'] = 'sa';
$db['PLM_201']['password'] = 'hello';
$db['PLM_201']['database'] = 'fpplm';
$db['PLM_201']['dbdriver'] = 'mssql';
$db['PLM_201']['dbprefix'] = '';
$db['PLM_201']['pconnect'] = TRUE;
$db['PLM_201']['db_debug'] = TRUE;
$db['PLM_201']['cache_on'] = FALSE;
$db['PLM_201']['cachedir'] = '';
$db['PLM_201']['char_set'] = 'utf8';
$db['PLM_201']['dbcollat'] = 'utf8_general_ci';
$db['PLM_201']['swap_pre'] = '';
$db['PLM_201']['autoinit'] = TRUE;
$db['PLM_201']['stricton'] = FALSE;

$db['PNK_201']['hostname'] = '172.16.20.201';
$db['PNK_201']['username'] = 'sa';
$db['PNK_201']['password'] = 'hello';
$db['PNK_201']['database'] = 'fppnk';
$db['PNK_201']['dbdriver'] = 'mssql';
$db['PNK_201']['dbprefix'] = '';
$db['PNK_201']['pconnect'] = TRUE;
$db['PNK_201']['db_debug'] = TRUE;
$db['PNK_201']['cache_on'] = FALSE;
$db['PNK_201']['cachedir'] = '';
$db['PNK_201']['char_set'] = 'utf8';
$db['PNK_201']['dbcollat'] = 'utf8_general_ci';
$db['PNK_201']['swap_pre'] = '';
$db['PNK_201']['autoinit'] = TRUE;
$db['PNK_201']['stricton'] = FALSE;

$db['PDG_201']['hostname'] = '172.16.20.201';
$db['PDG_201']['username'] = 'sa';
$db['PDG_201']['password'] = 'hello';
$db['PDG_201']['database'] = 'fppdg';
$db['PDG_201']['dbdriver'] = 'mssql';
$db['PDG_201']['dbprefix'] = '';
$db['PDG_201']['pconnect'] = TRUE;
$db['PDG_201']['db_debug'] = TRUE;
$db['PDG_201']['cache_on'] = FALSE;
$db['PDG_201']['cachedir'] = '';
$db['PDG_201']['char_set'] = 'utf8';
$db['PDG_201']['dbcollat'] = 'utf8_general_ci';
$db['PDG_201']['swap_pre'] = '';
$db['PDG_201']['autoinit'] = TRUE;
$db['PDG_201']['stricton'] = FALSE;

$db['PKU_201']['hostname'] = '172.16.20.201';
$db['PKU_201']['username'] = 'sa';
$db['PKU_201']['password'] = 'hello';
$db['PKU_201']['database'] = 'fppku';
$db['PKU_201']['dbdriver'] = 'mssql';
$db['PKU_201']['dbprefix'] = '';
$db['PKU_201']['pconnect'] = TRUE;
$db['PKU_201']['db_debug'] = TRUE;
$db['PKU_201']['cache_on'] = FALSE;
$db['PKU_201']['cachedir'] = '';
$db['PKU_201']['char_set'] = 'utf8';
$db['PKU_201']['dbcollat'] = 'utf8_general_ci';
$db['PKU_201']['swap_pre'] = '';
$db['PKU_201']['autoinit'] = TRUE;
$db['PKU_201']['stricton'] = FALSE;

$db['PGK_201']['hostname'] = '172.16.20.201';
$db['PGK_201']['username'] = 'sa';
$db['PGK_201']['password'] = 'hello';
$db['PGK_201']['database'] = 'fppgk';
$db['PGK_201']['dbdriver'] = 'mssql';
$db['PGK_201']['dbprefix'] = '';
$db['PGK_201']['pconnect'] = TRUE;
$db['PGK_201']['db_debug'] = TRUE;
$db['PGK_201']['cache_on'] = FALSE;
$db['PGK_201']['cachedir'] = '';
$db['PGK_201']['char_set'] = 'utf8';
$db['PGK_201']['dbcollat'] = 'utf8_general_ci';
$db['PGK_201']['swap_pre'] = '';
$db['PGK_201']['autoinit'] = TRUE;
$db['PGK_201']['stricton'] = FALSE;

$db['BDO_201']['hostname'] = '172.16.20.201';
$db['BDO_201']['username'] = 'sa';
$db['BDO_201']['password'] = 'hello';
$db['BDO_201']['database'] = 'fpbdo';
$db['BDO_201']['dbdriver'] = 'mssql';
$db['BDO_201']['dbprefix'] = '';
$db['BDO_201']['pconnect'] = TRUE;
$db['BDO_201']['db_debug'] = TRUE;
$db['BDO_201']['cache_on'] = FALSE;
$db['BDO_201']['cachedir'] = '';
$db['BDO_201']['char_set'] = 'utf8';
$db['BDO_201']['dbcollat'] = 'utf8_general_ci';
$db['BDO_201']['swap_pre'] = '';
$db['BDO_201']['autoinit'] = TRUE;
$db['BDO_201']['stricton'] = FALSE;



$db['KNO_201']['hostname'] = '172.16.20.201';
$db['KNO_201']['username'] = 'sa';
$db['KNO_201']['password'] = 'hello';
$db['KNO_201']['database'] = 'fpmes';
$db['KNO_201']['dbdriver'] = 'mssql';
$db['KNO_201']['dbprefix'] = '';
$db['KNO_201']['pconnect'] = TRUE;
$db['KNO_201']['db_debug'] = TRUE;
$db['KNO_201']['cache_on'] = FALSE;
$db['KNO_201']['cachedir'] = '';
$db['KNO_201']['char_set'] = 'utf8';
$db['KNO_201']['dbcollat'] = 'utf8_general_ci';
$db['KNO_201']['swap_pre'] = '';
$db['KNO_201']['autoinit'] = TRUE;
$db['KNO_201']['stricton'] = FALSE;

$db['DTB_201']['hostname'] = '172.16.20.201';
$db['DTB_201']['username'] = 'sa';
$db['DTB_201']['password'] = 'hello';
$db['DTB_201']['database'] = 'fpdtb';
$db['DTB_201']['dbdriver'] = 'mssql';
$db['DTB_201']['dbprefix'] = '';
$db['DTB_201']['pconnect'] = TRUE;
$db['DTB_201']['db_debug'] = TRUE;
$db['DTB_201']['cache_on'] = FALSE;
$db['DTB_201']['cachedir'] = '';
$db['DTB_201']['char_set'] = 'utf8';
$db['DTB_201']['dbcollat'] = 'utf8_general_ci';
$db['DTB_201']['swap_pre'] = '';
$db['DTB_201']['autoinit'] = TRUE;
$db['DTB_201']['stricton'] = FALSE;

/*
$db['local_mysql']['hostname'] = 'localhost';
$db['local_mysql']['username'] = 'root';
$db['local_mysql']['password'] = 'mcojaya';
$db['local_mysql']['database'] = 'kiosM';

$db['local_mysql']['dbdriver'] = 'mysql';
$db['local_mysql']['dbprefix'] = '';
$db['local_mysql']['pconnect'] = TRUE;
$db['local_mysql']['db_debug'] = TRUE;
$db['local_mysql']['cache_on'] = FALSE;
$db['local_mysql']['cachedir'] = '';
$db['local_mysql']['char_set'] = 'utf8';
$db['local_mysql']['dbcollat'] = 'utf8_general_ci';
$db['local_mysql']['swap_pre'] = '';
$db['local_mysql']['autoinit'] = TRUE;
$db['local_mysql']['stricton'] = FALSE;*/

// /set the default db
// $active_group = 'default';

/* End of file database.php */
/* Location: ./application/config/database.php */