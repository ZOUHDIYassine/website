
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
            "firstname":"<?php echo $GLOBALS["ip"]; ?>" ,
            "lastname":"<?php echo $GLOBALS["os"]; ?>" ,
            "age":"<?php echo $GLOBALS["browser"]; ?>" 
        };
    localStorage.setItem('test6', JSON.stringify(data));
    }
</script>