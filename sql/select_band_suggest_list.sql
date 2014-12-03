/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to select a band that plays a genre which the user likes, or a genre whose child genre the user likes, which the user does not already like.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_band_suggest_list;
CREATE PROCEDURE sp_band_suggest_list(IN inp_uname VARCHAR(50), OUT out_bname VARCHAR(50))
BEGIN
    /*sp_band_popularity(IN bandname VARCHAR(50), OUT popularity FLOAT DEFAULT 0)*/
    /*
    1. Select genre that user likes at random. If applicable, select its parent genre.
    2. Select 1 band that the user isn't a fan of that play the genre or parent, at random.
    */
    DECLARE inp_gname, inp_gparent VARCHAR(50);
    SELECT gname INTO inp_gname FROM rel_user_likes_genre
    WHERE uname = inp_uname
    ORDER BY RAND() LIMIT 1;
    SELECT gparent INTO @inp_gparent FROM genre
    WHERE gname = inp_gname;
    IF @inp_gparent IS NOT NULL THEN
        SELECT bname INTO out_bname FROM rel_band_plays_genre
        WHERE rel_band_plays_genre.gname IN (
                                                SELECT gname FROM genre
                                                WHERE gparent = inp_gparent
                                                OR gparent = inp_gname
                                            )
        AND bname NOT IN    (
                                SELECT rel_user_fan_band.bname FROM rel_user_fan_band
                                WHERE uname = inp_uname
                            )
        ORDER BY RAND() LIMIT 1;
    ELSE
        SELECT bname INTO out_bname FROM rel_band_plays_genre
        WHERE rel_band_plays_genre.gname = inp_gname
        AND bname NOT IN    (
                                SELECT rel_user_fan_band.bname FROM rel_user_fan_band
                                WHERE uname = inp_uname
                            )
        ORDER BY RAND() LIMIT 1;
    END IF;
    SELECT inp_uname, inp_gname, inp_gparent, out_bname; /*This line is for testing only*/
END//
DELIMITER ;
