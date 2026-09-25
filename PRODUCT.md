# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users
La clientèle d'affaires cherchant un cadre prestigieux et confortable, ainsi que la jeunesse (locale ou de la diaspora) en quête d'expériences luxueuses, d'un lieu tendance et de "doux enjaillement".

## Product Purpose
Le site officiel de l'Hôtel Kilimandjaro sert de vitrine numérique haut de gamme et de plateforme de réservation directe (chambres et restaurant). Son objectif est de séduire visuellement l'utilisateur tout en garantissant un tunnel de réservation (et de prépaiement) sans friction.

## Positioning
Une fusion unique entre le luxe international et l'hospitalité/gastronomie purement ivoirienne. L'Hôtel Kilimandjaro marie les standards de l'hôtellerie de classe mondiale avec l'authenticité et l'âme de Babi (ex: le "Maquis de Luxe", la bière Bock, le Garba façon palace).

## Operating Context
La clientèle d'affaires réserve souvent sur ordinateur depuis un bureau, tandis que la jeunesse découvre et réserve majoritairement sur smartphone. Le site doit donc offrir une expérience visuelle et fonctionnelle parfaite sur les deux supports. Le personnel de l'hôtel gère ensuite ces flux via un panneau d'administration centralisé (Filament).

## Capabilities and Constraints
- Règle métier absolue : Les réservations de chambres ne peuvent être confirmées *que* si elles sont prépayées.
- La devise unique de l'établissement est le Franc CFA (XOF).
- Les parcours de réservation du restaurant et des chambres sont isolés l'un de l'autre pour clarifier l'expérience utilisateur.

## Brand Commitments
- Identité visuelle "Luxe / Raffiné" : Minimalisme, espaces généreux, typographies élégantes (avec empattements pour les titres), couleurs profondes (Noir, Blanc, Or).
- Voix et ton "à la sauce ivoirienne" : Utilisation subtile d'expressions locales (Akwaba, Terre d'Éburnie, enjaillement, Babi) pour ancrer l'hôtel dans sa culture, sans jamais compromettre le standing luxueux.

## Evidence on Hand
- Implémentation visuelle existante : Le code actuel (Tailwind, animations GSAP/Alpine) pose déjà les bases de la direction artistique validée.

## Product Principles
1. **L'Ivoirien Premium** : Ne jamais opposer la culture locale au luxe ; les deux doivent s'élever mutuellement.
2. **La Réservation Sans Faille** : Exiger le prépaiement pour les chambres impose que l'étape de paiement (CinetPay) soit perçue comme totalement sécurisée et intégrée à l'expérience haut de gamme.
3. **Le Visuel d'Abord** : L'espace, les animations fluides et les grandes images sont le premier argument de vente avant même de lire les textes.
