<?php

//getAddressVallueandSavetocSV - pretty much does what it says. Loops through a list of wallet addresses and writes them to balance.csv, then copies balance.csv to data.csv to avoid opening during writing.

function getAddressValueandSavetocSV()
{
    
    echo "Last updated " . date("h:i:sa")."<br>";
    
    //Opens balance.csv (file that is written to for latest balance)
	$fp=fopen("balance.csv","w");
	
	//Opens wallets.csv (list of wallets)
	$walletfp=fopen(dirname(__file__)."/wallets.csv","r");
	
	$fileData=array();
	$count=9;

	while(!feof($walletfp))
	{
		
		//Gets CSV list
		$data=fgetcsv($walletfp);
		
		$address=trim($data[1]);

		if(!empty($data[1]))
		{   
		    
		    //Calls blochain.info web API to get received amount for each wallet. This address could be replaced for other providers.
			$balance=file_get_contents('https://blockchain.info/q/getreceivedbyaddress/'.$address);
		
		    echo "Address: $address Balance: $balance"."<br>";
		
			$fileData[]=$balance;
			
			
			$count++;
			if($count%9==0)
			{
				
				fputcsv($fp,$fileData);
				$fileData=array();
				
			}
		}	
	}
	
	fclose($fp);
	fclose($walletfp);
	echo copy("balance.csv","data.csv");
	return "1";
}
	
echo getAddressValueandSavetocSV()





?>