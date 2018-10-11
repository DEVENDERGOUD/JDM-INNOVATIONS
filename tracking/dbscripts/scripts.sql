CREATE TABLE Membership ( MembershipId int NOT NULL PRIMARY KEY AUTO_INCREMENT, OrganizationId Int NOT NULL, MembershipName Varchar(1000) NOT NULL, CONSTRAINT FK_OrganizationId FOREIGN KEY (OrganizationId) REFERENCES Organizations(OrganizationId) )
CREATE TABLE Registration ( RegistrationId int NOT NULL PRIMARY KEY AUTO_INCREMENT, OrganizationId Int NOT NULL, RegistrationName Varchar(1000) NOT NULL, CONSTRAINT FK_OrganizationId_reg FOREIGN KEY (OrganizationId) REFERENCES Organization(OrganizationId) )
CREATE TABLE SKills ( SkillId int NOT NULL PRIMARY KEY AUTO_INCREMENT, SKillAreaId Int NOT NULL, SkillName Varchar(1000) NOT NULL, CONSTRAINT FK_SKillAreaId FOREIGN KEY (SkillAreaId) REFERENCES skillarea(SkillAreaId) )
CREATE TABLE RoleAndSKills ( SkillId int NOT NULL, RoleId Int NOT NULL, CONSTRAINT FK_SKillId FOREIGN KEY (SKillId) REFERENCES skills(SKillId),CONSTRAINT FK_RoleId FOREIGN KEY (RoleId) REFERENCES roles(RoleId) )
CREATE TABLE RoleAndRegistrationId ( RegistrationId int NOT NULL, RoleId Int NOT NULL, CONSTRAINT FK_RoleAndRegistrationId_SKillId FOREIGN KEY (RegistrationId) REFERENCES registration(RegistrationId),CONSTRAINT FK_RoleAndRegistrationId_RoleId FOREIGN KEY (RoleId) REFERENCES roles(RoleId) )
CREATE TABLE ROleandmembership ( MemberShipId int NOT NULL, RoleId Int NOT NULL, CONSTRAINT FK_ROleandmembership_MemberShipId FOREIGN KEY (MemberShipId) REFERENCES membership(MemberShipId),CONSTRAINT FK_ROleandmembership_RoleId FOREIGN KEY (RoleId) REFERENCES roles(RoleId) )

INSERT INTO organization ( Name, UniqueName, Country) VALUES
( 'Telstra', 'Telstra', 'Australia'),
( 'ACS', 'ACS', 'Australia'),
( 'Coles', 'Coles', 'Australia'),
( 'Schindler', 'SchindlerLifts', 'Australia'),
('Myer', 'Myer', 'Australia'),
('Mazda', 'Mazda', 'Australia'),
('JDM Innovatios', 'JDMInnovatios', 'Australia'),
('My Company', 'My Company', 'Australia'),
('New Company', 'New Company', 'Australia'),
('Air Ways', 'Air Ways', 'India');

ALTER TABLE roles ADD CONSTRAINT FK_Role_OrgId FOREIGN KEY(OrganizationId) REFERENCES organization(OrganizationId)