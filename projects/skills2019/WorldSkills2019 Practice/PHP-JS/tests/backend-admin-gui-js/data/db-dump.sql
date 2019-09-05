SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `events`;

-- --------------------------------------------------------
-- events table

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration_days` smallint(5) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `standard_price` double NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `events` (`id`, `title`, `description`, `date`, `time`, `duration_days`, `location`, `standard_price`, `capacity`) VALUES
(1, 'Web conference', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', '2019-08-15', '08:00:00', 1, 'Floor1', 500, 250),
(2, 'Fishing experience', 'Lorem ipsum dolor sit amet, sadipscing consetetur elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', '2019-08-30', '08:00:00', 1, 'Garden Area', 100, 30);

ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --------------------------------------------------------
-- sessions table

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `event_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `room` varchar(255) DEFAULT NULL,
  `speaker` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `event_id`, `title`, `room`, `speaker`) VALUES
(1, 1, 'CSS applied at 8:30', 'R05', 'Mac Entyre'),
(2, 1, 'JS advanced at 10:00', 'R06', 'Ann Codelle'),
(3, 2, 'fishing in troubled waters', NULL, NULL),
(4, 2, 'preparing fish for dish', NULL, NULL);

ALTER TABLE `sessions`
  ADD KEY `sessions_event_id_foreign` (`event_id`);

ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

SET FOREIGN_KEY_CHECKS=1;
