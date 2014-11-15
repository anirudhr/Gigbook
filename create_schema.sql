/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*MySQL does not support check constraints, so this will be done in the front-end before insertion.*/

CREATE DATABASE IF NOT EXISTS gigbook_schema;
USE gigbook_schema;

DROP TABLE IF EXISTS rel_band_plays_genre;
DROP TABLE IF EXISTS user_likes_genre;
DROP TABLE IF EXISTS rel_user_fan_band;
DROP TABLE IF EXISTS band_links;
DROP TABLE IF EXISTS g_band;
DROP TABLE IF EXISTS g_user;
CREATE TABLE g_user (   uname VARCHAR(20),
                        lastname VARCHAR(20),
                        firstname VARCHAR(20),
                        city VARCHAR(20),
                        birthdate CHAR(10),
                        email VARCHAR(20), /*CONSTRAINT email_format CHECK (REGEXP_LIKE (email, '^\w+(\.\w+)*+@\w+(\.\w+)+$'))*/ 
                        PRIMARY KEY (uname)
                    );
CREATE TABLE g_band (   bname VARCHAR(20),
                        bio TEXT,
                        PRIMARY KEY (bname)
                    );
CREATE TABLE band_links (   bname VARCHAR(20),
                            linktext VARCHAR(20) NULL/*,
                            FOREIGN KEY (bname) REFERENCES g_band(bname)*/
                        );
CREATE TABLE rel_user_fan_band  (   uname VARCHAR(20) NOT NULL,
                                    bname VARCHAR(20) NOT NULL/*,
                                    FOREIGN KEY (uname) REFERENCES g_user(uname),
                                    FOREIGN KEY (bname) REFERENCES g_band(bname)*/
                                );
DROP TABLE IF EXISTS g_genre;
CREATE TABLE g_genre    (   gname VARCHAR(20),
                            gparent VARCHAR(20) NULL,
                            PRIMARY KEY (gname)/*,
                            FOREIGN KEY (gparent) REFERENCES g_genre(gname)*/
                        );
CREATE TABLE user_likes_genre   (   uname VARCHAR(20) NOT NULL,
                                    gname VARCHAR(20) NOT NULL/*,
                                    FOREIGN KEY (uname) REFERENCES g_user(uname),
                                    FOREIGN KEY (gname) REFERENCES g_genre(gname)*/
                                );
CREATE TABLE rel_band_plays_genre ( bname VARCHAR(20), gname VARCHAR(20) NOT NULL/*, FOREIGN KEY (bname) REFERENCES g_band(bname) NOT NULL, FOREIGN KEY (gname) REFERENCES g_genre(gname)*/ );
