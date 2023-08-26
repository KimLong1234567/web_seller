CREATE TABLE users (
	user_id int AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(255),
    user_password varchar(255),
    user_email varchar(255) UNIQUE,
    user_date_add DATETIME
);

CREATE TABLE admin (
    admin_count int AUTO_INCREMENT PRIMARY KEY,
	admin_name varchar(255),
    admin_password varchar(255),
    admin_date_add DATETIME
);


CREATE TABLE product (
    prod_count int AUTO_INCREMENT PRIMARY KEY,
	prod_id varchar(255) UNIQUE,
    prod_name varchar(255),
    prod_detail varchar(255),
    prod_price double,
    prod_origin varchar(255),
    prod_image varchar(255),
    prod_cate_id int,
    prod_quantity int,
    prod_date_add DATETIME,
    prod_date_chage DATETIME
);

CREATE TABLE product_category (
	prod_cate_id int AUTO_INCREMENT PRIMARY KEY,
    prod_cate_name varchar(255),
    prod_cate_date_add DATETIME
);

CREATE TABLE orders(
	order_id varchar(10) PRIMARY KEY,
    order_date DATETIME,
    order_total double,
    order_numberOfItem int,
    user_id int,
    prod_id varchar(255),
    order_address varchar(255),
    order_city varchar(255),
    order_country varchar(255),
    order_phone varchar(255)
);


CREATE TABLE contact(
	contact_stt int AUTO_INCREMENT PRIMARY KEY,
    contact_mess varchar(255),
    contact_name varchar(50),
    contact_email varchar(255),
    contact_date_add DATETIME
);

CREATE TABLE feed_back(
	feed_back_id int AUTO_INCREMENT PRIMARY KEY,
    feed_back_name varchar(50),
    feed_back_phone varchar(255),
    feed_back_mess varchar(255),
    feed_back_date datetime,
    feed_back_image varchar(255)
);

ALTER TABLE feed_back ADD user_id int;

ALTER TABLE feed_back ADD prod_id varchar(255);

ALTER TABLE product
ADD FOREIGN KEY (prod_cate_id) REFERENCES product_category(prod_cate_id);

ALTER TABLE feed_back
ADD FOREIGN KEY (prod_id) REFERENCES product(prod_id);

ALTER TABLE feed_back
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE orders
ADD FOREIGN KEY (prod_id) REFERENCES product(prod_id);

ALTER TABLE orders
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE orders ADD order_status bit DEFAULT 0;

ALTER TABLE orders ADD order_name_card_customer varchar(255);

ALTER TABLE orders ADD order_number_credit_card varchar(255);



INSERT into admin (admin_count,admin_name, admin_password, admin_date_add) VALUES (,"admin","admin",CURRENT_TIMESTAMP()); 

INSERT INTO product_category (prod_cate_id, prod_cate_name, prod_cate_date_add) VALUES 
(, 'men',CURRENT_TIMESTAMP()),
(, 'women',CURRENT_TIMESTAMP()),
(,'kids',CURRENT_TIMESTAMP());

