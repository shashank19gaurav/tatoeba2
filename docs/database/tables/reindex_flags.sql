DROP TABLE IF EXISTS `reindex_flags`;
CREATE TABLE `reindex_flags` (
  `sentence_id` int(11) NOT NULL,
  `lang_id` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`sentence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
