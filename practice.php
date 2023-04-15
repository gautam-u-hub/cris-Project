<form method="GET" action="foo.php" onChange="getHouseModel">
  <select name="house_model" id="house_model">
    <option value="">------</option>
    <option value="<?php echo $model1;?>">Model 1</option>
    <option value="<?php echo $model2;?>">Model 2</option>
    <option value="<?php echo $model3;?>">Model 3</option>
  </select>
</form>

<script type='text/javascript'>
   function getHouseModel(){
      var model=$('#house_model').val();
      alert(model);
}
</script>

<?php    
$a = $_GET["housemodel"];

if($a<>'')
{
if($a == $model1)
{
   echo "<input type=\"text\" name=\"a\" value=\"something model1\">";
}
else if($a == $model2)
{
   echo "<input type=\"text\" name=\"b\" value=\"something model2\">";
} 
else if($a == $model3)
{
   echo "<input type=\"text\" name=\"c\" value=\"something model3\">";
}
}
?>     