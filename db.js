 var mysql = require('mysql');
 var writeFile = require('write');

 let dbname     = 'cypress';
 let dbuser     = 'root';
 let dbpassword = '';
 let dbhost     = 'localhost';
 build_connection(dbname,dbuser,dbpassword,dbhost);

function build_connection(dbname,dbuser,dbpassword,dbhost){
   var con = mysql.createConnection({
    host: dbhost,
    user: dbuser,
    password: "",
    database: dbname
   });
   con.connect(function(err) {
   if (err) throw err;
    console.log("Connected!");
   });
    con.query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='cypress'",(err,tables) => { 
     for(var key in tables) {
       let get_table_name  = '';
       let records_jsonstring = '';
       get_table_name = tables[key]['TABLE_NAME'];
        con.query('SELECT * FROM '+get_table_name, (err,records) => {
          if(err) throw err;
          records_jsonstring = JSON.stringify(records);
         // console.log(records_jsonstring);
           //console.log(get_table_name);
          writeFile.sync('cypress/fixtures/db/'+get_table_name+'.json', records_jsonstring);
           console.log('cypress/fixtures/db/'+get_table_name+'.json');
          //console.log('Fetch Data from ' +get_table_name);
        })
     }
   })
}



