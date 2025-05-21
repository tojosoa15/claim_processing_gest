Puis exécuter la commande pour créer la base

```bash
php  bin/console doctrine:database:create
```

Exécuter les migrations

```bash
php  bin/console doctrine:migrations:migrate
```

Exécuter la fixture

```bash
php bin/console d:f:l --append
`

Lancer le build en temps réel de yarn

```bash
yarn encore dev --watch
```

Lancer le serveur local s'il n'y a pas de virtual host

```bash
php  -S localhost:8000 -t public

ou

symfony serve 