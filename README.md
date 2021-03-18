# E-library
This is the Project which basically contains the e-library functionality,and has 2 modules User and Admin each of them have there own functionality.
Below are some links for installation guidence,wireframe and database schema.
* Link to the Fireframe: https://www.figma.com/file/O9QQfnihRkf6l1RLFsrbu2/Untitled?node-id=0%3A1
* Link to the Database Schema: https://docs.google.com/presentation/d/1Z3MOE89uHRxuzqbnDUubaDfMPZaVbxelViYICnsG-pY/edit?usp=sharing
* For proper working of the project install xampp from the link: https://www.apachefriends.org/index.html
* Add this project to htdocs folder inside xampp folder where you have installed.
* import the SQL file to the database.
* AWS Hosting Procedure-
  -Create an AWS Account
  -Go to Services and Click on EC2(or search in the search bar).
  -Click on Instances and then launch a new Instance.
  -Choose an Amazon Machine Image(AMI)(These instructions are for Ubuntu Server)
  -Choose free tier type and click next to configure Instance.
  -Don't make any changes click next and again click next.
  -Add a tag to uniquely define your Instance click next.
  -In Configure Security Group add a rule with type HTTP then review and launch the Instance.
  -After clicking launch a POPUP will apper select a new pair key and give it a name after that download the key pair(important) and click on launch instance.
  -This will launch the Instance wait for the status check to 2/2 check passed.
  -After checks complete mark the Instance and click on Connect.
  -Select EC2 Instance Connect and click on connect this will open an SSH.
  -INSTALL LAMP STACK ON AWS - UBUNTU 18

            Step 1 — Installing Apache and Updating the Firewall

              sudo apt update
              sudo apt upgrade
              sudo apt install apache2

              sudo ufw app list

              sudo ufw app info "Apache Full"

              sudo ufw allow in "Apache Full"

            APACHE INSTALLED SUCCESFULLY TILL HERE, YOU CAN CHECK BY ENTERING YOUR PUBLIC IP OR PUBLIC DNS ADDRESS - http://your_server_ip

            ==================================================

            Step 2 — Installing MySQL

              sudo apt install mysql-server
              sudo mysql_secure_installation
              sudo mysql

              SELECT user,authentication_string,plugin,host FROM mysql.user;

              ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';    // please note here replace the "password" with yours.

              FLUSH PRIVILEGES;

              SELECT user,authentication_string,plugin,host FROM mysql.user;
              exit

            At this point, your database system is now set up and you can move on to installing PHP, the final component of the LAMP stack.


            =========================================================


            Step 3 — Installing PHP

              sudo apt install php libapache2-mod-php php-mysql

              In most cases, you will want to modify the way that Apache serves files when a directory is requested. Currently,
              if a user requests a directory from the server,Apache will first look for a file called index.html. We want to tell the web server to prefer 
              PHP files over others, so make Apache look for an index.php file first.

              sudo nano /etc/apache2/mods-enabled/dir.conf

              Move the PHP index file (highlighted above) to the first position after the DirectoryIndex specification, like this:

              <IfModule mod_dir.c>
                  DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
              </IfModule>	

            -----------------------------------

              sudo systemctl restart apache2
              sudo systemctl status apache2

              Press Q to exit this status output.

              Check PHP Version by entering 
              php -v

              Install the commonly required php modules by using the below commands - do remeber replace the php version number with your by checking the php -v command 
              For Example if the php -v command shows 7.4 version installed then you have to replace the 7.2 with 7.4 in the below command

              sudo apt install php7.4-common php7.4-mysql php7.4-xml php7.4-xmlrpc php7.4-curl php7.4-gd php7.4-imagick php7.4-cli php7.4-dev php7.4-imap php7.4-mbstring php7.4-opcache php7.4-soap php7.4-zip php7.4-intl -y

              sudo systemctl restart apache2

            ==================================================

            Step 4 — Testing PHP Processing on your Web Server

              sudo nano /var/www/html/info.php

            This will open a blank file. Add the following text, which is valid PHP code, inside the file:
              <?php
              phpinfo();
              ?>


            The address you will want to visit is:

              http://your_ip/info.php

            You will get the php info page

            ===========================


            PHPMYADMIN INSTALL STEPS BELOW

            Step 1 — Installing phpMyAdmin

              sudo apt update
              sudo apt install phpmyadmin php-mbstring php-gettext

            Warning: When the prompt appears, “apache2” is highlighted, but not selected. If you do not hit SPACE to select Apache, 
            the installer will not move the necessary files during installation. Hit SPACE, TAB, and then ENTER to select Apache.

              sudo phpenmod mbstring
              sudo systemctl restart apache2

            ===================================================

            http://your_domain_or_IP/phpmyadmin if not visible follow this command:
            
            sudo ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin


            ====================================PERMISSIONS ADJUSTMENT================================

            Step 2: Locate the PHP configuration file

            Determining the right PHP configuration file can be very confusing especially because the ‘php.ini’ 
            file can be located on a different folder depending on the PHP version.

            The correct php.ini file should be in the Apache directory (e.g. ‘/etc/php/7.1/apache2/php.ini’).
            This will depend on the version of PHP. For instance, in Php7.2, the configuration file is located on ‘/etc/php/7.4/apache2/php.ini’

            ==============================================================

            Step 3: Edit the Php Configuration file

              sudo nano /etc/php/7.1/apache2/php.ini


            Standard ‘php.ini’ settings file - Change the INI settings according to the below values:

              memory_limit  = 128M           
              upload_max_filesize   = 50M                       
              post_max_size = 50M    
              max_execution_time = 120

              sudo service apache2 restart

            Step 4: Verify the php.ini settings

              Refreshing the info.php page should now show your updated settings. Remember to remove the info.php when you are done changing your PHP configuration.

            =========================================================================
             GIT INSTALL STEPS BELOW
             
             sudo apt update
             sudo apt install git
             
             You can confirm that you have installed Git correctly by running the following command:
             
             git --version
             
             Setting Up Git-
             git config --global user.name "Your Name"
             git config --global user.email "youremail@domain.com"
             
             We can see all of the configuration items that have been set by typing:
             git config --list
             
              =========================================================================
              CLONE FILES FROM GIT TO THE myphpadmin FOLDER
              
              cd /var/www/html/phpmyadmin
              
              Clone your Repo
              
              git clone https://github.com/username/repoName.git(can be copied from your git account)
              
              cd repoName
              
              ls
              (you will all the folder and files of your project)
              
              open the link:
              http://your_IP/phpmyadmin/repoName/fileName.php
              
              
              
========================================================YOU HAVE SUCCESSFULLY HOSTED YOUR WEBSITE============================================================


