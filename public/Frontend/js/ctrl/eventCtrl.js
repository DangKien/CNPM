ngApp.controller('eventCtrl', function ($apply, $scope, $eventService, $timeout, $myLoader)
{  
    $scope.calendar;
    $scope.title;
    $scope.chosseEventModal;
    $scope.calendarConfig = {};

    $scope.data = {
        listEvent: {},
        date: {},
        todayDate: moment(),
    };
    
    var p1 = new Promise(function (resolve, reject) {
                    $eventService.action.listEvent().then(function (resp) {
                        $scope.calendarConfig.events = $scope.action.processEvent(resp.data);
                        resolve($scope.calendarConfig.events);
                    }).catch(function (err) {
                        reject(false);
                    });
                });
    
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
                    start: value.begin_date,
                    end: value.end_date,
                });
            });
            return listMeeting;
        }
        
    }
    $scope.events = function () {
        p1.then(function (value) {
            $apply(function () {
                $scope.calendarConfig.events = value;
                $myLoader.hide();
            })
            }).catch(function (err) {
        });
    };
    
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
    $scope.events();
});