/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP which returns popularity for a specific band name.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_band_popularity;
CREATE PROCEDURE sp_band_popularity(IN bandname VARCHAR(50), OUT popularity FLOAT )
BEGIN
    DECLARE popA, popB, popC, popD, popE FLOAT DEFAULT 0;
    DECLARE rating, fans, likers, lists, attendees INT DEFAULT 0;
    
    SELECT AVG(rel_user_attends_concert.rating)*4 INTO rating FROM rel_user_attends_concert JOIN rel_band_performs_concert ON rel_user_attends_concert.cid = rel_band_performs_concert.cid WHERE rel_band_performs_concert.bname = bandname;
    
    IF      rating IS NOT NULL THEN SET popA = rating;
    ELSE    SET popA = 0;
    END IF;
    
    SELECT COUNT(rel_user_fan_band.uname) INTO fans FROM rel_user_fan_band WHERE rel_user_fan_band.bname = bandname;
    IF      fans >= 50 THEN SET popB = 20;
    ELSEIF  fans >= 25 THEN SET popB = 15;
    ELSEIF  fans >= 10 THEN SET popB = 10;
    ELSEIF  fans >=  5 THEN SET popB =  5;
    ELSEIF  fans >   0 THEN SET popB =  1;
    END IF;
    
    SELECT COUNT(rel_user_likes_genre.uname) INTO likers FROM rel_user_likes_genre JOIN rel_band_plays_genre ON rel_band_plays_genre.gname = rel_user_likes_genre.gname WHERE rel_band_plays_genre.bname = bandname;
    IF      likers >= 50 THEN SET popC = 20;
    ELSEIF  likers >= 25 THEN SET popC = 15;
    ELSEIF  likers >= 10 THEN SET popC = 10;
    ELSEIF  likers >=  5 THEN SET popC =  5;
    ELSEIF  likers >   0 THEN SET popC =  1;
    END IF;
    
    SELECT COUNT(rel_recolist_contains_concert.cid) INTO lists FROM rel_recolist_contains_concert JOIN rel_band_performs_concert ON rel_band_performs_concert.cid = rel_recolist_contains_concert.cid WHERE rel_band_performs_concert.bname = bandname;
    IF      lists >= 50 THEN SET popD = 20;
    ELSEIF  lists >= 25 THEN SET popD = 15;
    ELSEIF  lists >= 10 THEN SET popD = 10;
    ELSEIF  lists >=  5 THEN SET popD =  5;
    ELSEIF  lists >   0 THEN SET popD =  1;
    END IF;
    
    SELECT COUNT(rel_user_attends_concert.uname) INTO attendees FROM rel_user_attends_concert JOIN rel_band_performs_concert ON rel_user_attends_concert.cid = rel_band_performs_concert.cid WHERE rel_band_performs_concert.bname = bandname;
    IF      attendees >= 50 THEN SET popE = 20;
    ELSEIF  attendees >= 25 THEN SET popE = 15;
    ELSEIF  attendees >= 10 THEN SET popE = 10;
    ELSEIF  attendees >=  5 THEN SET popE =  5;
    ELSEIF  attendees >   0 THEN SET popE =  1;
    END IF;
    
    SET popularity = popA + popB + popC + popD + popE;
    /*SELECT popularity;*/
    
END//
DELIMITER ;
