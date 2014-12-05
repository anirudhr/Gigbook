/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*MySQL does not support check constraints, so this will be done in the front-end before insertion.*/

CREATE DATABASE IF NOT EXISTS gigbook_schema;
USE gigbook_schema;
DROP TABLE IF EXISTS user_input;
DROP TABLE IF EXISTS rel_band_plays_genre;
DROP TABLE IF EXISTS rel_user_likes_genre;
DROP TABLE IF EXISTS rel_user_follows_user;
DROP TABLE IF EXISTS rel_user_posts_concertimages;
DROP TABLE IF EXISTS rel_user_attends_concert;
DROP TABLE IF EXISTS rel_user_fan_band;
DROP TABLE IF EXISTS user_posts;
DROP TABLE IF EXISTS concert_images;
DROP TABLE IF EXISTS band_links;
DROP TABLE IF EXISTS rel_band_performs_concert;
DROP TABLE IF EXISTS rel_recolist_contains_concert;
DROP TABLE IF EXISTS recolist;
DROP TABLE IF EXISTS concert;
DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS band;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS genre;
DROP VIEW IF EXISTS user_reputation;
DROP VIEW IF EXISTS band_popularity;
CREATE TABLE user (     uname VARCHAR(50),
                        bio TEXT NOT NULL,
                        lastname VARCHAR(50) NOT NULL,
                        firstname VARCHAR(50) NOT NULL,
                        password VARCHAR(64) NOT NULL,
                        lastlogintime DATETIME NULL,
                        city VARCHAR(50) NOT NULL,
                        birthdate DATE NOT NULL,
                        email VARCHAR(50) NOT NULL,
                        joindate DATE NOT NULL,
                        PRIMARY KEY (uname),
                        UNIQUE (email)
                    );
INSERT INTO `user` (`uname`, `lastname`, `firstname`, `password`, `lastlogintime`, `city`, `birthdate`, `email`, `joindate`) VALUES
('Alice', 'Adams', 'Alice', 'alice123', '2014-11-22 11:30', 'Brooklyn', '1991-02-11', 'aliceadams@gmail.com', '2002-12-02'),
('Bob', 'Dcruz', 'Bob', 'bob123', '2014-07-11 11:30', 'Queens', '1989-02-14', 'bob123@gmail.com', '2002-02-11'),
('Charlie', 'Dsouza', 'Charlie', 'charlie123', '2014-06-11 11:30', 'Astoria', '1986-10-08', 'charliedsouza@gmail.com', '2011-05-05'),
('Dean', 'Martis', 'Dean', 'dean123', '2014-11-15 09:30', 'Manhattan', '1988-07-01', 'deimos@gmail.com', '2012-11-11'),
('Earl', 'Simmons', 'Earl', 'earl123', '2014-11-19 10:30', 'Brooklyn', '1994-03-03', 'earlsimms@yahoo.com', '2014-11-15'),
('Travis','Guidry','Travis','trav123','2014-11-23 10:45','Brooklyn','1986-12-15','travisg@yahoo.com','2014-01-02');

CREATE TABLE band   (   bname VARCHAR(50),
                        bio TEXT NOT NULL,
                        /*profilepic_uri VARCHAR(200) NOT NULL,*/
                        /*popularity FLOAT NOT NULL DEFAULT 0,*/
                        PRIMARY KEY (bname)
                    );
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

CREATE TABLE venue  (   vid INT AUTO_INCREMENT,
                        vname VARCHAR(50),
                        building VARCHAR(5) NOT NULL, street VARCHAR(50) NOT NULL,
                        city VARCHAR(50) NOT NULL, state char(2) NOT NULL, zip CHAR(5) NOT NULL,
                        capacity int,
                        url varchar(64) NULL,
                        PRIMARY KEY (vid),
                        UNIQUE (vname, city),
                        UNIQUE (building, street, city, state, zip)
                    );
INSERT INTO `venue` (`vid`, `vname`, `building`, `street`, `city`, `state`, `zip`, `capacity`, `url`) VALUES
(1, 'Lincoln Hall', '2424', 'N Lincoln Avenue', 'Chicago', 'IL', '60614', 8000, 'www.lincolnhallchicago.com'),
(2, 'Madison Square', '4', 'Pennsylvania Plaza', 'New York', 'NY', '10001', 18200, 'www.thegarden.com/'),
(3, 'Rockwood music hall', '196', 'Allen Street', 'New York', 'NY', '10002', 5500, 'www.rockwoodmusichall.com/'),
(4, 'Terminal 5', '610', 'W 56th Street', 'New York', 'NY', '10019', 7000, 'www.terminal5nyc.com'),
(5, 'Yellow Serenity', 45, 'Rap Street', 'Jersey City', 'NJ', '01005', 5000, 'www.beatleslove.com'),
(6, 'Rassmussen', 23, 'Elm Street', 'Brooklyn', 'NY', '11201', 10000, 'raspberry.me'),
(7, 'Venue Zero', 22, 'Acacia Ave', 'LIC', 'NY', '11356', 200, 'www.zero.num'),
(8, 'Carrotnegie Hall', 10, 'Downing Street', 'London', 'MD', '23996', 25, 'www.carrots.org'),
(9, 'Dale Valley Music Paradise', 2, 'Paradise Street', 'Sacramento', 'CA', '92004', 50000, 'dalevalley.com'),
(10, 'Rivendell', 45, 'Last Ave', 'Middle Earth', 'Tolkienstate', '65432', 9999, 'goggle.com')
;

CREATE TABLE concert    (   cid INT AUTO_INCREMENT,
                            cname VARCHAR(50) NULL,
                            vid INT NOT NULL,
                            ctime CHAR(16) NOT NULL,  /*16 = sizeof('yyyy-mm-dd hh:mm')*/
                            postedtime CHAR(16) NOT NULL,
                            tkturl varchar(64) NULL,
                            cover DECIMAL NOT NULL,
                            PRIMARY KEY (cid),
                            UNIQUE (vid, ctime),
                            FOREIGN KEY (vid) REFERENCES venue(vid)
                        );
INSERT INTO `concert` (`cid`, `cname`, `vid`, `ctime`, `postedtime`,`tkturl`, `cover`) VALUES
(1, 'Jazz Fest', 3, '2014-11-27 10:30', '2014-11-20 10:30','www.rockwoodmusichall.com/', '30'),
(2, 'Carnival of Rock', 2, '2014-11-20 19:45','2014-11-17 19:45', 'www.thegarden.com', '55'),
(3, 'Metallication', 5, '2014-12-12 18:00', '2014-12-11 19:45','www.terminal5nyc.com', '60'),
(4, 'Hybrid Theorizings', 4, '2014-12-23 18:00', '2014-12-20 18:00','www.terminal5nyc.com', '60'),
(5, 'Sing Them Songs', 7, '2014-11-28 10:30',' 2014-11-25 10:30','www.rockwoodmusichall.com/', '30'),
(6, 'Metallica Live From Hell', 4, '2015-01-12 18:00', '2015-01-10 18:00','www.terminal5nyc.com', '60'),
(7, 'Can I Get One Satisfaction', 2, '2014-12-20 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(8, 'Flute Concert', 1, '2014-12-28 10:30', '2014-12-25 10:30','www.rockwoodmusichall.com/', '30'),
(9, 'Fear US', 10, '2014-12-22 15:45','2014-12-18 19:45', 'www.thegarden.com', '75'),
(10, 'Adolescents Never Grow Up', 8, '2014-12-25 20:45','2014-12-18 19:45', 'www.thegarden.com', '43'),
(11, 'New York Dolls Live In New Jersey', 9, '2014-12-12 19:45','2014-12-18 19:45', 'www.thegarden.com', '23'),
(12, 'Reintro5pection', 5, '2014-12-06 19:45','2014-12-18 19:45', 'www.thegarden.com', '66'),
(13, 'Alkaline Trilogy', 2, '2014-12-01 19:45','2014-12-18 19:45', 'www.thegarden.com', '56'),
(14, 'Bankrupt And Insolvent', 7, '2014-12-30 19:45','2014-12-18 19:45', 'www.thegarden.com', '46'),
(15, 'Gathering No Moss', 3, '2014-12-03 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(16, 'Take On Me Everywhere', 7, '2015-01-30 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(17, 'Got Me On My Peas Layla', 2, '2015-09-03 18:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(18, 'Megadedly', 10, '2014-12-25 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(19, 'Nanodeth', 8, '2014-10-30 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(20, 'Claptonite', 2, '2014-11-11 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(21, 'Fear Of The Park', 4, '2014-11-02 19:45','2014-12-18 19:45', 'www.thegarden.com', '80'),
(22, 'Contra5pecting', 6, '2014-11-01 12:45','2014-02-18 19:45', 'www.thegarden.com', '80'),
(23, 'Inter5pectination', 7, '2014-11-01 22:30','2014-08-07 19:45', 'www.thegarden.com', '80'),
(24, 'Saxy Music', 8, '2014-11-01 19:45','2014-11-19 19:45', 'www.thegarden.com', '80'),
(25, 'Sax Lord Kenny', 10, '2014-11-03 19:45','2014-12-12 19:45', 'www.thegarden.com', '80'),
(26, 'New York Goo Goo', 1, '2014-11-21 15:00','2014-07-04 19:45', 'www.thegarden.com', '80'),
(27, 'Ray Charles Live', 3, '2014-11-05 19:45','2014-06-18 19:45', 'www.thegarden.com', '80'),
(28, 'Ray Charles Lively', 5, '2014-12-02 19:45','2014-10-21 19:45', 'www.thegarden.com', '80'),
(29, 'Ahamatic Forever', 1, '2014-11-01 19:45','2014-12-25 19:45', 'www.thegarden.com', '80'),
(30, 'Hunting High And Higher', 2, '2014-11-01 19:45','2014-09-25 19:45', 'www.thegarden.com', '80'),
(31, 'Bank Problems', 3, '2014-11-01 19:45','2014-12-31 19:45', 'www.thegarden.com', '80'),
(32, 'Goldman Sax', 4, '2014-11-01 19:45','2014-11-30 19:45', 'www.thegarden.com', '80'),
(33, 'Reanimation Tour', 5, '2014-12-16 19:45','2015-01-01 19:45', 'www.thegarden.com', '80'),
(34, 'Mustaine Forever', 6, '2014-11-14 19:45','2014-05-18 19:45', 'www.thegarden.com', '80'),
(35, 'Death Marginal', 10, '2014-08-15 19:45','2014-11-27 19:45', 'www.thegarden.com', '80')
;

CREATE TABLE genre    (     gname VARCHAR(50),
                            gparent VARCHAR(50) NULL,
                            /*genrepic_uri VARCHAR(200) NOT NULL,*/
                            PRIMARY KEY (gname),
                            FOREIGN KEY (gparent) REFERENCES genre(gname)
                        );
INSERT INTO `genre` (`gname`, `gparent`) VALUES
('Country', NULL),
('Hip Hop', NULL),
('Jazz', NULL),
('Metal', NULL),
('Rock', NULL),
('Acid Jazz', 'Jazz'),
('Bebop', 'Jazz'),
('Free Jazz', 'Jazz'),
('Blues', 'Jazz'),
('Progressive Rock', 'Rock'),
('Punk rock', 'Rock'),
('Thrash Metal', 'Metal'),
('Flutesnoot', 'Country'),
('Life Metal', 'Metal');

CREATE TABLE rel_band_plays_genre   (   bname VARCHAR(50) NOT NULL,
                                        gname VARCHAR(50) NOT NULL,
                                        FOREIGN KEY (bname) REFERENCES band(bname),
                                        FOREIGN KEY (gname) REFERENCES genre(gname)
                                    );

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

CREATE TABLE band_links (   linkid INT AUTO_INCREMENT,
                            bname VARCHAR(50) NOT NULL,
                            linkurl VARCHAR(50) NOT NULL,
                            linkinfo TEXT NULL,
                            postedtime CHAR(16) NOT NULL,
                            PRIMARY KEY(linkid),
                            FOREIGN KEY (bname) REFERENCES band(bname)
                        );
INSERT INTO `band_links` (`linkid`, `bname`, `linkurl`, `linkinfo`, `postedtime`) VALUES
(1,'Jethro Tull', 'twitter.com/@jethrotull/110558', 'Hey guys, check out the details of our next gig!', '2014-12-04 14:31'),
(2,'Kenny G', 'facebook.com/thekennyg/posts/17883430037', 'Check out this Vine of me playing my saxy sax you hoots', '2014-12-04 14:31'),
(3,'Fear', 'snapchart.com/fear/234', 'Fear us! Fear us so hard!', '2014-12-04 14:31'),
(4,'Megadeth', 'megadeth.com', 'HEY YOU GUYS WE HAVE THIS THING CALLED A WEBSITE NOW CHECK IT OUT', '2014-12-04 14:31'),
(5,'Adolescents', 'myspace.com/adolescents', 'Listen to our music for free, we are that desperate now', '2014-12-04 14:31'),
(6,'Metallica', 'metallica.com/news/123', 'We still hate music downloads, you know', '2014-12-04 14:31'),
(7,'Linkin Park', 'linkinpark.com', 'We are musicians too, take us seriously, this is our website', '2014-12-04 14:31'),
(8,'Metallica', 'metallica.com/news/456', 'Yep, we still make music', '2014-12-04 14:31'),
(9,'New York Dolls', 'newyorkdolls.com', 'We love Build-A-Bear!', '2014-12-04 14:31'),
(10,'Linkin Park', 'bandcamp.com/linkinpark', 'New concert news! We are proving that we are really real musicians', '2014-12-04 14:31'),
(11,'Ray Charles', 'raycharles.com', 'I have a website now', '2014-12-04 14:31'),
(12,'Jethro Tull', 'twitter.com/@jethrotull/225424', 'Guys, please, someone buy our tickets, we need to make next month rent!', '2014-12-04 14:31'),
(13,'Alkaline Trio', 'facebook.com/alkalinetrio', 'Like us on Facebook, love us in life', '2014-12-04 14:31'),
(14,'Intro5pect', 'snapchat.com', 'Snap snap! Figure out our secret snapchat profile', '2014-12-04 14:31'),
(15,'Eric Clapton', 'slowhand.com/concerts/upcoming', 'Check out all my upcoming concerts, lets have fun!', '2014-12-04 14:31'),
(16,'A-ha!', 'a-ha.com', 'Taaaaaaaake oooooon meeeeeee', '2014-12-04 14:31'),
(17,'Bankrupt', 'lehmanbros.com', 'are we even a band?', '2014-12-04 14:31'),
(18,'Ray Charles', 'facebook.com/raycharles', 'Like meeeeeee', '2014-12-04 14:31'),
(19,'Fear', 'fearband.com', 'We have a website now, buy tickets to watch us cover Iron Maiden!', '2014-12-04 14:31'),
(20,'Megadeth', 'twitter.com/@megadeath/123776', 'Will the guy who owns @megadeth please give it to us?', '2014-12-04 14:31'),
(21,'Kenny G', 'kennygee.com', 'Heyyy saxy people I have a website now! Look at me! Elevator music forever!', '2014-12-04 14:31'),
(22,'A-ha!', 'facebook.com/aha', 'Like us on Facebook, pretty please!', '2014-12-04 14:31'),
(23,'The Rolling Stones', 'oldpeople.com', 'This is the most apt URL we could get shhhh', '2014-12-04 14:31'),
(24,'Bankrupt', 'lehmanbros.com', 'We are really a band. Listen to our music. It has no subliminal messages designed to steal your money.', '2014-12-04 14:31'),
(25,'The Rolling Stones', 'facebook.com/rollingstonemagazine/123499878', 'Read our cool interview on The Rolling Stone Magazine, hahaha!', '2014-12-04 14:31'),
(26,'Adolescents', 'adolescents.com/new', 'Check out our new website and its new content', '2014-12-04 14:31'),
(27,'Intro5pect', 'intro5pect.com/concerts', 'We may be coming to your city! Check it.', '2014-12-04 14:31'),
(28,'New York Dolls', 'buildabear.com', 'Music? What music? Build teddy bears!', '2014-12-04 14:31'),
(29,'Alkaline Trio', 'alkalinetrio.com', 'Neeeeeew website!', '2014-12-04 14:31'),
(30,'Eric Clapton', 'facebook.com/slowhand/886992662881', 'New contest! Winners get tickets to my next gig!', '2014-12-04 14:31');
                        
CREATE TABLE concert_images (   cid INT NOT NULL,
                                concertpic_uri VARCHAR(200) NOT NULL,
                                PRIMARY KEY (concertpic_uri), /*each concert pic can only belong to 1 concert*/
                                FOREIGN KEY (cid) REFERENCES concert(cid)
                        );
CREATE TABLE user_posts (   uname VARCHAR(50) NOT NULL,
                            postid INT AUTO_INCREMENT,
                            bname VARCHAR(50) NOT NULL,
                            cid INT NULL,
                            postinfo TEXT NULL,
                            postedtime CHAR(16) NOT NULL,
                            PRIMARY KEY (postid),
                            UNIQUE (uname),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (bname) REFERENCES band(bname),
                            FOREIGN KEY (cid) REFERENCES concert(cid)
                        );
CREATE TABLE rel_user_fan_band  (   uname VARCHAR(50) NOT NULL,
                                    bname VARCHAR(50) NOT NULL,
                                    fdate CHAR(10),
                                    PRIMARY KEY (uname, bname),
                                    UNIQUE (uname, bname, fdate),
                                    FOREIGN KEY (uname) REFERENCES user(uname),
                                    FOREIGN KEY (bname) REFERENCES band(bname)
                                );
INSERT INTO `rel_user_fan_band` (`uname`, `bname`, `fdate`) VALUES
('Alice', 'Linkin Park', '2014-11-15'),
('Alice', 'The Rolling Stones', '2014-11-15'),
('Alice', 'A-ha!', '2014-11-15'),
('Alice', 'Megadeth', '2014-11-15'),
('Alice', 'New York Dolls', '2014-11-15'),
('Alice', 'Intro5pect', '2014-11-15'),
('Alice', 'Eric Clapton', '2014-11-15'),
('Alice', 'Kenny G', '2014-11-15'),
('Bob', 'Bankrupt', '2012-12-12'),
('Bob', 'Kenny G', '2012-12-12'),
('Bob', 'Linkin Park', '2012-12-12'),
('Bob', 'Adolescents', '2012-12-12'),
('Bob', 'The Rolling Stones', '2012-12-12'),
('Bob', 'Intro5pect', '2012-12-12'),
('Bob', 'Ray Charles', '2012-12-12'),
('Bob', 'Eric Clapton', '2012-12-12'),
('Bob', 'Fear', '2012-12-12'),
('Bob', 'A-ha!', '2012-12-12'),
('Charlie', 'Megadeth', '2013-02-18'),
('Charlie', 'Metallica', '2013-02-18'),
('Charlie', 'A-ha!', '2013-02-18'),
('Charlie', 'Linkin Park', '2013-02-18'),
('Charlie', 'Adolescents', '2013-02-18'),
('Charlie', 'Kenny G', '2013-01-05'),
('Charlie', 'Ray Charles', '2013-01-05'),
('Charlie', 'Jethro Tull', '2013-01-05'),
('Dean', 'Metallica', '2013-01-01'),
('Dean', 'Alkaline Trio', '2013-01-01'),
('Dean', 'The Rolling Stones', '2013-01-01'),
('Dean', 'A-ha!', '2013-01-01'),
('Dean', 'Linkin Park', '2013-01-01'),
('Dean', 'Megadeth', '2013-01-01'),
('Dean', 'Eric Clapton', '2013-01-01'),
('Earl', 'A-ha!', '2012-11-01'),
('Earl', 'Eric Clapton', '2012-11-01'),
('Earl', 'Metallica', '2012-11-01'),
('Earl', 'Alkaline Trio', '2011-07-07'),
('Earl', 'Bankrupt', '2012-11-01'),
('Travis', 'Fear', '2011-07-07'),
('Travis', 'Alkaline Trio', '2011-07-07'),
('Travis', 'Jethro Tull', '2011-07-07'),
('Travis', 'New York Dolls', '2011-07-07');

CREATE TABLE rel_user_likes_genre   (   uname VARCHAR(50) NOT NULL,
                                        gname VARCHAR(50) NOT NULL,
                                        FOREIGN KEY (uname) REFERENCES user(uname),
                                        FOREIGN KEY (gname) REFERENCES genre(gname)
                                );
INSERT INTO `rel_user_likes_genre` (`uname`, `gname`) VALUES
('Alice', 'Rock'),
('Bob', 'Rock'),
('Dean', 'Thrash Metal'),
('Earl', 'Thrash Metal'),
('Charlie', 'Jazz');

CREATE TABLE rel_user_follows_user  (   follower VARCHAR(50) NOT NULL,
                                        followee VARCHAR(50) NOT NULL,
                                        PRIMARY KEY (follower, followee),
                                        FOREIGN KEY (follower) REFERENCES user(uname),
                                        FOREIGN KEY (followee) REFERENCES user(uname)
                                    );
CREATE TABLE rel_user_attends_concert   (   uname VARCHAR(50) NOT NULL,
                                            cid INT NOT NULL,
                                            review VARCHAR(64) NULL,
                                            rating float NULL,
                                            PRIMARY KEY (uname, cid),
                                            FOREIGN KEY (uname) REFERENCES user(uname),
                                            FOREIGN KEY (cid) REFERENCES concert(cid)
                                        );
CREATE TABLE rel_user_posts_concertimages   (   uname VARCHAR(50) NOT NULL,
                                                cid INT NOT NULL,
                                                /*concertpic_uri VARCHAR(200) NOT NULL,*/
                                                FOREIGN KEY (uname, cid) REFERENCES rel_user_attends_concert (uname, cid)
                                        );
CREATE TABLE rel_band_performs_concert  (   bname VARCHAR(50) NOT NULL,
                                            cid INT NOT NULL,
                                            FOREIGN KEY (bname) REFERENCES band(bname),
                                            FOREIGN KEY (cid) REFERENCES concert(cid)
                                        );
INSERT INTO `rel_band_performs_concert` (`bname`, `cid`) VALUES
('A-ha!', 16),
('A-ha!', 29),
('A-ha!', 30),
('Adolescents', 10),
('Alkaline Trio', 13),
('Bankrupt', 14),
('Bankrupt', 31),
('Bankrupt', 32),
('Eric Clapton', 17),
('Eric Clapton', 20),
('Fear', 21),
('Fear', 9),
('Intro5pect', 12),
('Intro5pect', 22),
('Intro5pect', 23),
('Jethro Tull', 8),
('Kenny G', 1),
('Kenny G', 24),
('Kenny G', 25),
('Linkin Park', 2),
('Linkin Park',4),
('Linkin Park', 33),
('Megadeth', 18),
('Megadeth', 19),
('Megadeth', 34),
('Metallica', 3),
('Metallica', 6),
('Metallica', 35),
('New York Dolls', 11),
('New York Dolls', 26),
('Ray Charles', 5),
('Ray Charles', 27),
('Ray Charles', 28),
('The Rolling Stones', 7),
('The Rolling Stones', 15)
;

CREATE TABLE recolist   (   lname VARCHAR(50) NOT NULL,
                            uname VARCHAR(50) NOT NULL,
                            gname VARCHAR(50) NOT NULL,
                            PRIMARY KEY (lname),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (gname) REFERENCES genre(gname)
                        );
CREATE TABLE rel_recolist_contains_concert  (   lname VARCHAR(50) NOT NULL,
                                                cid INT NOT NULL,
                                                FOREIGN KEY (lname) REFERENCES recolist(lname),
                                                FOREIGN KEY (cid) REFERENCES concert(cid)
                                            );
CREATE TABLE user_input (   uname VARCHAR(50) NOT NULL,
                            cid INT NOT NULL,
                            vid INT NULL,
                            ctime CHAR(16) NULL,
                            tkturl varchar(64) NULL,
                            cover DECIMAL NULL,
							postedtime CHAR(16) NOT NULL,
                            UNIQUE (vid, ctime),
                            FOREIGN KEY (vid) REFERENCES venue(vid),
                            FOREIGN KEY (uname) REFERENCES user(uname),
                            FOREIGN KEY (cid) REFERENCES  concert(cid)
                        );
                        
/*CREATE VIEW user_reputation AS
    SELECT uname AS u1, ( CASE
        WHEN (SELECT joindate FROM user WHERE uname=u1) < (SELECT CURDATE() + INTERVAL 15 DAY) THEN 1
        ELSE 0
    ) AS rep FROM user
    ;
CREATE VIEW band_popularity AS
    SELECT;*/
