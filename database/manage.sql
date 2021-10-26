CREATE TABLE doctors(
            id          INTEGER,
            first_name  TEXT NOT NULL,
            last_name   TEXT,
            field       TEXT,  
            email       TEXT NOT NULL UNIQUE,
            PRIMARY KEY(id)
            );

CREATE TABLE room(
            id          INTEGER,
            room_no      INTEGER,
            room_floor       INTEGER,
            room_type        TEXT,
            PRIMARY KEY(id)
            );            

CREATE TABLE schedule(
            id_room     INTEGER,
            id_doctor   INTEGER,
            date        INTEGER,
            month       INTEGER,
            year        INTEGER,
            hour        INTEGER,
            minute      INTEGER,
            FOREIGN KEY(id_room) REFERENCES room(id),
            FOREIGN KEY(id_doctor) REFERENCES doctors(id)
            );

INSERT INTO doctors (id,first_name,last_name,field,email)
VALUES (1, 'John', 'Doe', 'Family Doctor', 'johndoeusth@gmail.com');

INSERT INTO doctors (id,first_name,last_name,field,email)
VALUES 
(2, 'Jane', 'Doe', 'Gynecologist', 'janedoeusth@gmail.com'),
(3, 'James', 'Baxter', 'Surgeon', 'jamesbaxter@gmail.com');

INSERT INTO room (id,room_no,room_floor,room_type)
VALUES 
(1, 101, 1, 'Office'),
(2, 102, 1, 'OBGYN'),
(3, 402, 4, 'Sugery');

INSERT INTO schedule (id_room, id_doctor, date, month, year, hour, minute)
VALUES
(1, 1, 28, 10, 2021, 14, 30),
(2, 2, 28, 10, 2021, 10, 00),
(3, 3, 30, 10, 2021, 15, 15);