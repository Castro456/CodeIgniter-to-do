<p align="center"><img src="images/To-Do_List_banner.png"> </p>

<p align="center">
  <a href="https://www.php.net/releases/7_4_0.php">
    <img src="https://img.shields.io/badge/php-v7.4-%23787CB5">
  </a>
  <a href="https://codeigniter.com/userguide3/general/welcome.html">
  <img src="https://img.shields.io/badge/codeigniter-v3.1-red">
  </a>
  <a href="https://github.com/Castro456/CodeIgniter-to-do">
   <img src="https://img.shields.io/github/repo-size/Castro456/CodeIgniter-to-do">
  </a>
</p>

To-Do list application lets user to track there daily tasks.

# Table of Contents
- [Installation Method 1](#installation-1) 
  - [Docker](#docker)
- [Installation Method 2](#installation-2)
- [Configuration](#configuration)
  - [Connecting to Database](#connecting-to-database)
- [To Run the Application ](#to-run-the-application)
- [Note](#note)
- [Credits](#credits)


# Installation 

- To Clone the repository locally you need [Git](https://git-scm.com/downloads) installed on you PC.

### Docker
- Download the [Docker](https://docs.docker.com/get-docker/).
- Go into this repository and run this command
  ```
  docker-compose up -d
  ``` 

### MariaDB
- For Mariadb download [HeidiSQL](https://www.heidisql.com/download.php?download=installer) it is the most popular tools for MariaDB and MySQL worldwide. 

# Configuration

### Connecting to Mariadb
- Open **HeidiSQL** and click new button, in Settings
  ```
    - Set -
    Network type: MariaDB or MySQL (TCP/IP)
    Hostname/IP: 127.0.0.1
    Port: 3306              
  ```

# To Run the Application
- Open Chrome and enter this url
  ```
    http://localhost:5002
  ```

# Note
Ensure LAMP or XAMPP is not running on background because this may cause some error on running this application.

# Credits
  - [CodeIgniter 3.1](https://codeigniter.com/userguide3/general/welcome.html) 
  - [Vue.js](https://vuejs.org/)


<br>
<br>

[(Back to top)](#table-of-contents)
