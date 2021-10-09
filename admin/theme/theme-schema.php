<?php
/**
 * Theme schema
 */

function apartment_complex_schema() {

	$contact_url = home_url('/contact', 'https');
	$community_name = 'COMMUNITY_NAME';

	$schema = [
		'@context' => 'https://schema.org',
		'@type' => 'ApartmentComplex',
		'name' => $community_name,
		// 'numberOfAccommodationUnits' => '',
		// 'numberOfAvailableAccommodationUnits' => '',
		// 'numberOfBedrooms' => '',
		'petsAllowed' => 'No',
		'tourBookingPage' => $contact_url,
		// 'accommodationFloorPlan' => '',
        'address' => [
	        '@type' => 'PostalAddress',
	        'addressCountry' => 'US',
	        'addressLocality' => 'Denver',
	        'addressRegion' => 'CO',
	        'postalCode' => '12345',
	        'streetAddress' => '123 Fake St',
      	],
        // 'accommodationFloorPlan' => [
        // ]
	];

	echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}
add_action('wp_head', 'apartment_complex_schema');