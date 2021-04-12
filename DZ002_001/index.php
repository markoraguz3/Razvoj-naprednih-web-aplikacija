<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../style.css" />
      <title>RNWA</title>
      <script>
         function showHint(str) {
        
            if (str.length == 0) { 
               document.getElementById("txtHint").innerHTML = "";
               return;
            } else {
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function() {
                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                     }
               }
               xmlhttp.open("GET", "country_search.php?s=" + str, true);
               xmlhttp.send();
            }
         }
         showHint("a");
      </script>
   </head>
   <body>

      <div class="row">
         <div class="logo">
            <h2 style="text-align: center">Logo</h2>
         </div>
         <div class="login">
            <h2 style="text-align: center">Login/Register</h2>
         </div>
      </div>
      <div class="top-nav">
         <h2 style="text-align: center">Top navigation</h2>
      </div>
      <div class="row">
         <div class="content">
            <div class="text">
               <h1 style="text-align: center">Naslov 1</h1>
               <!--     <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Earum minima a corporis perspiciatis, reprehenderit ea, error
                  maxime veniam sint vero odit fugit obcaecati eaque. Obcaecati
                  earum quas iure. Eos, omnis?
               </p> -->
               <h2>Naslov 2</h2>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Earum minima a corporis perspiciatis, reprehenderit ea, error
                  maxime veniam sint vero odit fugit obcaecati eaque. Obcaecati
                  earum quas iure. Eos, omnis?
               </p>
               <h3>Naslov 3</h3>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Earum minima a corporis perspiciatis, reprehenderit ea, error
                  maxime veniam sint vero odit fugit obcaecati eaque. Obcaecati
                  earum quas iure. Eos, omnis?
               </p>
               <h4>Naslov 4</h4>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Earum minima a corporis perspiciatis, reprehenderit ea, error
                  maxime veniam sint vero odit fugit obcaecati eaque. Obcaecati
                  earum quas iure. Eos, omnis?
               </p>
               <h5>Naslov 5</h5>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Earum minima a corporis perspiciatis, reprehenderit ea, error
                  maxime veniam sint vero odit fugit obcaecati eaque. Obcaecati
                  earum quas iure. Eos, omnis?
               </p>
               <h6>Naslov 6</h6>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Earum minima a corporis perspiciatis, reprehenderit ea, error
                  maxime veniam sint vero odit fugit obcaecati eaque. Obcaecati
                  earum quas iure. Eos, omnis?
               </p>
            </div>

            <form>
               <span>Search countries:</span> 
               <input type="text" onkeyup="showHint(this.value || 'a')">
            </form>
            <table id="txtHint">
               <tr>
                  <th>Country</th>
                  <th>Continent</th>
                  <th>Region</th>
               </tr>
             
            </table>
            <div class="images">
               <img src="../images/html-logo.jpg" alt="asd" />
               <img src="../images/css-logo.png" alt="" />
               <img src="../images/js-logo.png" alt="" />
            </div>
         </div>
         <div class="add">
            <h3 style="text-align: center">Članovi tima:</h3>
            <span>Marko Raguž: </span>
            <a href="">marko.raguz1@student.fsre.ba</a>
            <span>Ivan Dodig: </span>
            <a href="">ivan.dodig@student.fsre.ba</a>

            <h3>Github adresa:</h3>
            <a
               href="https://github.com/markoraguz3/Razvoj-naprednih-web-aplikacija"
            >
               https://github.com/markoraguz3/Razvoj-naprednih-web-aplikacija
            </a>
         </div>
      </div>
      <div class="footer">
         <a href="">FSRE</a>
         <a href="">FB</a>
         <a href="">GMAIL</a>
      </div>
   </body>
</html>
