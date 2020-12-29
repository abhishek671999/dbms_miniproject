// Create database as notestore
CREATE DATABASE IF NOT EXISTS $dbname;  //$dbname=notestore

//Create table notes to store details of study material
CREATE TABLE IF NOT EXISTS NOTES(
        NAME VARCHAR(30) NOT NULL,
        YEAR INT(4) NOT NULL,
        LINK VARCHAR(50) NOT NULL
      );

//Create table creds to store credentials of users/admins/lecturers
CREATE TABLE IF NOT EXISTS $tablename(
        name VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        EMAIL VARCHAR(50) NOT NULL,
        MOB_NO NUMERIC(10,0) NOT NULL
      );                                  //$tablename = creds

//To validate user
SELECT * FROM $tablename where EMAIL='$emailid' and password='$pwd';

//Create new account
INSERT INTO $tablename VALUES ('$userid','$pwd','$emailid','$mobile_num');

//Fetch NOTES
select name,year,link from notes where lower(name)=lower('$course') and year='$year' and sem is NULL;

//Fetch Question papers
select name,year,link from notes where sem='$sem';

//Add question paper metadata to notes table
INSERT INTO NOTES (NAME,YEAR,LINK) VALUES ('$course','$year','$link');  

//Add study materials/NOTES metadata to notes table
INSERT INTO NOTES (NAME,SEM,LINK,YEAR) VALUES ('$course','$sem','$link','$year');
