# Web-Application-MVC
First of all, the name of this project has changed. For a perfect experience, you should change this project name to "admin_iot".

This is our project from our Web Programming class. The main concept in this project is MVC(Model-View-Controller) model.

Main topic:

In this project, we build an application for 2 main actors, the user, and the admin:
- In this context, users can do some actions like many actions in the e-commerce web application(login, buy(download) product, edit profile - include name, gender,... and upload avatar).
- Admins can do some actions that users can do, except edit profiles. In addition, the admin can manage user accounts - edit some users' information fields, create, and delete the user account, can manage products - edit, create, and delete products. Also, we have implemented pagination for users and products in admin sites. we can search according to the user's information or product information provided.

Set up:

- HTML, CSS, JS: front-end(no additional framework).
- PHP: back-end(no additional framework).
- MySQL: database.

All back-end setups (MySQL and PHP) can be finished by installing XAMPP technical stack (can download XAMPP follow this link: "https://www.apachefriends.org/download.html"). You can find a way to run the back-end in XAMPP on many platforms. With XAMPP, a server can run on localhost that's very effective to develop for personal purposes. Once you finished setting up for XAMPP, you should upload database.sql into phpadmin or something similar in a different in platform or IDE.

Note:

When setting up XAMPP, you should set everything by default. If you change something like the password of phpadmin, you cannot connect to phpadmin to get the database. If you have your password has been changed, you can find the way to handle it with this project in here "https://github.com/GiaPhong132/PHP-MySQL-For_Task-Management#readme".

Run:

After all, copy this "localhost/admin_iot/" and paste it into the URL bar in your browser to get the result.

Improvement:

In the future, we build a similar project but replace MySQL with MongoDB. With XAMPP + MongoDB, we build IoT applications to track the operation of IoT devices in customers' houses. In addition, we also build a mobile app for the client side to interact with customers' devices. We will publish it as soon as we can.
