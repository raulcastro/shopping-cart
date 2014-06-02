database    db161140_bzr
user        db161140_2go;
password    where2GO;

CREATE DATABASE db161140_bzr;

GRANT ALL PRIVILEGES ON db161140_bzr.* TO 'db161140_2go'@'localhost' IDENTIFIED BY 'where2GO' WITH GRANT OPTION;

USE db161140_bzr;

CREATE TABLE app_info(
    title           VARCHAR(512) NULL,
    site_name       VARCHAR(512) NULL,
    content         VARCHAR(1024) NULL,
    description     VARCHAR(1024) NULL,
    keywords        VARCHAR(512) NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;