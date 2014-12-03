/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*MySQL does not support check constraints, so this will be done in the front-end before insertion.*/

CREATE DATABASE IF NOT EXISTS gigbook_schema;
USE gigbook_schema;
DROP TABLE IF EXISTS user_input;
DROP TABLE IF EXISTS rel_band_plays_genre;
DROP TABLE IF EXISTS rel_user_likes_genre;
DROP TABLE IF EXISTS rel_user_follows_user;
DROP TABLE IF EXISTS rel_user_attends_concert;
DROP TABLE IF EXISTS rel_user_fan_band;
DROP TABLE IF EXISTS band_links;
DROP TABLE IF EXISTS rel_band_performs_concert;
DROP TABLE IF EXISTS rel_recolist_contains_concert;
DROP TABLE IF EXISTS recolist;
DROP TABLE IF EXISTS concert;
DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS band;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS genre;
DROP VIEW IF EXISTS user_reputation;
DROP VIEW IF EXISTS band_popularity;
CREATE TABLE user (     uname VARCHAR(50),
                        bio TEXT NOT NULL,
                        profilepic_uri VARCHAR(200) NULL,
                        lastname VARCHAR(50) NOT NULL,
                        firstname VARCHAR(50) NOT NULL,
                        password VARCHAR(64) NOT NULL,
                        lastlogintime DATETIME NULL,/*CHAR(19) NULL,  /*19 = sizeof('yyyy-mm-dd hh:mm:ss')*/
                        city VARCHAR(50) NOT NULL,
                        birthdate DATE NOT NULL,/*CHAR(10) NOT NULL, /*10 = sizeof('yyyy-mm-dd')*/
                        email VARCHAR(50) NOT NULL, /*CONSTRAINT email_format CHECK (REGEXP_LIKE (email, '^\w+(\.\w+)*+@\w+(\.\w+)+$'))*/
                        joindate DATE NOT NULL,/*CHAR(10) NOT NULL,*/
                        /*reputation FLOAT NOT NULL DEFAULT 0,*/
                        PRIMARY KEY (uname),
                        UNIQUE (email)
                    );
CREATE TABLE band   (   bname VARCHAR(50),
                        bio TEXT NOT NULL,
                        profilepic_uri VARCHAR(200) NOT NULL,
                        /*popularity FLOAT NOT NULL DEFAULT 0,*/
                        PRIMARY KEY (bname)
                    );
CREATE TABLE venue  (   vid INT AUTO_INCREMENT,
                        vname VARCHAR(50),
                        building VARCHAR(5) NOT NULL, street VARCHAR(50) NOT NULL,
                        city VARCHAR(50) NOT NULL, state char(2) NOT NULL, zip CHAR(5) NOT NULL,
                        capacity int,
                        url varchar(64) NULL,
                        PRIMARY KEY (vid),
                        UNIQUE (vname, city),
                        UNIQUE (building, street, city, state, zip)
                    );
CREATE TABLE concert    (   cid INT AUTO_INCREMENT,
                            cname VARCHAR(50) NULL,
                            vid INT NOT NULL,
                            ctime CHAR(16) NOT NULL,  /*16 = sizeof('yyyy-mm-dd hh:mm')*/
                            postedtime CHAR(16) NOT NULL,
                            tkturl varchar(64) NULL,
                            cover DECIMAL NOT NULL,
                            PRIMARY KEY (cid),
                            UNIQUE (vid, ctime),
                            FOREIGN KEY (vid) REFERENCES venue(vid)
                        );
CREATE TABLE genre    (     gname VARCHAR(50),
                            gparent VARCHAR(50) NULL,
                            genrepic_uri VARCHAR(200) NOT NULL,
                            PRIMARY KEY (gname),
                            FOREIGN KEY (gparent) REFERENCES genre(gname)
                        );
CREATE TABLE band_links (   bname VARCHAR(50) NOT NULL,
                            linkurl VARCHAR(50) NOT NULL,
                            linkinfo TEXT NULL,
                            FOREIGN KEY (bname) REFERENCES band(bname)
                        );
CREATE TABLE concert_images (   cid INT NOT NULL,
                                concertpic_uri VARCHAR(200) NOT NULL,
                                FOREIGN KEY (cid) REFERENCES concert(cid)
                        );
CREATE TABLE user_posts (   uname VARCHAR(50) NOT NULL,
                            postid INT AUTO_INCREMENT,
                            bname VARCHAR(50) NOT NULL,
                            cid INT NULL,
                            postinfo TEXT NULL,
                            PRIMARY KEY (postid),
                            UNIQUE (uname),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (bname) REFERENCES band(bname),
                            FOREIGN KEY (cid) REFERENCES concert(cid)
                        );
CREATE TABLE rel_user_fan_band  (   uname VARCHAR(50) NOT NULL,
                                    bname VARCHAR(50) NOT NULL,
                                    fdate CHAR(10) /*10 = sizeof('yyyy-mm-dd')*/,
                                    FOREIGN KEY (uname) REFERENCES user(uname),
                                    FOREIGN KEY (bname) REFERENCES band(bname)
                                );
CREATE TABLE rel_user_likes_genre   (   uname VARCHAR(50) NOT NULL,
                                        gname VARCHAR(50) NOT NULL,
                                        FOREIGN KEY (uname) REFERENCES user(uname),
                                        FOREIGN KEY (gname) REFERENCES genre(gname)
                                );
CREATE TABLE rel_user_follows_user  (   follower VARCHAR(50) NOT NULL,
                                        followee VARCHAR(50) NOT NULL,
                                        PRIMARY KEY (follower, followee),
                                        FOREIGN KEY (follower) REFERENCES user(uname),
                                        FOREIGN KEY (followee) REFERENCES user(uname)
                                    );
CREATE TABLE rel_user_attends_concert   (   uname VARCHAR(50) NOT NULL,
                                            cid INT NOT NULL,
                                            review VARCHAR(64) NULL,
                                            rating float NULL,
                                            PRIMARY KEY (uname, cid),
                                            FOREIGN KEY (uname) REFERENCES user(uname),
                                            FOREIGN KEY (cid) REFERENCES concert(cid)
                                        );
CREATE TABLE rel_user_posts_concertimages   (   uname VARCHAR(50) NOT NULL,
                                                cid INT NOT NULL,
                                                concertpic_uri VARCHAR(200) NOT NULL,
                                                FOREIGN KEY (uname, cid) REFERENCES rel_user_attends_concert (uname, cid)
                                        );
CREATE TABLE rel_band_plays_genre   (   bname VARCHAR(50) NOT NULL,
                                        gname VARCHAR(50) NOT NULL,
                                        FOREIGN KEY (bname) REFERENCES band(bname),
                                        FOREIGN KEY (gname) REFERENCES genre(gname)
                                    );
CREATE TABLE rel_band_performs_concert  (   bname VARCHAR(50) NOT NULL,
                                            cid INT NOT NULL,
                                            FOREIGN KEY (bname) REFERENCES band(bname),
                                            FOREIGN KEY (cid) REFERENCES concert(cid)
                                        );
CREATE TABLE recolist   (   lname VARCHAR(50) NOT NULL,
                            uname VARCHAR(50) NOT NULL,
                            gname VARCHAR(50) NOT NULL,
                            PRIMARY KEY (lname),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (gname) REFERENCES genre(gname)
                        );
CREATE TABLE rel_recolist_contains_concert  (   lname VARCHAR(50) NOT NULL,
                                                cid INT NOT NULL,
                                                FOREIGN KEY (lname) REFERENCES recolist(lname),
                                                FOREIGN KEY (cid) REFERENCES concert(cid)
                                            );
CREATE TABLE user_input (   uname VARCHAR(50) NOT NULL,
                            cid INT NOT NULL,
                            vid INT NULL,
                            ctime CHAR(16) NULL,
                            tkturl varchar(64) NULL,
                            cover DECIMAL NULL,
							postedtime CHAR(16) NOT NULL,
                            UNIQUE (vid, ctime),
                            FOREIGN KEY (vid) REFERENCES venue(vid),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (cid) REFERENCES  concert(cid)
                        );
                        
/*CREATE VIEW user_reputation AS
    SELECT uname AS u1, ( CASE
        WHEN (SELECT joindate FROM user WHERE uname=u1) < (SELECT CURDATE() + INTERVAL 15 DAY) THEN 1
        ELSE 0
    ) AS rep FROM user
    ;
CREATE VIEW band_popularity AS
    SELECT;*/
