<?

		$FIRST_TIME	= 0;

		# LOAD DYNAMIC DESIGN VARIABLES
		if($ADMIN_CONNECTED) {
			$INITIALIZED	= 1;
			$SKIN_DIR 	= 'skin1';
			$CSS_SRC  	= $MY[admin_css_location][0];
			include("mod_skins/$SKIN_DIR/skin_html.php");
			include("mod_skins/$SKIN_DIR/skin_vars.php");
			include("mod_skins/$SKIN_DIR/skin_design.php");
			include("mod_skins/$SKIN_DIR/skin_func.php");
		} else {
			
			if(!$INITIALIZED) {
				$SKIN = $HTTP_GET_VARS[skin];
				if($SKIN>0) {
					$res = mysql_query("SELECT skin FROM S_skins WHERE key_id=$SESSION[key_id]");
					$row = mysql_fetch_row($res);
					if($row[0]) {
						mysql_query("UPDATE S_skins SET skin='$SKIN' WHERE key_id=$SESSION[key_id]");
					} else {
						if($SESSION[key_id]) {
							mysql_query("INSERT INTO S_skins(key_id,skin) VALUES($SESSION[key_id],$SKIN)");
						}
					}
				} else {
					$res = mysql_query("SELECT skin FROM S_skins WHERE key_id=$SESSION[key_id]");
					$row = mysql_fetch_row($res);
					$SKIN = ($row[0]) ? $row[0] : 1;
				}
			}
			
			
			# Load heavy design modules
			if($SKIN == 1) {
				$SKIN_DIR = 'skin1';
				$CSS_SRC  = $MY[css_location][0];
				if($INITIALIZED) {
				    include("mod_skins/$SKIN_DIR/skin_html.php");
				    include("mod_skins/$SKIN_DIR/skin_vars.php");	}
			} elseif($SKIN == 2) {
				$SKIN_DIR = 'skin2';
				$CSS_SRC  = $MY[css_location][1];
				if($INITIALIZED) {
				    include("mod_skins/$SKIN_DIR/skin_html.php");
				    include("mod_skins/$SKIN_DIR/skin_vars.php");	}
			} elseif($SKIN == 3) {
				$SKIN_DIR = 'skin3';
				$CSS_SRC  = $MY[css_location][2];
				if($INITIALIZED) {
				    include("mod_skins/$SKIN_DIR/skin_html.php");
				    include("mod_skins/$SKIN_DIR/skin_vars.php");	}
			} else {
				$SKIN_DIR = 'skin1';
				$CSS_SRC  = $MY[css_location][0];
				if($INITIALIZED) {
				    include("mod_skins/$SKIN_DIR/skin_html.php");
				    include("mod_skins/$SKIN_DIR/skin_vars.php");	}
			}
			
			if(!$INITIALIZED) {
				# Load module which contain data needed in system process
				include("mod_skins/$SKIN_DIR/skin_design.php");
				include("mod_skins/$SKIN_DIR/skin_func.php");
				$INITIALIZED = 1;
				$FIRST_TIME  = 1;
			}
		}

	if($INITIALIZED && !$FIRST_TIME) {
		# LOAD TABLES, HTML STRUCTURE
		if($HTTP_GET_VARS[search]) {
			include("mod_skins/$SKIN_DIR/steps/step_search.php");
			include("mod_skins/$SKIN_DIR/steps/patch_search.php");		}
	
		elseif($HTTP_GET_VARS[admin]=='myinfo') {
			include("mod_skins/$SKIN_DIR/steps/step_admin_myinfo.php");	}

		elseif($HTTP_GET_VARS[admin]=='catalog') {
			include("mod_skins/$SKIN_DIR/steps/step_admin_catalog.php");	}
	
		elseif($HTTP_GET_VARS[admin]=='orders') {
			include("mod_skins/$SKIN_DIR/steps/step_admin_orders.php");	}

		elseif($HTTP_GET_VARS[admin]=='users') {
			include("mod_skins/$SKIN_DIR/steps/step_admin_users.php");	}

		elseif($HTTP_GET_VARS[admin]=='news') {
                        include("mod_skins/$SKIN_DIR/steps/step_admin_news.php");      }

		elseif($HTTP_GET_VARS[admin]) {
			include("mod_skins/$SKIN_DIR/steps/step_admin.php");		}

		elseif($HTTP_GET_VARS[user]=='about') {
			include("mod_skins/$SKIN_DIR/steps/step_about.php");
			include("mod_skins/$SKIN_DIR/steps/patch_about.php");		}

		elseif($HTTP_GET_VARS[user]=='catalog') {
			include("mod_skins/$SKIN_DIR/steps/step_catalog.php");
			include("mod_skins/$SKIN_DIR/steps/patch_catalog.php");	}

		elseif($HTTP_GET_VARS[user]=='register') {
			include("mod_skins/$SKIN_DIR/steps/step_register.php");
			include("mod_skins/$SKIN_DIR/steps/patch_register.php");	}
	
		elseif($HTTP_GET_VARS[user]=='news') {
			include("mod_skins/$SKIN_DIR/steps/step_news.php");
			include("mod_skins/$SKIN_DIR/steps/patch_news.php");		}
	
		elseif($HTTP_GET_VARS[user]=='basket') {
			include("mod_skins/$SKIN_DIR/steps/step_basket.php");
			include("mod_skins/$SKIN_DIR/steps/patch_basket.php");		}

		elseif($HTTP_GET_VARS[user]=='setup') {
			include("mod_skins/$SKIN_DIR/steps/step_setup.php");
			include("mod_skins/$SKIN_DIR/steps/patch_setup.php");		}
			
		elseif($HTTP_GET_VARS[user]=='search') {
			include("mod_skins/$SKIN_DIR/steps/step_search.php");
			include("mod_skins/$SKIN_DIR/steps/patch_search.php");		}

		elseif($HTTP_GET_VARS[user]=='authors') {
			include("mod_skins/$SKIN_DIR/steps/step_authors.php");
			include("mod_skins/$SKIN_DIR/steps/patch_authors.php");		}
		
		elseif($HTTP_GET_VARS[user]=='top100') {
			include("mod_skins/$SKIN_DIR/steps/step_top100.php");
			include("mod_skins/$SKIN_DIR/steps/patch_top100.php");		}
		
		else {
			include("mod_skins/$SKIN_DIR/steps/step_index.php");
			include("mod_skins/$SKIN_DIR/steps/patch_index.php");
		}
	}



?>
