# **btCarousel** : Utiliser MIGX avec Bootstrap Carousel 


## Construction du migx

Nous aurons besoin de 3 TV (2 type texte et 1 type image). Et d'un 4e TV, qui sera le migX lui-même.

Dans le champs Form tab du migx :

    [
        {"caption":"Slider", "fields": [
            {"field":"slidtitle","caption":"Titre","inputTV":"slid_title"},
            {"field":"slidDesc","caption":"Description","inputTV":"slid_desc"}, 
            {"field":"slidImg","caption":"Image","inputTV":"slid_img"}
        ]}
    ] 

Et dans Grid Columns :

    [
        {"header": "Titre de l'item", "width": "100", "sortable": "false", "dataIndex": "slidtitle"},
        {"header": "Description de l'item", "width": "200", "sortable": "false", "dataIndex": "slidDesc"}, 
        {"header": "Image de l'item", "width": "100", "sortable": "false", "dataIndex": "slidImg", "renderer": "this.renderImage"}
    ]    


## Les chunks

Le snippet nécessite de 2 chunks :

- Un chunk pour l'affichage des items
- Un chunk pour l'affichage du conteneur

## Le snippet


Le snippet nécessite 3 paramètres :

- **tv** : le tv du migx
- **itemTpl** : le chunk des items 
- **containerTpl** : le container

L'appel du snippet se fait comme ceci :

    [[btSlider?&tv=`homeSlider`&itemTpl=`slidItem`&containerTpl=`slidContainer`]]


