/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to  create a list of recommended concerts as a user and update the user's reputation.*/
DELIMITER //
CREATE PROCEDURE sp_insert_reco_concert(IN inp_bname VARCHAR(20), IN inp_cname VARCHAR(20), IN inp_vname VARCHAR(20), IN inp_ctime CHAR(16), IN inp_tkturl VARCHAR(64), IN inp_cover DECIMAL) /*if inp_cname or inp_tkturl are NULL, they will be inserted as NULL values*/
BEGIN
    
END//
DELIMITER ;
