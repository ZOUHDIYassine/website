<?php

   $con=mysqli_connect('localhost','root');
   mysqli_select_db($con,'evet');
    $sql="SELECT*FROM products WHERE featured=1";
    $featured=$con->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Evetements</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UM-Compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Evêtement</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produits
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="col-md-2"></div>
       <div class="col-md-8">
                <div class="row">
                        <?php
                        while($product=mysqli_fetch_assoc($featured)):
                          $c = "details" . "" . $product['id'] . "" . ".php";
                        ?>
                        <div class="col-md-5">
                          <h4><?=$product['title'];?></h4>
                          <img src="<?=$product['image'];?>"alt="<?=$product['title']; ?>"/>
                          <p class="price">Prix <?=$product['price'];?></p>
                          <a href="<?php echo $c ?>">
                             <button type="button"class="btn btn-success"data-toggle="modal" data-target="#details-1" onclick="send()">More</button>
                          </a>
                        </div>
                        <script>
                          /*setData = () => {
                            let data={
                              "firstname":"yassine",
                              "lastname":"zouhdi",
                              "age":22
                            };
                            //localStorage.setItem('test2', JSON.stringify(data));
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", '/sendLog', true);
                            xhr.setRequestHeader("Accept", "application/json");
                            xhr.setRequestHeader('Content-Type', 'application/json');
                            xhr.send(data);
=
                            alert(JSON.stringify(xhr))
                          }*/
                          <?php
                            include('User Information.php');
                            $GLOBALS["ip"] = UserInfo :: get_ip();
                            $GLOBALS["os"] = UserInfo :: get_os();
                            $GLOBALS["browser"] = UserInfo :: get_browser();
                            $GLOBALS["device"]  = UserInfo :: get_device();
                          ?>
                          <?php
                            $ip1 = '168.192.0.1';
                            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip1));
                            if($query && $query['status'] == 'success')
                            {
                              $GLOBALS["city"] = $query['city'];
                            }

                          ?>
                          
                          
      
                          async function send() {
        try {
          let data={
                  "ip":"<?php echo $ip1; ?>" ,
                  "os":"<?php echo $GLOBALS["os"]; ?>" ,
                  "browser":"<?php echo $GLOBALS["browser"]; ?>" ,
                  "device":"<?php echo $GLOBALS["device"]; ?>" ,
                  "id":"<?php echo $product['title']; ?>" ,
          };
          const res = await fetch("http://localhost:34567/update", {
            method: "POST",
            body: JSON.stringify(data),
          });
          console.log(res);
        } catch (e) {
          console.error(e);
        }
      }
                          </script>
                        <?php endwhile; ?>
                </div>
       </div>

</body>
</html>