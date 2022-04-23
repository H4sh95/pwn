# VARIOUS OSINT COMMANDS AND TOOLS

## GATHER IMAGE DATA
* sudo apt-get upadte
* sudo apt-get install exiftool
* exiftool ./image.jpg

## HUNTING EMAILS AND BREACHED DATA

### theHarvester
* URL: https://github.com/laramies/theHarvester
* theHarvester --help
* theHarvester -d target.com -b google,yahoo
* theHarvester -d target.com -b all

### Sublist3r
* sudo apt-get update
* sudo apt install sublist3r
* sublist3r --help
* sublist3r -d target.com

### Breach-Parse
* https://github.com/hmaverickadams/breach-parse
* git-clone https://github.com/hmaverickadams/breach-parse.git
* sudo ./install.sh
*  -- Download BreachDB; URL on github page --
* breach-parse
* breach-parse @gmail.com gmail.txt "~/Downloads/BreachCompilation/data"

### h8mail
* https://github.com/khast3x/h8mail

## HUNTING USERNAMES AND ACCOUNTS

### whatsmyname
* USE ON TRACELABS KALI
	* ./whatsmyname -u maxim
* OTHERWISE
	* https://github.com/WebBreacher/WhatsMyName
	* web_accounts_list_checker.py
		* python3 ./web_accounts_list_checker.py -u maxim
	* check_online_presence.py
		* python3 check_online_presence.py -u maxim
	
### sherlock
* USE ON TRACELABS KALI
	* ./sherlock username

## HUNTING PHONE NUMBERS

### phoneinfoga

* phoneinfoga scan -n 14082492815
* phoneinfoga serve -p 8080

## SOCIAL MEDIA OSINT

### twint
* https://github.com/twintproject/twint
* pip3 install --upgrade -e git+https://github.com/twintproject/twint.git@origin/master#egg=twint
* pip3 install --upgrade aiohttp_socks
* twint -u twitterUser
* twint -s netcb
* twint -u <username> -s <search term>
	
## WEBSITE OSINT

* Subfinder - https://github.com/projectdiscovery/subfinder
* Assetfinder - https://github.com/tomnomnom/assetfinder
* httprobe - https://github.com/tomnomnom/httprobe
* Amass - https://github.com/OWASP/Amass
* GoWitness - https://github.com/sensepost/gowitness/wiki/Installation
