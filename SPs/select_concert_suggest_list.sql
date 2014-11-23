/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to select a (future only) concert in which a random band the user likes is playing, which the user is not already attending.*/
USE gigbook_schema;
DELIMITER //
DROP PROCEDURE IF EXISTS sp_concert_suggest_list;
CREATE PROCEDURE sp_concert_suggest_list(IN inp_uname VARCHAR(50), OUT out_cid INT)
BEGIN
    /*DECLARE inp_bname VARCHAR(50);*/
    SELECT rel_user_fan_band.bname INTO @inp_bname FROM rel_user_fan_band
    WHERE rel_user_fan_band.uname = inp_uname
    ORDER BY RAND() LIMIT 1;
    
    SELECT concert.cid INTO out_cid FROM concert, rel_band_performs_concert r
    WHERE DATEDIFF(concert.ctime, NOW()) >= 0
    AND r.bname = @inp_bname
    AND r.cid = concert.cid
    AND concert.cid NOT IN  (
                        SELECT rel_user_attends_concert.cid FROM rel_user_attends_concert
                        WHERE rel_user_attends_concert.uname = inp_uname
                    );
    SELECT inp_uname, out_cid; /*This line is for testing only*/
END//
DELIMITER ;
