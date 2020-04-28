# myapp-front

Ceci est une page de formulaire

## Pour créer l'image  
  docker build -t myapp-front .
## Pour lancer l'image de dev
docker run -d -p 80:80 -v $(pwd)/public:/var/www/html/ myapp-front
