CREATE TABLE Form6BD (
	id int(20) unsigned NOT NULL AUTO_INCREMENT,
	name varchar(120) NOT NULL DEFAULT '',
	email varchar(120) NOT NULL,
	birthdate DATE NOT NULL,
	sex ENUM('male', 'female'),
	bio TEXT,
	PRIMARY KEY(id)
);

CREATE TABLE Languages6 (
	id int(20) unsigned NOT NULL,
	name TEXT
);

CREATE TABLE login (
	p_id int(20) unsigned NOT NULL AUTO_INCREMENT,
	login varchar(120),
	pass_hash varchar(255),
	PRIMARY KEY(p_id)
);

CREATE TABLE admin_auth6 (
	login varchar(120),
	pass_hash varchar(255)
);