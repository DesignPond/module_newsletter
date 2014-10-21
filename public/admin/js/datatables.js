// -------------------------------
// Initialize Data Tables
// -------------------------------

$(document).ready(function() {
    $('#arrets').dataTable({
        "sDom": "<''<'col-xs-6'l><'col-xs-6'f>r>t<''<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ par page",
            "sInfo"    : "Total de _TOTAL_ arrêts, _START_ sur _END_",
            "sInfoEmpty": 'Aucune entrée',
            "sEmptyTable": "Aucune correspondance n'a été trouvé",
            "sSearch"  : "",
            "oPaginate": {
                "sNext"     : "Suivant",
                "sPrevious" : "Précédent",
                "sFirst"    : "Première page",
                "sLast"     : "Dernière page"
            }
        }
    });
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Recherche...');
    $('.dataTables_length select').addClass('form-control');
});