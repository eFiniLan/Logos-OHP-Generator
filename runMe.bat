@echo off
php.exe songListUpdater.php
start chrome http://localhost:8080/
php.exe -S localhost:8080
