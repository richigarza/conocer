USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_getEstados`;


DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getEstados`(
)
BEGIN

	SELECT * FROM Estados;

END$$

DELIMITER ;