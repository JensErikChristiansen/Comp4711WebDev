CREATE TABLE standings(
   ID       INTEGER  NOT NULL PRIMARY KEY 
  ,League   VARCHAR(20) NOT NULL
  ,W        INTEGER  NOT NULL
  ,L        INTEGER  NOT NULL
  ,T        BIT  NOT NULL
  ,Pct1     DECIMAL(5,3) NOT NULL
  ,PF       INTEGER  NOT NULL
  ,PA       INTEGER  NOT NULL
  ,Net_Pts  INTEGER  NOT NULL
  ,TD       INTEGER  NOT NULL
  ,Home     VARCHAR(3) NOT NULL
  ,Road     VARCHAR(3) NOT NULL
  ,Division      VARCHAR(3) NOT NULL
  ,Pct2     DECIMAL(5,3) NULL
  ,Conf     VARCHAR(3) NOT NULL
  ,Pct3     DECIMAL(5,3) NULL
  ,NonConf  VARCHAR(3) NOT NULL
  ,Streak   VARCHAR(2) NOT NULL
  ,Last_5   VARCHAR(3) NOT NULL
  ,Team     VARCHAR(14) NOT NULL
  ,Season   VARCHAR(50) NOT NULL
);
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (1,'New England Patriots',8,0,0,1,276,143,133,31,'5-0','3-0','3-0',1.000,'6-0',1.000,'2-0','8W','5-0','AFC East Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (2,'New York Jets',5,3,0,0.625,200,162,38,23,'3-1','2-2','1-1',.500,'4-2',.667,'1-1','1W','3-2','AFC East Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (3,'Buffalo Bills',4,4,0,0.5,209,190,19,26,'2-3','2-1','2-1',.667,'4-3',.571,'0-1','1W','2-3','AFC East Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (4,'Miami Dolphins',3,5,0,0.375,171,206,-35,22,'1-2','2-3','0-4',.000,'2-5',.286,'1-0','2L','2-3','AFC East Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (5,'Cincinnati Bengals',8,0,0,1,229,142,87,28,'4-0','4-0','3-0',1.000,'7-0',1.000,'1-0','8W','5-0','AFC North Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (6,'Pittsburgh Steelers',5,4,0,0.556,206,182,24,22,'3-2','2-2','0-2',.000,'2-4',.333,'3-0','1W','3-2','AFC North Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (7,'Baltimore Ravens',2,6,0,0.25,190,214,-24,19,'1-2','1-4','1-2',.333,'2-4',.333,'0-2','1W','2-3','AFC North Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (8,'Cleveland Browns',2,7,0,0.222,177,247,-70,19,'1-3','1-4','1-1',.500,'2-5',.286,'0-2','4L','1-4','AFC North Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (9,'Indianapolis Colts',4,5,0,0.444,200,227,-27,24,'2-3','2-2','3-0',1.000,'4-3',.571,'0-2','1W','2-3','AFC South Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (10,'Houston Texans',3,5,0,0.375,174,205,-31,21,'2-2','1-3','2-1',.667,'2-3',.400,'1-2','1W','2-3','AFC South Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (11,'Jacksonville Jaguars',2,6,0,0.25,170,235,-65,20,'2-2','0-4','0-2',.000,'2-4',.333,'0-2','1L','1-4','AFC South Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (12,'Tennessee Titans',2,6,0,0.25,159,187,-28,19,'0-4','2-2','0-2',.000,'0-5',.000,'2-1','1W','1-4','AFC South Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (13,'Denver Broncos',7,1,0,0.875,192,139,53,19,'3-0','4-1','2-0',1.000,'4-1',.800,'3-0','1L','4-1','AFC West Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (14,'Oakland Raiders',4,4,0,0.5,213,211,2,25,'2-2','2-2','1-1',.500,'4-3',.571,'0-1','1L','2-3','AFC West Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (15,'Kansas City Chiefs',3,5,0,0.375,195,182,13,21,'2-2','1-3','0-1',.000,'2-2',.500,'1-3','2W','2-3','AFC West Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (16,'San Diego Chargers',2,7,0,0.222,210,249,-39,23,'2-3','0-4','0-1',.000,'1-4',.200,'1-3','5L','0-5','AFC West Team','American Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (17,'New York Giants',5,4,0,0.556,247,226,21,27,'3-1','2-3','2-2',.500,'4-4',.500,'1-0','1W','3-2','NFC East Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (18,'Philadelphia Eagles',4,4,0,0.5,193,164,29,22,'2-1','2-3','2-2',.500,'3-4',.429,'1-0','1W','3-2','NFC East Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (19,'Washington Redskins',3,5,0,0.375,158,195,-37,17,'3-1','0-4','1-1',.500,'3-2',.600,'0-3','1L','2-3','NFC East Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (20,'Dallas Cowboys',2,6,0,0.25,160,204,-44,16,'1-4','1-2','2-2',.500,'2-5',.286,'0-1','6L','0-5','NFC East Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (21,'Green Bay Packers',6,2,0,0.75,203,167,36,24,'4-0','2-2','1-0',1.000,'4-1',.800,'2-1','2L','3-2','NFC North Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (22,'Minnesota Vikings',6,2,0,0.75,168,140,28,16,'4-0','2-2','3-0',1.000,'4-1',.800,'2-1','4W','4-1','NFC North Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (23,'Chicago Bears',3,5,0,0.375,162,221,-59,16,'1-3','2-2','0-3',.000,'0-5',.000,'3-0','1W','3-2','NFC North Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (24,'Detroit Lions',1,7,0,0.125,149,245,-96,18,'1-3','0-4','1-2',.333,'1-4',.200,'0-3','2L','1-4','NFC North Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (25,'Carolina Panthers',8,0,0,1,228,165,63,26,'5-0','3-0','2-0',1.000,'5-0',1.000,'3-0','8W','5-0','NFC South Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (26,'Atlanta Falcons',6,3,0,0.667,229,190,39,27,'3-1','3-2','0-2',.000,'4-3',.571,'2-0','2L','2-3','NFC South Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (27,'New Orleans Saints',4,5,0,0.444,241,268,-27,31,'3-2','1-3','1-2',.333,'3-4',.429,'1-1','1L','3-2','NFC South Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (28,'Tampa Bay Buccaneers',3,5,0,0.375,181,231,-50,18,'1-3','2-2','2-1',.667,'2-3',.400,'1-2','1L','2-3','NFC South Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (29,'Arizona Cardinals',6,2,0,0.75,263,153,110,32,'3-1','3-1','1-1',.500,'4-1',.800,'2-1','2W','3-2','NFC West Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (30,'St. Louis Rams',4,4,0,0.5,153,146,7,16,'3-1','1-3','3-0',1.000,'3-3',.500,'1-1','1L','3-2','NFC West Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (31,'Seattle Seahawks',4,4,0,0.5,167,140,27,16,'2-1','2-3','1-1',.500,'4-3',.571,'0-1','2W','3-2','NFC West Team','National Football Conference - 2015 Regular Season');
INSERT INTO standings(ID,League,W,L,T,Pct1,PF,PA,Net_Pts,TD,Home,Road,Division,Pct2,Conf,Pct3,NonConf,Streak,Last_5,Team,Season) VALUES (32,'San Francisco 49ers',3,6,0,0.333,126,223,-97,12,'3-2','0-4','0-3',.000,'2-5',.286,'1-1','1W','2-3','NFC West Team','National Football Conference - 2015 Regular Season');
