-- -------------------------------------------------------------
-- TablePlus 3.8.0(336)
--
-- https://tableplus.com/
--
-- Database: murder_mystery.sqlite3
-- Generation Time: 2020-11-03 15:37:34.4530
-- -------------------------------------------------------------


CREATE TABLE crime_scene_report (
    id INTEGER,
    case_opened data,
    location VARCHAR,
   	address VARCHAR,
   	residents VARCHAR,
   	suspects VARCHAR,
   	evidence VARCHAR
, case_id int);

INSERT INTO "crime_scene_report" ("id", "case_opened", "location", "address", "residents", "suspects", "evidence", "case_id") VALUES
('1', '2020-10-31', 'Örgryte, Gothenburg', 'Prospect Hillgatan 125', 'Rolf Göransson', 'Rolf Göransson', 'Bones from a woman (approximately from 20-30 year ago), Gold locket wearing the initials A C, Work uniform (female) size S from Fläkt AB, Wooden trunk, Wrench', '51312');
