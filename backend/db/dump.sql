CREATE TABLE Users  (
    id VARCHAR(255) NOT NULL UNIQUE,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(255) UNIQUE,
    profile_picture VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Flatshare (
     id VARCHAR(255) NOT NULL UNIQUE,
     banner_picture VARCHAR(255) NOT NULL,
     name VARCHAR(255) NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE UserToFlatshare (
    id VARCHAR(255) NOT NULL UNIQUE,
    user_id VARCHAR(255) NOT NULL,
    flatshare_id VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL DEFAULT 'due',
    due FLOAT NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
);

CREATE TABLE Expense (
    id VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    paying_one_id VARCHAR(255) NOT NULL,
    flatshare_id VARCHAR(255) NOT NULL,
    sum FLOAT NOT NULL,
    category_id VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Category (
    id VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL UNIQUE,
    default BOOLEAN NOT NULL DEFAULT false,
    PRIMARY KEY (id)
);

CREATE TABLE Task (
    id VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL UNIQUE,
    flatshare_id VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE FlatshareToCategory (
    id VARCHAR(255) NOT NULL,
    flatshare_id VARCHAR(255) NOT NULL,
    category_id VARCHAR(255) NOT NULL
);

ALTER TABLE UserToFlatshare ADD CONSTRAINT UserToFlatshare_fk0 FOREIGN KEY (user_id) REFERENCES Users(id);

ALTER TABLE UserToFlatshare ADD CONSTRAINT UserToFlatshare_fk1 FOREIGN KEY (flatshare_id) REFERENCES Flatshare(id);

ALTER TABLE Expense ADD CONSTRAINT Expense_fk0 FOREIGN KEY (paying_one_id) REFERENCES Users(id);

ALTER TABLE Expense ADD CONSTRAINT Expense_fk1 FOREIGN KEY (flatshare_id) REFERENCES Flatshare(id);

ALTER TABLE Expense ADD CONSTRAINT Expense_fk2 FOREIGN KEY (category_id) REFERENCES Category(id);

ALTER TABLE Task ADD CONSTRAINT Task_fk0 FOREIGN KEY (flatshare_id) REFERENCES Flatshare(id);

ALTER TABLE FlatshareToCategory ADD CONSTRAINT FlatshareToCategory_fk0 FOREIGN KEY (flatshare_id) REFERENCES Flatshare(id);

ALTER TABLE FlatshareToCategory ADD CONSTRAINT FlatshareToCategory_fk1 FOREIGN KEY (category_id) REFERENCES Category(id);