<p align="center"><a href="https://laravel.com" target="_blank"><img src="/public/assets/images/logos/smag.png" width="400" alt="Logo"></a></p>

# À propos de SMAG

**SMAG** est une application web de gestion des établissements secondaires du système éducatif ivoirien.

## Stack technique

### Backend
- Laravel 10
- Authentification avec Laravel Breeze
- Réinitialisation de mot de passe

### Frontend
- Laravel Blade
- jQuery
- Axios

---

## 📁 Structure du projet (principaux dossiers)
smag/

├── app/ # Logique métier (Models, Controllers, HTTP)

├── bootstrap/ # Démarrage de l'application

├── config/ # Fichiers de configuration (database.php, app.php)

├── database/ # Migrations, seeders, factories
├── public/ # Point d'entrée (index.php) et assets (CSS, JS, images)

├── resources/ # Vues Blade, fichiers CSS/JS bruts

├── routes/ # Définition des routes (web.php,auth ,api.php)

├── storage/ # Logs, sessions, fichiers générés

└── vendor/ # Dépendances Composer (ne pas modifier)


---

## 🚀 Commandes utiles

Une fois le projet installé et configuré, exécutez ces commandes dans le terminal (à la racine du projet) :

| Commande | Description |
|----------|-------------|
| `composer install` | Installe les dépendances PHP (Laravel et ses paquets) |
| `npm install` | Installe les dépendances JavaScript (jQuery, Axios) |
| `npm run build` | Compile les assets pour la production (ou `npm run dev` pour le développement) |
| `php artisan key:generate` | Génère la clé de l'application (automatique si vous avez bien copié .env) |
| `php artisan migrate` | Exécute les migrations pour créer les tables de la base de données |
| `php artisan serve` | Démarre le serveur de développement Laravel (accessible sur `http://127.0.0.1:8000`) |

---

## ⚠️ Problèmes connus & sécurité

- **Erreur de clé d'application** : Si vous voyez `No application encryption key has been specified`, exécutez `php artisan key:generate`.
- **Erreur de connexion à la BDD** : Vérifiez les paramètres (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) dans le fichier `.env`.
- **Assets non chargés** : Pensez à exécuter `npm install` puis `npm run build` pour générer les fichiers CSS/JS.
- **Sécurité** : Ne jamais committer le fichier `.env` ou le dossier `vendor/`. Assurez-vous que `.gitignore` les exclut.

> Pour tout autre problème, signalez-moi en ouvrant une **issue** sur le dépôt GitHub.

---

## 📝 Consignes d'installation détaillées

1. **Installer un serveur local**  
   (Exemple : XAMPP, WampServer, Laravel Herd)

2. **Installer Git Bash**

3. **Ouvrir le serveur local avec Git Bash**

4. **Cloner le projet**  
   ```bash
   git clone https://github.com/alliali-dev/smag.git
   cd smag
   Créer une base de données
(MySQL, PostgreSQL, etc.)

Créer un fichier .env à la racine du projet

Copier le contenu de .env.example et le coller dans .env

Configurer la base de données
Ouvrir config/database.php pour voir les configurations disponibles

Renseigner les paramètres de la base de données choisie dans le fichier .env

Installer les dépendances et démarrer

composer install
npm install
npm run build
php artisan key:generate
php artisan migrate
php artisan serve

## Licence

Aucune licence requise.

Cette version ajoute des sections pratiques pour tout développeur qui récupérerait votre projet. N'hésitez pas si vous souhaitez ajuster, ajouter des badges ou une section "Contributions".
