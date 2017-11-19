var ngApp = angular.module('ngApp', ['bw.paging', 'ngSanitize']);

ngApp.filter('formatDate', function(dateFilter) {
   var formattedDate = '';
   return function(dt) { 
    formattedDate = dateFilter(new Date(dt.split('-').join('/')), 'd/M/yyyy');   
    return formattedDate;
   }
     
});   