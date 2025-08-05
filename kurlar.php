<div style="background-color:#f0f0f0;width:40%;justify-content:center;margin:0 auto;padding:20px;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.5); text-align:center;margin-top:3%">
<?php
    $xml = simplexml_load_file('euro.xml');

    $xml->registerXPathNamespace('gesmes', 'http://www.gesmes.org/xml/2002-08-01');
    $xml->registerXPathNamespace('ecb', 'http://www.ecb.int/vocabulary/2002-08-01/eurofxref');

    $subject = $xml->xpath("//gesmes:subject")[0];
    $cubes = $xml->xpath('//ecb:Cube[@currency]');

    echo "<p style='font-weight:bold;font-size:200%'>$subject</p>";
    foreach ($cubes as $cube) {
        $currency = $cube['currency'];
        $rate = $cube['rate'];
        
        echo "<div style='flex-direction:row;display:flex;justify-content:center;gap:10px'>
        <p style='font-size:130%;'> Currency:</p>
        <p style='font-size:130%;color:#2980b9;font-weight:bold;'>$currency</p>
        <p style='font-size:130%;'> Rate:</p>
        <p style='font-size:130%;color:#2980b9;font-weight:bold;'> $rate</p>
              </div>";
    }
?>
</div>
