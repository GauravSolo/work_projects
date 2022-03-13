CREATE DATABASE rise_retail;

use rise_retail;

CREATE TABLE prev_record (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date VARCHAR(18) NOT NULL,
    promotion_type VARCHAR(25),
    template TEXT(250),
	customer VARCHAR(10),
	remark VARCHAR(100)
);

CREATE TABLE template (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(25),
    sms TEXT(250)
);