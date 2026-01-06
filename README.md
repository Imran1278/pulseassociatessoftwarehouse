# Pulse Associates Software House
Pulse Associates is a dynamic technology firm dedicated to delivering high-impact digital solutions and strategic consultancy. Specializing in custom software development, mobile applications, and web-enabled platforms, the company empowers businesses to thrive in a digital-first economy.
# Project Installation and Setup Guide 
  ## Step 1: Install XAMPP
    First, download and install XAMPP on your computer.
    XAMPP is a local server that provides Apache (for running PHP files) and MySQL (for database).
    After installation is complete, open the XAMPP Control Panel.
  
  ## Step 2: Start Apache and MySQL
    In the XAMPP Control Panel:
    Click Start next to Apache
    Click Start next to MySQL
    When both services turn green, it means the local server is running successfully.
  
  ## Step 3: Download Project Files from GitHub
    Open your web browser and go to GitHub using the given project link.
    Click on the Code button
    Select Download ZIP
    The project files will be downloaded as a .zip file
  
  ## Step 4: Extract the ZIP File
    Go to the drive where the .zip file is downloaded.
    Right-click on the file
    Click Extract Here or Extract All
    After extraction, you will see a project folder.
    After extraction, cut the folder name as "Database File MySql" because this folder is used only for database.
  
  ## Step 5: Rename the Project Folder
    Rename the extracted folder to Project1.
    This name will be used in the browser URL to run the project.
  
  ## Step 6: Copy Project Folder to htdocs
    Now:
    Copy the Project1 folder
    Go to the XAMPP installation directory
    (Example: C:\xampp\)
    Open the htdocs folder
    Paste Project1 inside htdocs
    This step is important because Apache only runs files from the htdocs directory.
  
  ## Step 7: Run the Project in Browser
    Open any web browser (Chrome, Edge, etc.).
    In the address bar, type:
    http://localhost/Project1/index.php
    Press Enter.
    If everything is correct, the project homepage will open.
  
  ## Step 8: Open phpMyAdmin
    Now open phpMyAdmin to set up the database.
    In the browser, type:
    http://localhost/phpmyadmin/
    phpMyAdmin is a tool used to manage MySQL databases.
  
  ## Step 9: Import Database (.sql File)
    In phpMyAdmin:
    Click on the Import tab
    Click Choose File
    Select the .sql file that was included in the downloaded ZIP project
    Click Go
    The database will be imported successfully.
  
  ## Step 10: Verify Database and Project
    After importing:
    You can see the database tables in phpMyAdmin
    Refresh the project page in the browser
    Now the project will work properly with the database connected.
  
  ## Step 11: Final Result
    The project is now fully set up:
    Website runs on localhost
    Database is connected via MySQL
  
  You can view, test, and use all features of the project
