CREATE TABLE TaskData (
                         ID int(10) unsigned NOT NULL AUTO_INCREMENT,
                         Name varchar(128) NOT NULL DEFAULT '',
                         Email varchar(120) NOT NULL DEFAULT '',
                         Birthdate DATE NOT NULL,
                         Gender BOOLEAN,
                         Lang_P BOOLEAN DEFAULT false,
                         Lang_C BOOLEAN DEFAULT false,
                         Lang_CPP BOOLEAN DEFAULT false,
                         Lang_JS BOOLEAN DEFAULT false,
                         Lang_PHP BOOLEAN DEFAULT false,
                         Bio varchar(120) NOT NULL DEFAULT '',
                         PRIMARY KEY (id)
);