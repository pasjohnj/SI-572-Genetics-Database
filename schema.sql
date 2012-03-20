-- Recreate database
DROP DATABASE project;
CREATE DATABASE project;

-- Enter database
USE project; 

-- Create user
DROP USER 'CardioGeni'@'localhost';
GRANT ALL ON project.* TO 'CardioGeni'@'localhost' IDENTIFIED BY 'zap'; 

-- Create BMI table
CREATE TABLE BMI (
MarkerName VARCHAR(128),
Allele1 VARCHAR(128),
Allele2 VARCHAR(128),
Freq_Allele1_HapMapCEU FLOAT,
p FLOAT,
N INTEGER,
INDEX MarkerName_IDX (MarkerName)
);

-- Create ICBP table
CREATE TABLE ICBP (
MarkerName VARCHAR(128),
chr_hg18 INTEGER,
pos_hg18 INTEGER,
pval_GC_SBP FLOAT,
pval_GC_DBP FLOAT,
INDEX MarkerName_IDX (MarkerName),
INDEX pos_hg18_IDX (pos_hg18)
);

-- Create MAGIC_FastingGlucose table
CREATE TABLE MAGIC_FastingGlucose (
MarkerName VARCHAR(128),
effect_allele VARCHAR(128),
other_allele VARCHAR(128),
maf FLOAT,
effect FLOAT,
stderr FLOAT,
pvalue FLOAT,
INDEX MarkerName_IDX (MarkerName)
);

-- Create Publications table
CREATE TABLE Publications (
PMID INTEGER,
First_author VARCHAR(128),
journal VARCHAR(128),
pub_year INTEGER,
title VARCHAR(5000),
trait VARCHAR(128)
);

-- Insert initial data
INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait)
  VALUES (20935630, 'Speliotes EK', 'Nature Genetics', 2010, 'Association analyses of 249,796 individuals reveal 18 new loci associated with body mass index', 'BMI');
INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait)
  VALUES (21873549, 'Strawbridge RJ' , 'Diabetes', 2011, 'Genome-wide association identifies nine common variants associated with fasting proinsulin levels and provides new insights into the pathophysiology of type 2 diabetes', 'Fasting Glucose');
INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait)
  VALUES (21909115, 'Ehret GB', 'Nature', 2011, 'Genetic Variants in Novel Pathways Influence Blood Pressure and Cardiovascular Disease Risk', 'BP');

-- Populate database with GWAS data (command line)
/Applications/XAMPP/xamppfiles/bin/mysqlimport --user=root --password --ignore-lines=1 --fields-terminated-by=" " --local project /Users/ellenmschmidt/Documents/SI-572-Genetics-Database/BMI.txt
/Applications/XAMPP/xamppfiles/bin/mysqlimport --user=root --password --ignore-lines=1 --fields-terminated-by="," --local project /Users/ellenmschmidt/Documents/SI-572-Genetics-Database/ICBP.csv
/Applications/XAMPP/xamppfiles/bin/mysqlimport --user=root --password --ignore-lines=1 --fields-terminated-by="\t" --local project /Users/ellenmschmidt/Documents/SI-572-Genetics-Database/MAGIC_FastingGlucose.txt

-- Enter database
USE project; 

-- Create user
DROP USER 'CardioGeni'@'localhost';
GRANT ALL ON project.* TO 'CardioGeni'@'localhost' IDENTIFIED BY 'zap'; 

-- Add PMID to each data table
alter table BMI add column PMID INTEGER; 
UPDATE BMI SET PMID="20935630";

alter table ICBP add column PMID INTEGER; 
UPDATE ICBP SET PMID="21909115";

alter table MAGIC_FastingGlucose add column PMID INTEGER;
UPDATE MAGIC_FastingGlucose SET PMID="21873549";

