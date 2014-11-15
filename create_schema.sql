/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*MySQL does not support check constraints, so this will be done in the front-end before insertion.*/

CREATE DATABASE IF NOT EXISTS gigbook_schema;
USE gigbook_schema;

DROP TABLE IF EXISTS rel_band_plays_genre;
DROP TABLE IF EXISTS rel_user_likes_genre;
DROP TABLE IF EXISTS rel_user_follows_user;
DROP TABLE IF EXISTS rel_user_attends_concert;
DROP TABLE IF EXISTS rel_user_fan_band;
DROP TABLE IF EXISTS band_links;
DROP TABLE IF EXISTS rel_band_performs_concert;
DROP TABLE IF EXISTS rel_user_recos_concert;
DROP TABLE IF EXISTS recolist;
DROP TABLE IF EXISTS concert;
DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS band;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS genre;
CREATE TABLE user (     uname VARCHAR(20),
                        lastname VARCHAR(20) NOT NULL,
                        firstname VARCHAR(20) NOT NULL,
                        city VARCHAR(20) NOT NULL,
                        birthdate CHAR(10) NOT NULL, /*10 = sizeof('yyyy-mm-dd')*/
                        email VARCHAR(50) NOT NULL, /*CONSTRAINT email_format CHECK (REGEXP_LIKE (email, '^\w+(\.\w+)*+@\w+(\.\w+)+$'))*/ 
                        PRIMARY KEY (uname),
                        UNIQUE (email)
                    );
CREATE TABLE band   (   bname VARCHAR(20),
                        bio TEXT,
                        PRIMARY KEY (bname)
                    );
CREATE TABLE venue  (
                        vname VARCHAR(20),
                        building VARCHAR(5) NOT NULL, street VARCHAR(20) NOT NULL,
                        city VARCHAR(20) NOT NULL, state char(2) NOT NULL, zip CHAR(5) NOT NULL,
                        capacity int,
                        url varchar(64) NULL,
                        PRIMARY KEY (vname),
                        UNIQUE (building, street, city, state, zip)
                    );
CREATE TABLE concert    (   cname VARCHAR(20),
                            vname VARCHAR(20) NOT NULL,
                            ctime CHAR(16) NOT NULL,  /*16 = sizeof('yyyy-mm-dd-hh-mm')*/
                            tktprice DECIMAL NOT NULL,
                            PRIMARY KEY (cname),
                            UNIQUE (vname, ctime),
                            FOREIGN KEY (vname) REFERENCES venue(vname)
                        );
CREATE TABLE genre    (     gname VARCHAR(20),
                            gparent VARCHAR(20) NULL,
                            PRIMARY KEY (gname),
                            FOREIGN KEY (gparent) REFERENCES genre(gname)
                        );
CREATE TABLE band_links (   bname VARCHAR(20) NOT NULL,
                            linktext VARCHAR(20) NULL,
                            FOREIGN KEY (bname) REFERENCES band(bname)
                        );
CREATE TABLE rel_user_fan_band  (   uname VARCHAR(20) NOT NULL,
                                    bname VARCHAR(20) NOT NULL,
                                    fdate CHAR(10) /*10 = sizeof('yyyy-mm-dd')*/,
                                    FOREIGN KEY (uname) REFERENCES user(uname),
                                    FOREIGN KEY (bname) REFERENCES band(bname)
                                );
CREATE TABLE rel_user_likes_genre   (   uname VARCHAR(20) NOT NULL,
                                    gname VARCHAR(20) NOT NULL,
                                    FOREIGN KEY (uname) REFERENCES user(uname),
                                    FOREIGN KEY (gname) REFERENCES genre(gname)
                                );
CREATE TABLE rel_user_follows_user  (   follower VARCHAR(20) NOT NULL,
                                        followee VARCHAR(20) NOT NULL,
                                        FOREIGN KEY (follower) REFERENCES user(uname),
                                        FOREIGN KEY (followee) REFERENCES user(uname)
                                    );
CREATE TABLE rel_user_attends_concert   (   uname VARCHAR(20) NOT NULL,
                                            cname VARCHAR(20) NOT NULL,
                                            review VARCHAR(64) NULL,
                                            rating int NULL,
                                            PRIMARY KEY (uname, cname),
                                            FOREIGN KEY (uname) REFERENCES user(uname),
                                            FOREIGN KEY (cname) REFERENCES concert(cname)
                                        );
CREATE TABLE rel_band_plays_genre   (   bname VARCHAR(20) NOT NULL,
                                        gname VARCHAR(20) NOT NULL,
                                        FOREIGN KEY (bname) REFERENCES band(bname),
                                        FOREIGN KEY (gname) REFERENCES genre(gname)
                                    );
CREATE TABLE rel_band_performs_concert  (   bname VARCHAR(20) NOT NULL,
                                            cname VARCHAR(20) NOT NULL,
                                            FOREIGN KEY (bname) REFERENCES band(bname),
                                            FOREIGN KEY (cname) REFERENCES concert(cname)
                                        );
CREATE TABLE rel_user_recos_concert  (      uname VARCHAR(20) NOT NULL,
                                            cname VARCHAR(20) NOT NULL,
                                            FOREIGN KEY (uname) REFERENCES user(uname),
                                            FOREIGN KEY (cname) REFERENCES concert(cname)
                                        );
