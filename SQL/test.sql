SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `test`;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `postId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `userId` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);


ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;