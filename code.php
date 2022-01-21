<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

//setting up the url
if (isset($_POST['scrapBtn'])) {
    $name = $_POST['web_url'];
    
}

$url = $name;

$client = new \GuzzleHttp\Client();

//getting data from the url
$response = $client->request('GET', $url);

$html = ''.$response->getBody();

$crawler = new Crawler($html);

/*$crawler->filter('body');

print_r($crawler);*/
//loop through the values
$items = $crawler->filter('body')->each(function (Crawler $node, $i) {
    //search for the values we want
    $text = $node->text();
    
$words = preg_split("/\s+/", $text);
$clean_words = preg_replace("/[\d[:punct:]]+/u", "", $words);

sort($clean_words,  SORT_STRING | SORT_FLAG_CASE);



$data=array();
foreach($clean_words as $sentence)
{
    //gatering words in an array by spliting the sentence on space.
    $data=  array_merge($data,explode(" ", $sentence));
}

//counting values present in array for case insensitive by changing each array element to lowercase
$result=array_count_values(array_map("strtolower", $data));

array_splice($result, 0, 1);

//print_r($result);
//echo json_encode($result);

//echo json_encode($result);
//exit();

return $result;

    
});

$f = fopen('mycsv.csv', 'a'); // Configure fopen to create, open, and write data.

fputcsv($f, array_keys($items[0])); // Add the keys as the column headers

// Loop over the array and passing in the values only.
foreach ($items as $row)
{
    fputcsv($f, $row);

}
// Close the file
fclose($f);
?>
<h2>Table Showing Sorted Words</h2>
<table border="1">

    <tr>
        <th>Unique Words</th>
        <th>Occurrence</th>
    </tr>
    <tr>
        <?php
  

foreach ($row as $key=>$value) 
    { 
        echo '<tr>';
        echo '<td>' . $key . '</td>';
        echo '<td>' . $value . '</td>';
        echo '</tr>';
    }

?>
    </tr>
</table>