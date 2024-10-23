# Ensure you have Composer and Node.js installed.

# Navigate to the project directory and run composer install to install PHP dependencies.

# Copy the .env file by running cp .env.example .env and update your database settings.

# Generate the application key with php artisan key:generate.

# Create a new database, update the .env file with your credentials, and run php artisan migrate followed by php artisan db:seed.

# Install JavaScript dependencies with npm install and compile front-end assets using npm run dev for development or npm run build for production.

# Start the application with php artisan serve

# For roles you can run the command php artisan db:seed --class=RoleSeeded (this is not a typo, it is seeded by mistake in the code and I did not have time to chagne it)

# To add your admin user run the command artisan db:seed --class=UserSeeder

# These are the only seeders to run, everything else is uploadable and confiugurable on the web app, only excetpion is that I did not finish the conferneces on time
