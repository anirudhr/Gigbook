/* Query 1 */
/* Display all Jazz Concerts taking place in New York city within the next 7 days*/
SELECT c.cname , c.ctime, c.vname, c.cover, c.tkturl
FROM concert c, rel_band_performs_concert pc,band b, rel_band_plays_genre pg, genre g, venue v
WHERE c.cid = pc.cid 
and pc.bname = b.bname
and b.bname = pg.bname
and pg.gname = g.gname
and c.vname = v.vname
and v.city = "New York"
and g.gname = "Jazz"
and c.ctime <= CURDATE()+ INTERVAL 7 DAY

/* Query 2 */
/* Display all concerts recommended by people they follow in the next month 
 (only considers the next month and not the current month. Eg:If today is November 15th,
  it'll give the concerts of only December)*/
SELECT distinct c.cname
FROM concert c, user u, rel_user_follows_user f, recolist r, rel_recolist_contains_concert cc
WHERE u.uname =  f.follower
and f.followee = r.uname
and r.lname = cc.lname
and cc.cid = c.cid
and u.uname = "Alice"
and MONTH(c.ctime) = MONTH(CURDATE() + INTERVAL 1 MONTH)

/* Query 3 */
/* Display all new concerts since the time they logged in */
SELECT c.cname 
FROM user u, concert c
WHERE c.postedtime >= u.lastlogintime
and u.uname="Alice"


