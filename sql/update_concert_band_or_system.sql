/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to insert concert information as a user, if the user's reputation is above a value.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_update_concert_band_or_system;
CREATE PROCEDURE sp_update_concert_band_or_system(IN inp_cid INT, IN inp_cname VARCHAR(50),IN inp_vname VARCHAR(50), IN inp_ctime CHAR(16), IN inp_tkturl VARCHAR(64), IN inp_cover DECIMAL) /*if inp_cname or inp_tkturl are NULL, they will be inserted as NULL values*/
BEGIN
    IF inp_cname IS NOT NULL THEN  
        SELECT inp_cname;
        UPDATE concert
        SET cname = inp_cname, postedtime = NOW()
        WHERE cid = inp_cid;
    END IF;
    
    IF inp_vname IS NOT NULL THEN  
        UPDATE concert
        SET vname = inp_vname, postedtime = NOW()
        WHERE cid = inp_cid;
    END IF;
    
    IF inp_ctime IS NOT NULL THEN  
        UPDATE concert
        SET ctime = inp_ctime, postedtime = NOW()   
        WHERE cid = inp_cid;
    END IF;
    
    IF inp_tkturl IS NOT NULL THEN  
        UPDATE concert
        SET tkturl = inp_tkturl, postedtime = NOW()   
        WHERE cid = inp_cid;
    END IF;
    
    IF inp_cover IS NOT NULL THEN  
        UPDATE concert
        SET cover = inp_cover, postedtime = NOW()   
        WHERE cid = inp_cid;
    END IF;

END//
DELIMITER ;
