CREATE USER 'mysqluser'@'localhost' IDENTIFIED BY 'Th3Cro$$';
GRANT ALL PRIVILEGES ON * . * TO 'mysqluser'@'localhost';
FLUSH PRIVILEGES;