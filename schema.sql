-- Recreate database
DROP DATABASE project;
CREATE DATABASE project;

-- Enter database
USE project; 

-- Create user
DROP USER 'CardioGeni'@'localhost';
GRANT ALL ON project.* TO 'CardioGeni'@'localhost' IDENTIFIED BY 'zap'; 

-- Create INFO table
CREATE TABLE INFO (
chr INTEGER,
pos_hg18 INTEGER,
pos_hg19 INTEGER,
MarkerName VARCHAR(128),
INDEX chr_IDX (chr),
INDEX pos_hg18_IDX (pos_hg18),
INDEX pos_hg19_IDX (pos_hg19),
INDEX MarkerName_IDX (MarkerName)
);

-- Create Results table
CREATE TABLE results (
MarkerName VARCHAR(128),
p FLOAT,
PMID INTEGER,
INDEX MarkerName_IDX (MarkerName),
INDEX PMID_IDX (PMID)
);

-- Create Publications table
CREATE TABLE Publications (
PMID INTEGER NOT NULL KEY,
First_author VARCHAR(128),
journal VARCHAR(128),
pub_year INTEGER,
title VARCHAR(5000),
trait VARCHAR(128)
);

-- Populate Publications table
INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait)
  VALUES (20935630, 'Speliotes EK', 'Nature Genetics', 2010, 'Association analyses of 249,796 individuals reveal 18 new loci associated with body mass index', 'BMI');
INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait)
  VALUES (20081857, 'Saxena R' , 'Nature Genetics', 2010, 'Genetic variation in GIPR influences the glucose and insulin responses to an oral glucose challenge', 'Fasting Glucose');
INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait)
  VALUES (21909115, 'Ehret GB', 'Nature', 2011, 'Genetic Variants in Novel Pathways Influence Blood Pressure and Cardiovascular Disease Risk', 'BP');

-- Create users table
CREATE TABLE users(
id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
username VARCHAR(128),
password VARCHAR(128),
email VARCHAR(128)
);

-- Create gene plot table
CREATE TABLE plots(
id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
filename VARCHAR(128),
gene VARCHAR(128)
);

INSERT INTO plots (filename, gene)
  VALUES ('HDL_120306_chr11_46699823.pdf', 'ATG13');
INSERT INTO plots (filename, gene)
  VALUES ('HDL_120306_chr11_116142356.pdf', 'APOA5');
INSERT INTO plots (filename, gene)
  VALUES ('HDL_120306_chr16_55545545.pdf', 'CETP');
  INSERT INTO plots (filename, gene)
  VALUES ('HDL_120306_chr17_35063744.pdf', 'MED1');

-- Populate Info and Results tables with GWAS data (command line)
/Applications/XAMPP/xamppfiles/bin/mysqlimport --user=root --password --ignore-lines=1 --fields-terminated-by="\t" --local project /Users/ellenmschmidt/Documents/SI-572-Genetics-Database/results.txt
/Applications/XAMPP/xamppfiles/bin/mysqlimport --user=root --password --ignore-lines=1 --fields-terminated-by="\t" --local project /Users/ellenmschmidt/Documents/SI-572-Genetics-Database/info.txt

-- Re-enter database
USE project; 

-- Create integer primary keys for each data table
alter table INFO add column id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY;
alter table results add column id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY;

