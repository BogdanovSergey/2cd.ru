<?

	function ADM_reset_all() {
		ADM_reset_admin();
		ADM_reset_level();
		ADM_reset_goods();
		ADM_reset_keys();
		ADM_reset_users();
		ADM_reset_basket();
		ADM_reset_orders();
		ADM_reset_adreses();
		ADM_reset_news();
		ADM_reset_skins();
		ADM_reset_best();
	}

	function ADM_reset_admin() {
		global $ADMIN;
		$table	= 'S_admin';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table	( fio		VARCHAR(100),
							  login		VARCHAR(32) NOT NULL,
							  password	VARCHAR(32) NOT NULL,
							  relay_ip1	VARCHAR(15)  DEFAULT 0,
							  relay_ip2	VARCHAR(15)  DEFAULT 0,
							  relay_ip3	VARCHAR(15)  DEFAULT 0,
							  type		TINYINT(1)   NOT NULL,
							  ask_password	TINYINT(1)   DEFAULT 1)")
		|| die("cant create \"$table\" table!");
		mysql_query("INSERT INTO $table(fio,login,password,type) VALUES('admin','admin','admin',0)");
	}

	function ADM_reset_level() {
/*		$table	= 'S_levels';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table(id 		INT		NOT NULL AUTO_INCREMENT PRIMARY KEY,
						level		TINYINT		NOT NULL,
						link		INT		DEFAULT 0,
						depth		TINYINT		NOT NULL,
						caption		VARCHAR(100)	NOT NULL,
						active		TINYINT 	DEFAULT 1 NOT NULL,
						groups		INT		DEFAULT 0,
						goods		INT		DEFAULT 0,
						size		BIGINT		DEFAULT 0,
						new		TINYINT 	DEFAULT 1 NOT NULL,
						create_time	VARCHAR(30) 	NOT NULL,
						about_img	VARCHAR(255),
						about_text	TEXT
						)")
		|| die("cant create \"$table\" table!");
*/	}

	function ADM_reset_goods() {
/*		$table	= 'S_goods';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table(id 		INT 		NOT NULL AUTO_INCREMENT PRIMARY KEY,
						link		INT 		NOT NULL,
						active		TINYINT		NOT NULL,
						new		TINYINT		DEFAULT 1 NOT NULL,
						tested		TINYINT		DEFAULT 0,
						small_image	VARCHAR(255),
						big_image	VARCHAR(255),
						caption		VARCHAR(255)	NOT NULL,
						description	TEXT,
						author		VARCHAR(255),
						email		VARCHAR(255),
						about_url	VARCHAR(255),
						discuss_url	VARCHAR(255),
						download_url	VARCHAR(255),
						real_url	VARCHAR(255),
						filename	VARCHAR(255),
						found		TINYINT		DEFAULT 0,
						size		BIGINT,
						exact_size	BIGINT,
						maker		VARCHAR(32),
						components	VARCHAR(255),
						create_time	VARCHAR(30)	NOT NULL,
						old_price	VARCHAR(16),
						new_price	VARCHAR(40),
						currency	VARCHAR(16),
						type		INT,
						cd_number	VARCHAR(255)
						)")
		|| die("cant create $table table!"); # UNIQUE(caption)
		ADM_reset_levels_info();
*/
	}
	function ADM_reset_levels_info() {
		$table	= 'S_levels';	# levels table
		mysql_query("UPDATE $table SET goods=0, size=0")
		|| die("cant reset levels info");
		
	}



	function ADM_reset_users() {
		$table	= 'S_users';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table( id 		INT		NOT NULL AUTO_INCREMENT PRIMARY KEY,
						  filled	TINYINT 	NOT NULL,
						  first_name	VARCHAR(24)	NOT NULL,
						  middle_name	VARCHAR(24),
						  last_name	VARCHAR(24),
						  email 	VARCHAR(100)	NOT NULL,
						  sex		VARCHAR(1),
						  passwd	VARCHAR(100)	NOT NULL,
						  phone		VARCHAR(24),
						  org_type 	VARCHAR(1),
						  birth_date	VARCHAR(10),
						  want_news	TINYINT		NOT NULL,
						  
						  city		VARCHAR(24),
						  postindex	VARCHAR(24),
						  region	VARCHAR(255),
						  oblast	VARCHAR(255),
						  street	VARCHAR(255),
						  building	VARCHAR(24),
						  flat		VARCHAR(24),
						  korp		VARCHAR(24),

						  entrance	VARCHAR(24),
						  flour		VARCHAR(24),
						  code		VARCHAR(24),
						  metro		INT,
						  deliver_time1	INT,
						  deliver_time2	INT,
						  cancall_time1	INT,
						  cancall_time2	INT,
						  additional	TEXT,
						  create_time	VARCHAR(30)	NOT NULL,
						  UNIQUE(email)
						  )")
		|| die("cant create $table table!");
		ADM_reset_adreses();
	}
	function ADM_reset_adreses() {
		$table	= 'S_adreses';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table(	id 		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							order_id	INT	NOT NULL,

							city		VARCHAR(24),
							postindex	VARCHAR(24),
                                                  	region		VARCHAR(255),
                                                  	oblast		VARCHAR(255),
						  	street		VARCHAR(255),
						  	building	VARCHAR(24),
						  	flat		VARCHAR(24),
						  	korp		VARCHAR(24),
						  	entrance	VARCHAR(24),
						  	flour		VARCHAR(24),
						  	code		VARCHAR(24),
						  	metro		INT,
						  	deliver_time1	INT,
						  	deliver_time2	INT,
						  	cancall_time1	INT,
						  	cancall_time2	INT,
						  	additional	TEXT
							)")
		|| die("cant create $table table!");
	}


	function ADM_reset_basket() {
		$table	= 'S_basket';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table(	id 		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							key_id		INT	NOT NULL,
							user_id		INT,
							product_id	INT	NOT NULL,
							product_level	INT	NOT NULL,
							level_id	INT,
							cd_number	VARCHAR(255),
							amount		INT	NOT NULL,
							active		TINYINT	NOT NULL,
							ready		TINYINT NOT NULL
							)")
		|| die("cant create $table table!");
	}

	function ADM_reset_orders() {
		$table	= 'S_orders';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table (	id 		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							order_id	INT	NOT NULL,
							key_id		INT	NOT NULL,
							user_id		INT	NOT NULL,
							product_id	INT	NOT NULL,
							level_id	INT,
							amount		INT		NOT NULL,
							level_amount	INT,
							price		VARCHAR(16)	NOT NULL,
							size		BIGINT		NOT NULL,
							active		TINYINT		NOT NULL,
							order_time	VARCHAR(30) 	NOT NULL,
							served_time	VARCHAR(30),
							webcustomer_id	INT,
							cd_number	VARCHAR(255)
							)")
		|| die("cant create $table table!");
	}


	function ADM_reset_news() {
		mysql_query("DROP TABLE S_news");
		mysql_query("CREATE TABLE S_news(	id 		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							caption		VARCHAR(255) 	NOT NULL,
							small_content	VARCHAR(255),
							big_content	TEXT		NOT NULL,
							image1		VARCHAR(255),
							image2		VARCHAR(255),
							create_time	VARCHAR(30)	NOT NULL
							)")
		|| die('cant create "S_news" table!');
	}


	function ADM_reset_skins() {
		mysql_query("DROP TABLE S_skins");
		mysql_query("CREATE TABLE S_skins(	id 		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							key_id		INT	NOT NULL,
							skin		INT	NOT NULL
							)")
		|| die('cant create "S_skins" table!');
	}


	function ADM_reset_best() {
		mysql_query("DROP TABLE S_best");
		mysql_query("CREATE TABLE S_best(	id 		INT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
							product_id	INT	NOT NULL,
							level_id	INT,
							amount		INT	NOT NULL
							)")
		|| die('cant create "S_best" table!');
	}

	function ADM_reset_keys() {
		$table	= 'S_keys';
		mysql_query("DROP TABLE $table");
		mysql_query("CREATE TABLE $table(id 	        INT               NOT NULL AUTO_INCREMENT PRIMARY KEY,
						 rand_key	VARCHAR(100)		NOT NULL,
						 act_time	VARCHAR(32)		NOT NULL,
					 	 is_open	TINYINT UNSIGNED	NOT NULL,
						 user_id	INT,
					 	 ip_subnet1	TINYINT UNSIGNED	NOT NULL,
					 	 ip_subnet2	TINYINT	UNSIGNED	NOT NULL,
					 	 ip_subnet3	TINYINT	UNSIGNED	NOT NULL,
						 UNIQUE(rand_key)
						 )")
		|| die('cant create "'.$table.'" table!');
	}















?>
