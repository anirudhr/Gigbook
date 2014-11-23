/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to insert concert information as a user, if the user's reputation is above a value.*/
DELIMITER //
DROP PROCEDURE IF EXISTS sp_user_input;
CREATE PROCEDURE sp_user_input(IN inp_bname VARCHAR(20), IN inp_cname VARCHAR(20), IN inp_vname VARCHAR(20), IN inp_ctime CHAR(16), IN inp_tkturl VARCHAR(64), IN inp_cover DECIMAL) /*if inp_cname or inp_tkturl are NULL, they will be inserted as NULL values*/
BEGIN
    INSERT INTO user_input (uname, vname, ctime, tkturl, cover)
    SELECT inp_uname, inp_vname, inp_ctime, inp_tkturl, inp_cover
    WHERE (SELECT reputation FROM user WHERE uname = inp_uname) > 18;
    /*http://stackoverflow.com/questions/6854996/mysql-insert-if-custom-if-statements*/
END//
DELIMITER ;
