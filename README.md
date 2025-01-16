# Soldes (Solusi Desa)

## About the Web Application
Soldes, short for "Solusi Desa," is a web-based platform designed to streamline citizen complaint management for local communities. With a simple login system, users can submit reports and track responses directly through their accounts.

The application is built using Laravel, styled with Bootstrap and jQuery, and utilizes Laravel Breeze for handling authentication credentials.

## Screenshots
### Dashboard
![Image](https://github.com/user-attachments/assets/633bdf2f-ad12-4bfe-83df-9ea7e9b0ff2f)

### Form Laporan 
![Image](https://github.com/user-attachments/assets/774e6c3c-a64a-4143-b749-ec3787b885e6)

### Login Page
![Image](https://github.com/user-attachments/assets/735831f4-ec24-4d87-80a5-6fbcb53b0991)

## How to Install and Run

1. **Install PHP**
   - Ensure PHP is installed and can be run via the command line.

2. **Install MySQL**
   - Set up a MySQL database on your system.

3. **Clone the Repository**
   - Clone the project repository to your local machine.

4. **Configure the Environment File**
   - Edit the `.env` file and update the following fields with your MySQL credentials:
     ```env
     DB_HOST=your_database_host
     DB_PORT=your_database_port
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_username
     DB_PASSWORD=your_database_password
     ```

5. **Run Database Migrations**
   - Execute the following command to set up the database schema:
     ```bash
     php artisan migrate:fresh
     ```

6. **Start the Development Server**
   - Run the server using the following command:
     ```bash
     php artisan serve
     ```

7. **Access the Application**
   - Open your browser and go to `http://localhost:8000` to start using Soldes.

