<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>Side Hustle Pin Generator</title>
</head>
<body>
     <!-- View Modal -->
     <div id="view-modal" class="modal">
     <div style="text-align: center;">
        <canvas id="canvas" width="400" height="200" style="box-shadow: 1px 2px 3px rgba(0,0,0,0.3); margin: 10% 10px;"></canvas>
    </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">close</a>
        </div>
      </div>
<!-- End of Modal -->

    <form action="" method="post" class="center">
    <h4><span class="green-text">Side Hustle</span> Pin Generator</h4>
        <button type="submit" name="generatebtn" class="btn">Generate Pin</button>
    </form>
    
        <?php 
        if(isset($_POST['generatebtn'])){?>
        <!--  Create table when button is clicked-->
        <a href="index.php" class="btn red right" style="margin-top: 10px;"> Cancel</a>
    <table class="highlight centered">
        <thead>
            <tr>
              <th>S/N</th>
              <th>Recharge Pin</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // GENERATE PIN
           for($i=0; $i< 200; $i++){
               $generate = "0123456789";
              ?>
             
            <tr>
              <td><?php echo $i + 1 ;?></td>
              <td class="recharge-pin">
                  <?php
                     echo substr(str_shuffle($generate),0,4 ), " - ", substr(str_shuffle($generate),0,4 ), " - ",  substr(str_shuffle($generate),0,4 ), " - ",  substr(str_shuffle($generate),0,4 ) ;
                  ?>
              </td>
              <td>
                  <button class="btn blue z-depth-0 view modal-trigger" data-target="view-modal">View</button>
              </td>
          </tr>
          <?php }
        }?>
        </tbody>
    </table>

    <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
      // initialize modal
      $(document).ready(function(){
    $('.modal').modal();});

        // create recharge card canvas when view button is clicked
        const viewButtons = document.getElementsByClassName('view');
        for (let i = 0; i < viewButtons.length; i++) {
            const viewBtn = viewButtons[i];
            viewBtn.addEventListener('click', function(e){
                // get the table row elemaent
               var tr = e.target.parentElement.parentElement;
                // get the recharge pin
                var rechargePin = tr.getElementsByClassName('recharge-pin')[0].innerHTML;

                // create Recharge card Canvas
                const canvas = document.getElementById('canvas');
                    var ctx = canvas.getContext('2d');
                    // remove previous data from the canvas
                    ctx.clearRect(0,0, canvas.height, canvas.width);
                    // style the canvas
                    var grad = ctx.createLinearGradient(0, 0, 900, 0);
                    grad.addColorStop(0, 'white');
                    grad.addColorStop(1, "green");
                    ctx.fillStyle = grad;
                    ctx.fillRect(0,0, 400, 200)
                    ctx.textAlign = "start";
                    ctx.textBaseline = "bottom";

                    ctx.font = "20px Arial";
                    ctx.strokeStyle = "green"
                    ctx.fillStyle = "red"
                    ctx.strokeText("Side Hustle Pin Genertator", 10, 25);

                    ctx.font = "12px Arial";
                    ctx.fillText(' to recharge ,dial *121*pin#', 100, 200)

                
                    // set canvas pin to recharge card pin;
                    ctx.font = "20px Arial";
                    ctx.fillText("Recharge Pin: ", 10, 100)
                    ctx.fillStyle = "black";
                    ctx.fillText(rechargePin, 35, 100)
                        })
        }
  </script>
</body>
</html>