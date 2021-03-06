/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen
Date:			12/15/2017
Description:	Creates the eventtype table and respective stored procedures

*/


USE cory2v;



-- ------------------------------------------------------------
-- Drop existing objects
-- ------------------------------------------------------------

DROP TABLE IF EXISTS `cory2v`.`eventtype`;
DROP PROCEDURE IF EXISTS `cory2v`.`usp_eventtype_Load`;
DROP PROCEDURE IF EXISTS `cory2v`.`usp_eventtype_LoadAll`;
DROP PROCEDURE IF EXISTS `cory2v`.`usp_eventtype_Add`;
DROP PROCEDURE IF EXISTS `cory2v`.`usp_eventtype_Update`;
DROP PROCEDURE IF EXISTS `cory2v`.`usp_eventtype_Delete`;
DROP PROCEDURE IF EXISTS `cory2v`.`usp_eventtype_Search`;


-- ------------------------------------------------------------
-- Create table
-- ------------------------------------------------------------



CREATE TABLE `cory2v`.`eventtype` (
Id INT AUTO_INCREMENT,
Name VARCHAR(255),
Description VARCHAR(1025),
CONSTRAINT pk_eventtype_Id PRIMARY KEY (Id)
);


-- ------------------------------------------------------------
-- Create default SCRUD sprocs for this table
-- ------------------------------------------------------------


DELIMITER //
CREATE PROCEDURE `cory2v`.`usp_eventtype_Load`
(
	 IN paramId INT
)
BEGIN
	SELECT
		`eventtype`.`Id` AS `Id`,
		`eventtype`.`Name` AS `Name`,
		`eventtype`.`Description` AS `Description`
	FROM `eventtype`
	WHERE 		`eventtype`.`Id` = paramId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `cory2v`.`usp_eventtype_LoadAll`
()
BEGIN
	SELECT
		`eventtype`.`Id` AS `Id`,
		`eventtype`.`Name` AS `Name`,
		`eventtype`.`Description` AS `Description`
	FROM `eventtype`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `cory2v`.`usp_eventtype_Add`
(
	 IN paramName VARCHAR(255),
	 IN paramDescription VARCHAR(1025)
)
BEGIN
	INSERT INTO `eventtype` (Name,Description)
	VALUES (paramName, paramDescription);
	-- Return last inserted ID as result
	SELECT LAST_INSERT_ID() as id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `cory2v`.`usp_eventtype_Update`
(
	IN paramId INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	UPDATE `eventtype`
	SET Name = paramName
		,Description = paramDescription
	WHERE		`eventtype`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `cory2v`.`usp_eventtype_Delete`
(
	IN paramId INT
)
BEGIN
	DELETE FROM `eventtype`
	WHERE		`eventtype`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `cory2v`.`usp_eventtype_Search`
(
	IN paramId INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	SELECT
		`eventtype`.`Id` AS `Id`,
		`eventtype`.`Name` AS `Name`,
		`eventtype`.`Description` AS `Description`
	FROM `eventtype`
	WHERE
		COALESCE(eventtype.`Id`,0) = COALESCE(paramId,eventtype.`Id`,0)
		AND COALESCE(eventtype.`Name`,'') = COALESCE(paramName,eventtype.`Name`,'')
		AND COALESCE(eventtype.`Description`,'') = COALESCE(paramDescription,eventtype.`Description`,'');
END //
DELIMITER ;


