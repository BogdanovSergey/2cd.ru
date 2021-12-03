<?

	mysql_connect($DB_host,$DB_login,$DB_password)	or die("Can't connect to DB");
	mysql_select_db($DB_database)			or die("Can't choose DB");
	if($MY[reset_db]) { DB_reset(); }
	
	function DB_reset() {
		mysql_query("DROP TABLE STAT_main");
		mysql_query("DROP TABLE STAT_users");
		mysql_query("DROP TABLE STAT_sectors");
		mysql_query("DROP TABLE STAT_from");
		mysql_query("CREATE TABLE STAT_main (	id		INT		NOT NULL AUTO_INCREMENT PRIMARY KEY,
							site_id		INT		NOT NULL,
							site_login	VARCHAR(32) 	NOT NULL,
							site_passwd	VARCHAR(32) 	NOT NULL,
							clicks		INT		NOT NULL,
							hosts		INT		NOT NULL,
							arrivals	INT		NOT NULL,
							unique_users	INT		NOT NULL,
							interested 	INT		NOT NULL,
							page_viewtime	INT		NOT NULL,
							sess_viewtime	INT		NOT NULL,
							
							depth_1		INT		NOT NULL,
							depth_3		INT		NOT NULL,
							depth_5		INT		NOT NULL,
							depth_7		INT		NOT NULL,
							depth_10	INT		NOT NULL,
							
							shop_registered INT,
							shop_orders	INT
							)");
		

		mysql_query("CREATE TABLE STAT_camefrom(id		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							site_id		INT	NOT NULL,
							real_url	VARCHAR(255),
							clicks		INT,
							UNIQUE (real_url)
							)");


		mysql_query("CREATE TABLE STAT_sectors (id		INT		NOT NULL AUTO_INCREMENT PRIMARY KEY,
							site_id		INT		NOT NULL,
							sector_id	INT		NOT NULL,
							sector_title	VARCHAR(255) 	NOT NULL,
							clicks		INT		NOT NULL,
							hosts		INT		NOT NULL,
							UNIQUE (sector_title)
							)");

		
		
		mysql_query("CREATE TABLE STAT_users (	id		INT		NOT NULL AUTO_INCREMENT PRIMARY KEY,
							site_id		INT		NOT NULL,
							sector		INT		DEFAULT 0,
							identifyer	VARCHAR(50)	NOT NULL,
							arrival		DATETIME	NOT NULL,
							unix_time	BIGINT,
							whole_time	BIGINT		DEFAULT 0,
							clicks		BIGINT		DEFAULT 1,
							
							user_os		VARCHAR(10),
							user_browser	VARCHAR(30),
							user_browserver	VARCHAR(10),
							user_agent	VARCHAR(50),
							user_camefrom	VARCHAR(255),
							user_cpu	VARCHAR(10),
							user_proxy	VARCHAR(50),
							user_java	TINYINT(1),
							user_javascript	VARCHAR(5),
							user_cookie	TINYINT(1),
							user_resolution	VARCHAR(10),
							user_colors	VARCHAR(10),
							user_language	VARCHAR(3),
							user_staytime	INT,
							user_timeoffset	INT,
							user_ip		VARCHAR(15)	NOT NULL)");

	}

?>
