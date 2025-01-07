# Capstone Web Application

This project is a web application developed as part of our capstone project for school academic requirement. The application serves as a data management system for patient information, aiming to provide a more efficient and systematic process for encoding patient records. By providing a structured, user-friendly platform, the application aims to enhance data handling processes.

This project is created and will be part of hospitals of Manila, who will serve as our client and primary source of information that will guide us in gathering the essential knowledge and requirements needed for effective and secure data management.


## Setup

1. Install XAMPP [Apache Friends](https://www.apachefriends.org/) or [Installer](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe)
2. Clone this Repository [capstone_webapp](https://github.com/fnicholasramos/capstone_webapp/archive/refs/heads/main.zip)
3. Extract and move the folder `capstone_webapp-main` to the `C:\xampp\htdocs\` and rename the folder into `capstone`
4. Start Apache and MySQL
    - Open the XAMPP Control Panel and start both the Apache and MySQL services.
5. Set Up the Database
    - Open a browser and go to http://localhost/phpmyadmin.
    - Create a new database name `capstone` then import the SQL file provided 
6. Go to `capstone/vendor/tecnickcom/` open a terminal and clone paste: 
    - `git clone https://github.com/tecnickcom/TCPDF.git`
7. Browse to [http://localhost/capstone/](http://localhost/capstone/) 
8. Login `admin:jenkins1`, `user1:user1234`, `user2:user4321`

## Credits 
This project utilizes the TCPDF libray, an open-source PDF generation library for PHP, developed and maintained by [Nicola Asuni](https://github.com/nicolaasuni).
an open-source PDF generation library for PHP, developed and maintained by Nicola Asuni.

For more information about TCPDF, visit the official repository: [TCPDF](https://github.com/tecnickcom/TCPDF)