<?php include('server.php') ?>

<?php 

  if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
   header('location: index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Add Profile</h2>
  </div>
	
  <form method="post" action="addProfile.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstName" value="<?php echo $firstName; ?>">
  	</div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lastName" value="<?php echo $lastName; ?>">
    </div>
  	<div class="input-group">
  	  <label>Contact No.</label>
  	  <input type="text" name="contact" maxlength="10" value="<?php echo $contact ?>">
  	</div>
  	<div class="input-group">
      <label>Address</label>
      <textarea cols="55" rows="4" name="address"><?php echo $address ?></textarea>
    </div>
    <div class="input-group">
      <label>Subscription Type</label>
      <div class="custom-select" style="width:200px;">
        <select name="subType">
          <option value="select">Select</option>
          <option value="standard">Standard</option>
          <option value="premium">Premium</option>
        </select>
      </div>
    </div>
    <div class="input-group">
      <label>Payment Type</label>
      <div class="custom-select" style="width:200px;">
        <select name="payType">
          <option value="select">Select</option>
          <option value="cc">Credit Card</option>
          <option value="dc">Debit Card</option>
          <option value="ob">Online Banking</option>
        </select>
      </div>
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_profile">Submit</button>
  	</div>
  </form>
</body>
</html>