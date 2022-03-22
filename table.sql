CREATE TABLE IF NOT EXISTS `users` (
	`userId` INT(11) NOT NULL AUTO_INCREMENT,
	`userName` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`userPwd` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`avatar` VARCHAR(255) NOT NULL DEFAULT 'https://cdn.discordapp.com/attachments/701070498573975643/813816101418172426/default-avatar.png' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`userId`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
