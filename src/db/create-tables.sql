--Table schema for the leads with refrence keys to other tables
CREATE TABLE leads (leads_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, chatbot_id VARCHAR(256), date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, first_name VARCHAR(256), last_name VARCHAR(256), full_name VARCHAR(256), email VARCHAR(256) NOT NULL, phone_number VARCHAR(256), zip_code VARCHAR(256), industry VARCHAR(256), msg TEXT, lead_business_name VARCHAR(256), client_name VARCHAR(256), sub_domain VARCHAR(256), lookup_id INT, leadtype_id INT, FOREIGN KEY (lookup_id) REFERENCES sourcelookup(lookup_id), FOREIGN KEY (leadtype_id) REFERENCES leadtypelookup(leadtype_id));

--Table schema for source lookup
CREATE TABLE sourcelookup(
    lookup_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    source VARCHAR(256));

--Table schema for lead type lookup
CREATE TABLE leadtypelookup(leadtype_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, leadtype VARCHAR(256));

--table alterations
ALTER TABLE leads ADD COLUMN restaurant_name VARCHAR(256) AFTER lead_business_name;
ALTER TABLE leads ADD COLUMN restaurant_address VARCHAR(256) AFTER restaurant_name;

ALTER TABLE leads ADD COLUMN otr_experience VARCHAR(256) AFTER restaurant_address;
ALTER TABLE leads ADD COLUMN night_drive VARCHAR(256) AFTER otr_experience;
ALTER TABLE leads ADD COLUMN two_weeks VARCHAR(256) AFTER night_drive;
ALTER TABLE leads ADD COLUMN city VARCHAR(256) AFTER phone_number;
ALTER TABLE leads ADD COLUMN state VARCHAR(256) AFTER city;
ALTER TABLE leads ADD COLUMN service_inquiry VARCHAR(246) AFTER lead_business_name;
ALTER TABLE leads ADD COLUMN full_name VARCHAR(256) AFTER last_name;
