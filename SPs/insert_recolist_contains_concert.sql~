/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to  create a list of recommended concerts as a user (and update the user's reputation?).*/
DELIMITER //
DROP PROCEDURE IF EXISTS sp_recolist_contains_concert;
CREATE PROCEDURE sp_recolist_contains_concert(IN inp_lname VARCHAR(20), IN inp_cid INT) /*if inp_cname or inp_tkturl are NULL, they will be inserted as NULL values*/
BEGIN
    INSERT INTO rel_recolist_contains_concert (lname, cid) VALUES (inp_lname, inp_cid); 
END//
DELIMITER ;
