<?php
// Define the URL of the page to parse
$url = "https://maxsite.org/page/php-di";

// Get the contents of the page
$html = file_get_contents($url);

// Create a new DOMDocument object and load the HTML
$dom = new DOMDocument();
$dom->loadHTML($html);

// Get all the 'a' tags from the document
$links = $dom->getElementsByTagName('a');

// Create an empty array to store the links
$linkArray = array();

// Loop through each link and add it to the array
foreach ($links as $link) {
    $href = $link->getAttribute('href');
    $text = $link->nodeValue;
    $linkArray[] = array('href' => $href, 'text' => $text);
}

// Print out the array of links
print_r($linkArray);
