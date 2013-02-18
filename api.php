<?php
$token = "YOUR_API_KEY_HERE";
$json = json_decode(file_get_contents("https://api.instagram.com/v1/tags/smile/media/recent?access_token=$token"));
$instagram = $json->data[0];

if ($instagram->caption->from->full_name) $name = initialLastName($instagram->caption->from->full_name);
else $name = $instagram->caption->from->username;

if ($instagram->location)
{
	$latlong = $instagram->location->latitude.",".$instagram->location->longitude;
	$mapdata = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$latlong&sensor=true"));
	$location =  $mapdata->results[0]->formatted_address;
	$locationPretty .= <<<LOCATION
,<br /> <a href="https://maps.google.com/maps?q=$latlong&t=m&iwloc=A" target=_BLANK>$location</a>
LOCATION;
}

echo <<<INSTAGRAM
<div id="instagram">
<p><img src={$instagram->images->standard_resolution->url} alt="#smiles" class="img-polaroid" /></p>
<h1 class=byline>By <a href="{$instagram->link}" target=_BLANK>$name</a>$locationPretty</h1>
</div>
INSTAGRAM;






function initialLastName($strFullName)
{
	$arrayName = explode(" ", $strFullName);
	if (count($arrayName) > 1)
	{
		$strLastName = end($arrayName);
		return str_replace($strLastName, $strLastName[0].".", $strFullName);
	}
	else return $strFullName;
}
?>
