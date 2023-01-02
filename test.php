
<?php
  include('User Information.php');
  $GLOBALS["ip"] = UserInfo :: get_ip();
  $GLOBALS["os"] = UserInfo :: get_os();
  $GLOBALS["browser"] = UserInfo :: get_browser();
  $GLOBALS["device"]  = UserInfo :: get_device();
?>

<button onclick="setData()">Click me</button>
<script>
    setData = () => {
        let data={
            "firstname":"yassine" ,
            "lastname":"zouhdi" ,
            "age":22 
        };
    localStorage.setItem('test6', JSON.stringify(data));
    }
</script>