 /* GENERAL ISSUES (ALL TABLES) */
 
/* 
 * 1) Mix of different ways of naming of the columns. It's not s good practice.
 *    I offer follow like this: 
 * 	    a) 'column', 'someColumn'
 * 		OR
 *      b) 'column', 'some_column'
 * 
 * 2) I assume following columns in application are booleans: 
 * 			a) Property.Bedroom 
 * 			b) Property.Living_room
 * 			c) Property.Diningroom
 *          d) HDB.HDBBlock
 * 			e) Condo.SwimmingPool
 *   The best way of storing values is use BIT column type and not a TINYINT or INT like made above.
 *  
 */  
 
/**
 * PER TABLE ISSUES (inline comments)
 */

/* 
 * We can't create foreign key if primary table is of type "MyISAM". We are creating a foreign keys in 
 * HDB and Condo tables referencing a Property table. We need to have "Property" table as well as InnoDB. 	 	     
 */
CREATE TABLE Property (
    ID BIGINT AUTO_INCREMENT PRIMARY KEY,
    Type TINYINT default 1, 
    Title CHAR(255) default '',
    Address TEXT NOT NULL,
    Bedroom INT default 0,
    Living_room INT default 0,
    Diningroom INT default 0,
    Size Decimal(6,2) default 0.0
) ENGINE=MyISAM;

CREATE TABLE HDB (
    ID BIGINT AUTO_INCREMENT PRIMARY KEY,
    PID BIGINT NOT NULL,
    HDBBlock INT NOT NULL,
    INDEX idx_PID (PID), 
    FOREIGN KEY (PID) REFERENCES Property(ID)
) ENGINE=InnoDB;

/*
 * 1) Missing PRIMARY KEY declaration for ID column
 * 2) Condo.PID should be BIGINT because refeences Property.ID
 */
CREATE TABLE Condo (
    ID BIGINT AUTO_INCREMENT,
    PID INT NOT NULL,
    SwimmingPool TINYINT default 0,
    INDEX idx_PID (PID), 
    FOREIGN KEY (PID) REFERENCES Property(ID)
) ENGINE=InnoDB;