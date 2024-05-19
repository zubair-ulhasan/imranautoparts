<?php
#
namespace App\Http\Middleware;

use Closure;

class ResponseModifier
{
    public function write1($dataTable){
$filename = "/home/asif/resp/mydata".strval(rand()).".txt";
$jsonData = json_encode($dataTable);
// Open the file for writing (will create if it doesn't exist)
$file = fopen($filename, "w");

// Check if file opened successfully
if ($file) {
  // Write the data to the file
  fwrite($file, $jsonData);
  #echo "File written successfully!";

  // Close the file
  fclose($file);
} else {
  echo "Error opening file!";
}
}
public function replaceData($v){
$search = array("http:", "localhost:8000");
$replace = array("https:", "192.168.0.124");

// Perform replacements
$newString = str_replace($search, $replace, $v);
#$newString = $v;#str_replace($search, $replace, $v);
return $newString;
}

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Modify the response here (e.g., add a footer, filter content)
        $modifiedResponse = $this->modifyResponse($response);

        return $modifiedResponse;
    }

    private function modifyResponse($response)
    {
        $url = app('request')->fullUrl();
        if (strpos($url, '.js?') ==false) {
        $originalContent = $this::replaceData($response->content());
       # $footer = "<p>This is a footer added by the middleware.</p>";
        $modifiedContent = $originalContent ;
        $response->setContent($modifiedContent);
}
        return $response;
    }
}
