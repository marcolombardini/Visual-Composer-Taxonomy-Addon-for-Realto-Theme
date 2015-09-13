	$bldg_types = get_terms('buildings-type', array('hide_empty' => false));
	$bldg_type_array = array();
	foreach($bldg_types as $bldg_type) {
		$bldg_type_array[$bldg_type->name] = $bldg_type->term_id;
	}
	$bldg_types_tmp 		= array_unshift($bldg_type_array, "Any"); 
	
	/*---------------------------------------------------------------------------------
	  Buildings grid
	-----------------------------------------------------------------------------------*/

	vc_map( array(
	   "name" => __("Buildings Grid", "js_composer"),
	   "icon" => "icon-properties-grid",
	   "base" => "realto-buildings-grid",
	   "weight" => 21,
	   "description" => "Add associated buildings and properties",
	   "class" => "buildings_grid_extended",
	   "category" => __("By Marco", "js_composer"),
	   "params" => array( 
		  array(
			 "type" => "textfield",
			 "admin_label" => true,
			 "heading" => __("Title", "js_composer"),
			 "param_name" => "buildings_title",
			 "value" => "",
			 "description" => __("Add Title.", "js_composer")
		  ),
		  array(
			 "type" => "dropdown",
			 "class" => "",
			 "admin_label" => true,
			 "heading" => __("Buildings", "js_composer"),
			 "param_name" => "bldg_type",
			 "value" => $bldg_type_array,
		  ),
		  array(
			 "type" => "textfield",
			 "admin_label" => true,
			 "heading" => __("Number of Units to show in the Building", "js_composer"),
			 "param_name" => "no_buildings",
			 "value" => 9,
			 "description" => __("Enter the number of units in the building to show in grid.", "js_composer")
		  )

	   )
	) );
