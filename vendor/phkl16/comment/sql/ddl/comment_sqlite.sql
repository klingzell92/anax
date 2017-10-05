--
-- Table User
--
DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    `id` INTEGER PRIMARY KEY NOT NULL,
    `user` VARCHAR(80) NOT NULL,
    `content` TEXT NOT NULL,
    `gravatar` VARCHAR(255) NOT NULL,
    `created` DATETIME,
    `updated` DATETIME,
    `deleted` DATETIME,
    `active` DATETIME
);
