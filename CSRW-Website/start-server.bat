@echo off
cd C:\Users\Timothy\Documents\CSP Mini IT Project\CSRW-Website
php -S localhost:8080 -t public
start http://localhost:8080
pause