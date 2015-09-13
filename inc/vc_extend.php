	$bldg_types = get_terms('buildings-type', array('hide_empty' => false));
	$bldg_type_array = array();
	foreach($bldg_types as $bldg_type) {
		$bldg_type_array[$bldg_type->name] = $bldg_type->term_id;
	}
	$bldg_types_tmp 		= array_unshift($bldg_type_array, "Any"); 
