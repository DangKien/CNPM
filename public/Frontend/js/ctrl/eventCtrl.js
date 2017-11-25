ngApp.controller('eventCtrl', function ($apply, $scope, $eventService, $timeout)
{  
    $scope.calendar;
    $scope.title;
    $scope.chosseEventModal;
    $scope.calendarConfig = {};
    $scope.data = {
        listEvent: {},
        date: {},
        todayDate: moment(),
        listEvents: function () {
            return new Promise(function (resolve, reject) {
                    $eventService.action.listEvent().then(function (resp) {
                        $scope.calendarConfig.events = $scope.action.processEvent(resp.data);
                        resolve(true);
                    }).catch(function (err) {
                        reject(false);
                    });
                });
        },
    };
    
    
    $scope.action = {
        calendar: {
            prev: function () {
                $scope.data.listEvents();
            },
            next: function () {
                $scope.data.listEvents();
            },
            today: function () {  
                $scope.data.listEvents();
                $scope.calendar.fullCalendar('today');
            },
            viewRender: function (view, element) {
                $apply(function(){
                   $scope.title = view.title; 
                });
            }
        },
        itemClick: function (event, jsEvent, view) {
            $apply(function () {
                $scope.idEvent = event.id;
                $($scope.chosseEventModal).modal('show'); 
            });

        },

        processEvent: function (data) {
            var listMeeting = [];
            angular.forEach(data, function(value, key){
                listMeeting.push({
                    id:    value.id,
                    title: value.name,
                    start: value.begin_date
                });
            });
            return listMeeting;
        }
        
    }



    $scope.calendarConfig = {
        header: {
            left: '',
            center: 'title',
            right: 'prev,next today'
        },
        defaultDate: $scope.data.todayDate,
        navLinks: true, 
        editable: true,
        eventLimit: true, 
        dayNames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'],
        dayNamesShort: ['CN', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
        monthNames: [
            'Tháng một', 'Tháng hai', 'Tháng ba',
            'Tháng tư', 'Tháng năm', 'Tháng sáu',
            'Tháng bảy', 'Tháng tám', 'Tháng chín',
            'Tháng mười', 'Tháng mười một', 'Tháng mười hai',
        ],
        monthNamesShort: [
            'THG 1', 'THG 2', 'THG 3',
            'THG 4', 'THG 5', 'THG 6',
            'THG 7', 'THG 8', 'THG 9',
            'THG 10', 'THG 11', 'THG 12',
        ],
        viewRender: $scope.action.calendar.viewRender,
        eventClick: $scope.action.itemClick,
        events : [],
    };
    $scope.changeDate = function () {
        console.log($scope.calendar);
        $scope.calendar.fullCalendar('gotoDate', new Date('2017-08-01'));
    }
    Promise.all([$scope.data.listEvents()]).then(function () {
        var events = [

        ]
        $apply(function () {
            $scope.calendarConfig.events = events;
            console.log($scope.calendarConfig.events)
            }); 
        }).catch(function (err) {
    });
});