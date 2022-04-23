# VARIOUS OSINT COMMANDS AND TOOLS

## GATHER IMAGE DATA
sudo apt-get upadte
sudo apt-get install exiftool
exiftool ./image.jpg

## HUNTING EMAILS AND BREACHED DATA

### theHarvester
URL: https://github.com/laramies/theHarvester
theHarvester --help
theHarvester -d target.com -b google,yahoo
theHarvester -d target.com -b all

### Sublist3r
sudo apt-get update
sudo apt install sublist3r
sublist3r --help
sublist3r -d target.com

### Breach-Parse
* https://github.com/hmaverickadams/breach-parse
* git-clone https://github.com/hmaverickadams/breach-parse.git
* sudo ./install.sh
*  -- Download BreachDB; URL on github page --
* breach-parse
* breach-parse @gmail.com gmail.txt "~/Downloads/BreachCompilation/data"

### h8mail
https://github.com/khast3x/h8mail
