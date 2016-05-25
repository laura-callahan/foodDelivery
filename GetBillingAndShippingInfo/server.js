var express = require("express"),
    app = express(),
    formidable = require('formidable'),
    util = require('util'),
    qt = require('quickthumb');





app.use(qt.static(__dirname + '/'));

app.post('/', function(req, res) {
            //res.write('<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">'
            // );
            //res.write('<link href"https://fonts.googleapis.com/css?family=Abril+Fatface" //rel="stylesheet" type="text/css"><link rel="stylesheet" //type="text/css" href="stylenode.css" />');


            var form = new formidable.IncomingForm();
            form.parse(req, function(err, fields, files) {

                            var mysql = require('mysql');
var connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'hanapuan',
    password : "warEhou!se",
    database: "hanapuan"
});

connection.connect();

                res.writeHead(200, {
                    'content-type': 'text/html'
                });
                res.end(util.inspect({fields: fields, files: files}));
                var q = 'INSERT INTO BillingInfo (FirstName, LastName, Street, City, State, Zipcode) VALUES ( "' +  fields.billFname + '", "' + fields.billLname +'", "'+ fields.billStreet +' ' + fields.billRm + '", "' + fields.billCity + '", "' + fields.billState + '", "' + fields.billZipcode +'" )';
                connection.query(q, function(err, rows, fields) {
                    if (err){ 
                        console.log(q);
                        throw err;
                    }
                    console.log('Good!');
                    res.end("Great!");
                });

                 var q2 = 'INSERT INTO ShippingInfo (FirstName, LastName, Street, City, State, Zipcode) VALUES ( "' +  fields.shipFname + '", "' + fields.shipLname +'", "'+ fields.shipStreet +' ' + fields.shipRm + '", "' + fields.shipCity + '", "' + fields.shipState + '", "' + fields.shipZipcode +'" )';
                connection.query(q2, function(err, rows, fields) {
                    if (err){ 
                        console.log(q);
                        throw err;
                    }
                    console.log('222!');
                    res.end("222222!");
                });


                connection.end();




            });
    });

            //form.on('end', function(fields, files) {
                //     /* Temporary location of our uploaded file */
                //     var temp_path = this.openedFiles[0].path;
                //     /* The file name of the uploaded file */
                //     var file_name = this.openedFiles[0].name;
                // 	name = file_name;
                //     /* Location where we want to copy the uploaded file */
                //     var new_location = './upload/';

                // //	res.write('<img src =' + '\'./upload/' + name + '\'/>' + '\n\n');

                //     fs.copy(temp_path, new_location + file_name, function(err) {  
                //       if (err) {
                //         console.error(err);
                //       } else {
                // 			name = file_name;
                // 		  console.log(new_location + file_name);
                //         console.log("success!");
              //  echo "hello";



                //res.write('<img src =' + '\'./upload/' + name + '\'/>' + '\n\n');
            //});

            // Show the upload form 
            app.get('/', function(req, res) {
                res.writeHead(200, {
                    'Content-Type': 'text/html'
                });
                var form = '<h1>Shipping Info:</h1><form action="/#" method="post">First Name:<input type="text" name="shipFname" maxlength="12" size="12"><br>Last Name:      <input type="text" name="shipLname" maxlength="12" size="12"><br>Street:     <input type="text" name="shipStreet" maxlength="32" size="32">  Rm/Apt(optional): <input type="text" name="shipRm" maxlength="12" size="12"><br>City:       <input type="text" name="shipCity" maxlength="12" size="12">    State: <input type="text" name="shipState" maxlength="2" size="2">  Zipcode: <input type="text" name="shipZipcode" maxlength="5" size="5"><br>    <br><h1>Billing Info:</h1>First Name:     <input type="text" name="billFname" maxlength="12" size="12"><br>Last Name:      <input type="text" name="billLname" maxlength="12" size="12"><br>Street:     <input type="text" name="billStreet" maxlength="32" size="32">  Rm/Apt(optional): <input type="text" name="billRm" maxlength="12" size="12"><br>City:       <input type="text" name="billCity" maxlength="12" size="12">    State: <input type="text" name="billState" maxlength="2" size="2"> Zipcode: <input type="text" name="billZipcode" maxlength="5" size="5"><br><br><input type="submit"></form>';
                res.end(form);


            });
            app.listen(1522);
