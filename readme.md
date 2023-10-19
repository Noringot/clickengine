## What need before deploy

- PHP 8.1
    - extension php8.1-mysql
- MySQL 8.0

## Deploy

Get project from git
```bash
git clone git@github.com:Noringot/clickengine.git
cd clickengine
```

Then create database `clickengine` with table `users` from file db/users.sql
```bash
mysql -u username -p < ./db/users.sql
Enter password: 12345678
```