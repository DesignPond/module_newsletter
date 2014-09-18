(function ($) {

    var url  = location.protocol + "//" + location.host+"/";

    $('#content').redactor({
        minHeight: 300
    });
/*
    $( ".bloc" ).draggable();

    $( "#build" ).droppable({
        drop: function( event, ui ) {
            $( this )
                .addClass( "ui-state-highlight" )
                .find( "p" )
                .html( "Dropped!" );
        }
    });*/

})(jQuery);

var App = angular.module('newsletter', ["ngDragDrop","angular-redactor","ngSanitize"] , function($interpolateProvider)
{
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    // Change opening and closing tags for working with blade
}).config(function(redactorOptions) {
        redactorOptions.minHeight = 200;
        redactorOptions.formattingTags = ['p', 'h2', 'h3','h4'];
});

App.controller('BuildController', ['$scope',function($scope){

    this.blocs = blocs;

}]);

App.controller('DropController', ['$scope', '$sce',function($scope,$sce){

    this.blocs = blocs;

    $scope.dropped = function(event, ui){
        console.log(ui.draggable.attr("id"));
        var index = ui.draggable.attr("id");
        console.log(blocs[index].type);
    };

    $scope.renderHtml = function(html_code)
    {
        return $sce.trustAsHtml(html_code);
    };

}]);

App.directive("buidingBlocs", function() {
    return {
        restrict: "EA",
        scope: true,
        templateUrl: "building-blocs"
    };
});


App.directive("imageLeftText", function() {
    return {
        restrict: "EA",
        scope: true,
        templateUrl: "image-left-text"
    };
});

var blocs = [
    { title : 'Image Left and Text',  image : 'imageLeftText.svg', type: 'imageLeftText'  },
    { title : 'Image Right and Text', image : 'imageRightText.svg', type: 'imageRightText' },
    { title : 'Image and Text', image : 'imageText.svg', type: 'imageText' },
    { title : 'Image', image : 'image.svg' , type: 'image'}
];


/*
App.directive('redactor', function() {
    return function(scope, element, attrs) {
        element.redactor({
            minHeight: 200
        });
    }
});*/
