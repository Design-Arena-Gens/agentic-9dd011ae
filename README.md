## DriveNow Rentals

Modern PHP/MySQL rideshare-style car rental platform with dedicated customer and admin portals.

### Stack
- PHP 8+ with PDO (MySQL)
- MySQL 5.7+ (phpMyAdmin friendly)
- Vanilla HTML/CSS/JS

### Local Setup
1. Create a MySQL database named `car_rental`.
2. Import `database/schema.sql`, then `database/seed.sql` using phpMyAdmin or the MySQL CLI.
3. Update credentials in `includes/config.php`.
4. Point your web server document root to the `public/` directory.

### Default Accounts
| Role    | Email                     | Password |
|---------|---------------------------|----------|
| Admin   | `admin@drivenow.local`    | `password` |
| Customer| `taylor@example.com`      | `password` |

Passwords are bcrypt-hashed in the seed file; use the credentials above for first login.

### Feature Highlights
- Customer portal for booking rides, tracking active trips, and viewing history.
- Admin analytics dashboard with booking summaries and revenue totals.
- Full CRUD fleet management, booking status control, and user role management.
- CSRF protection, hashed passwords, and minimal session-based auth helpers.
- Responsive UI with reusable components and gradient styling.

### Deploying to Vercel
1. Run `vercel --prod --token $VERCEL_TOKEN --name agentic-9dd011ae`.
2. Ensure the production server exposes PHP (e.g., via Vercel serverless PHP runtime) and configure environment variables to match `includes/config.php`.
3. Provision a hosted MySQL instance and allow Vercel access.

### Packaging
Create a distributable archive with:
```bash
zip -r drivenow-rentals.zip public includes database README.md
```
The resulting `drivenow-rentals.zip` contains the entire application.
