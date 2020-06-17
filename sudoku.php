<?Php 

//Set table formatting
echo "<html><body><table border=1>";
echo "<style> table { border-collapse: collapse; border: 2px black solid; font: 18px sans-serif; }  td { border: 2px black solid; padding: 5px; width: 20px;  }</style>";

//Open CSV containing balances of wallets
$f = fopen("data.csv", "r");
$fr = fread($f, filesize("data.csv"));
fclose($f);

//Identify new line character
$lines = array();
$lines = explode("\n",$fr); 


//Loop through 9 rows in the CSV and display first character of balance.
for($i=0;$i<9;$i++)
{
    echo "<tr>";
    $cells = array(); 
    $cells = explode(",",$lines[$i]);
    for($k=0;$k<count($cells);$k++)
    {
        $cellval=$cells[$k];
       echo "<td>".substr($cellval,0,1)."</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "<br>";



echo "Sudoku wallet values last updated(UTC): ".date("F d Y H:i:s.",  
                      filemtime("data.csv")); 

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<table border=1>";
$w = fopen ("wallets.csv","r");
$wr = fread($w, filesize("wallets.csv"));
fclose($w);

$walletlines = array();
$walletlines = explode("\n", $wr);

for ($j=0;$j<81;$j++)
{
    echo "<tr>";
    $walletcells = array();
    $walletcells = explode(",",$walletlines[$j]);
    
    for($m=0;$m<count($walletcells);$m++)
    {
        $walletcellval=$walletcells[$m];
        echo "<td>".$walletcellval."</td>";
        
        
        
    }
    
    echo "</tr>";
    
}

echo "</table></body></html>";
?> 