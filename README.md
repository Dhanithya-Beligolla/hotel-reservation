# Hotel Reservation Website

This README provides a complete guide to set up the **Hotel Reservation** project on another device.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Project Configuration](#project-configuration)
- [Running the Project](#running-the-project)
- [Usage](#usage)
- [Troubleshooting](#troubleshooting)
- [Technologies Used](#technologies-used)

## Introduction

The **Hotel Reservation** project is a web-based application that allows users to browse hotel packages, add them to a wishlist, and for administrators to manage hotel packages. The project is built using HTML, CSS, JavaScript, and PHP, with a MySQL database for data storage.

## Features

- **User Side:**
  - View hotel packages displayed as tiles.
  - Add packages to a wishlist.
  - View and manage the wishlist.
  - Toast notifications for user actions.

- **Admin Side:**
  - Add new hotel packages.
  - Update existing packages.
  - Delete packages.
  - View all packages in a table format.
  - Toast notifications and redirects after actions.

## Prerequisites

Before setting up the project, ensure that your device meets the following requirements:

- **Operating System:** Windows, macOS, or Linux.
- **Web Server:** Apache (recommended with XAMPP, WAMP, or MAMP).
- **PHP Version:** PHP 7.0 or higher.
- **Database Server:** MySQL 5.6 or higher.
- **Web Browser:** Latest version of Chrome, Firefox, or Edge.

## Installation

Follow these steps to set up the project:

### 1. Install a Web Server with PHP and MySQL

- **Windows:** Download and install [XAMPP](https://www.apachefriends.org/index.html).
- **macOS:** Download and install [MAMP](https://www.mamp.info/en/).
- **Linux:** Install Apache, PHP, and MySQL using your distribution's package manager.

### 2. Start Apache and MySQL Services

- Open the control panel of your web server package (e.g., XAMPP Control Panel).
- Start the **Apache** and **MySQL** services.

## Database Setup

### 1. Access phpMyAdmin

- Open your web browser and navigate to `http://localhost/phpmyadmin/`.

### 2. Create a New Database

- Click on **New** in the left sidebar.
- Enter the database name as `hotel_reservation`.
- Choose **utf8_general_ci** as the collation.
- Click **Create**.

### 3. Create Required Tables

Run the following SQL queries in phpMyAdmin to create the necessary tables:

#### a. `packages` Table

```sql
CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
```

#### a. `wishlist` Table

```sql
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`package_id`) REFERENCES `packages`(`id`) ON DELETE CASCADE
);
```
**Note**: The customer_id field assumes a simple setup with a default value. For a complete application, implement a user authentication system.

## Project Configuration

### 1. Download the Project Files
Obtain the `hotel_reservation` project folder containing all the necessary files and directories.

### 2. Place the Project in the Web Server Directory

- **Windows (XAMPP):** Copy the `hotel_reservation` folder to `C:\\xampp\\htdocs\\`.
- **macOS (MAMP):** Copy the folder to `/Applications/MAMP/htdocs/`.
- **Linux (Apache default):** Copy the folder to `/var/www/html/`.

### 3. Configure Database Connection

- Open the `db.php` file located in the `hotel_reservation` folder.
- Ensure the database credentials match your setup:

```php
<?php
$host = "localhost";
$user = "root";
$password = ""; // For XAMPP, the default password is empty
$database = "hotel_reservation";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```
- If you have set a password for your MySQL root user, update the `$password` variable accordingly.

### 4. Set Permissions for the `images` Directory

- Ensure the `images` directory within `hotel_reservation` is writable, as images will be uploaded here.
- On Linux or macOS, you may need to set permissions:
  ```bash
  chmod -R 755 /path/to/hotel_reservation/images
  ```

## Running the Project

### 1. Access the Application in the Browser

- Open your web browser.
- Navigate to `http://localhost/hotel_reservation/`.

### 2. Admin Operations
To add, update, or delete hotel packages, access the following pages:

- **Add Package**: `http://localhost/hotel_reservation/add_package.php`
- **View Packages (Admin)**: `http://localhost/hotel_reservation/admin_view_packages.php`

### 3. User Operations
To view packages and manage the wishlist:

- **View Packages**: `http://localhost/hotel_reservation/view_packages.php`
- **View Wishlist**: `http://localhost/hotel_reservation/view_wishlist.php`

## Usage

### 1. Adding a New Package (Admin)

- Navigate to the Add Package page.
- Fill in the package details and upload an image.
- Submit the form to add the package.
- Upon successful addition, you will be redirected to the Admin View Packages page.

### 2. Managing Packages (Admin)
 
- On the Admin View Packages page, you can:
  - Update a package by clicking the Update button.
  - Delete a package by clicking the Delete button.
- After updating or deleting, the page will refresh to reflect the changes.

### 3. Viewing Packages (User)

- Navigate to the View Packages page.
- Browse through the packages displayed as tiles.
- Click Add to Wishlist to add a package to your wishlist.
- Toast notifications will confirm your actions.

### 4. Managing Wishlist (User)

- Navigate to the View Wishlist page.
- View packages added to your wishlist.
- Remove packages by clicking Remove from Wishlist.
- The page will refresh to reflect the updated wishlist.

## Troubleshooting

### Database Connection Errors:
- Ensure the MySQL service is running.
- Verify the database credentials in `db.php`.

### Images Not Uploading:
- Check write permissions on the images directory.

### Pages Not Loading:
- Ensure you have placed the project folder in the correct directory.
- Verify that Apache is running.

### Undefined Index or Variable Errors:
- Ensure all forms are submitted correctly.
- Check that all necessary data is being passed via GET or POST.

## Technologies Used:
- HTML
- CSS
- JavaScript
- PHP
- MySQL




