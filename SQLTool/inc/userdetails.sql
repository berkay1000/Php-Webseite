CREATE DATABASE sqldemo;

CREATE USER 'sqldemo'@'localhost' IDENTIFIED BY 'sql348demo';

GRANT ALL ON sqldemo.* TO 'sqldemo'@'localhost';

FLUSH PRIVILEGES;