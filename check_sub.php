<?php
include "lib/connection.php";
$country_id = $_POST["country_id"];
$result = mysqli_query($conn,"SELECT * FROM sub_category where category_id = $country_id");
?>
<option value="">Select Sub Category</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sub_category_id"];?>"><?php echo $row["name"];?></option>
<?php
}
?>