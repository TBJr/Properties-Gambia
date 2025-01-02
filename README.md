# Properties-Gambia Real Estate CRM

**Properties-Gambia** is a comprehensive Customer Relationship Management (CRM) system designed for the real estate industry in The Gambia. This system simplifies property management, enhances client engagement, and streamlines sales processes. Leveraging the modern and responsive **Custom Built Laravel** theme, it offers a professional and user-friendly experience across devices.

---

## **Table of Contents**

1. [Objectives](#objectives)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Installation and Setup](#installation-and-setup)
5. [Usage](#usage)
6. [Project Structure](#project-structure)
7. [Future Enhancements](#future-enhancements)
8. [Contributing](#contributing)
9. [License](#license)

---

## **Objectives**

The system aims to:

1. Streamline real estate operations by centralizing property and client management.
2. Enhance user productivity through intuitive tools and insights.
3. Improve client engagement with seamless communication features.
4. Increase operational transparency with real-time updates and reporting.
5. Deliver a modern and intuitive experience using a **Custom Built Theme**.
6. Ensure data security with role-based access and authentication.

---

## **Features**

### Property Management
- Add, edit, and delete property listings with details such as location, price, and images.
- Mark properties as available, sold, or pending.

### Client Management
- Maintain a database of clients with contact details and engagement history.
- Track inquiries and leads for effective communication.

### Advanced Search and Filters
- Search properties by price, location, or property type.
- Use filters for targeted results.

### Dashboards and Analytics
- Dynamic dashboards to view metrics like sales, inquiries, and revenue.
- Real-time charts and widgets for performance tracking.

### User Authentication
- Secure login system with role-based access for Admins, Agents, and Clients.

### Responsive Design
- Optimized for desktops, tablets, and mobile devices.

### Notifications
- Real-time updates for inquiries, status changes, and appointments.

### Reporting
- Export reports in PDF or Excel format.

---

## **Technologies Used**

- **Backend:** Laravel 11
- **Frontend:** BOOTSTRAP 5.3.3, (HTML, CSS, JS)
- **Database:** MySQL
- **Hosting:** Laravel-supported environments
- **Version Control:** Git

---

## **Installation and Setup**

Follow these steps to set up the project locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/TBJr/Properties-Gambia.git
   ```

2. Navigate to the project directory:
   ```bash
   cd Properties-Gambia
   ```

3. Install backend dependencies:
   ```bash
   composer install
   ```

4. Install frontend dependencies:
   ```bash
   npm install
   ```

5. Set up the environment file:
   ```bash
   cp .env.example .env
   ```
   Configure the `.env` file with your database and application credentials.

6. Generate an application key:
   ```bash
   php artisan key:generate
   ```

7. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

---

## **Usage**

1. Access the application via `http://localhost:8000`.
2. Log in with appropriate credentials.
3. Use the dashboard to manage properties, clients, and leads.
4. Generate reports and view analytics for decision-making.

---

## **Project Structure**

The project follows a standard Laravel structure:

- `app/` - Core application files, including models and controllers.
- `config/` - Configuration files.
- `database/` - Migrations and seeders.
- `public/` - Publicly accessible assets.
- `resources/` - Views and frontend assets.
- `routes/` - Route definitions.
- `tests/` - Unit and feature tests.

---

## **Future Enhancements**

1. **Third-Party Integrations:** Integration with payment gateways and marketing tools.
2. **Mobile App:** Native apps for iOS and Android platforms.
3. **Advanced Analytics:** AI-powered insights and predictive analytics.
4. **Multilingual Support:** Add support for multiple languages.

---

## **Contributing**

Contributions are welcome! Follow these steps to contribute:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature-name`.
3. Commit your changes: `git commit -m 'Add feature name'`.
4. Push to the branch: `git push origin feature-name`.
5. Open a pull request.

---

## **License**

This project is licensed under the [MIT License](LICENSE).

---

For any issues or suggestions, feel free to open an issue on the repository or contact the project maintainer.
