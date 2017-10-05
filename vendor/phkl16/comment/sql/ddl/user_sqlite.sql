--
-- Creating a User table.
--



--
-- Table User
--
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    "id" INTEGER PRIMARY KEY NOT NULL,
    `acronym` VARCHAR(80) UNIQUE NOT NULL,
    `email` VARCHAR(80) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    "created" TIMESTAMP,
    "updated" DATETIME,
    "deleted" DATETIME,
    "active" DATETIME
);
