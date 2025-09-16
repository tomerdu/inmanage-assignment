
# InManage PHP Assignment

This project was developed as part of the InManage PHP Developer assignment.  
It demonstrates working with **PHP, MySQL, PDO, and cURL** to build a simple system with users and posts.

---

## Features

1. **Database Layer**  
   - Implemented `Database.php` class with CRUD operations (select, insert, update, delete).  
   - Using PDO for secure queries.  

2. **Data Import**  
   - Fetching users and posts from JSONPlaceholder API using cURL.  
   - Saving them into MySQL (`users`, `posts`) with random birthdates and randomized post timestamps.  

3. **Avatar Download**  
   - Downloading and saving an avatar image locally via PHP/cURL.  

4. **Social Feed**  
   - Displaying all active users and their posts with the avatar image.  

5. **Birthday Logic**  
   - Retrieving the latest post from a user whose birthday is in the current month.  

6. **Posts by Hour Report**  
   - SQL query and PHP table to show the number of posts per hour per date.  

7. **Database Diagram**  
   - ERD built with DB Designer.  
   - Shows relations between `users` and `posts` tables.

---

## Database Diagram

The ERD of the project is available in the `docs/` folder.

---

## How to Run

Clone the repository:
   ```bash
   git clone https://github.com/tomerdu/inmanage-assignment/
   cd inmanage-assignment


