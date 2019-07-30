-- MySQL dump 8.22
--
-- Host: localhost    Database: sqldemo
---------------------------------------------------------
-- Server version	3.23.55-log

--
-- Table structure for table 'Assistent'
--

CREATE TABLE Assistent (
  personalNr int(8) NOT NULL default '0',
  name varchar(100) NOT NULL default '',
  fachgebiet varchar(100) NOT NULL default '',
  boss int(8) NOT NULL default '0',
  PRIMARY KEY  (personalNr)
);

--
-- Dumping data for table 'Assistent'
--


INSERT INTO Assistent VALUES (3001,'Klinsmann','Statistik',2125);
INSERT INTO Assistent VALUES (3002,'Beckenbauer','Klassische Logik',2125);
INSERT INTO Assistent VALUES (3011,'Maradona','Spracherkennung',2126);
INSERT INTO Assistent VALUES (3012,'Ronaldo','Bodenturnen',2127);
INSERT INTO Assistent VALUES (3015,'Pele','12. Jahrhundert',2127);
INSERT INTO Assistent VALUES (3016,'Häßler','Wahrnehmung',2134);

--
-- Table structure for table 'Hoert'
--

CREATE TABLE Hoert (
  matrikelNr int(8) NOT NULL default '0',
  vorlesungsNr int(8) NOT NULL default '0',
  PRIMARY KEY  (matrikelNr,vorlesungsNr)
);

--
-- Dumping data for table 'Hoert'
--


INSERT INTO Hoert VALUES (42424,4052);
INSERT INTO Hoert VALUES (42424,4630);
INSERT INTO Hoert VALUES (42424,5001);
INSERT INTO Hoert VALUES (42424,5041);
INSERT INTO Hoert VALUES (42645,4052);
INSERT INTO Hoert VALUES (42645,5001);
INSERT INTO Hoert VALUES (43125,5001);
INSERT INTO Hoert VALUES (43267,5001);
INSERT INTO Hoert VALUES (44444,5022);
INSERT INTO Hoert VALUES (45111,5041);
INSERT INTO Hoert VALUES (45111,5052);
INSERT INTO Hoert VALUES (45111,5216);
INSERT INTO Hoert VALUES (45111,5259);

--
-- Table structure for table 'Professor'
--

CREATE TABLE Professor (
  personalNr int(8) NOT NULL default '0',
  name varchar(50) NOT NULL default '',
  rang char(2) NOT NULL default '',
  raum varchar(10) NOT NULL default '',
  PRIMARY KEY  (personalNr)
);

--
-- Dumping data for table 'Professor'
--


INSERT INTO Professor VALUES (2125,'Meier','C4','226');
INSERT INTO Professor VALUES (2126,'Müller','C4','232');
INSERT INTO Professor VALUES (2127,'Schmitt','C3','310');
INSERT INTO Professor VALUES (2133,'Kühn','C3','52');
INSERT INTO Professor VALUES (2134,'Fischer','C3','309');
INSERT INTO Professor VALUES (2136,'Hermann','C4','36');
INSERT INTO Professor VALUES (2137,'Roth','C4','7');

--
-- Table structure for table 'Prueft'
--

CREATE TABLE Prueft (
  matrikelNr int(8) NOT NULL default '0',
  vorlesungsNr int(8) NOT NULL default '0',
  personalNr int(8) NOT NULL default '0',
  note float NOT NULL default '0',
  PRIMARY KEY  (matrikelNr,vorlesungsNr,personalNr)
);

--
-- Dumping data for table 'Prueft'
--


INSERT INTO Prueft VALUES (43125,5001,2137,1.3);
INSERT INTO Prueft VALUES (45111,5259,2134,2);
INSERT INTO Prueft VALUES (45111,5041,2137,3);
INSERT INTO Prueft VALUES (45111,5052,2126,1.7);
INSERT INTO Prueft VALUES (45111,5216,2133,2.6);
INSERT INTO Prueft VALUES (42424,5049,2126,1.3);

--
-- Table structure for table 'SetztVoraus'
--

CREATE TABLE SetztVoraus (
  vorgaenger int(8) NOT NULL default '0',
  nachfolger int(8) NOT NULL default '0',
  PRIMARY KEY  (vorgaenger,nachfolger)
);

--
-- Dumping data for table 'SetztVoraus'
--


INSERT INTO SetztVoraus VALUES (5001,5041);
INSERT INTO SetztVoraus VALUES (5041,5022);
INSERT INTO SetztVoraus VALUES (5043,4630);
INSERT INTO SetztVoraus VALUES (5043,5052);
INSERT INTO SetztVoraus VALUES (5049,5052);

--
-- Table structure for table 'Student'
--

CREATE TABLE Student (
  matrikelNr int(8) NOT NULL default '0',
  name varchar(100) NOT NULL default '',
  semester tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (matrikelNr)
);

--
-- Dumping data for table 'Student'
--


INSERT INTO Student VALUES (44444,'Edberg',3);
INSERT INTO Student VALUES (45111,'Agassi',2);
INSERT INTO Student VALUES (42424,'Seles',8);
INSERT INTO Student VALUES (42645,'Borg',8);
INSERT INTO Student VALUES (43125,'Graf',5);
INSERT INTO Student VALUES (44899,'Navratilova',3);
INSERT INTO Student VALUES (43267,'McEnroe',6);
INSERT INTO Student VALUES (42001,'Becker',8);

--
-- Table structure for table 'Vorlesung'
--

CREATE TABLE Vorlesung (
  vorlesungsNr int(8) NOT NULL default '0',
  titel varchar(100) NOT NULL default '',
  sWS tinyint(4) NOT NULL default '0',
  gelesenVon int(8) NOT NULL default '0',
  PRIMARY KEY  (vorlesungsNr)
);

--
-- Dumping data for table 'Vorlesung'
--


INSERT INTO Vorlesung VALUES (5216,'Englische Lyrik',2,2133);
INSERT INTO Vorlesung VALUES (5052,'Informatik II',3,2126);
INSERT INTO Vorlesung VALUES (4052,'Entwicklungspsychologie',4,2125);
INSERT INTO Vorlesung VALUES (5049,'Informatik  I',2,2126);
INSERT INTO Vorlesung VALUES (5043,'Psychologie I',3,2125);
INSERT INTO Vorlesung VALUES (5041,'Mathematik II',4,2137);
INSERT INTO Vorlesung VALUES (5001,'Mathematik I',4,2137);
INSERT INTO Vorlesung VALUES (5259,'Deutsche Geschichte',2,2134);
INSERT INTO Vorlesung VALUES (5022,'Stochastik',2,2137);
INSERT INTO Vorlesung VALUES (4630,'Wahrnehmung',4,2125);

