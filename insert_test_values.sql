USE gigbook_schema;

INSERT INTO `genre` (`gname`, `gparent`) VALUES
('Blues', NULL),
('Hip Hop', NULL),
('Jazz', NULL),
('Rock', NULL),
('Acid Jazz', 'Jazz'),
('Bebob', 'Jazz'),
('Free Jazz', 'Jazz'),
('Punk rock', 'Rock');

INSERT INTO `user` (`uname`, `lastname`, `firstname`, `city`, `birthdate`, `email`,`joindate`, `reputation`) VALUES
('Alice', 'Adams', 'Alice', 'Brooklyn', '1991-02-11', 'aliceadams@gmail.com','2010-12-02',0),
('Bob', 'Dcruz', 'Bob', 'Queens', '1989-02-14', 'bob123@gmail.com','2011-02-11',0),
('Charlie', 'Dsouza', 'Charlie', 'Astoria', '1986-10-08', 'charliedsouza@gmail.com','2011-05-05',0),
('Dean', 'Martis', 'Dean', 'Manhattan', '1988-07-01', 'deimos@gmail.com','2012-11-11',0);

INSERT INTO `venue` (`vname`, `building`, `street`, `city`, `state`, `zip`, `capacity`, `url`) VALUES 
('Madison Square', '4', 'Pennsylvania Plaza', 'New York', 'NY', '10001', '18200', 'www.thegarden.com/'),
 ('Rockwood music hall', '196', 'Allen Street', 'New York', 'NY', '10002', '5500', 'www.rockwoodmusichall.com/');
 
INSERT INTO `band` (`bname`, `bio`) VALUES 
('Ray Charles', 'Ray Charles Robinson (September 23, 1930 – June 10, 2004) was an American singer-songwriter, musician and composer known as Ray Charles and sometimes referred to as "The Genius". He was a pioneer in the genre of soul music during the 1950s by fusing rhythm and blues, gospel, and blues styles into early performances recorded by Atlantic Records.'), ('Linkin Park', 'Linkin Park is an American rock band from Agoura Hills, California. Formed in 1996, the band rose to international fame with their debut album Hybrid Theory, which was certified Diamond by the RIAA in 2005 and multi-platinum in several other countries.Their following studio album Meteora continued the band''s success, topping the Billboard 200 album chart in 2003, and was followed by extensive touring and charity work around the world.In 2003, MTV2 named Linkin Park the sixth-greatest band of the music video era and the third-best of the new millennium.');

