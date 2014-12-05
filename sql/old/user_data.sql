/* User Data: */
/* NOTE: All these values that are used are sample values. PHP Prepared statements will be used to accept these values */
/* To sign up: */

USE gigbook_schema;

INSERT INTO `user` (`uname`, `lastname`, `firstname`, `city`, `birthdate`, `email`,`joindate`) VALUES
('EarlSimmons', 'Simmons', 'Earl', 'Jamaica', '1994-03-03', 'earlsimms@gmail.com',NOW());

/*To edit their profiles ( user is allowed to change lastname, firstname, city, birthdate, email )*/
UPDATE user
SET city="Brooklyn", email = "earlsimms@yahoo.com"
WHERE uname = "Earl";

/* To follow another user: */
INSERT INTO rel_user_follows_user(follower, followee) VALUES('Alice','Bob');

/* To become a fan of a band */
INSERT INTO rel_user_fan_band( uname, bname, fdate) VALUES ('Alice', 'Linkin Park', now());

/*To post a review and rating*/
INSERT INTO rel_user_attends_concert(uname, cid, review, rating) VALUES ('Alice' ,1, "Awesome!! Linking park is 
simply mind-blowing", 4);




