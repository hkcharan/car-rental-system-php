# 🚗 Royal Rentals – Luxury Car Rental System

Royal Rentals is a luxury car rental system designed for users to rent high-end cars like Lamborghini, Ferrari, and Audi. It features a user-friendly interface, seamless booking experience, and an admin panel to manage bookings, user verification, and car inventory.

---

## 📂 Project Structure

### User Module
1. **Profile Verification:**
   - Users must complete profile verification before booking a car.
   - Required details include personal information and a driving license photo.
   - Verification requests are sent to the admin for approval.
   - Only verified users can book cars.

2. **Car Booking:**
   - Browse and filter cars by brand (e.g., Lamborghini, Ferrari, Audi).
   - Book multiple cars simultaneously.
   - View booking history and rental details on the user dashboard.

3. **Contact Admin:**
   - Users can send queries or issues to the admin via the Contact Page.
   - Admin responds directly to user queries.

4. **User Authentication:**
   - Includes Login, Logout, and Registration for secure access.

### Admin Module
1. **Profile Verification Management:**
   - Approve or reject user verification requests.
   - Send rejection messages with reasons if needed.

2. **Booking Management:**
   - Accept or remove bookings.
   - View user information, car details, and rental duration.
   - Track car availability and manage multiple bookings.

3. **Query Management:**
   - View and respond to user queries sent through the Contact Page.

4. **Data Visualization:**
   - Use Chart.js for real-time analytics:
     - Number of bookings.
     - Verification requests.
     - Rental trends by brand and time period.

5. **Car Inventory Management:**
   - Add, update, or remove car details.

---

## 🛠️ Technical Stack

**Front-End:**
- HTML, CSS, JavaScript.
- Chart.js for real-time data visualization.

**Back-End:**
- PHP for server-side logic.
- MySQL for secure and structured data storage.

---

## 🔄 User Journey

1. **User Registration:**
   - Users register and log in to access the platform.

2. **Profile Verification:**
   - Submit personal details and a driving license photo for verification.
   - Admin reviews and approves/rejects the verification request.

3. **Car Booking:**
   - Verified users can browse and filter cars by brand.
   - Book one or multiple cars and view booking history.

4. **Booking Management:**
   - Admin manages all bookings, including approvals, removals, and updates.

5. **Contact Support:**
   - Users can contact the admin for queries or support through the contact page.
   - Admin responds directly to user queries.

---

## 🖥️ Installation Guide

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/hkcharan/car-rental-system-php.git
   ```

2. **Navigate to the Project Directory:**
   ```bash
   cd car-rental-system-php
   ```

3. Set Up the Database
  - Create a new MySQL database.
  - Import the SQL file provided in the /database folder into your newly created database.

4. Configure Database Connection
Open the config.php file in the project directory.
Update the database connection details with your MySQL credentials:
   ```php
   $servername = "localhost";
   $username = "your_db_username";
   $password = "your_db_password";
   $dbname = "royal_rentals";
   ```

5. Start the Server
  - Use a local server environment like XAMPP, WAMP, or MAMP to run the PHP project.
  - Place the project files in the htdocs directory (for XAMPP) or the equivalent folder for your server.

6. Access the Application
Open your web browser and navigate to:
   ```bash
   http://localhost/car-rental-system-php
   ```

---

📊 Admin Dashboard
The admin dashboard provides a comprehensive overview of the system's activity:
   - Number of bookings.
   - User verification requests.
   - Rental trends by brand and time period.

---


