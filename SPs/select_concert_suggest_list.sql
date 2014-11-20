/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to select a list of (future only) concerts sorted in descending order by:
-> immediacy of concert: ascending datediff from NOW
-> band popularity . does user like band
-> band popularity . does user like genre*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_concert_suggest_list;
CREATE PROCEDURE sp_concert_suggest_list()
BEGIN
    
END//
DELIMITER ;
