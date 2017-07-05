DROP DATABASE IF EXISTS movieproj;
CREATE DATABASE movieproj;

USE movieproj;

CREATE TABLE person
(
	pid			INT				AUTO_INCREMENT	PRIMARY KEY,
    lastname	VARCHAR(45)		NOT NULL,
    firstname	VARCHAR(45)		NOT NULL,
    dob			INT,
    role		VARCHAR(45)
) ENGINE=INNODB;

CREATE TABLE studio
(
	sid			INT				AUTO_INCREMENT	PRIMARY KEY,
    sname		VARCHAR(45)		NOT NULL,
    company		VARCHAR(45),
    city		VARCHAR(45),
    country		VARCHAR(45)
) ENGINE=INNODB;

CREATE TABLE film
(
	fid			INT				AUTO_INCREMENT PRIMARY KEY,
    title		VARCHAR(120)	NOT NULL,
    yr			YEAR			NOT NULL,
    genre		VARCHAR(45)
) ENGINE=INNODB;

CREATE TABLE directs
(
    pid		INT,
    fid		INT,
    PRIMARY KEY (pid, fid),
    
	CONSTRAINT directs_fk_person
		FOREIGN KEY (pid) REFERENCES person (pid)
		ON DELETE CASCADE,
	CONSTRAINT directs_fk_film
		FOREIGN KEY (fid) REFERENCES film (fid)
		ON DELETE CASCADE
);

CREATE TABLE produces
(
    pid		INT,
    fid		INT,
	PRIMARY KEY (pid, fid),
    
	CONSTRAINT produces_fk_person
		FOREIGN KEY (pid) REFERENCES person (pid)
		ON DELETE CASCADE,
	CONSTRAINT produces_fk_film
		FOREIGN KEY (fid) REFERENCES film (fid)
		ON DELETE CASCADE
);

CREATE TABLE actsin
(
    pid		INT,
    fid		INT,
	PRIMARY KEY (pid, fid),
    
	CONSTRAINT actsin_fk_person
		FOREIGN KEY (pid) REFERENCES person (pid)
		ON DELETE CASCADE,
	CONSTRAINT actsin_fk_film
		FOREIGN KEY (fid) REFERENCES film (fid)
		ON DELETE CASCADE
);


CREATE TABLE makes
(
    sid		INT,
    fid		INT,
    PRIMARY KEY (sid, fid),
    
	CONSTRAINT makes_fk_studio
		FOREIGN KEY (sid) REFERENCES studio (sid)
		ON DELETE CASCADE,
	CONSTRAINT makes_fk_film
		FOREIGN KEY (fid) REFERENCES film (fid)
		ON DELETE CASCADE
);

-- CRUD Operations / QUERIES with procedures
use movieproj;

-- MOVIES
-- Create record in film table
DROP procedure if exists add_movie;
DELIMITER $$
CREATE PROCEDURE add_movie
(
    new_title		VARCHAR(120),
    new_yr			YEAR,
    new_genre		VARCHAR(45)
)
BEGIN
	INSERT INTO film(title, yr, genre) VALUES(new_title, new_yr, new_genre);
END$$
DELIMITER ;

/*
SET @new_title = 'Northeastern University';
SET @new_yr = 2017;
SET @new_genre = 'documentary';
PREPARE add_movie FROM 'CALL add_movie(?, ?, ?)';
EXECUTE add_movie USING @new_title, @new_yr, @new_genre;
*/

-- Update record in movies table
DROP procedure if exists update_movie_yr;
DELIMITER $$
CREATE PROCEDURE update_movie_yr
(
	ref_title	VARCHAR(120),
    new_yr		YEAR
)
BEGIN
	SET @update_id = (SELECT fid FROM film WHERE title = ref_title);
	UPDATE film SET yr = new_yr WHERE fid = @update_id;
END$$
DELIMITER ;

/*
SET @ref_title = 'Northeastern';
SET @new_yr = 2018;
PREPARE update_movie_yr FROM 'CALL update_movie_yr(?, ?)';
EXECUTE update_movie_yr USING @ref_title, @new_yr;
*/

-- Delete record in movies table by ID
DROP procedure if exists delete_movie_by_id;
DELIMITER $$
CREATE PROCEDURE delete_movie_by_id
(
	del_movie_id INT
)
BEGIN
	DELETE FROM film
    WHERE del_movie_id = fid;
END$$
DELIMITER ;

/*
SET @del_movie_id = 0;
PREPARE delete_movie_by_id FROM 'CALL delete_movie_by_id(?)';
EXECUTE delete_movie_by_id USING @del_movie_id;
*/

-- Delete record in movies table by title
DROP procedure if exists delete_movie_by_title;
DELIMITER $$
CREATE PROCEDURE delete_movie_by_title
(
	del_movie_title VARCHAR(120)
)
BEGIN
	SET @update_id = (SELECT fid FROM film WHERE title = del_movie_title);
	DELETE FROM film
    WHERE @update_id = title;
END$$
DELIMITER ;

/*
SET @del_movie_title = 'name';
PREPARE delete_movie_by_title FROM 'CALL delete_movie_by_title(?)';
EXECUTE delete_movie_by_title USING @del_movie_title;
*/

-- STUDIOS
-- Create record in studios table
DROP procedure if exists add_studio;
DELIMITER $$
CREATE PROCEDURE add_studio
(
    new_sname		VARCHAR(45),
    new_company		VARCHAR(45),
    new_city		VARCHAR(45),
    new_country		VARCHAR(45)
)
BEGIN
	INSERT INTO studio(sname, company, city, country) VALUES(new_sname, new_company, new_city, new_country);
END$$
DELIMITER ;

/*
SET @addstudioname = 'Northeastern';
SET @addstudiocompany = 'Northeastern University';
SET @addstudiocity = 'Boston';
SET @addstudiocountry = 'United States';
PREPARE add_studio FROM 'CALL add_studio(?, ?, ?, ?)';
EXECUTE add_studio USING @addstudioname, @addstudiocompany, @addstudiocity, @addstudiocountry;
*/

-- Update record in studios table

-- Delete record in studios table by ID
DROP procedure if exists delete_studio_by_id;
DELIMITER $$
CREATE PROCEDURE delete_studio_by_id
(
	del_studio_id INT
)
BEGIN
	DELETE FROM studio
    WHERE del_studio_id = sid;
END$$
DELIMITER ;

SET @del_studio_id = 0;
PREPARE delete_studio_by_id FROM 'CALL delete_studio_by_id(?)';
EXECUTE delete_studio_by_id USING @del_studio_id;

-- Delete record in studios table by name
DROP procedure if exists delete_studio_by_name;
DELIMITER $$
CREATE PROCEDURE delete_studio_by_name
(
	del_studio_name VARCHAR(45)
)
BEGIN
	SET @delete_id = (SELECT sid from studio where sname = del_studio_name);
	DELETE FROM studio
    WHERE @delete_id = sid;
END$$
DELIMITER ;

/*
SET @del_studio_name = 'Northeastern';
PREPARE delete_studio_by_name FROM 'CALL delete_studio_by_name(?)';
EXECUTE delete_studio_by_name USING @del_studio_name;
*/

-- PEOPLE
-- Create record in people table
DROP procedure if exists add_person;
DELIMITER $$
CREATE PROCEDURE add_person
(
    new_lastname	VARCHAR(45),
    new_firstname	VARCHAR(45),
    new_dob			INT,
    new_role		VARCHAR(45)
)
BEGIN
	INSERT INTO person(lastname, firstname, dob, role) VALUES(new_lastname, new_firstname, new_dob, new_role);
END$$
DELIMITER ;

/*
SET @addpersonlastname = 'Lname';
SET @addpersonfirstname = 'Fname';
SET @addpersondob = 1900;
SET @addpersonpos = 'Director';
PREPARE add_person FROM 'CALL add_person(?, ?, ?, ?)';
EXECUTE add_person USING @addpersonlastname, @addpersonfirstname, @addpersondob, @addpersonpos;
*/

-- Update record in people table

-- Delete record in people table by id
DROP procedure if exists delete_person_by_id;
DELIMITER $$
CREATE PROCEDURE delete_person_by_id
(
	del_person_id INT
)
BEGIN
	DELETE FROM person
    WHERE del_person_id = pid;
END$$
DELIMITER ;

/*
SET @del_person_id = 0;
PREPARE delete_person_by_id FROM 'CALL delete_person_by_id(?)';
EXECUTE delete_person_by_id USING @del_person_id;
*/

-- Delete record in p table by name
DROP procedure if exists delete_person_by_name;
DELIMITER $$
CREATE PROCEDURE delete_person_by_name
(
	del_person_name VARCHAR(45)
)
BEGIN
    SET @delete_id = (SELECT pid from person where SUBSTRING(del_person_name, 1, CHARINDEX(' ', del_person_name) - 1) = firstname 
		AND REVERSE(SUBSTRING(REVERSE(del_person_name), 1, CHARINDEX(' ', REVERSE(del_person_name)) - 1)) = lastname);
	DELETE FROM person
    WHERE @delete_id = pid;
END$$
DELIMITER ;

/*
SET @del_person_name = 'fullname';
PREPARE delete_person_by_name FROM 'CALL delete_person_by_name(?)';
EXECUTE delete_person_by_name USING @del_person_name;
*/

-- QUERIES ---------------------------------------------

-- get all movies in certain year
DROP procedure if exists movies_by_year;
DELIMITER $$
CREATE PROCEDURE movies_by_year
(    
	search_year YEAR 
)
BEGIN 
	SELECT title, genre
    FROM film
    WHERE search_year = yr
    ORDER BY title;
	
 END$$
DELIMITER ;

/*
SET @yr = '1980';
PREPARE movies_by_year FROM 'CALL movies_by_year(?)';
EXECUTE movies_by_year USING @yr;
*/

-- get all movies by title keyword
DROP procedure if exists movies_by_keyword;
DELIMITER $$
CREATE PROCEDURE movies_by_keyword
(    
	search_title VARCHAR(120)
)
BEGIN 
	SELECT title, yr, genre
    FROM film
    WHERE title LIKE CONCAT('%', search_title, '%')
    ORDER BY title;
	
 END$$
DELIMITER ;

/*
SET @search_title = 'dance';
PREPARE movies_by_keyword FROM 'CALL movies_by_keyword(?)';
EXECUTE movies_by_keyword USING @search_title;
*/

-- get all movies by genre
DROP procedure if exists movies_by_genre;
DELIMITER $$
CREATE PROCEDURE movies_by_genre
(    
	search_genre VARCHAR(120) 
)
BEGIN 
	SELECT title, yr
    FROM film
    WHERE genre LIKE CONCAT('%', search_genre, '%')
    ORDER BY title;
	
 END$$
DELIMITER ;

/*
SET @search_genre = 'Drama';
PREPARE movies_by_genre FROM 'CALL movies_by_genre(?)';
EXECUTE movies_by_genre USING @search_genre;
*/

-- get all movies by a certain studio
DROP procedure if exists movies_by_studio;
DELIMITER $$
CREATE PROCEDURE movies_by_studio
(    
	st_name VARCHAR(45)
)
BEGIN 
	SELECT f.title, f.yr, f.genre
    FROM film f, studio s, makes m
    WHERE st_name = s.sname AND s.sid = m.sid AND m.fid = f.fid
    ORDER BY title;
	
 END$$
DELIMITER ;

/*
SET @st_name = 'Disney';
PREPARE movies_by_studio FROM 'CALL movies_by_studio(?)';
EXECUTE movies_by_studio USING @st_name;
*/

-- get all movies by a certain director (FULL NAME)
DROP procedure if exists movies_by_dir;
DELIMITER $$
CREATE PROCEDURE movies_by_dir
(    dir_fullname VARCHAR(45)
)
BEGIN 
	SELECT f.title, f.yr, f.genre
    FROM film f, person p, directs d
    WHERE CONCAT(p.firstname, ' ', p.lastname) = dir_fullname AND p.pid = d.pid AND d.fid = f.fid
    ORDER BY title;
	
 END$$
DELIMITER ;

/*
SET @dir_fullname = 'John Hughes';
PREPARE movies_by_dir FROM 'CALL movies_by_dir(?)';
EXECUTE movies_by_dir USING @dir_fullname;
*/

-- get all movies by a certain prducer (FULL NAME)
DROP procedure if exists movies_by_prod;
DELIMITER $$
CREATE PROCEDURE movies_by_prod
(    prod_fullname VARCHAR(45)
)
BEGIN 
	SELECT f.title, f.yr, f.genre
    FROM film f, person p, produces pr
    WHERE CONCAT(p.firstname, ' ', p.lastname) = prod_fullname AND p.pid = pr.pid AND pr.fid = f.fid
    ORDER BY title;
	
 END$$
DELIMITER ;

/*
SET @prod_fullname = 'Sean S. Cunningham';
PREPARE movies_by_prod FROM 'CALL movies_by_prod(?)';
EXECUTE movies_by_prod USING @prod_fullname;
*/

-- get all movies, ordered by title
DROP procedure if exists movies_orderedby_title;
DELIMITER $$
CREATE PROCEDURE movies_orderedby_title()
BEGIN 
	SELECT *
    FROM film
    ORDER BY title;
	
 END$$
DELIMITER ;

-- CALL movies_orderedby_title();

-- get all movies, ordered by year
DROP procedure if exists movies_orderedby_year;
DELIMITER $$
CREATE PROCEDURE movies_orderedby_year()
BEGIN 
	SELECT *
    FROM film
    ORDER BY yr;
	
 END$$
DELIMITER ;

-- CALL movies_orderedby_year();

-- get all people, ordered by last name
DROP procedure if exists people_orderedby_lastname;
DELIMITER $$
CREATE PROCEDURE people_orderedby_lastname()
BEGIN 
	SELECT *
    FROM person
    ORDER BY lastname;
	
 END$$
DELIMITER ;

-- CALL people_orderedby_lastname();

-- get all studios, ordered by name
DROP procedure if exists studios_orderedby_name;
DELIMITER $$
CREATE PROCEDURE studios_orderedby_name()
BEGIN 
	SELECT *
    FROM studio
    ORDER BY sname;
	
 END$$
DELIMITER ;

-- studios_orderedby_name();



