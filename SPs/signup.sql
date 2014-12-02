/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to allow user to signup*/
USE gigbook_schema;

DELIMITER //
DROP PROCEDURE IF EXISTS sp_signup;
CREATE PROCEDURE sp_signup(IN inp_uname VARCHAR(50), inp_lastname VARCHAR(50), IN inp_firstname VARCHAR(50), IN inp_password VARCHAR(64),IN inp_lastlogintime DATETIME, IN inp_city VARCHAR(50),IN inp_birthdate DATE, IN inp_email VARCHAR(50),IN inp_joindate DATE)
BEGIN
    INSERT INTO user (uname, lastname, firstname, password, lastlogintime,city, birthdate, email,joindate)
    VALUES (inp_uname, inp_lastname,inp_firstname,inp_password,inp_lastlogintime,inp_city,inp_birthdate,inp_email,inp_joindate);
END//
DELIMITER ;
