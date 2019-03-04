CREATE DATABASE Enrollment;

USE Enrollment;

CREATE TABLE STUDENT
(
	STUDENT_ID VARCHAR(9) NOT NULL DEFAULT 0,
	GENDER VARCHAR(5) NOT NULL,
	First_Name VARCHAR(40) NOT NULL,
	Other_Name VARCHAR(100) DEFAULT NULL,
	Last_Name VARCHAR(40) NOT NULL,
	S_Password VARCHAR(255) NOT NULL,
	Email VARCHAR(40) NOT NULL DEFAULT 0,
	Phone_Number VARCHAR(15) DEFAULT NULL,
	PRIMARY KEY (STUDENT_ID)
);

CREATE TABLE COURSES
(
    COURSE_CODE VARCHAR(5) NOT NULL DEFAULT 0,
	COURSE_NAME VARCHAR(255) NOT NULL,
	SEMESTER VARCHAR(1) NOT NULL,
	FEE VARCHAR(100) NOT NULL,
    COURSE_DESC VARCHAR(255) DEFAULT NULL,
	PRIMARY KEY (COURSE_CODE)
);

CREATE TABLE COMP_COURSE
(
	STUDENT_ID VARCHAR(9) NOT NULL DEFAULT 0,
	COURSE_CODE VARCHAR(5) NOT NULL DEFAULT 0,
	GRADE VARCHAR(2) NOT NULL,
	PRIMARY KEY (STUDENT_ID, COURSE_CODE),
    CONSTRAINT FK_CCSI FOREIGN KEY (STUDENT_ID) REFERENCES STUDENT (STUDENT_ID),
    CONSTRAINT FK_CCCC FOREIGN KEY (COURSE_CODE) REFERENCES COURSES (COURSE_CODE)
);

CREATE TABLE STUDENT_PROG
(
	STUDENT_ID VARCHAR(9) NOT NULL DEFAULT 0,
	PROG_NAME VARCHAR(255) NOT NULL DEFAULT 0,
	PROG_YEAR VARCHAR(4) NOT NULL,
    COURSE_1 VARCHAR(5) DEFAULT NULL,
    COURSE_1_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_2 VARCHAR(5) DEFAULT NULL,
    COURSE_2_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_3 VARCHAR(5) DEFAULT NULL,
    COURSE_3_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_4 VARCHAR(5) DEFAULT NULL,
    COURSE_4_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_5 VARCHAR(5) DEFAULT NULL,
    COURSE_5_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_6 VARCHAR(5) DEFAULT NULL,
    COURSE_6_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_7 VARCHAR(5) DEFAULT NULL,
    COURSE_7_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_8 VARCHAR(5) DEFAULT NULL,
    COURSE_8_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_9 VARCHAR(5) DEFAULT NULL,
    COURSE_9_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_10 VARCHAR(5) DEFAULT NULL,
    COURSE_10_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_11 VARCHAR(5) DEFAULT NULL,
    COURSE_11_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_12 VARCHAR(5) DEFAULT NULL,
    COURSE_12_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_13 VARCHAR(5) DEFAULT NULL,
    COURSE_13_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_14 VARCHAR(5) DEFAULT NULL,
    COURSE_14_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_15 VARCHAR(5) DEFAULT NULL,
    COURSE_15_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_16 VARCHAR(5) DEFAULT NULL,
    COURSE_16_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_17 VARCHAR(5) DEFAULT NULL,
    COURSE_17_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_18 VARCHAR(5) DEFAULT NULL,
    COURSE_18_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_19 VARCHAR(5) DEFAULT NULL,
    COURSE_19_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_20 VARCHAR(5) DEFAULT NULL,
    COURSE_20_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_21 VARCHAR(5) DEFAULT NULL,
    COURSE_21_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_22 VARCHAR(5) DEFAULT NULL,
    COURSE_22_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_23 VARCHAR(5) DEFAULT NULL,
    COURSE_23_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_24 VARCHAR(5) DEFAULT NULL,
    COURSE_24_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_25 VARCHAR(5) DEFAULT NULL,
    COURSE_25_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_26 VARCHAR(5) DEFAULT NULL,
    COURSE_26_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_27 VARCHAR(5) DEFAULT NULL,
    COURSE_27_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_28 VARCHAR(5) DEFAULT NULL,
    COURSE_28_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_29 VARCHAR(5) DEFAULT NULL,
    COURSE_29_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_30 VARCHAR(5) DEFAULT NULL,
    COURSE_30_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_31 VARCHAR(5) DEFAULT NULL,
    COURSE_31_ALT VARCHAR(5) DEFAULT NULL,
    COURSE_32 VARCHAR(5) DEFAULT NULL,
    COURSE_32_ALT VARCHAR(5) DEFAULT NULL,
    PRIMARY KEY (STUDENT_ID, PROG_NAME),
    CONSTRAINT FK_SPSI FOREIGN KEY (STUDENT_ID) REFERENCES STUDENT (STUDENT_ID)
);

CREATE TABLE PROG_COURSES 
(
	PROG_NAME VARCHAR(255) NOT NULL DEFAULT 0,
	PROG_YEAR VARCHAR(4) NOT NULL,
    COURSE_1 VARCHAR(5) DEFAULT NULL,
    COURSE_2 VARCHAR(5) DEFAULT NULL,
    COURSE_3 VARCHAR(5) DEFAULT NULL,
    COURSE_4 VARCHAR(5) DEFAULT NULL,
    COURSE_5 VARCHAR(5) DEFAULT NULL,
    COURSE_6 VARCHAR(5) DEFAULT NULL,
    COURSE_7 VARCHAR(5) DEFAULT NULL,
    COURSE_8 VARCHAR(5) DEFAULT NULL,
    COURSE_9 VARCHAR(5) DEFAULT NULL,
    COURSE_10 VARCHAR(5) DEFAULT NULL,
    COURSE_11 VARCHAR(5) DEFAULT NULL,
    COURSE_12 VARCHAR(5) DEFAULT NULL,
    COURSE_13 VARCHAR(5) DEFAULT NULL,
    COURSE_14 VARCHAR(5) DEFAULT NULL,
    COURSE_15 VARCHAR(5) DEFAULT NULL,
    COURSE_16 VARCHAR(5) DEFAULT NULL,
    COURSE_17 VARCHAR(5) DEFAULT NULL,
    COURSE_18 VARCHAR(5) DEFAULT NULL,
    COURSE_19 VARCHAR(5) DEFAULT NULL,
    COURSE_20 VARCHAR(5) DEFAULT NULL,
    COURSE_21 VARCHAR(5) DEFAULT NULL,
    COURSE_22 VARCHAR(5) DEFAULT NULL,
    COURSE_23 VARCHAR(5) DEFAULT NULL,
    COURSE_24 VARCHAR(5) DEFAULT NULL,
    COURSE_25 VARCHAR(5) DEFAULT NULL,
    COURSE_26 VARCHAR(5) DEFAULT NULL,
    COURSE_27 VARCHAR(5) DEFAULT NULL,
    COURSE_28 VARCHAR(5) DEFAULT NULL,
    COURSE_29 VARCHAR(5) DEFAULT NULL,
    COURSE_30 VARCHAR(5) DEFAULT NULL,
    COURSE_31 VARCHAR(5) DEFAULT NULL,
    COURSE_32 VARCHAR(5) DEFAULT NULL,
    COURSE_33 VARCHAR(5) DEFAULT NULL,
    COURSE_34 VARCHAR(5) DEFAULT NULL,
    COURSE_35 VARCHAR(5) DEFAULT NULL,
    COURSE_36 VARCHAR(5) DEFAULT NULL,
    COURSE_37 VARCHAR(5) DEFAULT NULL,
    COURSE_38 VARCHAR(5) DEFAULT NULL,
    COURSE_39 VARCHAR(5) DEFAULT NULL,
    COURSE_40 VARCHAR(5) DEFAULT NULL,
    COURSE_41 VARCHAR(5) DEFAULT NULL,
    COURSE_42 VARCHAR(5) DEFAULT NULL,
    COURSE_43 VARCHAR(5) DEFAULT NULL,
    COURSE_44 VARCHAR(5) DEFAULT NULL,
    COURSE_45 VARCHAR(5) DEFAULT NULL,
    COURSE_46 VARCHAR(5) DEFAULT NULL,
    COURSE_47 VARCHAR(5) DEFAULT NULL,
    COURSE_48 VARCHAR(5) DEFAULT NULL,
    COURSE_49 VARCHAR(5) DEFAULT NULL,
    COURSE_50 VARCHAR(5) DEFAULT NULL,
    COURSE_51 VARCHAR(5) DEFAULT NULL,
    COURSE_52 VARCHAR(5) DEFAULT NULL,
    COURSE_53 VARCHAR(5) DEFAULT NULL,
    COURSE_54 VARCHAR(5) DEFAULT NULL,
    COURSE_55 VARCHAR(5) DEFAULT NULL,        
    PRIMARY KEY (PROG_NAME)
);

CREATE TABLE STAFF
(
    STAFF_ID VARCHAR(20) NOT NULL DEFAULT 0,
    ST_Password VARCHAR(255) NOT NULL DEFAULT 0,
    ACCESS_LEVEL VARCHAR(30) NOT NULL DEFAULT 0,
    PRIMARY KEY (STAFF_ID)
);

CREATE TABLE PREREQUISITIES
(
    COURSE_CODE VARCHAR(5) NOT NULL DEFAULT 0,
    COURSE_CODE_COMP VARCHAR(5) NOT NULL DEFAULT 0,
    COURSE_CODE_ALT VARCHAR(5) NOT NULL DEFAULT 0,
    PRIMARY KEY (COURSE_CODE, COURSE_CODE_COMP),
    CONSTRAINT FK_PRCC FOREIGN KEY (COURSE_CODE) REFERENCES COURSES (COURSE_CODE),
    CONSTRAINT FK_PRCCC FOREIGN KEY (COURSE_CODE_COMP) REFERENCES COURSES (COURSE_CODE),
    CONSTRAINT FK_PRCCA FOREIGN KEY (COURSE_CODE_ALT) REFERENCES COURSES (COURSE_CODE)
);

CREATE TABLE REGISTRATION
(
    STUDENT_ID VARCHAR(9) NOT NULL DEFAULT 0,
    COURSE_CODE VARCHAR(5) NOT NULL DEFAULT 0,
    PRIMARY KEY (STUDENT_ID, COURSE_CODE),
    CONSTRAINT FK_RCC FOREIGN KEY (COURSE_CODE) REFERENCES COURSES (COURSE_CODE)
);

INSERT INTO COURSES (
    COURSE_CODE,
    COURSE_NAME,
    SEMESTER,
    FEE,
    COURSE_DESC
)
VALUES
    (
        'CS111',
        'Intro to Computing Science',
        '1',
        '$50',
        ''
    ),
    (
        'MA111',
        'Calculus 1 & Linear ALgebra 1',
        '1',
        '$50',
        ''
    ),
    (
        'UU100',
        'Communications and informations literacy',
        '1',
        '$50',
        ''
    ),
    (
        'ST131',
        'Introduction to Satistics',
        '1',
        '$50',
        ''
    ),
    (
        'UU114',
        'English for Acedemic Purposes',
        '2',
        '$50',
        ''
    ),
    (
        'MA161',
        'Discrete Mathematics I',
        '2',
        '$50',
        ''
    ),
    (
        'MA112',
        'Calculus 2',
        '2',
        '$50',
        ''
    ),
    (
        'CS112',
        'Data Structures and Algorithms',
        '2',
        '$50',
        ''
    ),
    (
        'CS211',
        'Computer Organization',
        '1',
        '$50',
        ''
    ),
    (
        'UU200',
        'Ethics and Governance',
        '1',
        '$50',
        ''
    ),
    (
        'CS240',
        'Software Engineering',
        '1',
        '$50',
        ''
    ),
    (
        'IS222',
        'Database Management Systems',
        '1',
        '$50',
        ''
    ),
    (
        'CS214',
        'Design & Analysis of Algorithms',
        '2',
        '$50',
        ''
    ),
    (
        'CS241',
        'Software Design and Implementation',
        '2',
        '$50',
        ''
    ),
    (
        'UU204',
        'Pacific Worlds',
        '2',
        '$50',
        ''
    ),
    (
        'IS224',
        'Advanced Database Systems',
        '2',
        '$50',
        ''
    ),
    (
        'CS310',
        'Computer Networks',
        '1',
        '$50',
        ''
    ),
    (
        'CS311',
        'Operating Systems',
        '1',
        '$50',
        ''
    ),
    (
        'IS333',
        'Project Management',
        '1',
        '$50',
        ''
    ),
    (
        'CS324',
        'Distributed Computing',
        '2',
        '$50',
        ''
    ),
    (
        'CS341',
        'Distributed Computing',
        '2',
        '$50',
        ''
    ),
    (
        'IS314',
        'Computing Project',
        '2',
        '$50',
        ''
    );

    INSERT INTO COMP_COURSE (
        STUDENT_ID,
        COURSE_CODE,
        GRADE
    )
    VALUES
    (
        'S111',
        'CS111',
        'A'
    ),
    (
        'S111',
        'MA111',
        'A+'
    ),
    (
        'S111',
        'UU100',
        'A+'
    ),
    (
        'S111',
        'UU114',
        'A+'
    ),
    (
        'S111',
        'ST131',
        'A'
    ),
    (
        'S111',
        'MA161',
        'A'
    ),
    (
        'S111',
        'MA112',
        'B+'
    ),
    (
        'S111',
        'CS112',
        'A'
    ),
    (
        'S111',
        'CS211',
        'A'
    );

    SELECT STUDENT_ID, Course, value
FROM (
  SELECT student_prog.*, 'COURSE_1' AS Course, COURSE_1 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_2' AS Course, COURSE_1_ALT AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_3' AS Course, COURSE_2 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_4' AS Course, COURSE_2_ALT AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_5' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_6' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_7' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_8' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_9' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_10' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_11' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_12' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_13' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_14' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_15' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_16' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_17' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_18' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_19' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_20' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_21' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL  
  SELECT student_prog.*, 'COURSE_22' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_23' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_24' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_25' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_26' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_27' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_28' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_29' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_30' AS Course, COURSE_3 AS value FROM student_prog
  UNION ALL
  SELECT student_prog.*, 'COURSE_31' AS Course, COURSE_3 AS value FROM student_prog 
) student_prog
WHERE STUDENT_ID = "S111"