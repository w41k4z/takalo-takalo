-- INIT --
CREATE DATABASE takalo_takalo;
USE takalo_takalo;




-- TABLE --
CREATE TABLE client (
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20),
    first_name VARCHAR(20),
    contact VARCHAR(14)
);

CREATE TABLE account (
    account_id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT REFERENCES client(client_id),
    password VARCHAR(16) NOT NULL,
    mail VARCHAR(25) UNIQUE NOT NULL,
    is_admin BOOLEAN DEFAULT false
);

CREATE TABLE category (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(15) UNIQUE NOT NULL
);

CREATE TABLE product (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT REFERENCES category(category_id), 
    client_id INT REFERENCES client(client_id),
    name VARCHAR(20),
    description TEXT,
    estimated_price FLOAT
);

CREATE TABLE product_image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT REFERENCES product(product_id),
    file_name VARCHAR(25) NOT NULL
);

-- for proposition --
CREATE TABLE client_preference (
    preference_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT REFERENCES category(category_id),
    value FLOAT NOT NULL DEFAULT 0.,
    client_id INT REFERENCES client(client_id)
);

CREATE TABLE exchange (
    exchange_id INT AUTO_INCREMENT PRIMARY KEY,
    client1 INT REFERENCES client(client_id),
    client2 INT REFERENCES client(client_id),
    exchange_date DATETIME
);

CREATE TABLE exchange_detail (
    exchange_dt_id INT AUTO_INCREMENT PRIMARY KEY,
    exchange_id INT REFERENCES exchange(exchange_id),
    product_id INT REFERENCES product(product_id),
    owner INT REFERENCES client(client_id),
    receiver INT REFERENCES client(client_id)
);

CREATE TABLE request (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    sender INT REFERENCES client(client_id),
    receiver INT REFERENCES client(client_id),
    request_date DATETIME NOT NULL,
    acceptation_date DATETIME
);





-- to call the function, use CALL <function_name>(parameters...)
-- FUNCTION --
DELIMITER $$
CREATE PROCEDURE get_all_client_product (IN the_client_id INT)
BEGIN
   SELECT *
   FROM product
   WHERE client_id = the_client_id;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE get_all_received_request (IN the_client_id INT)
BEGIN
   SELECT *
   FROM request
   WHERE receiver = the_client_id AND acceptation_date IS NULL;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE get_all_sent_receiver (IN the_client_id INT)
BEGIN
   SELECT *
   FROM request
   WHERE sender = the_client_id AND acceptation_date IS NULL;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE get_all_unknown_product ()
BEGIN
   SELECT product.*, category.category
   FROM product
   JOIN category ON product.category_id = category.category_id AND category.category = 'UNKNOWN';
END $$
DELIMITER ;





-- DATA TEST --
insert into client values 
(NULL, 'Maminiaina', 'Bal', '034 33 083 15'),
(NULL, 'Rakotondranaivo', 'Alain', '034 93 159 28');

insert into account values 
(NULL, 1, '123', 'bal@gmail.com', false),
(NULL, 2, '123', 'alain@gmail.com', true);

insert into category values 
(NULL, 'UNKNOWN'),
(NULL, 'Electronic');

insert into product values
(NULL, 2, 1, 'MacBookAir M1', 'Produit Apple tena vrai', 6000000),
(NULL, 2, 1, 'Casque BT500', 'Casque tena milay', 80000),
(NULL, 2, 2, 'Souris', 'Souris Gamer tsy tena vrai', 11000),
(NULL, 2, 2, 'Ordinateur', 'Asus tsotsotra', 5100000),
(NULL, 1, 2, 'Tsy misy', '????', 0),
(NULL, 1, 1, 'Tsy misy koa', '????', 0);
