/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to let a user follow another user.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_insert_follows;
CREATE PROCEDURE sp_insert_follows(IN inp_follower VARCHAR(50), inp_followee VARCHAR(50))
BEGIN
    INSERT INTO rel_user_follows_user(follower, followee) VALUES(inp_follower, inp_followee);
END//
DELIMITER ;
