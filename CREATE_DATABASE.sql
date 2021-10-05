CREATE TABLE Categories (
	id INT(10) UNSIGNED AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
);
CREATE TABLE Products (
    id INT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    price DOUBLE (10, 2) NOT NULL,
    saleOff DOUBLE (10, 2) NOT NULL,
    image VARCHAR(50) NOT NULL,
    createdDate DATE NOT NULL,
    description VARCHAR(2000) NOT NULL,
    isSpecial BIT(1),
    views INT NOT NULL DEFAULT 0,
    category_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES Categories (id)
);

CREATE TABLE Comments (
    id INT UNSIGNED AUTO_INCREMENT,
    content VARCHAR(50) NOT NULL,
    productId INT(10) NOT NULL,
    user_id VARCHAR(20) NOT NULL,
    createdDate DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (productId) REFERENCES Products(id),
    FOREIGN KEY (user_id) REFERENCES Users(id),
);