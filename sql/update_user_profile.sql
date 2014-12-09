/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to update user's profile*/
USE gigbook_schema;

DELIMITER //
DROP PROCEDURE IF EXISTS sp_update_user_profile;
CREATE PROCEDURE sp_update_user_profile( IN inp_uname VARCHAR(50), inp_lastname VARCHAR(50), IN inp_firstname VARCHAR(50),IN inp_password VARCHAR(64),IN inp_city VARCHAR(50),IN inp_birthdate DATE, IN inp_email VARCHAR(50))
BEGIN
   IF inp_lastname IS NOT NULL THEN
   	UPDATE user
   	SET lastname = inp_lastname, lastlogintime = NOW()
   	WHERE uname = inp_uname;
   END IF;
   
   IF inp_firstname IS NOT NULL THEN
   	UPDATE user
   	SET firstname = inp_firstname, lastlogintime = NOW()
   	WHERE uname = inp_uname;
   END IF;
   
   IF inp_password IS NOT NULL THEN
   	UPDATE user
   	SET password = inp_password, lastlogintime = NOW()
   	WHERE uname = inp_uname;
   END IF;
   
   IF inp_city IS NOT NULL THEN
   	UPDATE user
   	SET city = inp_city, lastlogintime = NOW()
   	WHERE uname = inp_uname;
   END IF;
   
   IF inp_birthdate IS NOT NULL THEN
   	UPDATE user
   	SET birthdate = inp_birthdate, lastlogintime = NOW()
   	WHERE uname = inp_uname;
   END IF;
   
   IF inp_email IS NOT NULL THEN
   	UPDATE user
   	SET email = inp_email, lastlogintime = NOW()
    WHERE uname = inp_uname;
   END IF;
   
   
END//
DELIMITER ;
