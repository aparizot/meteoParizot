
# meteoParizot

Petit Symfony destiné à obtenir la météo des villes sélectionnées via une API externe

#Pour obtenir ce projet : 

git clone git@github.com:aparizot/meteoParizot.git

#Pour installer le projet

naviguez avec votre console jusqu'au dossier et entrez :

- php composer install

- php bin/console doctrine:database:create

- php bin/console doctrine:schema:update --force

#C'est bon, vous pouvez lancer le projet avec "php bin/console s:r" et accéder à la page principale par l'url : localhost:8000