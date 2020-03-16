<?php
 
if  (in_array  ('curl', get_loaded_extensions())) {
 
        echo "CURL is available on your web server";
 
    }  else {
        echo "CURL is not available on your web server";
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://google.com");
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $curlresult=curl_exec ($ch);
      curl_close ($ch);



    if (preg_match("/OK/i", $curlresult)) {
        $result = "The curl action was succeeded! (OUTPUT of curl is: ".$curlresult.")";
    } else {
        $result = "The curl action has FAILED! (OUTPUT of curl is: ".$curlresult.")";
    }

echo $result;

/**
* Initialize the cURL session
*/
$ch = curl_init();
/**
* Set the URL of the page or file to download.
*/
curl_setopt($ch, CURLOPT_URL,'http://news.google.com/news?hl=en&topic=t&output=rss&#8217;');
/**
* Create a new file
*/
$fp = fopen('rss.xml', 'w');
/**
* Ask cURL to write the contents to a file
*/
curl_setopt($ch, CURLOPT_FILE, $fp);
/**
* Execute the cURL session
*/
curl_exec ($ch);
/**
* Close cURL session and file
*/
curl_close ($ch);
fclose($fp);
?>