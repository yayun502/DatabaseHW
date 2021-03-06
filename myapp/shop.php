<?php
    session_start();

    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

    $uacc = $_SESSION['Account']; 
    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname",$dbusername,$dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("select name,phonenumber,latitude,longitude,role from users where account=:account");
    $stmt->execute(array('account'=>$uacc));
    $row = $stmt->fetch();

    $uname = $row['name'];
    $uphone = $row['phonenumber'];
    $ulat = $row['latitude']; 
    $ulon = $row['longitude'];
    $urole = $row['role'];

    $mrowi = 0;
    $mrow = $stmt;
    $mcount = $stmt;

    if($urole=='manager'){
      $_SESSION['Owner'] = $uacc;
      $stmt = $conn->prepare("select shop_name,shop_category,latitude,longitude from shops where owner=:owner");
      $stmt->execute(array('owner'=>$uacc));
      $row = $stmt->fetch();
      $sname = $row['shop_name'];
      $scat = $row['shop_category'];
      $slat = $row['latitude'];
      $slon = $row['longitude'];
      $_SESSION['Shop_name'] = $sname;
      $_SESSION['Shop_category'] = $scat;
      $_SESSION['Shop_latitude'] = $slat;
      $_SESSION['Shop_longitude'] = $slon;
      
      $stmt = $conn->prepare("select meal_name,price,quantity,image from menus where shop_name=:shop_name");
      $stmt->execute(array('shop_name'=>$sname));
      $mrow = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mcount = $stmt->columnCount() - 1;
      print_r($mrow);
      echo $mrow[$mrowi]['meal_name'];
    } 

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
              <input name="scat" class="form-control" id="ex6" placeholder="fast food" type="text" >
            </div>
            <div class="col-xs-2">
              <label for="ex6">latitude</label>
              <input name="slat" class="form-control" id="ex7" placeholder="24.78472733371133" type="text" >
            </div>
            <div class="col-xs-2">
              <label for="ex8">longitude</label>
              <input name="slon" class="form-control" id="ex8" placeholder="121.00028167648875" type="text" >
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 25px;">
          <div class=" col-xs-3">
            <button type="submit" class="btn btn-primary" id="ex2"  >register</button>
          </div>
        </div>
        </form>

        <!---------------------???????????????ADD------------------------->
        <hr>
        <h3>ADD</h3>
        <form action="menu.php" method="post" Enctype="multipart/form-data">
        <div class="form-group">
          <div class="row">

            <div class="col-xs-6">
              <label for="ex3">meal name</label>
              <input name="mname" class="form-control" id="ex3" type="text">
            </div>
          </div>
          <div class="row" style=" margin-top: 15px;">
            <div class="col-xs-3">
              <label for="ex7">price</label>
              <input name="mprice" class="form-control" id="ex7" type="text">
            </div>
            <div class="col-xs-3">
              <label for="ex4">quantity</label>
              <input name="mquan" class="form-control" id="ex4" type="text">
            </div>
          </div>


          <div class="row" style=" margin-top: 25px;">

            <div class=" col-xs-3">
              <label for="ex12">????????????</label>
              <input name="mimg" id="myFile" type="file" multiple class="file-loading">
            </div>
            <div class=" col-xs-3">
              <button style=" margin-top: 15px;" type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
        </form>
        <!---------------------------?????????------------------------------>
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
                <?php
                  foreach($mrow as $row){

                  }
                ?>
                <tr>
                  <th scope="row">1</th>
                  <td><img src="../Picture/1.jpg" width="100" height="100" alt="Hamburger"></td>
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
    var urole = "$urole";
    var sname = "$sname";
    var scat = "$scat";
    var slat = "$slat";
    var slon = "$slon";

    $(document).ready(function () {
      $(".nav-tabs a").click(function () {
        $(this).tab('show');
      });
    });
    if (urole == 'manager'){
      var snameField = document.getElementById('ex5');
      snameField.placeholder = sname;
      snameField.setAttribute("readOnly", 'true');

      var scatField = document.getElementById('ex6');
      scatField.placeholder = scat;
      scatField.setAttribute("readOnly", 'true');

      var slatField = document.getElementById('ex7');
      slatField.placeholder = slat;
      slatField.setAttribute("readOnly", 'true');

      var slonField = document.getElementById('ex8');
      slonField.placeholder = slon;
      slonField.setAttribute("readOnly", 'true');

      var register = document.getElementById('ex2');
      register.disabled = true;
    }
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