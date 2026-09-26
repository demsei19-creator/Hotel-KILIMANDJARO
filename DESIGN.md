---
name: Hôtel Kilimandjaro
description: Le sommet de l'élégance à Babi, fusion du luxe international et de l'âme ivoirienne.
colors:
  primary: "#C5A880"
  primary-deep: "#A98C64"
  neutral-bg: "#FAFAFA"
  neutral-surface: "#0A0A0A"
  neutral-border: "#E5E5E5"
  neutral-text-muted: "#737373"
typography:
  display:
    fontFamily: "'Cormorant Garamond', ui-serif, Georgia, serif"
    fontWeight: 300
    letterSpacing: "-0.025em"
  body:
    fontFamily: "'Outfit', ui-sans-serif, system-ui, sans-serif"
    fontWeight: 400
  label:
    fontFamily: "'Outfit', ui-sans-serif, system-ui, sans-serif"
    fontWeight: 500
    letterSpacing: "0.2em"
    textTransform: "uppercase"
spacing:
  container-px: "1.5rem"
  container-md-px: "3rem"
  section-py: "8rem"
components:
  btn-outline:
    textColor: "#FAFAFA"
    backgroundColor: "transparent"
    padding: "1rem 2.5rem"
  link-inline:
    textColor: "#0A0A0A"
---

# Design System: Hôtel Kilimandjaro

## Overview

**Creative North Star: "L'Écrin d'Éburnie"**

L'Hôtel Kilimandjaro incarne une vision du luxe où l'épure rencontre la chaleur de l'hospitalité ivoirienne. Le design est minimaliste mais jamais froid. De grands espaces de respiration, une typographie élégante à empattements (Cormorant Garamond) et des touches dorées sculptent l'interface. L'objectif est de projeter l'utilisateur dans une atmosphère de sérénité et de prestige dès le premier regard.

**Key Characteristics:**
- Forts contrastes (Noir profond vs Blanc pur) adoucis par des accents or.
- Utilisation théâtrale de la typographie (titres surdimensionnés et fins).
- Animations subtiles, longues et fluides (fade-in, slow-zoom).
- Minimalisme assumé : les images et l'espace priment.

## Colors

Le système repose sur un contraste dramatique entre l'obscurité et la lumière, ponctué par la noblesse de l'or.

### Primary
- **Or Kilimandjaro** (`#C5A880`): Utilisé pour les accents subtils, les prix, et les sur-titres. Évoque le prestige sans ostentation.
- **Or Profond** (`#A98C64`): Utilisé pour les états interactifs (hover) ou pour assurer un meilleur contraste sur fond très clair.

### Neutral
- **Noir Luxe** (`#0A0A0A`): La couleur de fond des sections immersives et la couleur de texte principale sur fond clair. 
- **Blanc Pur** (`#FAFAFA`): Couleur de fond principale, offrant un canvas aéré et propre.
- **Gris Doux** (`#E5E5E5`): Utilisé pour les bordures discrètes et les séparateurs.
- **Gris Muted** (`#737373`): Utilisé pour les textes secondaires, descriptions, et éléments nécessitant moins d'emphase.

### Named Rules
**The Space Rule.** Le vide est un élément de design. Les sections doivent respirer avec de vastes marges (`py-32`), permettant aux images de dominer.

## Typography

**Display Font:** Cormorant Garamond (avec fallbacks serif classiques)
**Body Font:** Outfit (avec fallbacks sans-serif modernes)

**Character:** Un dialogue entre la tradition hôtelière prestigieuse (Cormorant Garamond, délicate et posée) et la modernité accessible (Outfit, géométrique et lisible).

### Hierarchy
- **Display** (300, 4xl à 8xl, `tracking-tight`): Titres héroïques, promesses de marque.
- **Headline** (300, 3xl à 4xl): Titres de sections (ex: noms de chambres).
- **Body** (400, text-sm à text-base): Paragraphes, descriptions.
- **Label** (500, text-xs, `tracking-[0.2em]`, uppercase): Sur-titres, boutons, petits liens de navigation. Toujours en Outfit.

## Layout

Le layout utilise le système de grille de Tailwind avec une contrainte de largeur maximale (`container mx-auto`).
- **Gouttières & Paddings :** Les sections ont un padding horizontal de `px-6` (mobile) et `px-12` (desktop), et un fort padding vertical `py-32`.
- **Alignements :** Asymétrie contrôlée, jeux de décalages (ex: la deuxième chambre est décalée avec `mt-32` sur desktop pour casser la monotonie de la grille).

## Elevation & Depth

Le design est fondamentalement **plat**. 
La profondeur n'est pas créée par des ombres portées, mais par le **chevauchement typographique**, les **fonds contrastés** (Noir vs Blanc) et les **animations de parallaxe / zoom lent** sur les images. 

### Named Rules
**The Shadowless Rule.** Ne pas utiliser de `box-shadow` génériques. L'élégance naît de la netteté des bords et de la qualité des médias.

## Components

Les composants sont réduits à leur expression la plus simple.

### Buttons (Hero CTA)
- **Shape:** Bords nets (pas de `rounded`).
- **Style:** Bouton fantôme (Outline) avec bordure fine `border-white/30`, fond transparent, texte blanc.
- **Hover:** Remplissage blanc solide, texte en Noir Luxe (`hover:bg-white hover:text-luxury-black`), transition douce de 500ms.
- **Typographie:** Label (Outfit, majuscules, fort espacement).

### Text Links (Navigation & Découverte)
- **Style:** Texte avec une ligne d'accentuation à côté ou en dessous.
- **Hover:** La ligne s'allonge de manière fluide (`w-12` à `w-24`), ajoutant un aspect "découverte".

### Cards (Chambres)
- **Conteneur :** Aucun conteneur visible, l'image fait office de carte avec un ratio de `4/3` (`aspect-[4/3]`).
- **Interaction :** Au survol du parent, l'image zoome très lentement (`group-hover:scale-105 duration-[2s]`).

## Do's and Don'ts

### Do:
- **Do** utiliser des animations d'apparition progressives (`fade-in-up`) au scroll pour révéler le contenu de manière théâtrale.
- **Do** toujours accompagner la police "Cormorant Garamond" d'un fort contraste de taille par rapport à la police "Outfit".

### Don't:
- **Don't** utiliser des couleurs saturées (rouges, bleus vifs). Rester dans le spectre des Noirs, Blancs, Gris et Or.
- **Don't** arrondir les angles des images ou des boutons. Les arêtes vives participent au caractère architectural et luxueux du design.
