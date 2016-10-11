Place your queries below
--FEATURE SET 1
-- find one user from the user table by username
SELECT * FROM `users` WHERE username = 'googly eyes';
--change one user's email from your user table. Update only the user that you had previously selected above
UPDATE `users` SET `email`='googly_eyes@gmail.com' WHERE `username` = 'googly eyes';
--add one new user to your user table
--INSERT INTO `users` (`id`, `username`, `email`) VALUES (NULL, 'bubba hotep', 'bubba_hotep@epyptian_mummies.com');
INSERT INTO `users` SET `username`='bubba hotep', `email`='bubba_hotep@epyptian_mummies.com';
--delete the user you just create
DELETE FROM `users` WHERE `username`='bubba hotep';


--FEATURE SET 2
--Select all todo_items made by 1 user of your choice
SELECT * FROM `todo_items` WHERE `user_id`='2';

--Insert a new todo item into the table by that same user
INSERT INTO `todo_items` SET `id`='11', `title`='wash the dishes', `details`='wash the dishes before company comes over', `timestamp`='2017', `user_id`='2';

--Delete a todo item by that user
DELETE FROM `todo_items` WHERE `user_id`='2' AND `title`='pick up groceries';

-- Update a todo item by that user with data of your choice
UPDATE `todo_items` SET `title`='garbage' WHERE `id`='8';

--Perform a select to get all information from `users` by using the user's id
SELECT * FROM `users` WHERE `ID`='2';