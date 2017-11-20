var ngApp = angular.module('ngApp', ['bw.paging', 'ngSanitize']);

ngApp.filter('formatDate', function(dateFilter) {
   var formattedDate = '';
   return function(dt) { 
   	formattedDate = moment(dt, 'yyyy/mm/dd HH:mm:ss').format('DD-MM-YYYY');   
    return formattedDate;
   }  
});   