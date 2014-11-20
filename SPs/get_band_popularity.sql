/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP which returns popularity for a specific band name.*/
DELIMITER //
CREATE PROCEDURE sp_band_popularity(IN bandname VARCHAR(50), OUT popularity FLOAT DEFAULT 0)
BEGIN
    DECLARE popA, popB, popC, popD, popE FLOAT DEFAULT 0;
END//
DELIMITER ;
