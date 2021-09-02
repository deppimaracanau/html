
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'lblQuickLinks', 'backend', 'Label / Quick links', 'script', '2015-07-27 03:31:26');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', 'Quick links', 'script');

INSERT INTO `fields` VALUES (NULL, 'btnAddEvent', 'backend', 'Button / + Add event', 'script', '2015-07-27 03:35:12');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', '+ Add event', 'script');

INSERT INTO `fields` VALUES (NULL, 'btnAddCategory', 'backend', 'Button / + Add category', 'script', '2015-07-27 03:34:50');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', '+ Add category', 'script');

INSERT INTO `fields` VALUES (NULL, 'btnExportEvents', 'backend', 'Button / + Export events', 'script', '2015-07-27 03:36:43');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', '+ Export events', 'script');

INSERT INTO `fields` VALUES (NULL, 'btnAddUser', 'backend', 'Button / + Add user', 'script', '2015-07-27 03:37:07');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', '+ Add user', 'script');

INSERT INTO `fields` VALUES (NULL, 'lnkFindEvents', 'backend', 'Link / Find events', 'script', '2015-07-27 03:40:24');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', 'Find events', 'script');

INSERT INTO `fields` VALUES (NULL, 'lnkPreviewCalendar', 'backend', 'Link / Preview calendar', 'script', '2015-07-27 03:50:10');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', 'Preview calendar', 'script');

INSERT INTO `fields` VALUES (NULL, 'lnkBackupData', 'backend', 'Link / Backup data', 'script', '2015-07-27 03:51:48');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', 'Backup data', 'script');

INSERT INTO `fields` VALUES (NULL, 'lnkTranslateCalendar', 'backend', 'Link / Translate calendar', 'script', '2015-07-27 03:52:53');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '::LOCALE::', 'title', 'Translate calendar', 'script');

COMMIT;