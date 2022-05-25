# gestionDesFormation

# TP Symfony: Gestion des formations

- [TP Symfony: Gestion des formations](#tp-symfony-gestion-des-formations)
  - [Utilisateur cible](#utilisateur-cible)
  - [Persistence des données](#persistence-des-données)
  - [Entitées](#entitées)
  - [ERD simple](#erd-simple)
  - [ERD détaillé](#erd-détaillé)

Le but de ce TP est de créer un site web qui permet de gérer les formations.

Plusieurs entitées sont à prendre en compte dans ce site (cf: [entitées](#entitées)).

L'idée est de facilité la gestion des formations et leurs ressources.
Un utilisateur de ce site devrais pour gérer:

- les *candidat*s
- les *formation*s
- les *formateur*s
- les *salle*s dans lesquelles se déroulent les *formation*s
- les *session*s auxquelles les *candidat*s participent (sujet de formation exemple: "Angular", "Symfony", "Agile et Scrum", etc.)
- les *organisme*s de formations qui vendent leurs *formation*s
- les *promotion*s (groupes de *candidat*s) avec leur(s) *formateur*(s) référent(s)

## Utilisateur cible

Ce site est déstiné aux partenaire pédagogiques qui répondes aux demande des organismes de formation pour placer des formateurs sur différentes sessions.

Il faut donc un site avec une interface utilisateur.

## Persistence des données

Symfony s'occupera de la partie présentation et métier de l'application. Pour la persistance il est préférable d'utiliser une base de données relationnelle (par exemple: MySQL, MariaDB ou Postgresql).

> Vous pouvez accélérer la mise en place de la base de données avec [Docker](https://www.docker.com/)

## Entitées

- formation
  - intitulé
  - organisme de formation
- organisme de formation
  - nom
  - adresse
  - numero de telephone
  - email de contact
- formateur
  - nom
  - prenom
  - numero de telephone
  - email
- promotion
  - nom
  - formation
  - referent (formateur)
- session
  - date_debut
  - date_fin
  - nom (de la session)
  - formateur
  - promotion
  - salle
- candidats
  - nom
  - prenom
  - adresse email
  - numero de téléphone
  - promotion
- salle
  - nom
  - session

## ERD simple

Il est conseillé de partir sur ce type de relation entre vos entitées (vous pouvez compléter librement les attributs de ces entitées)

[![ERD simple](https://mermaid.ink/svg/pako:eNpl0U1uxCAMBeCrIK9n5gDZ9mfbStlmY4EntRpwZGBRJbl7gWRGasrWnx9PsIAVR9AB6SvjqOiH8C7qMbEEs63X67qaDx0xcPTUmQFmlVkiDTCETxUvO5TbrcDnZoUcolVOJ7gn7pCyVkjBotOW2FOMjzxZziwSj-Gv2-Oe-a0gamLLc4MvGBw7TCXxv7wjJ9N4a9njNFGD5erjhsrQ2kxcZhWZ04ELeCot2ZVHXOp8gPRFvuC661C_69pWXJ5LEXpznEShu-MU6QKYk_Q_wUKXNNMDHX9xqO0XWmeTGw)](https://mermaid.live/edit#pako:eNpl0U1uxCAMBeCrIK9n5gDZ9mfbStlmY4EntRpwZGBRJbl7gWRGasrWnx9PsIAVR9AB6SvjqOiH8C7qMbEEs63X67qaDx0xcPTUmQFmlVkiDTCETxUvO5TbrcDnZoUcolVOJ7gn7pCyVkjBotOW2FOMjzxZziwSj-Gv2-Oe-a0gamLLc4MvGBw7TCXxv7wjJ9N4a9njNFGD5erjhsrQ2kxcZhWZ04ELeCot2ZVHXOp8gPRFvuC661C_69pWXJ5LEXpznEShu-MU6QKYk_Q_wUKXNNMDHX9xqO0XWmeTGw)

## ERD détaillé

Si vous manquez d'inspiration pour les champs vous pouvez vous inspirer ce ce diagramme à la place

[![ERD plus complet pour le projet formation](https://www.planttext.com/api/plantuml/svg/hLJRQkCm47tNLmnvMLX8Fo2KKbZeFlHX5_e1GP4cph2w64bkAOt_VKTEB5yQcsNfcsTqvfmpCv8VOv8XDTO8yGrEf17I2I7MFeakKXIKmNmeNprfg8C_6BGHtYYTGBhAe0OL_5k48s8IyG-vMWPfmP33z5uZ-91ENeX4oI3yn9Z8Ez381JvOcQCeX437W7TuwdFm8G2-3vWzwHsunXummFrzXGw3JAWV7XYstNPOoXIDmHt45CXLNTA7IZgA5gS4JyzSsHRPNptgAhjGTLFMUJjHb3fWZ5CNp831xnEQIHgj9BDNtYMfKZbfPzF09aocmV5_sAe3pbDhhcwu-HsyzQFTr7tSkIa42_eBc-mMiTBRR54lFDh1GRn4eufU7q0psLxZeU71vkyXUIHNKai-R_jOwdfy7gKnwvVjXtIQMF_QXBg6NxFJsrTgPTjh_RHbxBcfVkYV6_mdi-DbpMN4yExRytPxFWylSWSRjbZxY1intC3MtzqngfGnYbnKWT84TU4gpuXHw5H-e1lHtwJCv3zcc8XKkJ7eGbIOiod-RvAYcb5beQt_13jAIj1XsTbbZ1d5YbTknaYb6YG-sWZnY4xpx_Wl)](https://www.planttext.com/?text=hLJRQkCm47tNLmnvMLX8Fo2KKbZeFlHX5_e1GP4cph2w64bkAOt_VKTEB5yQcsNfcsTqvfmpCv8VOv8XDTO8yGrEf17I2I7MFeakKXIKmNmeNprfg8C_6BGHtYYTGBhAe0OL_5k48s8IyG-vMWPfmP33z5uZ-91ENeX4oI3yn9Z8Ez381JvOcQCeX437W7TuwdFm8G2-3vWzwHsunXummFrzXGw3JAWV7XYstNPOoXIDmHt45CXLNTA7IZgA5gS4JyzSsHRPNptgAhjGTLFMUJjHb3fWZ5CNp831xnEQIHgj9BDNtYMfKZbfPzF09aocmV5_sAe3pbDhhcwu-HsyzQFTr7tSkIa42_eBc-mMiTBRR54lFDh1GRn4eufU7q0psLxZeU71vkyXUIHNKai-R_jOwdfy7gKnwvVjXtIQMF_QXBg6NxFJsrTgPTjh_RHbxBcfVkYV6_mdi-DbpMN4yExRytPxFWylSWSRjbZxY1intC3MtzqngfGnYbnKWT84TU4gpuXHw5H-e1lHtwJCv3zcc8XKkJ7eGbIOiod-RvAYcb5beQt_13jAIj1XsTbbZ1d5YbTknaYb6YG-sWZnY4xpx_Wl)
