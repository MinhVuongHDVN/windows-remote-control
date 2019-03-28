set oShell = CreateObject("WScript.Shell")
oShell.run"%SystemRoot%\System32\SndVol.exe"
WScript.Sleep 1000
for loop1 = 0 to 10
oShell.SendKeys("{PGUP}")
next
for loop2 = 0 to 49
oShell.SendKeys("{DOWN}")
next
oShell.SendKeys"%{F4}"
