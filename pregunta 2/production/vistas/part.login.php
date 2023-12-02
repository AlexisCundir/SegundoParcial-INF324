      <!--  contact -->
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>LOGIN</h2>
                  </div>
               </div>
               <div class="col-md-6 offset-md-3">
                  <form id="request" class="main_form" action="login.verifica.php" method="POST">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="CI" type="text" name="user"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Contrasenia" type="password" name="password"> 
                        </div>
                        <div class="col-sm-12">
                           <button class="send_btn">Login</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
   let mensaje = '0';
   switch (mensaje) {
      case "0":
         Swal.fire("Ingrese credenciales VALIDAS!");
         break;

      case "1":
         Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!"
            });
         break;
      case "2":
         Swal.fire({
           title: "Good job!",
           text: "You clicked the button!",
           icon: "success"
         });
         break;
      default:
         break;
    }
    </script>