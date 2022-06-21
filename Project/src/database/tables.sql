PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS UserOrder;
DROP TABLE IF EXISTS RestaurantDish;
DROP TABLE IF EXISTS Car;

CREATE TABLE User (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL,
    address TEXT NOT NULL,
    phoneNumber INTEGER NOT NULL CHECK (100000000 <= phoneNumber AND phoneNumber <= 999999999)
);

CREATE TABLE Restaurant (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    address TEXT NOT NULL,
    phoneNumber INTEGER CHECK (100000000 <= phoneNumber AND phoneNumber <= 999999999),
    idOwner INTEGER NOT NULL REFERENCES User
);

CREATE TABLE Dish (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    type TEXT NOT NULL,
    category TEXT NOT NULL,
    price FLOAT NOT NULL,
    idRestaurant INTEGER NOT NULL REFERENCES Restaurant
);

CREATE TABLE Review (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    idUser INTEGER REFERENCES User,
    idRestaurant INTEGER REFERENCES Restaurant,
    stars INTEGER NOT NULL CHECK (1 <= stars AND stars <= 5),
    comment TEXT NOT NULL,
    answer TEXT,
    data DATE
);

CREATE TABLE UserOrder (
    idUser INTEGER REFERENCES User,
    idDish INTEGER REFERENCES Dish,
    quantity INTEGER NOT NULL,
    data DATETIME NOT NULL,
    state TEXT NOT NULL,
    PRIMARY KEY(idUser, idDish, data)
);

CREATE TABLE FavoriteDish (
    idUser INTEGER REFERENCES User,
    idDish INTEGER REFERENCES Dish,
    PRIMARY KEY (idUser, idDish)
);

CREATE TABLE FavoriteRestaurant (
    idUser INTEGER REFERENCES User,
    idRestaurant INTEGER REFERENCES Restaurant,
    PRIMARY KEY (idUser, idRestaurant)
);

CREATE TABLE Car (
    idUser INTEGER REFERENCES User,
    idDish INTEGER REFERENTES Dish,
    data DATETIME NOT NULL,
    quantity INTEGER NOT NULL,
    PRIMARY KEY (idUser, idDish)
);