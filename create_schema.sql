/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*MySQL does not support check constraints, so this will be done in the front-end before insertion.*/

CREATE DATABASE IF NOT EXISTS gigbook_schema;
USE gigbook_schema;

DROP TABLE IF EXISTS rel_band_plays_genre;
DROP TABLE IF EXISTS user_likes_genre;
DROP TABLE IF EXISTS rel_user_fan_band;
DROP TABLE IF EXISTS band_links;
DROP TABLE IF EXISTS rel_band_performs_concert;
DROP TABLE IF EXISTS concert;
DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS band;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS genre;
CREATE TABLE user (     uname VARCHAR(20),
                        lastname VARCHAR(20),
                        firstname VARCHAR(20),
                        city VARCHAR(20),
                        birthdate CHAR(10), /*10 = sizeof('yyyy-mm-dd')*/
                        email VARCHAR(20), /*CONSTRAINT email_format CHECK (REGEXP_LIKE (email, '^\w+(\.\w+)*+@\w+(\.\w+)+$'))*/ 
                        PRIMARY KEY (uname)
                    );
CREATE TABLE band (   bname VARCHAR(20),
                        bio TEXT,
                        PRIMARY KEY (bname)
                    );
CREATE TABLE band_links (   bname VARCHAR(20) NOT NULL,
                            linktext VARCHAR(20) NULL/*,
                            FOREIGN KEY (bname) REFERENCES band(bname)*/
                        );
CREATE TABLE rel_user_fan_band  (   uname VARCHAR(20) NOT NULL,
                                    bname VARCHAR(20) NOT NULL/*,
                                    FOREIGN KEY (uname) REFERENCES user(uname),
                                    FOREIGN KEY (bname) REFERENCES band(bname)*/
                                );
CREATE TABLE genre    (   gname VARCHAR(20),
                            gparent VARCHAR(20) NULL,
                            PRIMARY KEY (gname)/*,
                            FOREIGN KEY (gparent) REFERENCES genre(gname)*/
                        );
CREATE TABLE user_likes_genre   (   uname VARCHAR(20) NOT NULL,
                                    gname VARCHAR(20) NOT NULL/*,
                                    FOREIGN KEY (uname) REFERENCES user(uname),
                                    FOREIGN KEY (gname) REFERENCES genre(gname)*/
                                );
CREATE TABLE rel_band_plays_genre   (   bname VARCHAR(20),
                                        gname VARCHAR(20) NOT NULL/*,
                                        FOREIGN KEY (bname) REFERENCES band(bname),
                                        FOREIGN KEY (gname) REFERENCES genre(gname)*/
                                    );
CREATE TABLE venue  (
                        vname VARCHAR(20),
                        building VARCHAR(5),
                        street VARCHAR(20),
                        city VARCHAR(20),
                        state char(2),
                        zip CHAR(5),
                        capacity int,
                        url varchar(64),
                        PRIMARY KEY (vname),
                        UNIQUE (building, street, city, state, zip)
                    );
CREATE TABLE concert    (   cname VARCHAR(20),
                            vname VARCHAR(20),
                            ctime CHAR(16),  /*16 = sizeof('yyyy-mm-dd-hh-mm')*/
                            tktprice DECIMAL,
                            PRIMARY KEY (cname),
                            UNIQUE (vname, ctime)/*,
                            FOREIGN KEY (vname) REFERENCES venue(vname)*/
                        );
CREATE TABLE rel_band_performs_concert  (   bname VARCHAR(20),
                                            cname VARCHAR(20)/*,
                                            FOREIGN KEY (bname) REFERENCES band(bname),
                                            FOREIGN KEY (cname) REFERENCES concert(cname)*/
                                        );
