/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to select a list of bands sorted in descending order by:
-> band popularity . does user like genre*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_band_suggest_list;
CREATE PROCEDURE sp_band_suggest_list(IN inp_uname VARCHAR(50)/*, OUT ???*/)
BEGIN
    /*sp_band_popularity(IN bandname VARCHAR(50), OUT popularity FLOAT DEFAULT 0)*/
    /*
    1. Select genre that user likes at random. If applicable, select its parent genre.
    2. Select 5 bands that the user isn't a fan of that play the genre or parent, at random.
    3. Find popularity for those 5, order by popularity.
    4. Set 5 out parameters.
    */
    DECLARE inp_gname, inp_gparent VARCHAR(50);
    SELECT gname INTO inp_gname FROM rel_user_likes_genre WHERE uname = inp_uname ORDER BY RAND() LIMIT 1;
    SELECT gparent INTO inp_gparent FROM genre WHERE gname = inp_gname;
    
    SELECT bname /*INTO ???*/ FROM rel_band_plays_genre
    WHERE rel_band_plays_genre.gname IN (inp_gname, inp_gparent)
          AND bname NOT IN (SELECT rel_user_fan_band.bname FROM rel_user_fan_band WHERE uname = inp_uname);
    ORDER BY RAND() LIMIT 5;
END//
DELIMITER ;
