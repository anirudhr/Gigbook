
--
-- Database: `gigbook_schema`
--
USE gigbook_schema;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `lastname`, `firstname`, `password`, `lastlogintime`, `city`, `birthdate`, `email`, `joindate`) VALUES
('Alice', 'Adams', 'Alice', 'alice123', '2014-11-22 11:30', 'Brooklyn', '1991-02-11', 'aliceadams@gmail.com', '2002-12-02'),
('Bob', 'Dcruz', 'Bob', 'bob123', '2014-07-11 11:30', 'Queens', '1989-02-14', 'bob123@gmail.com', '2002-02-11'),
('Charlie', 'Dsouza', 'Charlie', 'charlie123', '2014-06-11 11:30', 'Astoria', '1986-10-08', 'charliedsouza@gmail.com', '2011-05-05'),
('Dean', 'Martis', 'Dean', 'dean123', '2014-11-15 09:30', 'Manhattan', '1988-07-01', 'deimos@gmail.com', '2012-11-11'),
('Earl', 'Simmons', 'Earl', 'earl123', '2014-11-19 10:30', 'Brooklyn', '1994-03-03', 'earlsimms@yahoo.com', '2014-11-15'),
('Travis','Guidry','Travis','trav123','2014-11-23 10:45','Brooklyn','1986-12-15','travisg@yahoo.com','2014-01-02');
--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`vname`, `building`, `street`, `city`, `state`, `zip`, `capacity`, `url`) VALUES
('Lincoln Hall', '2424', 'N Lincoln Avenue', 'Chicago', 'IL', '60614', 8000, 'www.lincolnhallchicago.com'),
('Madison Square', '4', 'Pennsylvania Plaza', 'New York', 'NY', '10001', 18200, 'www.thegarden.com/'),
('Rockwood music hall', '196', 'Allen Street', 'New York', 'NY', '10002', 5500, 'www.rockwoodmusichall.com/'),
('Terminal 5', '610', 'W 56th Street', 'New York', 'NY', '10019', 7000, 'www.terminal5nyc.com');
--
-- Dumping data for table `band`
--

INSERT INTO `band` (`bname`, `bio`) VALUES
('Jethro Tull', 'Jethro Tull were a British rock group, formed in Luton, Bedfordshire, in December 1967. Initially playing blues rock, the band''s sound soon incorporated elements of British folk music and hard rock to forge a progressive rock signature.'),
('Kenny G', 'Kenneth Bruce Gorelick (born June 5, 1956), better known by his stage name Kenny G, is an American adult contemporary and smooth jazz saxophonist. His fourth album, Duotones, brought him breakthrough success in 1986.'),
('Linkin Park', 'Linkin Park is an American rock band from Agoura Hills, California. Formed in 1996, the band rose to international fame with their debut album Hybrid Theory, which was certified Diamond by the RIAA in 2005 and multi-platinum in several other countries.Their following studio album Meteora continued the band''s success, topping the Billboard 200 album chart in 2003, and was followed by extensive touring and charity work around the world.In 2003, MTV2 named Linkin Park the sixth-greatest band of the music video era and the third-best of the new millennium.'),
('Megadeth', 'Megadeth is an American thrash metal band from Los Angeles, California. The group was formed in 1983 by guitarist Dave Mustaine and bassist David Ellefson, shortly after Mustaine''s dismissal from Metallica.'),
('Metallica', 'Metallica has released nine studio albums, four live albums, five extended plays, 26 music videos, and 37 singles. The band has won nine Grammy Awards and five of its albums have consecutively debuted at number one on the Billboard 200. '),
('Ray Charles', 'Ray Charles Robinson was an American singer-songwriter, musician and composer known as Ray Charles and sometimes referred to as "The Genius". He was a pioneer in the genre of soul music during the 1950s by fusing rhythm and blues, gospel, and blues styles into early performances recorded by Atlantic Records.'),
('Fear', 'Fear Began at the dawning of the punk in 1997 although their style (along with the Circle Jerks and Black Flag) helped to define LA style hardcore. Led by Lee Ving''s destinctive vocals, and their fast agressive music, Fear are remembered as some of the founding fathers of hardcore punk.'), 
('Adolescents', 'One of Southern California''s best-loved hardcore bands, the Adolescents helped establish the blueprint for Orange County punk, along with Agent Orange and Social Distortion. Although their music was the most standard-issue of the three, the Adolescents'' blazing energy and quintessential teenage snottiness gave them an instant connection with their audience, and defied their upbringing in California''s bastion of staid conservatism.'),
('Eric Clapton', ' Eric Clapton is one of the most revered and influential guitarists of all time. From his early days with the Yardbirds, through John Mayall’s Bluesbreakers, Cream, Blind Faith, Derek And The Dominos and on to his solo career he has had consistent critical and commercial success.“Planes, Trains And Eric” follows Eric Clapton and his band on the Far and Middle Eastern leg of his 2014 World Tour. The film features 13 full length performances from the tour intercut with interviews with Eric Clapton and the band members, rehearsal and soundcheck footage, travel by trains and planes, presentations and “fly on the wall” filming of all the many aspects of being on the road with Eric Clapton.'), 
('The Rolling Stones', 'The Rolling Stones were inducted into the Rock and Roll Hall of Fame in 1989, and the UK Music Hall of Fame in 2004. Rolling Stone magazine ranked them fourth on the "100 Greatest Artists of All Time" list, and their estimated album sales are above 250 million. They have released twenty-nine studio albums, eighteen live albums and numerous compilations. Let It Bleed (1969) was their first of five consecutive number one studio and Live albums in the UK. Sticky Fingers (1971) was the first of eight consecutive number one studio albums in the US. In 2008 the band ranked 10th on the "Billboard Hot 100 All-Time Top Artists" chart. In 2012, the band celebrated their 50th anniversary.'),
('New York Dolls', 'Cross-dressing, drug using, glam punks, the New York Dolls were punk before punk had a name. Formed shortly after the VU explosion, the New York Dolls were pioneers in their own right. Though the band quickly dissolved, everyone who saw them wanted to what they did, they wanted to be punks, they wanted the drugs, they wanted to dress up like women. Member Johnny Thunders went on to form his own band, also legendary'), 
('Intro5pect', 'The band were officially formed in 1997 as a reaction to what was an apparent commercialization of the punk genre. Their first demo was released in 1998 and their first official release came in 1999 when newly founded indie label Geykido Comet Records released the band''s song Education as a limited edition 7" vinyl.'),
('Alkaline Trio', 'Alkaline Trio is a three-member Illinois punk rock band from McHenry, Illinois, formed in 1996. The band consists of Matt Skiba (vocals, guitar), Dan Andriano (vocals, bass), and Derek Grant (drums).'),
('Bankrupt','Bankrupt is a punk rock band from Budapest, Hungary. They are one of the most known Hungarian bands outside Hungary in their genre, having received coverage by UK, US and Canadian online magazines.Since their formation in 1996, the band has released three full-length albums and three CD-EPs. The title song of their most recent release Rewound was played in rotation by Hungarian Radio''s music channel MR2 and the music video of its Hungarian version Retro was played in rotation by MTV Hungary.'),
('A-ha!', 'Who cares');
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
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`cid`, `cname`, `vid`, `ctime`, `postedtime`,`tkturl`, `cover`) VALUES
(1, 'Jazz Fest', '3', '2014-11-27 10:30', '2014-11-20 10:30','www.rockwoodmusichall.com/', '30'),
(2, 'Carnival of Rock', '2', '2014-11-20 19:45','2014-11-17 19:45', 'www.thegarden.com', '55'),
(3, 'Metallica Concert', '4', '2014-12-12 18:00', '2014-12-11 19:45','www.terminal5nyc.com', '60'),
(4, 'Dark side of the moon concert', '4', '2014-12-23 18:00', '2014-12-20 18:00','www.terminal5nyc.com', '60'),
(5, 'Jazz Fest', '3', '2014-11-28 10:30',' 2014-11-25 10:30','www.rockwoodmusichall.com/', '30'),
(6, 'Metallica Concert', '4', '2015-01-12 18:00', '2015-01-10 18:00','www.terminal5nyc.com', '60'),
(7, 'The Rolling Stone Concert', '2', '2014-12-20 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(8, 'Jazz Concert', '3', '2014-12-28 10:30', '2014-12-25 10:30','www.rockwoodmusichall.com/', '30'),
(9, 'Fear US', '2', '2014-12-22 15:45','2014-12-18 19:45', 'www.thegarden.com', '75'),
(10, 'Adolescents Concert', '2', '2014-12-25 20:45','2014-12-18 19:45', 'www.thegarden.com', '43'),
(11, 'New York Dolls Concert', '2', '2014-12-12 19:45','2014-12-18 19:45', 'www.thegarden.com', '23'),
(12, 'Intro5pect Concert', '2', '2014-12-06 19:45','2014-12-18 19:45', 'www.thegarden.com', '66'),
(13, 'Alkaline Trio Concert', '2', '2014-12-01 19:45','2014-12-18 19:45', 'www.thegarden.com', '56'),
(14, 'Bankrupt Concert', '2', '2014-12-30 19:45','2014-12-18 19:45', 'www.thegarden.com', '46'),
(15, 'The Rolling Stone Concert', '2', '2014-12-03 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(16, 'The Rolling Stone Concert', '2', '2015-01-30 19:45','2014-12-18 19:45', 'www.thegarden.com', '80');
--
-- Dumping data for table `recolist`
--

INSERT INTO `recolist` (`lname`, `uname`, `gname`) VALUES
('Bob''s "Rock"in List!', 'Bob', 'Rock'),
('Charlie''s Jazzy List', 'Charlie', 'Jazz'),
('Earl''s List of Thrash metal concerts', 'Earl', 'Thrash Metal');

--
-- Dumping data for table `rel_band_performs_concert`
--

INSERT INTO `rel_band_performs_concert` (`bname`, `cid`) VALUES
('Metallica', 3),
('Linkin Park', 2),
('Kenny G', 1),
('Ray Charles', 5),
('Metallica', 6),
('The Rolling Stones', 7),
('Linkin Park',4);


--
-- Dumping data for table `rel_band_plays_genre`
--

INSERT INTO `rel_band_plays_genre` (`bname`, `gname`) VALUES
('Jethro Tull', 'Progressive Rock'),
('Kenny G', 'Jazz'),
('Megadeth', 'Thrash Metal'),
('Metallica', 'Thrash Metal'),
('Linkin Park', 'Rock'),
('Ray Charles', 'Jazz'),
('Fear','Punk rock'),
('Adolescents','Progressive rock'),
('Alkaline Trio', 'Punk rock'), 
('Intro5pect', 'Punk rock'),
('Eric Clapton', 'Blues'),
( 'New York Dolls', 'Punk rock'),
('Bankrupt', 'Punk rock'),
('The Rolling Stones', 'Rock'),
('A-ha!', 'Rock');

--
-- Dumping data for table `rel_recolist_contains_concert`
--

INSERT INTO `rel_recolist_contains_concert` (`lname`, `cid`) VALUES
('Charlie''s Jazzy List', 1),
('Bob''s "Rock"in List!', 2),
('Bob''s "Rock"in List!', 4),
('Bob''s "Rock"in List!', 9),
('Bob''s "Rock"in List!', 10),
('Bob''s "Rock"in List!', 11),
('Bob''s "Rock"in List!', 12),
('Bob''s "Rock"in List!', 13),
('Bob''s "Rock"in List!', 14),
('Bob''s "Rock"in List!', 15),
('Bob''s "Rock"in List!', 16),
('Earl''s List of Thrash metal concerts', 3);

--
-- Dumping data for table `rel_user_attends_concert`
--

INSERT INTO `rel_user_attends_concert` (`uname`, `cid`, `review`, `rating`) VALUES
('Alice', 2, 'Awesome!! Linking park is \r\nsimply mind-blowing', 4),
('Bob', 2, "Good", 3),
('Bob', 4, "Great!", 5),
('Bob', 9, "Awesome..", 5),
('Bob', 10, "Wasnt so good", 2),
('Bob', 11, "Good", 4),
('Bob', 12, "Enjoyed it!!", 4),
('Bob', 13, "Very nice", 4),
('Bob', 14, "Good", 4),
('Bob', 15, "Rocking!!", 4),
('Bob', 16, "Fantastic!!", 4),
('Charlie', 2, NULL, 3),
('Dean', 3, 'Metallica Rocks!!', 4),
('Earl', 3, NULL, 3);

--
-- Dumping data for table `rel_user_fan_band`
--

INSERT INTO `rel_user_fan_band` (`uname`, `bname`, `fdate`) VALUES
('Alice', 'Linkin Park', '2014-11-15'),
('Alice', 'The Rolling Stones', '2014-11-15'),
('Bob', 'Linkin Park', '2012-12-12'),
('Bob', 'Adolescents', '2012-12-12'),
('Charlie', 'Kenny G', '2013-01-05'),
('Charlie', 'Ray Charles', '2013-01-05'),
('Dean', 'Metallica', '2013-01-01'),
('Earl', 'Metallica', '2012-11-01');

--
-- Dumping data for table `rel_user_follows_user`
--

INSERT INTO `rel_user_follows_user` (`follower`, `followee`) VALUES
('Alice', 'Bob'),
('Dean', 'Earl'),
('Dean', 'Bob'),
('Earl', 'Bob'),
('Travis', 'Bob'),
('Charlie', 'Bob'),
('Alice', 'Charlie');

--
-- Dumping data for table `rel_user_likes_genre`
--

INSERT INTO `rel_user_likes_genre` (`uname`, `gname`) VALUES
('Alice', 'Rock'),
('Bob', 'Rock'),
('Dean', 'Thrash Metal'),
('Earl', 'Thrash Metal'),
('Charlie', 'Jazz');




