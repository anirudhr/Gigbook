/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP which returns reputation for a specific username.*/
DELIMITER //
CREATE PROCEDURE sp_user_reputation(IN username VARCHAR(50), OUT reputation FLOAT DEFAULT 0)
BEGIN
    DECLARE repA, repB, repC, repD, repE, repF FLOAT DEFAULT 0;
    DECLARE age, num_review, num_rating, num_reco, num_user_input, num_follower INT DEFAULT 0;
    
    SELECT DATEDIFF(NOW(), user.joindate) INTO age FROM user WHERE user.uname = username;
    IF      age >= 365 THEN SET repA = 4;
    ELSEIF  age >= 180 THEN SET repA = 3;
    ELSEIF  age >=  30 THEN SET repA = 2;
    ELSEIF  age >=   0 THEN SET repA = 1;
    ENDIF;
    
    SELECT COUNT(rel_user_attends_concert.review) INTO num_review FROM rel_user_attends_concert WHERE rel_user_attends_concert.uname = username;
    IF      num_review >= 50 THEN SET repB = 8;
    ELSEIF  num_review >= 10 THEN SET repB = 6;
    ELSEIF  num_review >=  5 THEN SET repB = 4;
    ELSEIF  num_review >   0 THEN SET repB = 2;
    ENDIF;
    
    SELECT COUNT(rel_user_attends_concert.rating) INTO num_rating FROM rel_user_attends_concert WHERE rel_user_attends_concert.uname = username;
    IF      num_rating >= 50 THEN SET repC = 4;
    ELSEIF  num_rating >= 10 THEN SET repC = 3;
    ELSEIF  num_rating >=  5 THEN SET repC = 2;
    ELSEIF  num_rating >   0 THEN SET repC = 1;
    ENDIF;
    
    SELECT COUNT(rel_recolist_contains_concert.cid) INTO num_reco FROM rel_recolist_contains_concert JOIN recolist ON recolist.lname = rel_recolist_contains_concert.lname WHERE recolist.uname = username;
    IF      num_reco >= 50 THEN SET repD = 8;
    ELSEIF  num_reco >= 10 THEN SET repD = 6;
    ELSEIF  num_reco >=  5 THEN SET repD = 4;
    ELSEIF  num_reco >   0 THEN SET repD = 2;
    ENDIF;
    
    SELECT COUNT(user_input.uname) INTO num_user_input FROM rel_user_attends_concert WHERE user_input.uname = username;
    IF      num_user_input >= 50 THEN SET repE = 8;
    ELSEIF  num_user_input >= 10 THEN SET repE = 6;
    ELSEIF  num_user_input >=  5 THEN SET repE = 4;
    ELSEIF  num_user_input >   0 THEN SET repE = 2;
    ENDIF;
    
    SELECT COUNT(rel_user_follows_user.follower) INTO num_follower FROM rel_user_follows_user WHERE rel_user_follows_user.followee = username;
    IF      num_follower >= 50 THEN SET repF = 4;
    ELSEIF  num_follower >= 10 THEN SET repF = 3;
    ELSEIF  num_follower >=  5 THEN SET repF = 2;
    ELSEIF  num_follower >   0 THEN SET repF = 1;
    ENDIF;
    
    SET reputation = SELECT SUM(repA, repB, repC, repD, repE, repF); /*repA + repB + repC + repD + repE + repF;*/
END//
DELIMITER ;
