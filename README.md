# Getting Started with Hospital Registration Application
Hospital Registration Application helps hospital admins to Create new Patients in their database, View information of all the registered patients, and update the patient details if needed.
Hospital Registration Application also helps admins to create new appointments for the registered patients. If the patients have not been registered to the system, you can first register a new patient and then book an appointment for that patient. Admins can also view all appointment details and update the appointment details.

### Installation: 

Using a Terminal :
```
$ cd Downloads
$ mkdir Hospital-Registration
$ cd Hospital-Registration 
```
Git clone the repositories:
```
$ git clone https://github.com/shreyataneja/patientRegistration
$ git clone https://github.com/shreyataneja/hospital-api
```

### Create a database using MySQL

The SQL Dump file is attached in ```Hospital-Registration/hospital-api/hospital_db.sql ``` 
You can simply import this dump file to your MySQLWorkbench or Sequel Pro.
Or Copy and paste whole file in the terminal once you login to terminal as a root user using ```mysql -uroot -p```
You can also copy and paste the file contents in IDE and execute.

### Adding dependencies and executing the code 
 For backend PHP Code. Using a Terminal :
```
$ cd Downloads/Hospital-Registration 
$ cd hospital-api 
$ php -S 127.0.0.1:8080;
```
For Front-end React Code.
Open New Terminal Tab:
```
$ cd ~/Downloads/Hospital-Registration/patientRegistration
$ npm install
$ npm run dev
```

Your website is now accessible at
```http://localhost:3000/```
