(function() {
  var app, express,path, sass, host, port;
  //host = "client.mockinterview.com";
  port = 3000;
  express = require("express");
  //path = require('path');

  app = express();

  //app.engine('html', require('ejs').renderFile);

  //app.set('view engine', 'ejs');
  //app.set("views", path.join(__dirname, '/assets/html'));
  //app.set('view engine', 'html'); // use either jade or ejs
  //app.engine('jade', require('jade').__express);
  // instruct express to server up static assets
  app.use(express.static(__dirname + "/build"));  // use static files in ROOT/public folder

  app.get("/", function(request, response) {
    response.render("/index.html");
  });

  app.listen(port);

}).call(this);