require('../scss/style.scss');

//charger le plugin javascript "jquery"
var $=require('jquery');
require('bootstrap');

console.log("hello Manel");

// this variable is the list in the dom, it's initiliazed when the document is ready
var $collectionHolder;

var $prixAchatElement;
// setup an "add a tag" link
var $boutonAjouter = $('<a href="#" class="btn btn-secondary text-white">Ajouter élément</a>');

//variable qui va contenir les itérations de l'index du formulaire imbriqué ouvert
var index;

// écouter le chargement du document
//QUAND le document est PRÊT, on appelle une fonction 
//(dans laquelle on va mettre du jQuery)
jQuery(document).ready(function() {
    // Get the card that holds the collection of tags
    $collectionHolder = $('#details');

    $collectionHolder.append($boutonAjouter);//ajouter le contenu de la variable $boutonAjouter
                                            //à la variable $collectionHolder
     
    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find('#details').length);
    //l'index contient maint le nombre des formulaires vente_details ouvertes
    
    // get the index
    //var index = $collectionHolder.data('index');
    
    //lors du clic sur le bouton "Ajouter Détail"
    $boutonAjouter.on('click', function(e) {
        //pour rester sur la position actuelle du scroll lors de l'ajout     
            e.preventDefault();
            console.log("ajout avant");
            console.log(index);
        // appel à la fonction d'ajout
        index = ajoutElementDetailForm(index);
        console.log("ajout apres");
        console.log(index);
    });
    
    $('#vente-new').on('change',function(){
        
        
        $prix_vente_total = parseFloat($('#ventesbundle_vent_prixVenteTotal').val());
        $paye = parseFloat($('#ventesbundle_vent_payement').val());
        var total = 0;
        
        for (i=0; i<=index; i++){
            //$refArticle = $('#ventesbundle_vent_vente_details_'+i+'_refArticle');
            $prix_vente_unitaire = parseFloat($('#ventesbundle_vent_vente_details_'+i+'_prixVenteUnitaire').val());
            $quantite = parseFloat($('#ventesbundle_vent_vente_details_'+i+'_quantite').val());
            
            if ((!isNaN($prix_vente_unitaire) && !isNaN($quantite))){
                total = total + ($prix_vente_unitaire*$quantite)
                
            }
            
            
        }
            
        $('#ventesbundle_vent_prixVenteTotal').val(total);
        
        if (!isNaN($prix_vente_total) && !isNaN($paye)){
            $balance = $prix_vente_total - $paye;
            $('#ventesbundle_vent_balance').val($balance);
        }else{
            $balance = 0;
            $('#ventesbundle_vent_balance').val($balance);
        }

    });
   
});

// inside the function we create a footer and remove link and append them to the panel
function ajoutElementDetailForm(index) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    //créer le formulaire
    var newForm = prototype;
        
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);
  
    // increase the index with one for the next item    
    $collectionHolder.data('index', index+1);
    console.log("ajout apres definition index to card block");
    console.log(index);
    // get the new index
    //index = $collectionHolder.data('index');
   
    var $card=$('<div class="card-block">\n\
    <div class="bg-warning" >\n\
        <b>Attention ! </br>Pour une opération d\'Achat:</b> Les informations d\'une référence existante de l\'article \n\
        dans le stock vont être écrasés (la quantité est ajouté)</br><b>Pour une opération de Vente:</b> On soustrait\n\
         juste la quantité vendu !</br><b>Pour l\'opération d\'ajout d\'une facture:</b> Pas de modification ni dans le Stock ni dans la table des Ventes</div>\n\
    <p class="card-text"></p></div>').append(newForm);

    
        //append le bouton supprimer 
    index = ajouterBoutonSupprimer($card,index);   
    
    //afficher le formulaire avant le bouton $ajouterBoutonAjouter
    $boutonAjouter.before($card);

    
    return index;

}

function ajouterBoutonSupprimer($card,index){
    //creer bouton supprimer
    var $bouton_supprimer= $('<a href="#" class="btn btn-danger">Supprimer élément</a>');

    $bouton_supprimer.click(function (e){
    //pour rester sur la position actuelle du scroll lors de la suppression    
            e.preventDefault();         
        $(e.target).parents('.card-block').slideUp(1500, function(){
            $(this).remove();     
           
        });
        /*
  // increase the index with one for the next item    
    $collectionHolder.data('index', index-1); 
    // get the new index
    index = $collectionHolder.data('index');
    
    console.log("suppression apres decrementation");
        console.log(index);
        */
        
     
    });
    
    $card.append($bouton_supprimer);
    
    return index;
}