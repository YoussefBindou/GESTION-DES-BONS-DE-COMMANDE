<?php
session_start();
include '../components/connect.php';
if(!isset($_SESSION['admin_id'] )){
  header("location:index.php");
 }

if (isset($_GET['id'])) {
  $id_bcmd = $_GET['id'];
}

$select_commande = mysqli_query($conn, "SELECT * FROM `bon_commande` where id_bcmd =' $id_bcmd' ");

$Row = mysqli_fetch_array($select_commande);

?>
<!DOCTYPE html>
<html>

<head>
<link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">

  
  <title></title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
span{
  margin-left: 12px;
}
strong {
  margin-left: 12px;
}
    .order-container {
      margin: 10px auto;
      text-align: center;
    }

    h1 {
      text-align: center;
    }

    .restaurant-image {
      margin-bottom: 20px;
    }

    .order-details {
      
      flex-wrap: wrap;
                                                                    
      margin-bottom: 20px;
    }

    .order-details div {
      display:flex;
      flex-basis: calc(50% - 210px);
      margin-bottom: 15px;
      
      /* Center align the details */
    }

    .order-details strong {
      display: block;
      margin-bottom: 10px;
      /* Adjust spacing between the label and value */
    }

    table {
      margin: 30px auto;
      margin-left: 0rem;
    }

    th,
    td {
      padding: 5px;
      border-bottom: 1px solid #fff;
    }

    .print-button {
      text-align: center;
      margin-top: 20px;
    }

    .print-button button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    .form-row{
      display:flex;
      justify-content:center;
    }
    .col-md-4{
      width: 40%;
    
    }
  </style>
</head>

<body>


  <div class="order-container">
    
    
      <img src="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" alt="image" width="70" height="70"><br>
      <div style="margin: 16px">
      <strong>BC N°</strong>
        <span><?php echo $Row['num_bc']; ?><br></span>
        </div>
      </div> 
      <table>
  <tr>
    <td><strong>Object:</strong></td>
    <td><span><?php echo $Row['object']; ?></span></td>
  </tr>
  <tr>
    <td><strong>Consultation N°:</strong></td>
    <td><span><?php echo $Row['num_consult']; ?></span></td>
    <td><strong>Du:</strong></td>
    <td><span><?php echo $Row['date_consult']; ?></span></td>
  </tr>
  <tr>
    <td><strong>Decision N°:</strong></td>
    <td><span><?php echo $Row['num_dec']; ?></span></td>
    <td><strong>Du:</strong></td>
    <td><span><?php echo $Row['date_dec']; ?></span></td>
  </tr>
  <tr>
    <td><strong>Date d'ouverture:</strong></td>
    <td><span><?php echo $Row['date_ouverture']; ?></span></td>
  </tr>
  <tr>
    <td><strong>BC N°:</strong></td>
    <td><span><?php echo $Row['num_bc']; ?></span></td>
    <td><strong>Du:</strong></td>
    <td><span><?php echo $Row['date_bnc']; ?></span></td>
  </tr>
</table>

    <table border=1 >
      <thead>
        <tr>
          <th>numero</th>
          <th>entreprise</th>
          <th>localite</th>
          <th>loffre</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $inc=0;
        $id=0;
          $select=mysqli_query($conn,"SELECT * FROM  entreprise where id_bnc=  $id_bcmd ");
          while($fetch=mysqli_fetch_array($select)){
            $inc++;
          
        ?>
        <tr>
          <td><?php echo $inc; ?></td>
          <td><?php echo $fetch['nom']; ?></td>
          <td><?php echo $fetch['localite']; ?></td>
          <td><?php echo $fetch['offre']; ?>DH</td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>

    <table>
  <tr>
    <td><strong>L'offre retenue presente par:</strong></td>
    <td><span><?php echo $Row['offre_retenue']; ?></span></td>
    <td><strong>D'une montant de:</strong></td>
    <td><span><?php echo $Row['montant']; ?></span></td>
  </tr>
  <tr>
    <td><strong>Date de reception:</strong></td>
    <td><span><?php echo $Row['date_reception']; ?></span></td>
    <td><strong>Facture N°:</strong></td>
    <td><span><?php echo $Row['facture_numero']; ?></span></td>
  </tr>
  <tr>
    <td><strong>Date de signateur de l'ordonnateur:</strong></td>
    <td><span><?php echo $Row['date_signataire_ordonnateur']; ?></span></td>
   
  </tr>
  <tr>
  <td><strong>Date de signateur du tresorier payeur:</strong></td>
    <td><span><?php echo $Row['date_signataire_tresorier_payeur']; ?></span></td>
    <td><strong>OP N°:</strong></td>
    <td><span><?php echo $Row['op_numero']; ?></span></td>
  </tr>
  <tr>
    
    <td><strong>OV N°:</strong></td>
    <td><span><?php echo $Row['ov_numero']; ?></span></td>
    <td><strong>BE:</strong></td>
    <td colspan="3"><span><?php echo $Row['be']; ?></span></td>
  </tr>
  
</table>




<div class="form-row">
    <div class="col-md-4">
        <fieldset style="height: 190px;">
            <legend>Part 1</legend>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox1" value="DETERMATION BESOINS" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'DETERMATION BESOINS') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox1">
                    DETERMATION BESOINS
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox2" value="DECISION NORMITION DE LA COMMITION" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'DECISION NORMITION DE LA COMMITION') echo "checked";} ?> >
                <label class="form-check-label" for="checkbox2">
                    DECISION NORMITION DE LA COMMITION
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox3" value="devis" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'devis') echo "checked";} ?> >
                <label class="form-check-label" for="checkbox3">
                    devis
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox4" value="P.V.O" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'P.V.O') echo "checked"; }?> >
                <label class="form-check-label" for="checkbox4">
                    P.V.O
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox5" value="BC" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'BC') echo "checked";} ?> >
                <label class="form-check-label" for="checkbox5">
                    BC
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox6" value="CFich deng" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'CFich deng') echo "checked"; }?>  >
                <label class="form-check-label" for="checkbox6">
                    CFich d'eng
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-md-4">
        <fieldset style="height: 190px;">
            <legend>Part 2</legend>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox7" value="B.L" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'B.L') echo "checked"; }?>  >
                <label class="form-check-label" for="checkbox7">
                    B.L
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox8" value="P.V.R" <?php while($fetch = mysqli_fetch_assoc($select)){  if ($fetch['checkbox_name'] == 'P.V.R') echo "checked"; }?>  >
                <label class="form-check-label" for="checkbox8">
                    P.V.R
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox9" value="ARM" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'ARM') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox9">
                    ARM
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox10" value="Attachement"  <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'Attachement') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox10">
                    Attachement
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox11" value="facture" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'facture') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox11">
                    facture
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox12" value="accuse de reception" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'accuse de reception') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox12">
                    accuse de reception
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-md-4">
        <fieldset style="height: 190px;">
            <legend>Part 3</legend>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox13" value="OP" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'OP') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox13">
                    OP
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox14" value="OV" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'OV') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox14">
                    OV
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox15" value="Decesion reception" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'Decesion reception') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox15">
                    Decesion reception
                </label>
            </div>
            <?php
    $select = mysqli_query($conn, "SELECT * FROM `checkboxes` where id_bcmd=$id_bcmd ") or die('query failed');
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox16" value="Attestation administrative" <?php while($fetch = mysqli_fetch_assoc($select)){ if ($fetch['checkbox_name'] == 'Attestation administrative') echo "checked";} ?>  >
                <label class="form-check-label" for="checkbox16">
                    Attestation administrative
                </label>
            </div>
        </fieldset>
    </div>
</div>


    <div class="print-button">
      <button onclick="window.print()">Print Order</button>
    </div>
  

</body>

</html>