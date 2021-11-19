#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: roleuser
#------------------------------------------------------------

CREATE TABLE roleuser(
        roleID    Int NOT NULL ,
        roleName  Varchar (255) NOT NULL ,
        roleCode  Varchar (255) NOT NULL
	,CONSTRAINT roleuser_PK PRIMARY KEY (roleID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        categoryID      Int NOT NULL ,
        categoryName    Varchar (11) NOT NULL ,
        categoryCreated Date NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (categoryID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        userID    Int NOT NULL ,
        firstName Varchar (255) NOT NULL ,
        lastName  Varchar (255) NOT NULL ,
        userTel Varchar (55) NOT NULL ,
        userEmail     Varchar (65) NOT NULL ,
        userName  Varchar (255) NOT NULL ,
        userPassword  Varchar (255) NOT NULL ,
        roleID    Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (userID)

	,CONSTRAINT users_roleuser_FK FOREIGN KEY (roleID) REFERENCES roleuser(roleID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: posts
#------------------------------------------------------------

CREATE TABLE posts(
        postID     Int NOT NULL ,
        postTitle       Varchar (255) NOT NULL ,
        postImage  Varchar (255) NOT NULL ,
        postBody   Varchar (255) NOT NULL ,
        postTag    Varchar (255) NOT NULL ,
        postCreated_at Date NOT NULL ,
        userID     Int NOT NULL ,
        categoryID Int NOT NULL
	,CONSTRAINT posts_PK PRIMARY KEY (postID)

	,CONSTRAINT posts_users_FK FOREIGN KEY (userID) REFERENCES users(userID)
	,CONSTRAINT posts_category0_FK FOREIGN KEY (categoryID) REFERENCES category(categoryID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CategoryCreatedBy
#------------------------------------------------------------

CREATE TABLE CategoryCreatedBy(
        userID     Int NOT NULL ,
        categoryID Int NOT NULL
	,CONSTRAINT CategoryCreatBy_PK PRIMARY KEY (userID,categoryID)

	,CONSTRAINT CategoryCreatBy_users_FK FOREIGN KEY (userID) REFERENCES users(userID)
	,CONSTRAINT CategoryCreatBy_category0_FK FOREIGN KEY (categoryID) REFERENCES category(categoryID)
)ENGINE=InnoDB;

