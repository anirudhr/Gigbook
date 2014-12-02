/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to  post review and ratings*/
USE gigbook_schema;

DELIMITER //
DROP PROCEDURE IF EXISTS sp_review_rating;
CREATE PROCEDURE sp_review_rating(IN inp_uname VARCHAR(50), IN inp_cid INT, IN inp_review VARCHAR(64), IN inp_rating FLOAT)
BEGIN
    INSERT INTO rel_user_attends_concert(uname,cid,review,rating)
    VALUES (inp_uname, inp_cid, inp_review, inp_rating);
END//
DELIMITER ;
