/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to set user to be a fan of a particular band */
USE gigbook_schema;

DELIMITER //
DROP PROCEDURE IF EXISTS sp_fan_of;
CREATE PROCEDURE sp_fan_of(IN inp_uname VARCHAR(50), IN inp_bname VARCHAR(50), IN inp_fdate CHAR(10))
BEGIN
    INSERT INTO rel_user_fan_band (uname,bname,fdate)
    VALUES (inp_uname, inp_bname, inp_fdate);
END//
DELIMITER ;
