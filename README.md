🚗 Royal Rentals – Luxury Car Rental System
Royal Rentals is a luxury car rental system that provides users with a seamless experience for renting high-end cars like Lamborghini, Ferrari, and Audi. The system includes both User and Admin modules, enabling efficient booking management, profile verification, and data visualization.

📂 Project Structure
User Module
1. Profile Verification
Users must complete profile verification before booking a car.
Required details include personal information and a driving license photo.
Verification requests are sent to the admin for approval.
Only verified users can book cars.
2. Car Booking
Users can browse and filter cars by brand (e.g., Lamborghini, Ferrari, Audi).
Users can book multiple cars.
Booking history and rental details are displayed on the user dashboard.
3. Contact Admin
Users can send queries or issues to the admin via the Contact Page.
Admin responds to user queries directly.
4. User Authentication
Features include Login, Logout, and Registration for secure access.
Admin Module
1. Profile Verification Management
Admin can approve or reject user verification requests.
Admin sends rejection messages with reasons if needed.
2. Booking Management
Admin can accept or remove bookings.
Admin can view user information, car details, and rental duration.
Admin tracks car availability and manages multiple bookings.
3. Query Management
Admin can view and respond to user queries sent through the Contact Page.
4. Data Visualization
Admin dashboard uses Chart.js for real-time analytics:
Number of bookings.
Verification requests.
Rental trends by brand and time period.
5. Car Inventory Management
Admin can add, update, or remove car details.
🛠️ Technical Stack
Front-End
HTML, CSS, JavaScript for responsive and dynamic design.
Chart.js for real-time data visualization.
Back-End
PHP for server-side logic and application flow.
MySQL for secure and structured data storage.
🔄 User Journey
User Registration:

Users register and log in to access the platform.
Profile Verification:

Users submit personal details and a driving license photo for verification.
Admin reviews and approves/rejects the verification request.
Car Booking:

Verified users can browse and filter cars by brand.
Users can book one or multiple cars and view booking history.
Booking Management:

Admin manages all bookings, including approvals, removals, and updates.
Contact Support:

Users can contact the admin for queries or support through the contact page.
Admin responds directly to user queries.
🖥️ Installation Guide
Follow these steps to set up the project on your local machine:

1. Clone the Repository
bash
Copy code
git clone https://github.com/yourusername/royal-rentals.git
2. Navigate to the Project Directory
bash
Copy code
cd royal-rentals
3. Set Up the Database
Create a MySQL database.
Import the SQL file provided in the /database folder.
4. Configure Database Connection
Open the config.php file.
Update the database connection details:
php
Copy code
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "royal_rentals";
5. Start the Server
Use a local server like XAMPP or WAMP to run the PHP project.
Place the project files in the htdocs directory (for XAMPP).
6. Access the Application
Open your web browser and navigate to:
bash
Copy code
http://localhost/royal-rentals
🛡️ Security Features
Secure user authentication using hashed passwords.
Role-based access for Admin and User.
Data validation and input sanitization.
📊 Admin Dashboard
The admin dashboard provides a comprehensive overview of the system's activity:

Number of bookings.
User verification requests.
Rental trends by brand and time period.
