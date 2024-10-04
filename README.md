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
- [Credits](#credits)

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
