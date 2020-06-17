<?Php 

echo "<html><body>";
echo "<h1>Blockchain Sudoku</h1>";
echo "Simply send Bitcoin to the relevant wallet to change the value of the grid. The cell value is the first character of the received balance in the particular wallet. For example, if the balance is 400 Satoshi, the value displayed is 4. 2356 would display a 2 etc.";
echo "<br>";
echo "<br>";
echo "<h2>Sudoku grid</h2>";
//Set table formatting
echo "<table border=1>";
echo "<style> table { border-collapse: collapse; border: 2px black solid; font: 18px sans-serif; }  td { border: 2px black solid; padding: 5px; width: 20px;  }</style>";

//Open CSV containing balances of wallets
$f = fopen("data.csv", "r");
$fr = fread($f, filesize("data.csv"));
fclose($f);

//Identify new line character
$lines = array();
$lines = explode("\n",$fr); 



// Add column identifiers to grid.
    echo "<tr>";
    for ($z=0;$z<10;$z++)
    {
                 
        if ($z != "0" )
        {
       echo "<td>".$z."</td>";
        }
        else
        {
            echo "<td> </td>";
        }
         
    }
    echo "</tr>";




//Loop through 9 rows in the CSV and display first character of balance.
for($i=0;$i<9;$i++)
{
    echo "<tr>";
    $cells = array(); 
    $cells = explode(",",$lines[$i]);

//Add row identifiers
    switch ($i) {
      case 0:
        echo "<td>A</td>";  
        break;
      case 1:
        echo "<td>B</td>";  
        break;
      case 2:
        echo "<td>C</td>";  
        break;
      case 3:
        echo "<td>D</td>";  
        break;
      case 4:
        echo "<td>E</td>";  
        break;
      case 5:
        echo "<td>F</td>";  
        break;
      case 6:
        echo "<td>G</td>";  
        break;
      case 7:
        echo "<td>H</td>";  
        break;
      case 8:
        echo "<td>I</td>";  
        break;
        
      default:
        echo "<td> </td>";  
    }



    
    for($k=0;$k<count($cells);$k++)
    {
        $cellval=$cells[$k];
        if ($cellval != "0" )
        {
       echo "<td>".substr($cellval,0,1)."</td>";
        }
        else
        {
            echo "<td> </td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

echo "<br>";



echo "Sudoku wallet values updated every 5 minutes. Last updated(UTC): ".date("F d Y H:i:s.",  
                      filemtime("data.csv")); 

echo "<br>";
echo "<br>";
echo "<h2>Wallet addresses</h2>";
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