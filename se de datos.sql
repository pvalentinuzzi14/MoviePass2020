CREATE DATABASE IF NOT EXISTS mooviepass;

USE mooviepass;

/*
  Tables: 

*/


CREATE TABLE UserRole( id INT AUTO_INCREMENT NOT NULL,
		    description VARCHAR(40),
		    CONSTRAINT pk_user_roles PRIMARY KEY(id),
		    CONSTRAINT unq_user_roles UNIQUE(description));

CREATE TABLE Users (idUsers INT AUTO_INCREMENT NOT NULL,
            email VARCHAR(40),
            PASSWORD VARCHAR(100),
            first_name VARCHAR(40),
            last_name VARCHAR(40),
            id_user_role INT,
            id_facebook VARCHAR(100),
            CONSTRAINT pk_users PRIMARY KEY(idUsers),
            CONSTRAINT unq_users UNIQUE(email),
            CONSTRAINT fk_users_user_roles FOREIGN KEY(id_user_role) REFERENCES UserRole(id));
             
 CREATE TABLE Cinemas
            (idCinemas INT AUTO_INCREMENT NOT NULL,
            cinema_name VARCHAR(40),
            state TINYINT(1),
            address VARCHAR(40),
            opening_time TIME(4),
            closing_time TIME(4),
            CONSTRAINT pk_cinemas PRIMARY KEY(idCinemas),
            CONSTRAINT unq_cinemas UNIQUE(cinema_name));
 
 CREATE TABLE Rooms (
	    idRooms INT AUTO_INCREMENT NOT NULL,
            id_cinema INT,
            room_name VARCHAR(40),
            state TINYINT(1),
            capacity INT,
            ticket_price INT,
            CONSTRAINT pk_rooms PRIMARY KEY(idRooms),
            CONSTRAINT fk_rooms_cinemas FOREIGN KEY(id_cinema) REFERENCES Cinemas(idCinemas),
            CONSTRAINT unq_rooms UNIQUE(room_name, id_cinema));

CREATE TABLE payments
            (id_payment INT AUTO_INCREMENT NOT NULL,
            total INT,
            id_purchase INT,
            CONSTRAINT pk_payments PRIMARY KEY(id_payment));
 
 
CREATE TABLE purchases
            (id_purchase INT AUTO_INCREMENT NOT NULL,
            purchased_tickets INT,
            date_purchase VARCHAR(15),
            discount INT,
            id_user INT NOT NULL,
            id_payment INT,
            CONSTRAINT pk_purchases PRIMARY KEY(id_purchase),
            CONSTRAINT fk_purchases_users FOREIGN KEY(id_user) REFERENCES Users(idUsers),
            CONSTRAINT fk_purchases_payments FOREIGN KEY(id_payment) REFERENCES payments(id_payment));
 
CREATE TABLE movies
            (id_movie INT AUTO_INCREMENT NOT NULL,
            id_api_movie INT,
            name_movie VARCHAR(40),
            overview VARCHAR(700),
            poster VARCHAR(100),
            background VARCHAR(100),
            score FLOAT,
            uploading_date VARCHAR(15),
            CONSTRAINT pk_movies PRIMARY KEY(id_movie),
            CONSTRAINT unq_movies UNIQUE(id_api_movie)); 
 
 
 
 CREATE TABLE showtimes
            (id INT AUTO_INCREMENT,
            date_showtime VARCHAR(15),
            opening_time TIME(4),
            closing_time TIME(4),
            tickets_sold INT,
            total_tickets INT,
            ticket_price INT,
            id_rooms INT,
            id_movie INT,
            CONSTRAINT pk_showtimes PRIMARY KEY(id),
            CONSTRAINT fk_showtimes_rooms FOREIGN KEY(id_rooms) REFERENCES Rooms(idRooms),
            CONSTRAINT fk_showtimes_movies FOREIGN KEY(id_movie) REFERENCES movies(id_movie)); 
 
 
CREATE TABLE tickets
            (id_ticket INT AUTO_INCREMENT,
            number INT,
            id_purchase INT,
            id_showtime INT,
            CONSTRAINT pk_tickets PRIMARY KEY(id_ticket),
            CONSTRAINT fk_tickets_showtimes FOREIGN KEY(id_showtime) REFERENCES showtimes(id),
            CONSTRAINT fk_tickets_purchases FOREIGN KEY(id_purchase) REFERENCES purchases(id_purchase));
 

 
 CREATE TABLE genres
            (id_genre INT AUTO_INCREMENT,
            id_api_genre INT,
            name_genre VARCHAR(40),
            CONSTRAINT pk_genres PRIMARY KEY(id_genre),
            CONSTRAINT unq_genres UNIQUE(id_api_genre));
            
 CREATE TABLE genres_per_movie
            (id_movie INT,
            id_genre INT,
            CONSTRAINT pk_genres_per_movie PRIMARY KEY(id_movie, id_genre),
            CONSTRAINT fk_genres_per_movie_movies FOREIGN KEY(id_movie) REFERENCES movies(id_movie),
            CONSTRAINT fk_genres_per_movie_genres FOREIGN KEY(id_genre) REFERENCES genres(id_genre));
            

 			
ALTER TABLE payments ADD CONSTRAINT fk_payments_purchases FOREIGN KEY(id_purchase) REFERENCES purchases(id_purchase);
