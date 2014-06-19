database    db161140_bzr
user        db161140_2go;
password    where2GO;

CREATE DATABASE db161140_bzr;

GRANT ALL PRIVILEGES ON db161140_bzr.* TO 'db161140_2go'@'localhost' IDENTIFIED BY 'where2GO' WITH GRANT OPTION;

USE db161140_bzr;

--
-- Table structure for table `system_users`
--
CREATE TABLE `users` (
    `user_id`   int(10) NOT NULL AUTO_INCREMENT,
    `user`      varchar(30) NOT NULL,
    `password`  char(40) NOT NULL,
    `type`      int(1) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `user_detail` (
    `detail_id` int(10) NOT NULL AUTO_INCREMENT,
    `user_id`   int(10) NOT NULL,
    `name`      varchar(255) NOT NULL,
    `email`     varchar(255) DEFAULT NULL,
    `about`     text,
    `avatar`    varchar(50) DEFAULT NULL,
    PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `user_type` (
    `type_id`   int(10) NOT NULL AUTO_INCREMENT,
    `type`      varchar(50) NOT NULL,
    PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO user_type(type) VALUES('administrator');

INSERT INTO users(user, password, type) VALUES('administrator', SHA1('password'), 1);

INSERT INTO user_detail(user_id, name, email) VALUES(1, 'Frederich Gauss', 'info@bazarenlinea.com.mx');

CREATE TABLE app_info(
    title           VARCHAR(512) NULL,
    site_name       VARCHAR(512) NULL,
    url             VARCHAR(512) NULL,
    content         VARCHAR(1024) NULL,
    description     VARCHAR(1024) NULL,
    keywords        VARCHAR(512) NULL,
    creator         VARCHAR(512) NULL,
    creator_url     VARCHAR(512) NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE app_info ADD COLUMN twitter VARCHAR(256) NULL;
ALTER TABLE app_info ADD COLUMN facebook VARCHAR(256) NULL;

CREATE TABLE sections (
    section_id INT(3) NOT NULL AUTO_INCREMENT,
    title       VARCHAR(512) NOT NULL,
    description VARCHAR(512) NULL,
    keywords    VARCHAR(512) NULL,
    picture     VARCHAR(512) NULL,
    curdate     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY     KEY(section_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE main_sliders (
    slider_id   INT(3) NOT NULL AUTO_INCREMENT,
    slider      VARCHAR(512) NOT NULL,
    name        VARCHAR(512) NULL,
    url         VARCHAR(512) NULL,
    PRIMARY KEY(slider_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE categories (
    category_id INT(3) NOT NULL AUTO_INCREMENT,
    section_id  INT(3) NOT NULL,
    title       VARCHAR(512) NOT NULL,
    description VARCHAR(512) NULL,
    keywords    VARCHAR(512) NULL,
    picture     VARCHAR(512) NULL,
    curdate     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY     KEY(category_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE subcategories (
    subcategory_id INT(3) NOT NULL AUTO_INCREMENT,
    category_id INT(3) NOT NULL,
    title       VARCHAR(512) NOT NULL,
    description VARCHAR(512) NULL,
    keywords    VARCHAR(512) NULL,
    picture     VARCHAR(512) NULL,
    curdate     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY     KEY(category_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
