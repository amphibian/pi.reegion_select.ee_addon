<?php

$plugin_info = array(
	'pi_name'			=> 'REEgion Select',
	'pi_version'		=> '1.0.2',
	'pi_author'			=> 'Derek Hogue',
	'pi_author_url'		=> 'http://github.com/amphibian/pi.reegion_select.ee_addon',
	'pi_description'	=> 'Displays a drop down select menu of countries, US states, Canadian provinces, or UK counties.',
	'pi_usage'			=> Reegion_select::usage()
);

class Reegion_select {
	
	var $rs_provinces = array("AB" => "Alberta", "BC" => "British Columbia", "MB" => "Manitoba", "NB" => "New Brunswick", "NL" => "Newfoundland and Labrador", "NT" => "Northwest Territories", "NS" => "Nova Scotia", "NU" => "Nunavut", "ON" => "Ontario", "PE" => "Prince Edward Island", "QC" => "Quebec", "SK" => "Saskatchewan", "YT" => "Yukon");
		
	var $rs_states = array("AL" => "Alabama", "AK" => "Alaska", "AS" => "American Samoa", "AZ" => "Arizona", "AR" => "Arkansas", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "Distric of Columbia", "FM" => "Federated States of Micronesia", "FL" => "Florida", "GA" => "Georgia", "GU" => "Guam", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MH" => "Marshall Islands", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NC" => "North Carolina", "ND" => "North Dakota", "MP" => "Northern Mariana Islands", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PW" => "Palau", "PA" => "Pennsylvania", "PR" => "Puerto Rico", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VI" => "Virgin Islands", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming", "AE" => "Armed Forces (AE)", "AA" => "Armed Forces Americas", "AP" => "Armed Forces Pacific");
		
	var $rs_ukcounties = array("Aberdeenshire", "Anglesey", "Angus", "Antrim", "Argyll", "Armagh", "Avon", "Ayrshire", "Banffshire", "Bedfordshire", "Berkshire", "Berwickshire", "Brecknockshire", "Buckinghamshire", "Bute", "Caernarfonshire", "Caithness", "Cambridgeshire", "Cambridgeshire and Isle of Ely", "Cardiganshire", "Carmarthenshire", "Cheshire", "Clackmannanshire", "Cleveland", "Clwyd", "Cornwall", "Cromartyshire", "Cumberland", "Cumbria", "Denbighshire", "Derbyshire", "Devon", "Dorset", "Down", "Dumfriesshire", "Dunbartonshire", "Durham", "Dyfed", "East Lothian", "East Sussex", "East Suffolk", "East Yorkshire", "Essex", "Fermanagh", "Fife", "Flintshire", "Glamorgan", "Gloucestershire", "Gwent", "Gwynedd", "Hampshire", "Hereford and Worcester", "Herefordshire", "Hertfordshire", "Humberside", "Huntingdonshire", "Huntingdon and Peterborough", "Inverness-shire", "Isle of Ely", "Isle of Wight", "Kent", "Kincardineshire", "Kinross-shire", "Kirkcudbrightshire", "Lanarkshire", "Lancashire", "Leicestershire", "Lincolnshire", "London (Greater)", "Londonderry", "Manchester (Greater)", "Merionethshire", "Merseyside", "Middlesex", "Mid Glamorgan", "Midlothian", "Monmouthshire", "Montgomeryshire", "Moray", "Nairnshire", "Norfolk", "Northamptonshire", "Northumberland", "North Lincolnshire", "North East Lincolnshire", "North Humberside", "North Yorkshire", "Nottinghamshire", "Orkney", "Oxfordshire", "Pembrokeshire", "Peeblesshire", "Perthshire", "Powys", "Radnorshire", "Renfrewshire", "Ross-shire", "Ross and Cromarty", "Roxburghshire", "Rutland", "Selkirkshire", "Shetland", "Shropshire", "Soke of Peterborough", "Somerset", "South Glamorgan", "South Humberside", "South Yorkshire", "Staffordshire", "Stirlingshire", "Suffolk", "Surrey", "Sutherland", "Tyne and Wear", "Tyrone", "Warwickshire", "West Glamorgan", "West Lothian", "West Midlands", "West Suffolk", "West Sussex", "West Yorkshire", "Westmorland", "Wigtownshire", "Wiltshire", "Worcestershire");
	
	var $rs_countries = array("US" => "United States", "CA" => "Canada", "AF" => "Afghanistan", "AX" => "Aland Islands", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "IO" => "British Indian Ocean Territory", "BN" => "Brunei Darussalam", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo", "CD" => "Congo (DR)", "CK" => "Cook Islands", "CR" => "Costa Rica", "CI" => "Cote D'Ivoire", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands (Malvinas)", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard and McDonald Islands", "VA" => "Holy See (Vatican City State)", "HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KP" => "Korea (North)", "KR" => "Korea (South)", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Laos", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macau", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "MX" => "Mexico", "FM" => "Micronesia", "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territory (Occupied)", "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RU" => "Russian Federation", "RW" => "Rwanda", "BL" => "Saint Barthelemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "MF" => "Saint Martin (French)", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa", "SM" => "San Marino", "ST" => "Sao Tome and Principe", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and South Sandwich Islands", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "UK" => "United Kingdom", "UM" => "United States Minor Outlying Islands", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VE" => "Venezuela", "VN" => "Vietnam", "VG" => "Virgin Islands (British)", "VI" => "Virgin Islands (US)", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe");


	/**
	 * Display the dropdown menu.
	 *
	 * Displays a <select> menu of countries, provinces, states or counties.
	 *
	 * @param string $list Name of the data array to use when building the <select> menu.
	 * @param string $name The default string for the "name" attribute on the <select> menu (in the case that one is not supplied).
	 * @param string $label Text to be appended to the phrase "Select a" as the first option of the <select> menu.
	 */
	
	function rs_dropdown_builder($list, $name, $label)
	{
		global $TMPL;
		
		$name = ( $TMPL->fetch_param('name') == '' ) ? $name : $TMPL->fetch_param('name');
		$id = ( $TMPL->fetch_param('id') == '' ) ? '' : ' id="' . $TMPL->fetch_param('id') . '"';
		$class = ( $TMPL->fetch_param('class') == '' ) ? '' : ' class="' . $TMPL->fetch_param('class') . '"';
		$selected = $TMPL->fetch_param('selected');
		$codes = $TMPL->fetch_param('codes');
		$show = $TMPL->fetch_param('show');
		$null_divider = ( $TMPL->fetch_param('null_divider') == '' ) ? 'true' : $TMPL->fetch_param('null_divider');
		
		$r = '<select name="' . $name . '"' . $id . $class . '>
	<option value="">Select a ' . $label . '</option>
	';
		$r .= ($null_divider == 'true') ? '<option value="">--------------------</option>
		' : '';
		$list = ( $list == 'rs_provinces_states' ) ? array_merge($this->rs_provinces, $this->rs_states) : $this->$list;
			
		foreach ($list as $k => $v)
		{
			$val = ( $codes === 'true' && !is_numeric($k) ) ? $k : $v;
			if ( $show == '' || in_array($val, explode('|', $show)) )
			{
				$sel = ($val == $selected) ? ' selected="selected"' : '';
				$r .= '<option value="' . $val . '"' . $sel . '>' . $v . '</option>
				';
			}
		}
		$r .= '</select>';
		
		return $r;	
	}


	function countries()
	{
		return $this->rs_dropdown_builder("rs_countries","country","country");
	}

	
	function states()
	{
		return $this->rs_dropdown_builder("rs_states","state","state");		
	}

	
	function provinces()
	{
		return $this->rs_dropdown_builder("rs_provinces","province","province");
	}
	
	
	function ukcounties()
	{
		return $this->rs_dropdown_builder("rs_ukcounties","county","county");	
	}
	
	
	function provinces_states()
	{
		return $this->rs_dropdown_builder('rs_provinces_states',"province_state","province or state");
	}
	

// ----------------------------------------
//  Plugin Usage
// ----------------------------------------

// This function describes how the plugin is used.
//  Make sure and use output buffering

function usage()
{
ob_start(); 
?>

REEgion Select will display a dropdown <select> list of:

- countries (based on the ISO 3166-1 list of countries, dependent territories, and special areas of geographical interest)
- US states (based on the USPS official list of US states and possessions)
- Canadian provinces and territories
- UK counties
- Canadian provinces and US states together

Use the following EE tags to generate each type of dropdown:

{exp:reegion_select:countries}

{exp:reegion_select:states}

{exp:reegion_select:provinces}

{exp:reegion_select:ukcounties}

{exp:reegion_select:provinces_states}

REEgion Select accepts five optional parameters:

name="" - value for the "name" attribute of the <select> menu. Defaults: "country", "state", "province", "county", "province_state".

codes="true" - whether to use the ISO 3166-2 abbreviation as the <option> value for countries, states, and provinces.  Default is "false" (uses the region name as the value).

selected="" - value of the <option> element that should be selected by default.

id="" - value for the "id" attribute of the <select> menu.

class="" - value for the "class" attribute of the <select> menu.

show="" - a pipe-delimited list of values to show, if you don't want all of the default values to display. (i.e. show="CA|NY|OH|MI")

null_divider="false" - whether or not to include a divider option with a null value. Defaults to "true". 

Insipiration from - and props to - Nathan Pitman's UK Counties Select and US States Select plugins, and Bridging Unit's Countries Select plugin.

<?php
$buffer = ob_get_contents();
	
ob_end_clean(); 

return $buffer;
}


}
?>