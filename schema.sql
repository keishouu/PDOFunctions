DROP TABLE Customers;
DROP TABLE Orders;
DROP TABLE Shippings;


create table Patients (
	patient_id INT,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	age INT,
	blood_type VARCHAR(2),
	allergy VARCHAR(20),
	gender VARCHAR(50),
	birthdate DATE,
	address VARCHAR(50),
	city VARCHAR(50),
	phone_number VARCHAR(50)
);


create table Appointments (
	appointment_id INT,
	appointment_date DATE,
	patient_id INT,
	doctor_id INT,
	prescription_id INT,
	status VARCHAR(8)
);

create table Doctors (
	doctor_id INT,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	birth_date DATE,
	specialty VARCHAR(20),
	email VARCHAR(50),
	years_of_experience INT,
	hospital_name VARCHAR(35)
);


create table Medical_Records (
	record_id INT,
	patient_id INT,
	doctor_id INT,
	prescription_id INT,
	diagnosis VARCHAR(20)
);

create table Prescriptions (
	prescription_id INT,
	patient_id INT,
	doctor_id INT,
	medication_id INT,
	dosage DECIMAL(9,2),
	frequency VARCHAR(20),
	start_date DATE,
	end_date DATE,
	refills INT,
	instructions TEXT
);


create table Medicines (
	medication_id INT,
	medication_name VARCHAR(50),
	brand_name VARCHAR(50),
	manufacturer VARCHAR(50),
	medicine_description VARCHAR(32),
	side_effects VARCHAR(50)
);

create table Laboratory_tests (
	lab_test_id INT,
	patient_id INT,
	test_name VARCHAR(20),
	test_date DATE,
	doctor_id INT,
	result_value DECIMAL(5,2),
	lab_result VARCHAR(20)
);