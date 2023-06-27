<?php
include '../components/connect.php';
if(!isset($_SESSION['admin_id'] )){
  header("location:index.php");
 }
if(isset($_POST['valide'])){ 
  $numero = $_POST["number"];
  $entreprise = $_POST["name"];
  $localite =  $_POST["localite"];
  $loffre =  $_POST["offre"];
  
  // Loop through the arrays
  foreach ($entreprise as $key => $value) {
    $nom = $value;
    $local = $localite[$key];
    $offre = $loffre[$key];
  
    // Insert each value into the database
    $result = mysqli_query($conn, "INSERT INTO entreprise (nom, LOCALITE, OFFRE) VALUES ('$nom', '$local', '$offre')");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/admin_style.css">
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- custom css file link  -->

  <title>les entreprise</title>
  
</head>
<body>
<?php include '../components/admin_header.php'; ?>

<div class="content">
  <h2>Dynamic Table with Form</h2>

  <form action="" method="post">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr>
          <th>Number</th>
          <th>Name</th>
          <th>Localite</th>
          <th>Offre</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <input type="text" name="number[]" class="form-control" required>
          </td>
          <td>
            <input type="text" name="name[]" class="form-control" required>
          </td>
          <td>
            <input type="text" name="localite[]" class="form-control" required>
          </td>
          <td>
            <input type="text" name="offre[]" class="form-control" required>
          </td>
          <td>
            <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    
    <button type="button" class="btn btn-primary" onclick="addRow()">Add Row</button>
    <button type="submit" class="btn btn-success" name="valide">Submit</button>
  </form>
</div>

<script>
  function addRow() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(table.rows.length - 1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<input type="text" name="number[]" class="form-control" required>';
    cell2.innerHTML = '<input type="text" name="name[]" class="form-control" required>';
    cell3.innerHTML = '<input type="text" name="localite[]" class="form-control" required>';
    cell4.innerHTML = '<input type="text" name="offre[]" class="form-control" required>';
    cell5.innerHTML = '<button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>';
  }

  function deleteRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
</script>

</body>
</html>
