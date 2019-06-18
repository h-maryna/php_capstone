<!doctype html>

<html lang="en"> 
  <head>
    <title>Intro Project</title>
    <meta charset="utf-8" />
    
    <style>
    /*CSS styles embeded */
    body{
      font-size: 18px;
      font-family: Arial, sans-serif; 
      background-color: #fcc;
    }
    h1,h2,p{
      text-align: center;
    }
    h1{
      color: #600;
    }
    h2 img{
      border-radius: 15px;
    }
    p a {
      color: #fff;
      background-color: #966;
      display: inline-block;
      border-radius: 15px;
      padding: 15px;
      border: 1px solid #ccc;
      text-decoration: none;
    }
    p{
      font-weight: 700; 
    }
    a:hover{
      background-color: #c60;
      opacity: 0.65;
    }
    
    </style>


    <script>
  
      document.write("<h1>JavaScript Project<h1>"); 
      document.write("<h1>To-Do List<h1>");
      var showPopup;
      // defyining and adding a new values to the variables
      var items = new Array(); // create a new Items array
      var items_due_dates= new Array(); // create a new array with due dates
      var item_deleted = []; 
      var items_window; // define a new variable for the new window 
      
      //-------------Fuction for open a new window-----------------------
      function showPopUp() {
        // giving new window new width and height
        items_window = window.open('', 'items', 'width=450,height=550,left=30,top=50');
        items_window.document.write("<h1>Items in my To-Do list</h1>");
        // link to external stylesheet
        items_window.document.write("<link rel='stylesheet' type='text/css' href='styles/items_list_stylesheet.css'>");
        items_window.focus();
      }
      // end of showPopup function
      
      //-------------Function to show items in a new window---------------
      function showItems(){
        showPopUp();
        //  Create a table with items list and due dates
        items_window.document.write("<table><tr><th>Number</th><th>Items List</th><th>Due Dates</th></tr>");
        for(var i=0;i<items.length;i++){
         items_window.document.write("<tr><td>" + [i+1] + "</td><td>" +items[i] + "</td><td>" + items_due_dates[i] + "</td></tr>");
        }
        items_window.document.write("</table>");
        items_window.document.close();
      }
      // end of showItems function
      
      //-------------Function to add items---------------------------------
      function addItem(){
        var item_added = prompt("Please enter one more item to the to-do list");
        var item_due_dates_added = prompt("Please enter a due date for your new item");
          if(!item_added || !item_due_dates_added){
            alert("Please provide an item for the to-do list");
            return; // return Void
          }
        items.push(item_added); // adding new items by using push
        items_due_dates.push(item_due_dates_added);
        alert("New item " + item_added + " has been added to the to-do list");
        showItems();
      }
      // end of showItems function
      
      //-------------Function to remove items---------------------------------
      function itemsRemoved(){
        item_removed = prompt("What item to you want to remove?");
        if(!item_removed){
          alert("Please type item you want to remove");
          return; 
        }
        for(i=0;i<items.length;i++){
          // removing an item with a specific index using "splice" method 
          if((item_removed == items[i])||[i]){
            var removed_item = items.splice(i,1);
            items_due_dates.slice(i,1);
            item_deleted.push(removed_item[0]);
            alert("You just removed " + removed_item + " from the to-do list");
          }
        }
        if(!removed_item){
          alert("There is not such item in to-do list. Please try to remove something else");
        }
        showItems();
      }
      // end of showItems function
      
      //-------------Function to show removed items---------------------------------
      function showRemovedItems(){
        showPopUp();
        items_window.document.write("<p>");
        for(var i=0;i<item_deleted.length;i++){
          items_window.document.write("<img src='images/check_mark.png' alt='ckeck-mark green' weight=20 height=17>" + item_deleted[i] + " has been removed from the to-do list" + "</br>" + " ");
        }
        items_window.document.write("</p>");
        items_window.document.close();
      }
      
      // end of showRemoved function
     
    
   
    </script>
    
    
  </head> 
 
  
  <body id="calendar">

  <h2><img src="images/list.jpg" alt="My to-do list" id="list" width=350px height=233px /></h2>
    <p><a href="#" onclick="showItems(); return false">Show items in the to-do list</a></p>
    <p><a href="#" onclick="addItem(); return false">Adding a new item to the to-do list</a></p>
    <p><a href="#" onclick="itemsRemoved(); return false">Removing an item from the to-do list</a></p>
    <p><a href="#" onclick="showRemovedItems(); return false">Showing removed item from the to-do list</a></p>
  </div>
    <script>

     
   
    </script>
    <noscript>
      <p>This page requires javascript.  Please enable it.</p>
    </noscript>

  </body>

</html>