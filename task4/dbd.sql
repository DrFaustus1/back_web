create table FormBD(
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(128) NOT NULL DEFAULT '',
    email varchar(120) NOT NULL DEFAULT '',
    year varchar(15) NOT NULL DEFAULT '',
    gender varchar(15) NOT NULL DEFAULT '',
    bio varchar(120) NOT NULL DEFAULT '',
    PRIMARY KEY(id)
);

create table Languages(
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL DEFAULT '',
    PRIMARY KEY(id)
);