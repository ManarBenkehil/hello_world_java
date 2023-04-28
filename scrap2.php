<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

$products = [];
if (isset($_POST['submit']) && isset($_POST['product'])) {
	 
$product = $_POST['product'];
 
// set the URLs of websites to scrape
$source = "https://www.ebay.com/sch/i.html?_from=R40&_trksid=p2380057.m570.l1313&_nkw=" . urlencode($product) . "&_sacat=0";
 
 

    // initialize dom document
    $dom = new DOMDocument();

    // load the website content
    $html = file_get_contents($source);
     

    // Suppress warnings caused by malformed HTML
    libxml_use_internal_errors(true);

    // load the HTML content into DOMDocument
    @ $dom->loadHTML($html);

    // Find all product elements on the page

    $product_elements = $dom->getElementsByTagName('div');
    
    // Extract product data and add it to the products array
    $counter = 0;
    foreach($product_elements as $product_element){

        if ($product_element->getAttribute('class') === 's-item__image') {
               $hrefElement = $product_element->getElementsByTagName('a')->item(0);
               $href = $hrefElement ? $hrefElement->getAttribute('href') : '';
        }
    
        if ($product_element->getAttribute('class') === 's-item__image-wrapper image-treatment') {
        // Extract the product image
           $imageElement = $product_element->getElementsByTagName('img')->item(0);
           $image = $imageElement ? $imageElement->getAttribute('src') : '';
        }

           // Extract the product title
           if($product_element->getAttribute('class') === 's-item__title'){
           $titleElement = $product_element->getElementsByTagName('span')->item(0);
           $title = $titleElement ? $titleElement->nodeValue : '';
           }

           // Extract the product price
           if($product_element->getAttribute('class') === 's-item__detail s-item__detail--primary'){
           $priceElement = $product_element->getElementsByTagName('span')->item(0);
           if($priceElement->getAttribute('class')==='s-item__price'){
           $price = $priceElement ? $priceElement->nodeValue : '';
           }
           }

           // Extract the product rating
          // if($product_element->getAttribute('class') === 'sans-serif gray f7'){
          // $ratingElement = $product_element->getElementsByTagName('span')->item(0);
          // $rating = $ratingElement ? $ratingElement->nodeValue : '';
           //}
           $source = "ebay";

           // Add product data to the products array
           $products[] = [
               'source'=>$source,
               'href' => $href,
               'image' => $image,
               'title' => $title,
               'price' => $price,
              // 'rating' => $rating
         ];
    }
		 
    }
	 

 
require 'index.php';
?>

