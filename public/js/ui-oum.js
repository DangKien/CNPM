var ngApp = angular.module('ngApp', ['bw.paging', 'ngRoute', 'ngSanitize']);

ngApp.filter('formatDate', function(dateFilter) {
   var formattedDate = '';
   return function(dt) { 
   	formattedDate = moment(dt, 'YYYY/MM/DD HH:mm:ss').format('DD-MM-YYYY');   
    return formattedDate;
   }  
});   