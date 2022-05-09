<?php
    session_start();

    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

    $uacc = $_SESSION['Account']; 
    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname",$dbusername,$dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("select name,phonenumber,latitude,longitude from users where account=:account");
    $stmt->execute(array('account'=>$uacc));
    
    $row = $stmt->fetch();
    $uname = $row['name'];
    $uphone = $row['phonenumber'];
    $ulat = $row['latitude']; 
    $ulon = $row['longitude'];

    try{
        if(!isset($_SESSION['Authenticated'])||$_SESSION['Authenticated']!=true){
            header("Location: index.php");
            exit();
        }
    }
    catch(Exception $e){
        $msg = $e->getMessage();
        session_unset();
        session_destroy();
        echo <<< EOT
            <!DOCTYPE>
            <html>
                <body>
                    <script>
                    alert("Internal Error. $msg");
                    window.location.replace("index.php");
                    </script>
                </body>
            </html>
        EOT;
    }

echo <<< EOT
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Hello, world!</title>
</head>

<body>
 
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand " href="nav.php">WebSiteName</a>
      </div>
    </div>
  </nav>
  <div class="container">

    <ul class="nav nav-tabs">
      <li><a href="nav.php">Home</a></li>
      <li class="active"><a href="shop.php">shop</a></li>
      <li><a href="logout.php">Log out</a></li>


    </ul>

    <div class="tab-content">
        <h3> Start a business </h3>
        <form action="shop_register.php" method="post">
        <div class="form-group">
          <div class="row">
            <div class="col-xs-2">
              <label for="ex5">shop name</label>
              <input name="sname" class="form-control" id="ex5" placeholder="macdonald" type="text" >
            </div>
            <div class="col-xs-2">
              <label for="ex5">shop category</label>
              <input name="scat" class="form-control" id="ex5" placeholder="fast food" type="text" >
            </div>
            <div class="col-xs-2">
              <label for="ex6">latitude</label>
              <input name="slat" class="form-control" id="ex6" placeholder="121.00028167648875" type="text" >
            </div>
            <div class="col-xs-2">
              <label for="ex8">longitude</label>
              <input name="slon" class="form-control" id="ex8" placeholder="24.78472733371133" type="text" >
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 25px;">
          <div class=" col-xs-3">
            <button type="submit" class="btn btn-primary"  >register</button>
          </div>
        </div>
        </form>


        <hr>
        <h3>ADD</h3>
        <form action="menu.php" method="post">
        <div class="form-group ">
          <div class="row">

            <div class="col-xs-6">
              <label for="ex3">meal name</label>
              <input class="form-control" id="ex3" type="text">
            </div>
          </div>
          <div class="row" style=" margin-top: 15px;">
            <div class="col-xs-3">
              <label for="ex7">price</label>
              <input class="form-control" id="ex7" type="text">
            </div>
            <div class="col-xs-3">
              <label for="ex4">quantity</label>
              <input class="form-control" id="ex4" type="text">
            </div>
          </div>


          <div class="row" style=" margin-top: 25px;">

            <div class=" col-xs-3">
              <label for="ex12">上傳圖片</label>
              <input id="myFile" type="file" name="myFile" multiple class="file-loading">

            </div>
            <div class=" col-xs-3">

              <button style=" margin-top: 15px;" type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
        </form>

        <div class="row">
          <div class="  col-xs-8">
            <table class="table" style=" margin-top: 15px;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Picture</th>
                  <th scope="col">meal name</th>
              
                  <th scope="col">price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><img src="Picture/1.jpg" with="50" heigh="10" alt="Hamburger"></td>
                  <td>Hamburger</td>
                
                  <td>80 </td>
                  <td>20 </td>
                  <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#Hamburger-1">
                  Edit
                  </button></td>
                  <!-- Modal -->
                      <div class="modal fade" id="Hamburger-1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Hamburger Edit</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row" >
                                <div class="col-xs-6">
                                  <label for="ex71">price</label>
                                  <input class="form-control" id="ex71" type="text">
                                </div>
                                <div class="col-xs-6">
                                  <label for="ex41">quantity</label>
                                  <input class="form-control" id="ex41" type="text">
                                </div>
                              </div>
                    
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Edit</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                  <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td><img src="Picture/2.jpg" with="10" heigh="10" alt="coffee"></td>
                  <td>coffee</td>
               
                  <td>50 </td>
                  <td>20</td>
                  <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#coffee-1">
                    Edit
                    </button></td>
                    <!-- Modal -->
                        <div class="modal fade" id="coffee-1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">coffee Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row" >
                                  <div class="col-xs-6">
                                    <label for="ex72">price</label>
                                    <input class="form-control" id="ex72" type="text">
                                  </div>
                                  <div class="col-xs-6">
                                    <label for="ex42">quantity</label>
                                    <input class="form-control" id="ex42" type="text">
                                  </div>
                                </div>
                      
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Edit</button>
                               
                              </div>
                            </div>
                          </div>
                        </div>


                  <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>


      </div>



    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  <script>
    $(document).ready(function () {
      $(".nav-tabs a").click(function () {
        $(this).tab('show');
      });
    });
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

EOT;
?>