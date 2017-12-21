var ngApp = angular.module('ngApp', ['bw.paging', 'ngSanitize']);

ngApp.filter('formatDate', function(dateFilter) {
   var formattedDate = '';
   return function(dt) { 
   	formattedDate = moment(dt, 'YYYY/MM/DD').format('DD-MM-YYYY');   
    return formattedDate;
   }  
});   