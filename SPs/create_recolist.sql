/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to  create a list of recommended concerts as a user and update the user's reputation.*/
DELIMITER //
CREATE PROCEDURE sp_create_recolist(IN inp_lname VARCHAR(20), inp_uname VARCHAR(20), IN inp_gname VARCHAR(20))
BEGIN
    INSERT INTO recolist (lname, uname, gname) VALUES (inp_lname, inp_uname, inp_gname);
END//
DELIMITER ;