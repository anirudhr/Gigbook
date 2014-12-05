/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to insert concert information as a user, if the user's reputation is above a value.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_user_input;
CREATE PROCEDURE sp_user_input(IN inp_uname VARCHAR(50), IN inp_cid INT,IN inp_vname VARCHAR(50), IN inp_ctime CHAR(16), IN inp_tkturl VARCHAR(64), IN inp_cover DECIMAL) /*if inp_cname or inp_tkturl are NULL, they will be inserted as NULL values*/
BEGIN
    DECLARE inp_reputation FLOAT DEFAULT 0;
    CALL sp_user_reputation(inp_uname, inp_reputation);
    /* SELECT inp_reputation; */
    IF inp_reputation >= 15 THEN
        /*SELECT 1;*/
        INSERT INTO user_input (uname,cid, vname, ctime, tkturl, cover, postedtime)
        VALUES( inp_uname, inp_cid, inp_vname, inp_ctime, inp_tkturl, inp_cover,NOW());
    END IF;
    /*http://stackoverflow.com/questions/6854996/mysql-insert-if-custom-if-statements*/
END//
DELIMITER ;
