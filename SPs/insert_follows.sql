/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to  create a list of recommended concerts as a user and update the user's reputation.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_insert_follows;
CREATE PROCEDURE sp_insert_follows(IN inp_follower VARCHAR(50), inp_followee VARCHAR(50))
BEGIN
    INSERT INTO rel_user_follows_user(follower, followee) VALUES(inp_follower, inp_followee);
END//
DELIMITER ;
