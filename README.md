# ring

# Api basique pour démonstration

Php/Mysql/Ajax

- Front-side en Html
- Réaction via une application Ajax
- Back-side en Php/Mysql

Avec ce combo de base n'importe qui peut initier et comprendre la majorité des projets web, sans faire appel à une tierce-partie (totalement Vanilla).

#Moteur Ajax

> ajax_call('form_name','callback_action','target')

- form_name est le nom de formulaire, l'application en récupérera tous les champs et les enverra en POST
- callback_action est le nom de l'action attendue par l'appel en Httprequest de call.php
- target est la cible du résultat

On pourra ensuite allègrement répartir les callbacks dans différentes cibles simultanément en distribuant les résultats en Json.

Davy Hoyau 03/04/2023 pour Openclassroom