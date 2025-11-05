<?php
// Database configuration values for MySQL connection.
const DB_HOST = 'localhost';
const DB_NAME = 'car_rental';
const DB_USER = 'root';
const DB_PASS = '';

// Application-wide settings.
const APP_NAME = 'DriveNow Rentals';
const APP_URL = '/';

// Session configuration.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
