var app = require('express')();
var server = require('http').Server(app);

var io = require ('socket.io')(server);
var redis = require('redis');
var redisClient = redis.createClient();

io.listen(8888);

io.on ('connection', function (socket) {

	console.log('Client Connected. ' + " id: " + socket.id);

	redisClient.subscribe("addmission");
	redisClient.on("message", function (channel, message) {
	   	socket.emit(channel, message);
	});

	redisClient.on('disconnect', function () {
		redisClient.quit();
	});

	socket.on ('disconnect', function(){
    	console.log('Client Disconnected. ' + " id: " + socket.id);
  	});
});