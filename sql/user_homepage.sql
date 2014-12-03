/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*Query to select info about 3 earliest upcoming concerts that user is attending.*/
USE gigbook_schema;
SELECT concert.cid, concert.cname, rel_band_performs_concert.bname
FROM rel_user_attends_concert
JOIN concert ON rel_user_attends_concert.cid = concert.cid
JOIN rel_band_performs_concert ON rel_band_performs_concert.cid = rel_user_attends_concert.cid
WHERE rel_user_attends_concert.uname = ?
AND concert.ctime > NOW()
ORDER BY concert.ctime ASC
LIMIT 3;

/*Query to select info about 3 random bands that user is a fan of.*/
USE gigbook_schema;
SELECT bname FROM rel_user_fan_band
WHERE uname = ?
ORDER BY RAND()
LIMIT 3;
