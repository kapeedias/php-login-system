-- Drop the crm_users table if it exists
DROP TABLE IF EXISTS crm_users;

-- Create the crm_users table with 'id' instead of 'user_id'
CREATE TABLE crm_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    account_id VARCHAR(20) UNIQUE,
    customer_id VARCHAR(20) UNIQUE,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    salt VARCHAR(50) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other'),
    profile_picture_url VARCHAR(255),
    bio TEXT,
    address_line_1 VARCHAR(255),
    address_line_2 VARCHAR(255),
    city VARCHAR(50),
    province_state VARCHAR(50),
    postal_code VARCHAR(20),
    country VARCHAR(50),
    phone_number VARCHAR(20),
    alternative_email VARCHAR(255),
    website_url VARCHAR(255),
    registration_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login_timestamp TIMESTAMP,
    account_status ENUM('Active', 'Inactive', 'Banned'),
    security_question VARCHAR(255),
    security_answer VARCHAR(255),
    two_factor_auth_enabled BOOLEAN,
    verification_code VARCHAR(10),
    is_email_verified BOOLEAN DEFAULT FALSE,
    is_phone_verified BOOLEAN DEFAULT FALSE,
    preferred_language VARCHAR(10),
    timezone VARCHAR(50),
    referral_code VARCHAR(20),
    referral_source VARCHAR(255),
    business_name VARCHAR(255),
    additional_notes TEXT
);

-- Drop the Timezones table if it exists
DROP TABLE IF EXISTS timezones;

-- Create Timezones table if it doesnot exists
CREATE TABLE timezones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    timezone_identifier VARCHAR(100) NOT NULL,
    country_code VARCHAR(2) NOT NULL,
    region VARCHAR(100),
    description VARCHAR(255)
);

-- Insert timezones for Canada into the timezones table
INSERT INTO timezones (timezone_identifier, country_code, region, description)
VALUES
    ('America/St_Johns', 'CA', 'Newfoundland', 'Newfoundland Standard Time'),
    ('America/Halifax', 'CA', 'Nova_Scotia', 'Atlantic Standard Time'),
    ('America/Glace_Bay', 'CA', 'Nova_Scotia', 'Atlantic Standard Time'),
    ('America/Toronto', 'CA', 'Ontario', 'Eastern Standard Time'),
    ('America/Nipigon', 'CA', 'Ontario', 'Eastern Standard Time'),
    ('America/Winnipeg', 'CA', 'Manitoba', 'Central Standard Time'),
    ('America/Rainy_River', 'CA', 'Ontario', 'Central Standard Time'),
    ('America/Edmonton', 'CA', 'Alberta', 'Mountain Standard Time'),
    ('America/Yellowknife', 'CA', 'Northwest_Territories', 'Mountain Standard Time'),
    ('America/Vancouver', 'CA', 'British_Columbia', 'Pacific Standard Time'),
    ('America/Whitehorse', 'CA', 'Yukon', 'Pacific Standard Time');
    ('America/New_York', 'US', 'Eastern', 'Eastern Standard Time'),
    ('America/Detroit', 'US', 'Eastern', 'Eastern Standard Time'),
    ('America/Chicago', 'US', 'Central', 'Central Standard Time'),
    ('America/Indiana/Knox', 'US', 'Central', 'Central Standard Time'),
    ('America/Denver', 'US', 'Mountain', 'Mountain Standard Time'),
    ('America/Phoenix', 'US', 'Mountain', 'Mountain Standard Time'),
    ('America/Los_Angeles', 'US', 'Pacific', 'Pacific Standard Time'),
    ('America/Anchorage', 'US', 'Alaska', 'Alaska Standard Time'),
    ('Pacific/Honolulu', 'US', 'Hawaii', 'Hawaii Standard Time');
   
