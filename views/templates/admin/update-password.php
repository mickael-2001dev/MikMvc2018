<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PopCulture Brasil</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->asset ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->asset ?>css/one-page-wonder.css" rel="stylesheet">

  </head>

  <body>

  <section class="news custom-views">
      <div class="container">
        
          
            <div class="text-center message-section">
              <p class="contact-p">Trocar Senha</p>
              <form method="post">
              <div class="form-group row justify-content-center">
             
               
                  <input class="form-control col-4" type="text" name="user" placeholder="Usuário">
               
                
               
             
            </div>
              <div class="form-group row justify-content-center">
            
            
                  <input class="form-control col-4" type="password" name="new-pass" placeholder="Nova Senha">
               
                
               
             
              
            </div>
             <div class="form-group row justify-content-center">
            
              
               
                  <input class="form-control col-4" type="password" name="repeat-pass" placeholder="Repetir Senha">
               
                
               
          
              
            </div>
           


                <div class="form-group row justify-content-center">
                  <input type="submit" name="update" class="btn btn-primary btn-block btn-lg rounded-pill col-lg-4 d-block mx-auto" value="Trocar">
                </div>
                 <?php if($data['msg']): ?>
                 <div class="form-group row justify-content-center">
                
                    <div class="alert alert-danger col-lg-5">
                      <?php echo $data['msg']  ?>
                    </div>
                  
                </div>
                <?php endif; ?>
              </form>
            </div>
            
              
           


      </div>

   
  </section>

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $this->asset ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->asset ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel();
        $('div.bgParallax').each(function(){
            var $obj = $(this);
         
            $(window).scroll(function() {
                var yPos = -($(window).scrollTop() / $obj.data('speed')); 
         
                var bgpos = '50% '+ yPos + 'px';
         
                $obj.css('background-position', bgpos );
         
            }); 
        });

    </script>
  </body>

</html>
