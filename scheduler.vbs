Set WshShell = CreateObject("WScript.Shell") 
WshShell.Run chr(34) & "C:\xampp\htdocs\PelayananBPOM\scheduler.bat" & Chr(34), 0
Set WshShell = Nothing