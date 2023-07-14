# ECF_Garage

## Éxecution en local (Linux) ##

### Installer Apache2 ###

> sudo apt-get install apache2

> mkdir -p /home/[userName]/www

> mkdir -p /home/[userName]/www/Garage

Création d'un VirtualHost

> sudo nano /etc/apache2/sites-available/devECF.conf

Ajoutez :

    <VirtualHost *:80>
        DocumentRoot /home/[userName]/www/Garage
        <Directory />
            Options FollowSymLinks
            AllowOverride All
        </Directory>
        <Directory /home/[userName]/www/Garage>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

        ServerSignature Off
    </VirtualHost>

Activation du virtual host de base :
> sudo a2dissite 000-default

> sudo a2ensite devECF

Dans le fichier _envars_ :
> sudo nano /etc/apache2/envvars

Changez l'utilisateur et le groupe d’exécution d'Apache :

      APACHE_RUN_USER=[userName]
      APACHE_RUN_GROUP=[userName]

Relancez Apache :
> sudo systemctl restart apache2

###  Installer PHP 8.1 ###

> sudo apt install php8.1

Éditez le fichier _dir.conf_:
> sudo nano /etc/apache2/mods-enabled/dir.conf

Indiquez à Apache que vous préférez charger les fichiers PHP en premier :

    DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm

Relancez Apache :

> sudo systemctl restart apache2

### Création d'un administrateur à la BDD ###
En utilisant le logiciel SQLiteStudio, la commande suivante ajoute un employé avec le rôle d'administrateur. Le hash du mot de passe peut être généré grâce à https://www.bcrypt.fr/

> INSERT INTO employees(name, firstname, login, password, role_admin) VALUES('[firstname]', '[name]', '[email]', '[hash]', 1);

####  Mots de passe de l'actuel BDD ####
jean@lapin.com mdp: pinpin
vparrot@parrot.com mdp: Bentlay3008?