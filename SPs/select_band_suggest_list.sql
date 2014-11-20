/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to select a list of bands sorted in descending order by:
-> band popularity . does user like genre*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_band_suggest_list;
CREATE PROCEDURE sp_band_suggest_list(IN username VARCHAR(50))
BEGIN
    /*sp_band_popularity(IN bandname VARCHAR(50), OUT popularity FLOAT DEFAULT 0)*/
    /*
    1. Select genre that user likes at random. If applicable, select its parent genre.
    SELECT genre.gname FROM genre JOIN rel_user_likes_genre ON rel_user_likes_genre.gname = genre.gname ORDER BY RAND() LIMIT 1;
    2. Select 5 bands that the user isn't a fan of that play the genre or parent, at random.
    3. Find popularity for those 5, order by popularity.
    4. Set 5 out parameters.
    */
END//
DELIMITER ;
