--
-- Database: `gigbook_schema`
--

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`bname`, `bio`) VALUES
('Jethro Tull', 'Jethro Tull were a British rock group, formed in Luton, Bedfordshire, in December 1967. Initially playing blues rock, the band''s sound soon incorporated elements of British folk music and hard rock to forge a progressive rock signature.'),
('Kenny G', 'Kenneth Bruce Gorelick (born June 5, 1956), better known by his stage name Kenny G, is an American adult contemporary and smooth jazz saxophonist. His fourth album, Duotones, brought him breakthrough success in 1986.'),
('Linkin Park', 'Linkin Park is an American rock band from Agoura Hills, California. Formed in 1996, the band rose to international fame with their debut album Hybrid Theory, which was certified Diamond by the RIAA in 2005 and multi-platinum in several other countries.Their following studio album Meteora continued the band''s success, topping the Billboard 200 album chart in 2003, and was followed by extensive touring and charity work around the world.In 2003, MTV2 named Linkin Park the sixth-greatest band of the music video era and the third-best of the new millennium.'),
('Megadeth', 'Megadeth is an American thrash metal band from Los Angeles, California. The group was formed in 1983 by guitarist Dave Mustaine and bassist David Ellefson, shortly after Mustaine''s dismissal from Metallica.'),
('Metallica', 'Metallica has released nine studio albums, four live albums, five extended plays, 26 music videos, and 37 singles. The band has won nine Grammy Awards and five of its albums have consecutively debuted at number one on the Billboard 200. '),
('Ray Charles', 'Ray Charles Robinson (September 23, 1930 – June 10, 2004) was an American singer-songwriter, musician and composer known as Ray Charles and sometimes referred to as "The Genius". He was a pioneer in the genre of soul music during the 1950s by fusing rhythm and blues, gospel, and blues styles into early performances recorded by Atlantic Records.');

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`cid`, `cname`, `vname`, `ctime`, `tkturl`, `cover`) VALUES
(1, 'Jazz Fest', 'Rockwood music hall', '2014-12-12 10:30', 'www.rockwoodmusichall.com/', '30'),
(2, 'Carnival of Rock', 'Madison Square ', '2014-11-15 19:45', 'www.thegarden.com', '55'),
(3, 'Metallica Concert', 'Terminal 5', '2014-12-12 18:00', 'www.terminal5nyc.com', '60');

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`gname`, `gparent`) VALUES
('Country', NULL),
('Hip Hop', NULL),
('Jazz', NULL),
('Rock', NULL),
('Acid Jazz', 'Jazz'),
('Bebob', 'Jazz'),
('Free Jazz', 'Jazz'),
('Blues', 'Rock'),
('Progressive Rock', 'Rock'),
('Punk rock', 'Rock'),
('Thrash Metal', 'Rock');

--
-- Dumping data for table `rel_band_performs_concert`
--

INSERT INTO `rel_band_performs_concert` (`bname`, `cid`) VALUES
('Metallica', 3),
('Linkin Park', 2),
('Kenny G', 1);

--
-- Dumping data for table `rel_band_plays_genre`
--

INSERT INTO `rel_band_plays_genre` (`bname`, `gname`) VALUES
('Jethro Tull', 'Progressive Rock'),
('Kenny G', 'Jazz'),
('Megadeth', 'Thrash Metal'),
('Metallica', 'Thrash Metal'),
('Linkin Park', 'Rock'),
('Ray Charles', 'Jazz');

--
-- Dumping data for table `rel_user_attends_concert`
--

INSERT INTO `rel_user_attends_concert` (`uname`, `cid`, `review`, `rating`) VALUES
('Alice', 2, 'Awesome!! Linking park is \r\nsimply mind-blowing', 4),
('Bob', 2, NULL, 4),
('Charlie', 2, NULL, 3),
('Dean', 3, 'Metallica Rocks!!', 4),
('Earl', 3, NULL, 3);

--
-- Dumping data for table `rel_user_fan_band`
--

INSERT INTO `rel_user_fan_band` (`uname`, `bname`, `fdate`) VALUES
('Alice', 'Linkin Park', '2014-11-15'),
('Bob', 'Linkin Park', '2012-12-12'),
('Charlie', 'Kenny G', '2013-01-05'),
('Dean', 'Metallica', '2013-01-01');

--
-- Dumping data for table `rel_user_follows_user`
--

INSERT INTO `rel_user_follows_user` (`follower`, `followee`) VALUES
('Alice', 'Bob'),
('Dean', 'Earl');

--
-- Dumping data for table `rel_user_likes_genre`
--

INSERT INTO `rel_user_likes_genre` (`uname`, `gname`) VALUES
('Alice', 'Rock'),
('Bob', 'Rock'),
('Dean', 'Thrash Metal'),
('Earl', 'Thrash Metal'),
('Charlie', 'Jazz');

--
-- Dumping data for table `rel_user_recos_concert`
--

INSERT INTO `rel_user_recos_concert` (`uname`, `cid`) VALUES
('Bob', 2),
('Charlie', 1),
('Earl', 3);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `lastname`, `firstname`, `city`, `birthdate`, `email`, `joindate`, `reputation`) VALUES
('Alice', 'Adams', 'Alice', 'Brooklyn', '1991-02-11', 'aliceadams@gmail.com', '2010-12-02', 0),
('Bob', 'Dcruz', 'Bob', 'Queens', '1989-02-14', 'bob123@gmail.com', '2011-02-11', 0),
('Charlie', 'Dsouza', 'Charlie', 'Astoria', '1986-10-08', 'charliedsouza@gmail.com', '2011-05-05', 0),
('Dean', 'Martis', 'Dean', 'Manhattan', '1988-07-01', 'deimos@gmail.com', '2012-11-11', 0),
('Earl', 'Simmons', 'Earl', 'Brooklyn', '1994-03-03', 'earlsimms@yahoo.com', '2014-11-15', 0);

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`vname`, `building`, `street`, `city`, `state`, `zip`, `capacity`, `url`) VALUES
('Lincoln Hall', '2424', 'N Lincoln Avenue', 'Chicago', 'IL', '60614', 8000, 'www.lincolnhallchicago.com'),
('Madison Square', '4', 'Pennsylvania Plaza', 'New York', 'NY', '10001', 18200, 'www.thegarden.com/'),
('Rockwood music hall', '196', 'Allen Street', 'New York', 'NY', '10002', 5500, 'www.rockwoodmusichall.com/'),
('Terminal 5', '610', 'W 56th Street', 'New York', 'NY', '10019', 7000, 'www.terminal5nyc.com');
