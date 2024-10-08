-- CREATE DATABASE IF NOT EXISTS test; 
-- USE test;
CREATE TABLE admin
(
    id INT(10) NOT NULL AUTO_INCREMENT,
    acc text NOT NULL,
    pw text NOT NULL,
    pr text NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE bottom
(
    id INT(10) NOT NULL AUTO_INCREMENT,
    bottom text NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE goods
(
    id INT(10) NOT NULL AUTO_INCREMENT,
    no text NOT NULL,
    name text NOT NULL,
    price INT(5) NOT NULL,
    stock INT(5) NOT NULL,
    spec text NOT NULL,
    intro text NOT NULL,
    img text NOT NULL,
    big INT(5) NOT NULL,
    mid INT(5) NOT NULL,
    sh INT(2) NOT NULL DEFAULT '1',
    PRIMARY KEY (id)
);
CREATE TABLE mem
(
    id INT(10) NOT NULL AUTO_INCREMENT,
    acc text NOT NULL,
    pw text NOT NULL,
    name text NOT NULL,
    tel text NOT NULL,
    addr text NOT NULL,
    email text NOT NULL,
    regdate date NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE orders
(
    id INT(10) NOT NULL AUTO_INCREMENT,
    no text NOT NULL,
    acc text NOT NULL,
    name text NOT NULL,
    email text NOT NULL,
    addr text NOT NULL,
    tel text NOT NULL,
    total INT(10) NOT NULL,
    cart text NOT NULL,
    orderdate date NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE types
(
    id INT(10) NOT NULL AUTO_INCREMENT,
    name text NOT NULL,
    big_id INT(2) NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
);

ALTER TABLE admin DROP PRIMARY KEY;
ALTER TABLE bottom DROP PRIMARY KEY;
ALTER TABLE goods DROP PRIMARY KEY;
ALTER TABLE mem DROP PRIMARY KEY;
ALTER TABLE orders DROP PRIMARY KEY;
ALTER TABLE types DROP PRIMARY KEY;

ALTER TABLE admin MODIFY COLUMN id INT(10) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id);
ALTER TABLE bottom MODIFY COLUMN id INT(10) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id);
ALTER TABLE goods MODIFY COLUMN id INT(10) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id);
ALTER TABLE mem MODIFY COLUMN id INT(10) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id);
ALTER TABLE orders MODIFY COLUMN id INT(10) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id);
ALTER TABLE types MODIFY COLUMN id INT(10) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id);

