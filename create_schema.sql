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
CREATE TABLE user (     uname VARCHAR(50),
                        lastname VARCHAR(50) NOT NULL,
                        firstname VARCHAR(50) NOT NULL,
                        password VARCHAR(64) NOT NULL,
                        lastlogintime CHAR(19) NULL,  /*19 = sizeof('yyyy-mm-dd hh:mm:ss')*/
                        city VARCHAR(50) NOT NULL,
                        birthdate CHAR(10) NOT NULL, /*10 = sizeof('yyyy-mm-dd')*/
                        email VARCHAR(50) NOT NULL, /*CONSTRAINT email_format CHECK (REGEXP_LIKE (email, '^\w+(\.\w+)*+@\w+(\.\w+)+$'))*/
                        joindate CHAR(10) NOT NULL,
                        reputation FLOAT NOT NULL,
                        PRIMARY KEY (uname),
                        UNIQUE (email)
                    );
CREATE TABLE band   (   bname VARCHAR(50),
                        bio TEXT,
                        PRIMARY KEY (bname)
                    );
CREATE TABLE venue  (
                        vname VARCHAR(50),
                        building VARCHAR(5) NOT NULL, street VARCHAR(50) NOT NULL,
                        city VARCHAR(50) NOT NULL, state char(2) NOT NULL, zip CHAR(5) NOT NULL,
                        capacity int,
                        url varchar(64) NULL,
                        PRIMARY KEY (vname),
                        UNIQUE (building, street, city, state, zip)
                    );
CREATE TABLE concert    (   cid INT AUTO_INCREMENT,
                            cname VARCHAR(50) NULL,
                            vname VARCHAR(50) NOT NULL,
                            ctime CHAR(16) NOT NULL,  /*16 = sizeof('yyyy-mm-dd hh:mm')*/
                            postedtime CHAR(16) NOT NULL,
                            tkturl varchar(64) NULL,
                            cover DECIMAL NOT NULL,
                            PRIMARY KEY (cid),
                            UNIQUE (vname, ctime),
                            FOREIGN KEY (vname) REFERENCES venue(vname)
                        );
CREATE TABLE genre    (     gname VARCHAR(50),
                            gparent VARCHAR(50) NULL,
                            PRIMARY KEY (gname),
                            FOREIGN KEY (gparent) REFERENCES genre(gname)
                        );
CREATE TABLE band_links (   bname VARCHAR(50) NOT NULL,
                            linktext VARCHAR(50) NULL,
                            FOREIGN KEY (bname) REFERENCES band(bname)
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
                            vname VARCHAR(50) NULL,
                            ctime CHAR(16) NULL,
                            tkturl varchar(64) NULL,
                            cover DECIMAL NULL,
                            UNIQUE (vname, ctime),
                            FOREIGN KEY (vname) REFERENCES venue(vname),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (cid) REFERENCES  concert(cid)
                        );
