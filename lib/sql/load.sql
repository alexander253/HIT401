use waste_app;

#user
INSERT INTO `user` (`email`, `fname`, `lname`, `points`, `hashed_password`, `salt`)
VALUES
  ('bob@hotmail.com', 'Bob', 'Marley', '12', '1234', '1234'),
  ('frank@gmail.com', 'Frank', 'Citezen', '23','1234','1234' ),
  ('silin@gmail.com', 'Silin', 'Chen','15', '1234','1234' ),
  ('james@gmail.com', 'James', 'Lin', '4','1234','1234' ),
  ('alex@gmail.com', 'Alex', 'Lay', '2', '1234','1234' )

;


#Bins

INSERT INTO `bin` (`id`, `type`, `location`, `used`)
VALUES
('1', 'Red', 'Red Precinct', '12'),
('2', 'Yellow', 'Red Precinct', '5'),
('3', 'Green', 'Red Precinct', '6');

INSERT INTO `rubbish` (`id`, `type`, `description`)
VALUES
('1', 'Recycle', 'Cardboard'),
('2', 'General Waste', 'Food Scraps'),
('3', 'Commingled Waste', 'Misc');
