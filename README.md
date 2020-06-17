# blockchainsudoku

A Sudoku grid represented in the Blockchain.
Simply send Bitcoin to the relevant wallet to change the value of the grid. The cell value is the first character of the received balance in the particular wallet. For example, if the balance is 400 Satoshi, the value displayed is 4. 2356 would display a 2 etc.

Files:
index.php - provides a basic rendering of the Sudoku grid from data.csv, and list of the wallet addresses from wallets.csv.
getBalance.php - gets the current received Satoshi from the wallets. Recommended to be scheduled as a cron job. This script saves the current received balances to balance.csv, then copies it over data.csv. This prevents unnecesary requests through the API.
wallets.csv - defines the wallets and their positions on the grid.
balance.csv - stores the received balances of the wallets.
data.csv - a copy of balance.csv

Remember to give the getBalance.csv 755 permissions, and also set the path of where you have stored the CSV's.
