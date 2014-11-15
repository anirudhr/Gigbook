/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*MySQL does not support check constraints, so this will be done in the front-end before insertion.*/

CREATE DATABASE IF NOT EXISTS gigbook_schema;
USE gigbook_schema;

DROP TABLE IF EXISTS g_user;
CREATE TABLE g_user (   uname VARCHAR(20),
                        lastname VARCHAR(20),
                        firstname VARCHAR(20),
                        city VARCHAR(20)
                        birthdate DATE,
                        email VARCHAR(20), /*CONSTRAINT email_format CHECK (REGEXP_LIKE (email, '^\w+(\.\w+)*+@\w+(\.\w+)+$'))*/ 
                        PRIMARY KEY (uname)
                    );
DROP TABLE IF EXISTS g_band;
CREATE TABLE g_band (   bname VARCHAR(20),
                        bio TEXT,
                        PRIMARY KEY (bname)
                    );
DROP TABLE IF EXISTS band_links;
CREATE TABLE band_links (   bname VARCHAR(20),
                            linktext VARCHAR(20),
                            FOREIGN KEY (bname) REFERENCES g_band(bname)
                        );
                        
DROP TABLE IF EXISTS rel_fan;
CREATE TABLE rel_fan    (   uname VARCHAR(20),
                            bname VARCHAR(20),
                            FOREIGN KEY (uname) REFERENCES g_user(uname),
                            FOREIGN KEY (bname) REFERENCES g_band(bname)
                        );
DROP TABLE IF EXISTS g_genre;
CREATE TABLE g_genre    (   gname VARCHAR(20),
                            gparent VARCHAR(20) NULL,
                            PRIMARY KEY (gname),
                            FOREIGN KEY (gparent) REFERENCES g_genre(gname)
                        );
DROP TABLE IF EXISTS g_genre;
CREATE TABLE user_likes_genre   (   uname VARCHAR(20),
                                    gname VARCHAR(20),
                                    FOREIGN KEY (uname) REFERENCES g_user(uname),
                                    FOREIGN KEY (gname) REFERENCES g_genre(gname)
                                );
