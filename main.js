const { Pool } = require('pg');
//import { Pool } from './pg';

//import pg from 'pg'
//const { Pool } = require('mysql');

// Create a connection pool using the connection information provided on bit.io.
const pool = new Pool({
    user: 'hussdamian16',
    host: 'db.bit.io',
    database: 'hussdamian16/RecipeList', // public database 
    password: 'v2_436zG_AkRBP84uxuk4HXPnmDJR95W', 
    port: 5432,
    ssl: true,
});

var recipes = [];

// call a query in the database
pool.query('SELECT * FROM "hussdamian16/RecipeList"."public"."Software Engineering Basic Database.xlsx - Recipe";', (err, res) => {


    //console.log(res);
    
    for (let i=0; i<res.rowCount; i++){

        //console.log(typeof res.rows[i]);

        recipes.push(res.rows[i]);
    }


    printRecipesToConsole(recipes);
});




function printRecipesToConsole(r){
    console.log(r);
}




/*
pool.query('SELECT * FROM "hussdamian16/RecipeList"."public"."Software Engineering Basic Database.xlsx - Recipe";', (err, res) => {
    //console.table(res.rows);
    console.log(res.rows);
    document.getElementById('dbtest').appendChild(addTableRow(res.rows));
});
*/


function addTableRow(object){

    return object['title']
}