/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to  create a list of recommended concerts as a user and update the user's reputation.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_create_recolist;
CREATE PROCEDURE sp_create_recolist(IN inp_lname VARCHAR(50), inp_uname VARCHAR(50), IN inp_gname VARCHAR(50))
BEGIN
    INSERT INTO recolist (lname, uname, gname) VALUES (inp_lname, inp_uname, inp_gname);
END//
DELIMITER ;
