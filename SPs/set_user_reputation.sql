/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP which returns reputation for a specific username.*/
DELIMITER //
CREATE PROCEDURE sp_user_reputation(IN username VARCHAR(50), OUT reputation FLOAT DEFAULT 0)
BEGIN
    DECLARE repA, repB, repC, repD, repE FLOAT DEFAULT 0;
    DECLARE age INT DEFAULT 0;
    
END//
DELIMITER ;
