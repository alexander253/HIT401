use waste_app;

#Customer
INSERT INTO `user` (`email`, `fname`, `lname`, `points`, `hashed_password`, `salt`)
VALUES
  ('bob@hotmail.com', 'Bob', 'Marley', '12', '1234', '1234'),
  ('frank@gmail.com', 'Frank', 'Citezen', '23','1234','1234' ),
  ('silin@gmail.com', 'Silin', 'Chen','15', '1234','1234' ),
  ('james@gmail.com', 'James', 'Lin', '4','1234','1234' ),
  ('alex@gmail.com', 'Alex', 'Lay', '2', '1234','1234' )

;


#Product

INSERT INTO `bin` (`id`, `type`, `location`, `used`)
VALUES
('1', 'Red', 'Red Precint', '12'),
('2', 'Yellow', 'Red Precint', '5'),
('3', 'Green', 'Red Precint', '6');
