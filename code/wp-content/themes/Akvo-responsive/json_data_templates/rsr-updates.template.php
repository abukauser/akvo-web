<?php
/*
 * Template for the "RSR updates" plugin currently used on networkPage.php
 * Feed name: RSR updates
 * Slug: rsr-updates
 * JSON feed URL: http://rsr.akvo.org/api/v1/project_update_extra/?limit=3&photo__gte=a
 * Resulting shortcode: [jsondata_feed slug="rsr-updates" limit="3" photo__gte="a"]
 * json_data_render_update() is defined in Akvo-responsive/functions.php
 */

  $updates = $aData['objects'];
  $rsr_domain = "http://rsr.akvo.org";
  foreach($updates AS $count => $u) {
    if ($u['photo'] != '') {
      $date = explode('T', $u['time_last_updated']);
      $date = $date[0];
      $full_name = $u['user']['first_name'] . " " . $u['user']['last_name'];
      $country_and_city = $u['project']['primary_location']['country']['name'];
      if ($u['project']['primary_location']['city'])
        $country_and_city = $u['project']['primary_location']['city'] .", ". $country_and_city;
      json_data_render_update(
        $rsr_domain , $u['absolute_url'], $u['title'], $u['photo'], $date, $full_name,
        $u['user']['organisation']['name'], $u['user']['organisation']['absolute_url'],
        $country_and_city, $u['text']
      );
    }
  }
?>
