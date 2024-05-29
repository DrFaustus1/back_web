CREATE TABLE Form5BD (
    id int(20) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(120) NOT NULL DEFAULT '',
    email varchar(120),
    year YEAR NOT NULL,
    gender ENUM('male', 'female'),
    bio TEXT,
    PRIMARY KEY(id)
    );

CREATE TABLE users5 (
    id int(20) unsigned NOT NULL AUTO_INCREMENT,
    login VARCHAR(128),
    pass VARCHAR(255),
    PRIMARY KEY(id)
    );

CREATE TABLE Languages5 (
    id int(20) unsigned NOT NULL,
    languages int(20)
    );

CREATE TABLE LangDef (
    id int(20) unsigned NOT NULL,
    name varchar(120)
    );

INSERT INTO LangDef VALUES
    ('1', 'Pascal'),
    ('2', 'C'),
    ('3', 'C++'),
    ('4', 'Python')
    ;