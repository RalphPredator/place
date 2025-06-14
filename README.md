# README – Application Laravel avec Docker

Cette documentation décrit comment installer, configurer et utiliser cette application Laravel, que ce soit pour le développement ou la production. Les instructions sont adaptées à un projet structuré avec un `Dockerfile` dans `docker/8.4` et un `docker-compose.yml` à la racine.

---

## Prérequis communs

- **Docker** (obligatoire pour développement et production)

### Installation de Docker

- **Linux** : Suivez la documentation officielle pour installer Docker Engine selon votre distribution (Ubuntu, Debian, CentOS, etc.).
- **macOS/Windows** : Installez Docker Desktop depuis le site officiel.

---

## Développement

### Prérequis

- Docker
- PHP 8.4
- Laravel Herd
- Node.js
- Composer

### Installation des outils

**1. Docker**  
Voir section "Prérequis communs".

**2. PHP 8.4**  
Sur Ubuntu :

```bash
sudo apt update
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.4 php8.4-zip php8.4-xml php8.4-gd php8.4-mysql php8.4-pgsql php8.4-intl php8.4-curl
```


**3. Laravel Herd**  
Pour macOS, téléchargez Laravel Herd depuis le site officiel, ouvrez le fichier téléchargé et glissez l’application dans le dossier `/Applications`.

**4. Node.js**  
Téléchargez la version LTS depuis le site officiel de Node.js et suivez les instructions d’installation pour votre système d’exploitation. Vérifiez l’installation avec :

```bash
node -v
```


**5. Composer**  
Pour Linux :

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
composer
```


### Lancer l’environnement de développement

1. Clonez le dépôt du projet.
2. Placez-vous à la racine du projet.
3. Lancez les conteneurs Docker sauf celui de l'application:

```bash
docker-compose up -d
```

4. Installez les dépendances PHP et JS :

```bash
composer install
npm install
```

5. Lancer l'application :

```bash
npm run dev
```

Pour ceux n'ayant pas Herd installé, utilisé cette commande

```bash
composer run dev
```
---

## Production

### Prérequis

- Docker

### Installation de Docker

Reportez-vous à la section "Prérequis communs".

### Construction et déploiement de l’image

**1. Construire l’image Docker**

Placez-vous à la racine du projet (ou dans le dossier contenant le Dockerfile) et lancez :

```bash
docker build -f docker/8.3/Dockerfile -t mon-utilisateur/place:tag .
```


**2. Pousser l’image vers un registre Docker**

Taggez l’image si besoin, puis poussez-la vers votre registre (Docker Hub, GitHub Container Registry, GitLab, etc.) :

```bash
docker push mon-utilisateur/place:tag
```


---