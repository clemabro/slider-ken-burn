#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        login    Varchar (50) NOT NULL ,
        password Varchar (255) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (login)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: image
#------------------------------------------------------------

CREATE TABLE image(
        idImage             Int  Auto_increment  NOT NULL ,
        tempsAffichage      Int ,
        x_source            Float  ,
        y_source            Float  ,
        largeur_source      Float  ,
        hauteur_source      Float  ,
        x_destination       Float  ,
        y_destination       Float  ,
        largeur_destination Float  ,
        hauteur_destination Float  ,
        chemin              Varchar (255) NOT NULL
	,CONSTRAINT image_PK PRIMARY KEY (idImage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: slider
#------------------------------------------------------------

CREATE TABLE slider(
        idSlider     Int  Auto_increment  NOT NULL ,
        nom          Varchar (50) NOT NULL ,
        dateCreation Date NOT NULL ,
        dateMaj      Date NOT NULL
	,CONSTRAINT slider_PK PRIMARY KEY (idSlider)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RelUserImageSlider
#------------------------------------------------------------

CREATE TABLE RelUserImageSlider(
        login    Varchar (50) NOT NULL ,
        idImage  Int NOT NULL ,
        idSlider Int NOT NULL
	,CONSTRAINT RelUserImageSlider_PK PRIMARY KEY (login,idImage,idSlider)

	,CONSTRAINT RelUserImageSlider_user_FK FOREIGN KEY (login) REFERENCES user(login)
	,CONSTRAINT RelUserImageSlider_image0_FK FOREIGN KEY (idImage) REFERENCES image(idImage)
	,CONSTRAINT RelUserImageSlider_slider1_FK FOREIGN KEY (idSlider) REFERENCES slider(idSlider)
)ENGINE=InnoDB;

