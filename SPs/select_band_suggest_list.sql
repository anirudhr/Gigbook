/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to select a list of bands sorted in descending order by:
-> band popularity . does user like genre*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_band_suggest_list;
CREATE PROCEDURE sp_band_suggest_list(IN username VARCHAR(50))
BEGIN
    /*sp_band_popularity(IN bandname VARCHAR(50), OUT popularity FLOAT DEFAULT 0)*/
END//
DELIMITER ;
