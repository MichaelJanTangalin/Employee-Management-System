# Integrative System Database

## Overview

This repository contains the database schema for the Integrative System. The database is designed to manage various aspects of an organization, including employee information and attendance tracking.

## Database Components

### 1. `integrativesystem`

- **Description:** Main database for the Integrative System.
- **Purpose:** Stores essential data related to the organization's operations, users, and various functionalities.

### 2. `integrativesystem_archive`

- **Description:** Archive table for database backups.
- **Purpose:** Provides a historical record of the database, facilitating data recovery and system restoration.

### 3. `integrativesystem_attendance`

- **Description:** Database for storing employee attendance records.
- **Purpose:** Helps in tracking and managing attendance information for efficient workforce management.

## Getting Started

To use the full functionality of the Integrative System, follow these steps:

1. **Database Setup:**
   - Execute the SQL files in the following order: `integrativesystem.sql`, `integrativesystem_archive.sql`, `integrativesystem_attendance.sql`.
   - Use PHPMyAdmin or any Database Management Software for execution.

2. **Configuration:**
   - Configure the database connection parameters in your application to connect to the `integrativesystem` database.

3. **Populate Data:**
   - Populate necessary data, such as organization details, user information, and initial configuration settings.

## Note

- It is required to populate all the SQL files in PHPMyAdmin or any Database Management Software to use the full functionality of the system.

Feel free to reach out for any assistance or clarification regarding the database structure and setup.
