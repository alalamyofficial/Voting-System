<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body style="


background: #355C7D;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #C06C84, #6C5B7B, #355C7D);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #C06C84, #6C5B7B, #355C7D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


">

    <div>
    
        <!-- Image and text -->
        <nav class="navbar navbar-dark bg-dark d-flex justify-content-center">
            <a class="navbar-brand">
                <h2 class="main-title">Vote Who's The Most Dictator</h2>
            </a>
        </nav>

    </div>

    <div class="container">
    
        <div class="row justify-content-center">
        
        
            <form action="index.php" method="POST" align="center">
            
            <div class="d-flex">

                <div class="card" style="width: 18rem;">
                    <img src="https://sabrangindia.in/sites/default/files/hitler_0.jpg?266" class="card-img-top"  width="280" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Adolf Hitler</h5>
                        <p class="card-text">Nazi Germany Leader</p>
                        <input type="submit" name="hitler" class="btn btn-primary w-100" value="Vote For Hitler">
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                    <img src="https://magazineclonerepub.blob.core.windows.net/mcepub/2350/108546/image/b9255ab2-14dd-4881-8f71-922e25485b29.jpg" class="card-img-top" width="280" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Josef Stalin</h5>
                        <p class="card-text">Soviet Union Leader</p>
                        <input type="submit" name="stalin" class="btn btn-primary w-100" value="Vote For Stalin">
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                <img src="https://m.psecn.photoshelter.com/img-get2/I0000J5yn7qz985M/sec=/fit=1200x1200/I0000J5yn7qz985M.jpg" class="card-img-top" width="280" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Napoleon Bonaparte</h5>
                        <p class="card-text">French Leader</p>
                        <input type="submit" name="napoleon" class="btn btn-primary w-100" value="Vote For Napoleon">
                    </div>
                </div>

            </div>


        </form><br><br>
    

<?php 

   $con = mysqli_connect("localhost","root","","vote_db");
   
   if(isset($_POST['hitler'])){
       
       $hitler_vote = "update votes set hitler=hitler+1";
       $run_hitler = mysqli_query($con,$hitler_vote);
       
       if($run_hitler){
        
        
           echo"
           
           <div class='flex-column'>
           
    
           
                <h2 align='center'>You Voted For Adolf Hitler</h2><br>
                <h2 align='center'><a href='index.php?results'>View Results</a>
    
           </div>


           ";
           
        }
        
    }
    if(isset($_POST['stalin'])){
       
        $stalin_vote = "update votes set stalin=stalin+1";
        $run_stalin = mysqli_query($con,$stalin_vote);
        
        if($run_stalin){
      
            echo"
           
            <div class='flex-column'>
            
                <h2 align='center'>You Voted For Josef Stalin</h2><br>
                <h2 align='center'><a href='index.php?results'>View Results</a></h2>
                
            </div>
                
            ";
         }
         
     }

     if(isset($_POST['napoleon'])){
       
        $napoleon_vote = "update votes set napoleon=napoleon+1";
        $run_napoleon = mysqli_query($con,$napoleon_vote);
        
        if($run_napoleon){
    
            echo"
           
            <div class='flex-column'>
            
                <h2 align='center'>You Voted For Napoleon Bonaparte</h2><br>
                <h2 align='center'><a href='index.php?results'>View Results</a></h2>
          
            </div>

            ";
         }
         
     }

//New Section

if(isset($_GET['results'])){


    $getVotes = "select * from votes";
    $runVotes = mysqli_query($con,$getVotes);
    $rowVotes = mysqli_fetch_array($runVotes);

        $hitler = $rowVotes['hitler'];
        $stalin = $rowVotes['stalin'];
        $napoleon = $rowVotes['napoleon'];

     $count = $hitler+$stalin+$napoleon;
     
     $per_hitler = round($hitler*100/$count). "%";
     $per_stalin = round($stalin*100/$count). "%";
     $per_napoleon = round($napoleon*100/$count). "%";


     echo "
     
        <div style=' 
        background: rgb(238,174,202);
        background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        color: black;
        padding: 10px;
        width: 864px;
        font-size:50px
        '>
       
            <center>

                <h2>Updated Results</h2>

                    <p class='pris'>
                        <b>Adolf Hitler : </b> $hitler ($per_hitler)
                    </p>
                    <p class='pris'>
                        <b>Josef Stalin : </b> $stalin ($per_stalin)
                    </p>
                    <p class='pris'>
                        <b>Napoleon Bonaparte : </b> $napoleon ($per_napoleon)
                    </p>

            </center>
              
        </div>
    
     ";

}


    
?>

     </div>    
    </div>
    <!-- <div>
    
        <h2 class="main-footer">Made it by Mo Alalamy</h2>

    </div> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>