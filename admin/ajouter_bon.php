<?php
include '../components/connect.php';
session_start();
if(!isset($_SESSION['admin_id'] )){
 header("location:index.php");
}else{
  $admin_id = $_SESSION['admin_id'];
}   

$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");
$fetch_profile = mysqli_fetch_assoc($select_profile);

if(isset($_POST['valider'])){ 
//bon
$n_bc = $_POST['n_bc'];
$date_bc = $_POST['date_bc'];
$object = $_POST['object'];
$date_ouv = $_POST['date_ouv'];
$n_cons = $_POST['n_cons'];
$date_cons = $_POST['date_cons'];
$n_dec = $_POST['n_dec'];
$date_dec = $_POST['date_dec'];

$offreRetenue = $_POST['offre_retenue'];
$montant = $_POST['montant'];
$dateReception = $_POST['date_reception'];
$factureNumero = $_POST['facture_numero'];
$dateSignataireOrdonnateur = $_POST['date_signataire_ordonnateur'];
$dateSignataireTresorierPayeur = $_POST['date_signataire_tresorier_payeur'];
$opNumero = $_POST['op_numero'];
$ovNumero = $_POST['ov_numero'];
$be = $_POST['be'];
//entre
$numero = $_POST["number"];
$entreprise = $_POST["name"];
$localite =  $_POST["localite"];
$loffre =  $_POST["offre"];

$sql = mysqli_query($conn,"INSERT INTO bon_commande (num_bc, date_bnc, object, date_ouverture, num_consult, date_consult, num_dec, date_dec,id_admin,offre_retenue,montant,date_reception,facture_numero,date_signataire_ordonnateur,date_signataire_tresorier_payeur,op_numero,ov_numero,be) 
VALUES ('$n_bc', '$date_bc', '$object', '$date_ouv', '$n_cons', '$date_cons', '$n_dec', '$date_dec','$admin_id','$offreRetenue','$montant','$dateReception','$factureNumero','$dateSignataireOrdonnateur','$dateSignataireTresorierPayeur','$opNumero','$ovNumero ','$be ')");

$select_id=mysqli_query($conn,"select id_bcmd from bon_commande where num_bc= $n_bc");
$fetch_id_bn=mysqli_fetch_assoc($select_id);
$id_bn=$fetch_id_bn['id_bcmd'];

$brands = $_POST['checkbox'];
// echo $brands;

foreach($brands as $item){
    // echo $item . "<br>";
    $query = "INSERT INTO checkboxes (checkbox_name,id_bcmd) VALUES ('$item','$id_bn')";
    $query_run = mysqli_query($conn, $query);
}

 // Loop through the arrays
 foreach ($entreprise as $key => $value) {
   $nom = $value;
   $local = $localite[$key];
   $offre = $loffre[$key];
 
   // Insert each value into the database
   $result = mysqli_query($conn, "INSERT INTO entreprise (nom, LOCALITE, OFFRE,id_bnc) VALUES ('$nom', '$local', '$offre','$id_bn')");
 }
if ( $sql=== TRUE) {
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>


<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">

 
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   </head>
  <body>



  <?php include '../components/admin_header.php' ?>
  <h1 class="heading" style="color:white;margin-top: 3rem;">ajouter bon de commande</h1>
  <form action="" method="POST">
  
<div class="formbold-main-wrapper">
  
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="formbold-form-wrapper">
     <img src="istockphoto-1153672822-612x612.jpg" style="width: 40%;height: 40%;margin-left: 16rem;">
      
      <div class="formbold-mb-3 formbold-input-wrapp" style="display: flex;  gap: 3em;">
       <div>
        <label  class="formbold-form-label"> BC N°: </label>
          <input
            type="number"
            name="n_bc"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
          />
          </div>
          <div>
          <label for="phone" class="formbold-form-label"> du : </label>
          <input
            type="date"
            name="date_bc"
            id="phone"
            placeholder="Phone number"
            class="formbold-form-input"
          />
        </div>
      </div>
      <div class="formbold-mb-3 formbold-input-wrapp"  style="display: flex;  gap: 3em;">
       

        <div>
        <label for="phone" class="formbold-form-label"> Object: </label>
          <input
            type="text"
            name="object"
            id="areacode"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
          />
      </div>
      <div>
      <label for="phone" class="formbold-form-label"> Date Ouverture: </label>
          <input
            type="date"
            name="date_ouv"
            id="phone"
            placeholder="Phone number"
            class="formbold-form-input"
          />
        </div>
      </div>
      <div class="formbold-mb-3 formbold-input-wrapp"  style="display: flex;  gap: 3em;">
       

        <div>
        <label for="phone" class="formbold-form-label"> Consultation N°: </label>
          <input
            type="number"
            name="n_cons"
            id="areacode"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
          />
      </div>
      <div>
      <label for="phone" class="formbold-form-label"> Date Consultation: </label>
          <input
            type="Date"
            name="date_cons"
            id="phone"
            placeholder="Phone number"
            class="formbold-form-input"
          />
        </div>
      </div><div class="formbold-mb-3 formbold-input-wrapp"  style="display: flex;  gap: 3em;">
       

       <div>
       <label for="phone" class="formbold-form-label"> DECISION N°: </label>
         <input
           type="number"
           name="n_dec"
           id="areacode"
           placeholder="Area code"
           class="formbold-form-input formbold-w-45"
         />
     </div>
     <div>
     <label for="phone" class="formbold-form-label"> Date DECISION: </label>
         <input
           type="Date"
           name="date_dec"
           id="phone"
           placeholder="Phone number"
           class="formbold-form-input"
         />
       </div>
     </div>
     <div class="formbold-mb-3 formbold-input-wrapp"  style="display: flex;  gap: 3em;">
       

     <div>
    <label for="phone" class="formbold-form-label">L'offre retenue presente par:</label>
    <input
        type="text"
        name="offre_retenue"
        id="areacode"
        placeholder="Area code"
        class="formbold-form-input formbold-w-45"
    />
</div>
<div>
    <label for="phone" class="formbold-form-label">D'une montant de:</label>
    <input
        type="number"
        name="montant"
        id="phone"
        placeholder="Phone number"
        class="formbold-form-input"
    />
</div>
</div>
<div class="formbold-mb-3 formbold-input-wrapp" style="display: flex; gap: 3em;">
    <div>
        <label for="phone" class="formbold-form-label">Date de reception:</label>
        <input
            type="date"
            name="date_reception"
            id="areacode"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
        />
    </div>
    <div>
        <label for="phone" class="formbold-form-label">Facture N°:</label>
        <input
            type="number"
            name="facture_numero"
            id="phone"
            placeholder="Phone number"
            class="formbold-form-input"
        />
    </div>
</div>
<div class="formbold-mb-3 formbold-input-wrapp" style="display: flex; gap: 3em;">
    <div>
        <label for="phone" class="formbold-form-label">Date de signateur de l'ordonnateur:</label>
        <input
            type="date"
            name="date_signataire_ordonnateur"
            id="areacode"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
        />
    </div>
    <div>
        <label for="phone" class="formbold-form-label">Date de signateur du tresorier payeur:</label>
        <input
            type="date"
            name="date_signataire_tresorier_payeur"
            id="phone"
            placeholder="Phone number"
            class="formbold-form-input"
        />
    </div>
</div>
<div class="formbold-mb-3 formbold-input-wrapp" style="display: flex; gap: 3em;">
    <div>
        <label for="phone" class="formbold-form-label">OP N°:</label>
        <input
            type="number"
            name="op_numero"
            id="areacode"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
        />
    </div>
    <div>
        <label for="phone" class="formbold-form-label">OV N°:</label>
        <input
            type="number"
            name="ov_numero"
            id="phone"
            placeholder="ov numero"
            class="formbold-form-input"
        />
    </div>
</div>
<div class="formbold-mb-3 formbold-input-wrapp" style="display: flex; gap: 3em;">
    <div>
        <label for="phone" class="formbold-form-label">BE:</label>
        <input
            type="number"
            name="be"
            id="areacode"
            placeholder="Area code"
            class="formbold-form-input formbold-w-45"
        />
    </div>
</div>

     <div>
     
    
       </div>
     </div>
    
     
    
  </div>
</div>










<div class="form-row">
    <div class="col-md-4" style="">
        <fieldset style="height: 30rem;">
            <legend></legend>
            <h2 style="text-align:center">Part 1</h2>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox1" value="DETERMATION BESOINS">

           <label class="form-check-label" for="checkbox1">
                    DETERMATION BESOINS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox2" value="DECISION NORMITION DE LA COMMITION">
                <label class="form-check-label" for="checkbox2">
                    DECISION NORMITION DE LA COMMITION
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox3" value="devis">
                <label class="form-check-label" for="checkbox3">
                    devis
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox4" value="P.V.O">
                <label class="form-check-label" for="checkbox4">
                    P.V.O
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox5" value="BC">
                <label class="form-check-label" for="checkbox5">
                    BC
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox6" value="CFich deng">
                <label class="form-check-label" for="checkbox6">
                    CFich d'eng
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-md-4" style="">
        <fieldset style="height: 30rem;">
            <legend></legend>
            <h2 style="text-align:center">Part 2</h2>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox7" value="B.L">
                <label class="form-check-label" for="checkbox7">
                    B.L
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox8" value="P.V.R">
                <label class="form-check-label" for="checkbox8">
                    P.V.R
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox9" value="ARM">
                <label class="form-check-label" for="checkbox9">
                    ARM
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox10" value="Attachement">
                <label class="form-check-label" for="checkbox10">
                    Attachement
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox11" value="facture">
                <label class="form-check-label" for="checkbox11">
                    facture
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox12" value="accuse de reception">
                <label class="form-check-label" for="checkbox12">
                    accuse de reception
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-md-4" style="">
        <fieldset style="height: 30rem;">
            <legend></legend>
            <h2 style="text-align:center">Part 3</h2>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox13" value="OP">
                <label class="form-check-label" for="checkbox13">
                    OP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox14" value="OV">
                <label class="form-check-label" for="checkbox14">
                    OV
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox15" value="Decesion reception">
                <label class="form-check-label" for="checkbox15">
                    Decesion reception
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox16" value="Attestation administrative">
                <label class="form-check-label" for="checkbox16">
                    Attestation administrative
                </label>
            </div>
        </fieldset>
    </div>
</div>








<div class="content">
  <h2 style="display: flex;justify-content: center;margin-bottom: 16px;text-transform: capitalize;font-size: 22px;margin-top: 20px;color: white;">les entreprise</h2>

    <table id="myTable" class="table table-bordered">
      <thead>
        <tr>
          <th style="background-color: white;" >Number</th>
          <th style="background-color: white;">Name</th>
          <th style="background-color: white;">Localite</th>
          <th style="background-color: white;">Offre</th>
          <th style="background-color: white;">Action</th>
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
    <div class="style-butt">
    <button type="button" style="width:100px" class="btn btn-primary" onclick="addRow()">Add Row</button>
   
    </div>
</div>
<input type="submit" style="width:200px;margin-left: 69rem;margin-bottom: 2rem;"   class="formbold-btn" name="valider" value="valider">
</form>
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
<script src="../js/admin_script.js"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  
  body{
   background-image: url("../images/wallpaperflare.com_wallpaper (1).jpg");
   background-size: 120%;
   background-position: center;
   
   /* padding-bottom: 7rem; */
}
  .style-butt{
    display: flex;justify-content: center;
  }
  .table {
    width: 70%;
    margin-bottom: 2rem;
    color: #212529;
    margin-left: 150px;
    background-color: white;
}
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    border-radius: 3rem;
    padding: 40px;
  }

  .formbold-img {
    display: block;
    margin: 0 auto 45px;
  }

  .formbold-input-wrapp > div {
   
    gap: 20px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
  
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
    width: 220px;
  }
  .formbold-form-input::placeholder,
  select.formbold-form-input,
  .formbold-form-input[type='date']::-webkit-datetime-edit-text,
  .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
    color: rgba(83, 99, 135, 0.5);
  }

  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
    margin-left: 8px;
  }

  .formbold-form-file-flex {
    display: flex;
    align-items: center;
    gap: 20px;
  }
  .formbold-form-file-flex .formbold-form-label {
    margin-bottom: 0;
  }
  .formbold-form-file {
    font-size: 14px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-form-file::-webkit-file-upload-button {
    display: none;
  }
  .formbold-form-file:before {
    content: 'Upload file';
    display: inline-block;
    background: #EEEEEE;
    border: 0.5px solid #FBFBFB;
    box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    padding: 3px 12px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    color: #637381;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    margin-right: 10px;
  }

  .formbold-btn {
    text-align: center;
    width: 100%;
    font-size: 16px;
    border-radius: 5px;
    padding: 13px 83px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 36px;
}
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }


</style>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    background: white;
    padding: 40px;
  }

  .formbold-img {
    display: block;
    margin: 0 auto 45px;
  }

  .formbold-input-wrapp > div {
   
    gap: 20px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
  
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
    width: 220px;
  }
  .formbold-form-input::placeholder,
  select.formbold-form-input,
  .formbold-form-input[type='date']::-webkit-datetime-edit-text,
  .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
    color: rgba(83, 99, 135, 0.5);
  }

  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
    margin-left: 8px;
  }

  .formbold-form-file-flex {
    display: flex;
    align-items: center;
    gap: 20px;
  }
  .formbold-form-file-flex .formbold-form-label {
    margin-bottom: 0;
  }
  .formbold-form-file {
    font-size: 14px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-form-file::-webkit-file-upload-button {
    display: none;
  }
  .formbold-form-file:before {
    content: 'Upload file';
    display: inline-block;
    background: #EEEEEE;
    border: 0.5px solid #FBFBFB;
    box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    padding: 3px 12px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    color: #637381;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    margin-right: 10px;
  }

  .formbold-btn {
    text-align: center;
    width: 100%;
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .form-check-label {
    margin-bottom: 10px;
    padding: 2px;
    font-size: 13px;
}
fieldset {
    padding: 10px;
    margin: 10px;
    border: 0;
    background-color:white;
    border-radius: 2rem;
}

   


</style>