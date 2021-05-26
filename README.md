<h1 align="center" > To-Do-List Application in CodeIgniter </h1>

### What is CodeIgniter?
 CodeIgniter is a Framework for building websites using PHP

### Uses
* Works in the concept of MVC
* Provides a clean URL without the extension of the page
* Provides many Libraries and helpers
* With Libraries Form validation and error handler is easier
* Makes database connection simpler with the help of Query Class
* Code Reusability

&nbsp;

### MVC
 Form the name itself we can easily suggest that MVC stands for Model-View-Controller
 So it has three main Components

  * Model
  * View
  * Controller
<br />

### Controller
Controller is the main component in this framework that directs the page to View
and fetches the data from the View which is actually send by the user (User Data)
and then redircts that data to the Model. Then getting the data from the Model which is 
being returned and shows it to the User via View.

So Controller is the heart and main part of MVC

### View
View is nothing but the data that the user is seeing like login page 

### Model 
Model is the only thing that can talk/interact with the Database. Even Controller doent have that permission.

&nbsp;

# Validations and Modules

## 1.Login Page
* Only Registered email ID should be entered
* Valid mail address should be entered
* Password should be correct as registered to this email address

## 2.Register Page
* Name must be only in characters
* Email id should be valid one and the entered email should not exist in database
* UserName can be of both characters and numeric
* Password should not have spaces can have alpha numeric and exactly should be at the lenght of 6 
* Date of Birth is should is picked correctly because to calculate age
* Age is been calculated automatically based on DOB but age must minimum of 1

  If entered data satifies all these conditions can now move to login page and get logged In
  &nbsp;

## 3.Welcome Page
* If the entered email id and password is correct it redirects to this page 
* It displays **Welcome** along with _username_
* This page has Two button **ADD** and **View** and clicking on those takes to corresponding pages

## 4.Add Page
* This page has only one Rich text box and a Button
* Adding a Task should not be empty

## 5.View Page
It shows the table that table contains of
* No. of Tasks
* Task - name of the task
* Date/Time - which time task is been set
* User - who kept the task
* Status - whether task is done or in progress
* Edit - Button to edit the task kept
* Delete - Button to delete the task
* Done - Button to change the task in progress to done

## 6.Update Page
Click on the Update button corresponding to the task that user want to edit. It redirects to this page, it has
* Text Box it value will be filled with the task that the user want to edit
* Click **Close** Button to get back to the **View** Page
* Click **Update** Button is now updates its Task with new edited task and automatically redirects to **View** Page

&nbsp;

# Features
* The Password is **md5** encrypted so that even the database holder doesn't know the user password
* Sessions is implemented so once **Logout** is clicked no one can enter into Welcome page by changing the URL's without again logging in. And once a User logged In it automatically take the user to **Welcome** Page unless user its the **Logout**.
* Multiple users can register but in **View Page** it clearly shows who has entered each and every tasks
* User can set any type of tasks, once the user finish there task they can mark as Done

&nbsp;

# Note
* CodeIgniter is fully based on php, so it can't show success popup, though it can show error and validation errors. The reason is once the login is successful the very next instance it takes to next page because unlike JavaScript it doesn't have **Page Reload Time** to show success popup and after similar seconds redirecting to the page.

* Without reloading a page a data can't seen in same PHP so inorder to calculate age, need's to show age onselect of the DOB and display it in age text box, for that JavaScript is been used. Only for the **Register** Page age calculating function it is used with the help of `baseurl()` function which is provided by CodeIgniter itself and adding the js file path to that.




